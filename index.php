<?php
session_start();
    if (isset($_SESSION['username'])) {
        header('location:../login/welcome.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token"
          content="c0FPUuZtq2IFA30Cow9axCKzz9Ya7FresBNt5LmInS5Cdw4d1V7yUE5OF1fgRwqeTvSMmV-EH6-CJxq1gdv2dg==">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="box">
    <div class="img"><img src="../img/logo.jpeg"></div>
    <form id="form" action="../login/validation.php" method="post">
        <div class="content">
            <label for="username">User Name</label><br>
            <input id="username" name="username" class="shadw" type="text" placeholder = "Username">
            <?php if (isset($nameErr)) { ?>
                <p class="errors"><?php echo $nameErr;?></p>
            <?php } ?>
        </div>
        <div class="content">
            <label for="password">Password</label><br>
            <input id="password" name="password" class="shadw" type="Password" placeholder = "Password">
            <?php if (isset($passErr)) { ?>
                <p class="errors"><?php echo $passErr ?></p>
            <?php } ?>
        </div>
        <br>
        <div class="check">
            <input id="checkbox" name="checkbox" type="checkbox">
            <label for="checkbox">Remember Me Next Time</label>
        </div>
        <div class="content">
            <button class="btn" type="submit" name="submit" value="Sign In">Sign In</button>
            <p class="register">Don't have an account? <a href="register.php">Register Now</a></p>
        </div>
    </form>
</div>
<?php include "../cms.syndigate.info/footer/_footer.php"?>
</body>
</html>

