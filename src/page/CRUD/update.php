<h1>UPDATE DATA</h1>

<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: localhost/dashboard/phpLearning/src/layout/index.php');
    exit;
} else {
    $id = $_GET['id'];
}

// Eğer form gönderilirse
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $data = $db->prepare('UPDATE users SET 
        username = ?,
        password = ?,
        email = ?
        WHERE id = ?');

    $update = $data->execute([$username, $password, $email, $id]);

    if (!$update) {
        echo 'error code ' . $data->errorInfo()[2];
    } else {
        // Başarıyla güncellendiğinde yönlendirme yapabilirsiniz
        header("location: http://localhost/dashboard/phpLearning/src/layout/");
        exit;
    }
}

// Eski verileri al
$userData = $db->prepare('SELECT * FROM users WHERE id = ?');
$userDataExecute = $userData->execute([$id]);
$user = $userData->fetch(PDO::FETCH_ASSOC);

if (!$userDataExecute) {
    echo 'error code : ' . $userData->errorInfo()[2];
}
?>

<form method="post" action="">
    <input type="hidden" name="register">
    <input type="text" required name="username" value="<?php echo $user['username'] ? $user['username'] : "" ?>" placeholder="username">
    <input type="text" required name="password" value="<?php echo $user['password'] ? $user['password'] : "" ?>" placeholder="password">
    <input type="email" required name="email" value="<?php echo $user['email'] ? $user['email'] : "" ?>" placeholder="email">
    <input type="submit" value="update">
</form>
