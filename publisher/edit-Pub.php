<?php
$ID = $_GET['publisher_id'];
$db = mysqli_connect('localhost', 'root', '', 'syndigate');
$isql = "SELECT * from publisher WHERE id='".$ID."'";
$result=mysqli_query($db,$isql);
$singleRow = mysqli_fetch_row($result);
session_start();
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
    <?php include "../header/_header.php" ?>
</header>
<div class="edit-box">
    <form  action="../publisher/update-pub.php" method="POST">
        <input name="publisher_id" type="hidden" value=" <?php echo $_GET['publisher_id']?> ">
        <h2 class="title_img">Edit Publisher</h2>
        <label>Title Name</label>
        <input type="text" name="publisher" class="headline" placeholder="New Publisher" value="<?= $singleRow[1]?>"><br>
        <?php if (isset($_GET['publisher'])) { ?>
            <p class="errors"><?php echo $_GET['publisher'] ?></p>
        <?php } ?><br>
        <input type="submit" name="submit" value="Save" class="btn form-btn-art">
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

