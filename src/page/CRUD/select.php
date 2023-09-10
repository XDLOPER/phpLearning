<h1>USERS</h1>
<?php

// global variables
$homeLink = getenv('HOMELINK');

$data = new SELECTS('users');
$data = $data->getSelectsTable();
$data = $data->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $user){
     ?>
          <ul>
               <li><?php echo $user['username'] ?></li>
               <li><?php echo $user['password'] ?></li>
               <li><?php echo $user['email'] ?></li>
               <a href="<?php echo $homeLink?>?page=delete&id=<?php echo $user['id']?>">delete</a> | 
               <a href="<?php echo $homeLink?>?page=update&id=<?php echo $user['id']?>">update</a>
          </ul>
     <?php
}

?>
