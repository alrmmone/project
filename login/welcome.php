<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Welcome</title>
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>

<h1 class="welcome">Welcome<p class="para"><?php echo $_SESSION['username']?></p> In SyndiGate</h1>

</body>
<?php include "../footer/_footer.php" ?>
</html>
