    <h1>UPDATE DATA</h1>

    <?php

    $homeLink = getenv('HOMELINK');

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('location: $homeLink');
        exit;
    } else {
        $id = $_GET['id'];
    }

    $data = new UPDATE('users');
    $prevData = $data->prevData($id);

    // Eğer form gönderilirse
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];


        // güncelleme işlemdi sorun var sonra yapılacak
        $data = new UPDATE('users');
        $data = $data->update($id,[
            'username'=> $username,
            'password'=> $password,
            'email'=> $email,
        ]);
        print_r($data);

        
    }


    ?>

    <form method="post" action="">
        <input type="hidden" name="register">
        <input type="text" required name="username" value="<?php echo isset($prevData['username']) ? $prevData['username'] : "" ?>" placeholder="username">
        <input type="text" required name="password" value="<?php echo isset($prevData['password']) ? $prevData['password'] : "" ?>" placeholder="password">
        <input type="email" required name="email" value="<?php echo isset($prevData['email']) ? $prevData['email'] : "" ?>" placeholder="email">
        <input type="submit" value="update">
    </form>
