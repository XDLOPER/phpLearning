<?php 

$homeLink = getenv('HOMELINK');

if(!isset($_GET['id']) || empty($_GET['id'])){
     header("location: $homeLink");
     exit;
}

$data = new DELETE('users');
$data = $data->delete($_GET['id']);

if(!$data){
     echo 'error code' . $db->errorInfo();
}else{
     echo 'data delete success!';
     header("location: $homeLink");
}

?>