<?php
$ID = $_GET['userId'];
include '../login/db.php';
$msql = "SELECT * from users WHERE id='".$ID."'";
$result=mysqli_query($con,$msql);
$singleRow = mysqli_fetch_row($result);
session_start();
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Users</title>
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
    <div class="edit-box">
    <div class="img">
        <h2>Edit</h2>
    </div><br><br>
    <form id="form" action="../users/update.php" method="post"><br>
        <input name="id" type="hidden" value="<?=$ID?>">
        <div class="edit-content">
            <label for="username">Edit Username</label><br>
            <input id="username" name="username" class="shadw" type="text" placeholder = "Username" value="<?= $singleRow[1] ?>">
        </div>
            <?php if ($_SESSION['role'] == 'super admin') { ?>
            <label>Choose Statues User :</label><br>
            <select name="role" class="role" id="role">
                <option value="super admin">Super Admin</option>
                <option value="admin">Admin</option>
                <option value="users">Users</option>
            </select>
            <?php } ?><br><br>
        <div class="check">
            <input id="checkbox" name="checkbox" type="checkbox" <?php if($singleRow[3]==1 ){ echo"checked";}  ?>>
            <label for="checkbox">ACTIVE</label>
        </div><br>
        <div class="content">
            <button class="btn" type="submit" name="submit" value="Save">Save</button>
        </div>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>


