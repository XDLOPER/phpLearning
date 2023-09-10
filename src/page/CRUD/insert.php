<h1>USER ADD</h1>
<?php 

$homeLink = getenv('HOMELINK');

if(isset($_POST['register'])){
     if(isset($_POST['username']) || isset($_POST['password']) || isset($_POST['email'])){
          try {
               $insert = $db->prepare('INSERT INTO users (username,password,email) VALUES (?,?,?)');
          
               $push = $insert->execute([
                    $_POST['username'],
                    $_POST['password'],
                    $_POST['email']
               ]);
          
               if($push){
                    echo 'complated data is pushed !';
                    header("Location: $homeLink");
               }else{
                    echo 'data is not pushed !' . $insert->errorInfo()[2];
               }
          
          } catch (PDOException $e) {
               echo 'error' . $e->getMessage();
          }
     }else{
          echo 'bilgiler eksik';
     }
}



?>



<form method="post" action="">
     <input type="hidden" name="register">
     <input type="text" required name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" placeholder="username">
     <input type="password" required name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" placeholder="password">
     <input type="email" required name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="email">
     <input type="submit" value="register">
</form>