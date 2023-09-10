<?php !isset($_GET['page']) ? $_GET['page'] = 'home' : $_GET['page']; $page = $_GET['page']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>index - <?php echo $page ?></title>

     <!-- style file import -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="../../styles/index.css">
</head>
<body>

<?php 

// global imports and variables
require_once('../../config/database.php');


?>

<?php

// layout start
include_once('./container/header.php');

?>

<?php

// layout page router

switch ($_GET['page']) {
     case 'home':
          require_once('../home.php');
          break;
     case 'login':
          require_once('../auth/login.php');
          break;
     case 'register':
          require_once('../auth/register.php');
          break;
     case 'insert':
          require_once('../CRUD/insert.php');
          break;
     case 'select':
          require_once('../CRUD/select.php');
          break;
     case 'update':
          require_once('../CRUD/update.php');
          break;   
     case 'delete':
          require_once('../CRUD/delete.php');
          break;          
     default:
          require_once('./index.php');
          break;
}



     

?>

<script>

const customLocation = (target) => window.location = target

</script>

<?php
include_once('./container/footer.php');
// layout end
?>

<!-- js file import -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>