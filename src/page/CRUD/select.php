<h1>USERS</h1>
<?php 

$data = $db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);



foreach($data as $user){
     ?>
          <ul>
               <li><?php echo $user['username'] ?></li>
               <li><?php echo $user['password'] ?></li>
               <li><?php echo $user['email'] ?></li>
               <a href="http://localhost/dashboard/phpLearning/src/layout/index.php?page=delete&id=<?php echo $user['id']?>">delete</a> | 
               <a href="http://localhost/dashboard/phpLearning/src/layout/index.php?page=update&id=<?php echo $user['id']?>">update</a>
          </ul>
     <?php
}

?>
