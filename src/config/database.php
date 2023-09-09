<?php 

try {
     $db = new PDO("mysql:host=localhost;dbname=example",'root');
} catch (PDOException $e) {
     echo 'database not connected error code : ' . $e -> getMessage();
}

?>