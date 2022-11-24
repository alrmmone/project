<?php
session_start();
$username = !empty($_POST['username']) ? $_POST['username'] : '';
$password = !empty($_POST['password_1']) ? $_POST['password_1'] : '';
$password_1 = !empty($_POST['password_1']) ? $_POST['password_1'] : '';
$password_2 = !empty($_POST['password_2']) ? $_POST['password_2'] : '';
$errors = array();

// connect to the database :

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if adding users button is clicked
if (isset($_POST['username'])) {
    // ensure that form fields are filled properly :
    if (empty($username)) {
        $errors['username'] = "Username is required";  // add error to errors array :
    }
    if (empty($password)) {
        $errors['password'] = "Password is required";
    }
    if ($password_1 != $password_2) {
        $errors['confirm_password'] = "The passwords don't match";
    }
    if (count($errors)) {
        // return to the form with errors:

        echo header('location:../users/newuser.php?' . http_build_query($errors));
        exit();
    }

    // check username:

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_query($db, $sql_u);

    if ($res->num_rows > 0) {
        $errors['username'] = "Sorry... username already taken";
        echo header('location:../users/newuser.php?' . http_build_query($errors));
        exit();
    } else {
        // if there are no errors, save user to database
        $sql = "INSERT INTO users (username, password,active,role) VALUES ('$username','$password','1','users')";
        $db->query($sql);
        $db->close();
    }
//    $_SESSION['username'] = $username;
    header('location:../users/users.php');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<div class="from-container">
    <form action="../users/newuser.php" method="POST">
        <h2 class="title_img">Add User</h2>
        <label>New User Name </label>
        <input type="text" name="username" class="boxs" placeholder="New User Name">
        <?php if (isset($_GET['username'])) { ?>
            <p class="errors"><?php echo $_GET['username'] ?></p>
        <?php } ?>
        <label>New Password </label>
        <input type="password" name="password_1" class="boxs" placeholder="New Password"><br>
        <?php if (isset($_GET['password'])) { ?>
            <p class="errors"><?php echo $_GET['password'] ?></p>
        <?php } ?>
        <label>Confirm Password</label>
        <input type="password" name="password_2" class="boxs" placeholder="Confirm Password"><br>
        <?php if (isset($_GET['confirm_password'])) { ?>
            <p class="errors"><?php echo $_GET['confirm_password'] ?></p>
        <?php } ?>
        <input type="submit" name="submit" value="Add User" class="btn form-btn"><br>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>
