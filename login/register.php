<?php
session_start();
$username = !empty($_POST['username']) ? $_POST['username'] : '';
$password = !empty($_POST['password_1']) ? $_POST['password_1'] : '';
$password_1 = !empty($_POST['password_1']) ? $_POST['password_1'] : '';
$password_2 = !empty($_POST['password_2']) ? $_POST['password_2'] : '';
$errors = array();

// connect to the database :

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if the register button is clicked
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

        echo header('location:../login/register.php?' . http_build_query($errors));
        exit();
    }

    // check username:

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_query($db, $sql_u);

    if ($res->num_rows > 0) {
        $errors['username'] = "Sorry... username already taken";
        echo header('../location:../login/register.php?' . http_build_query($errors));
        exit();
    } else {
        // if there are no errors, save user to database
        $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
        $db->query($sql);
        $db->close();
    }
    session_start();
    $_SESSION['username'] = $username;
    header('location:../users/users.php');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="showcase">
    <div class="showcase-top">
        <img src="../img/logo.jpeg" alt="syndigate">
    </div>
</header>
<div class="from-container">
    <form action="../login/register.php" method="POST">
        <h2 class="title_img">Register Now</h2>
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
        <input type="submit" name="submit" value="Register Now" class="btn form-btn"><br>
        <p>already have an account? <a href="../login/index.php">LogIn Now</a></p>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>
