<?php 


if(!isset($_GET['id']) || empty($_GET['id'])){
     header("Location: http://localhost/dashboard/phpLearning/src/layout/");
     exit;
}

$data = $db->prepare('DELETE FROM users WHERE id = ?');

$data->execute([
     $_GET['id']
]);

if(!$data){
     echo 'error code' . $db->errorInfo();
}else{
     echo 'data delete success!';
     header("Location: http://localhost/dashboard/phpLearning/src/layout/");
}

?>