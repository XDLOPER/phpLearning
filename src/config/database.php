<?php 

// global variables
$ENVdatabase = getenv('DB_TABLE');
$ENVusername = getenv('DB_USERNAME');
$ENVpassword = getenv('DB_PASSWORD');


// CRUD TEMPLATE

abstract class CRUD extends DataBase{
     public $table;
     public function __construct($table = ''){
          // php de js gibi değil işlemler tek tek yönetilir bu yüzdn değişkenleri global ile almamız lazım ilkönce
          global $ENVdatabase,$ENVusername,$ENVpassword;
          parent::__construct($ENVdatabase,$ENVusername,$ENVpassword);

          // __construct props placed this class 
          $this->table = $table;
          
     }
}

class DataBase{
     public $db;

     public function __construct($dbname,$username = 'root',$password = ''){
          try{
               $this->db = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
               $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // chatGPT önerdi neden bilmiyorum öğrenmek lazım
          }catch(Exception $e){
               echo "DB Error: " . $e->getMessage();
          }
     }

     public function __destruct()
     {
          
          /* burayı sonra yap
          echo 'DB closed successfully';
          
          try{
               $this->db = null;             
          }catch(PDOException $e){
               echo "DB close error: " . $e->getMessage();
          }
          */

     } 

}

class INSERT extends CRUD {

     public function add($propsArray = []){
          $db = $this->db;

          /* bitmedi => () içindeki ve values (?,...) diye giden ifadeleri dinamik yapmak gerekiyor
          $data = $db->prepare("INSERT INTO" . $this->table . "(ali,memo,cemo) VALUES (?,?,?)");
          $data->execute([
               // böyle böyle arraylerin içinden alıcak yerleştiricek buralarda dinamik olucak
               $propsArray[0],
               $propsArray[1],
               $propsArray[2],
          ]);
          return $data;
          */
     }
}

class SELECTS extends CRUD{

     public function getSelectsTable(){
          $db = $this->db;
          $data = $db->prepare("SELECT * FROM $this->table");
          $data->execute();
          return $data;
     }

     public function getSelectsQuery($headQuery = '*', $query = ''){
          $db = $this->db;
          $data = $db->prepare("SELECT $headQuery FROM ". $this->table ." $query");
          $data->execute();
          return $data;
     }

}

class UPDATE extends CRUD{

     public function prevData($userId){
          $prevData = new SELECTS('users');
          $prevData = $prevData->getSelectsQuery("*","WHERE id=$userId");
          $prevData = $prevData->fetch(PDO::FETCH_ASSOC);
          
          return $prevData;
     }

     // burası hala sorunlu tam düzeltemedim
     public function update($userId, $changes){
          $db = $this->db;
      
          $set = [];
          
          // Loop through the changes array and build the SET clause
          foreach ($changes as $field => $value) {
              $set[] = "$field = :$field";
          }
      
          // Construct the SQL query
          $sql = "UPDATE $this->table SET " . implode(", ", $set) . " WHERE id = :id";

          // Prepare and execute the query
          $data = $db->prepare($sql);
          $data->bindParam(":id", $userId);     
          
          // Bind the field values from the changes array
          foreach ($changes as $field => $value) {
              $data->bindParam(":$field", $value);
          }
          
          // Execute the query
          $result = $data->execute();
      
          return $result;
      }
}

class DELETE extends CRUD{

     public function delete($userId){
          $db = $this->db;
          $data = $db->prepare("DELETE FROM " . $this->table . " WHERE id=". $userId ."");
          $data->execute();
          
          return $data;
     }

}




/**********************************
 * EXPORTS VARIABLES AND FUNCTIONS *
 **********************************/

$connect = new DataBase($ENVdatabase,$ENVusername,$ENVpassword);
$db = $connect->db;

/********
 * STOP *
 ********/

?>

