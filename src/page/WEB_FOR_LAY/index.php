<?php !isset($_GET['page']) ? $_GET['page'] = 'home' : $_GET['page']; $page = $_GET['page']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>index - <?php echo $page ?></title>
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

</body>
</html>