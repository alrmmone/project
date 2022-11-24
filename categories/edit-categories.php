<?php
$ID = $_GET['categories_id'];
include '../login/db.php';
$isql = "SELECT * from categories WHERE id='".$ID."'";
$result=mysqli_query($con,$isql);
$singleRow = mysqli_fetch_row($result);
session_start();
?>

<html>
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
    <form  action="../categories/update-categories.php" method="POST">
        <input name="categories_id" type="hidden" value=" <?php echo $_GET['categories_id']?> ">
        <h2 class="title_img">Edit Categories</h2>
        <label>Categories</label>
        <input type="text" name="categories" class="headline" placeholder="New Categories" value="<?= $singleRow[1]?>"><br>
        <?php if (isset($_GET['categories'])) { ?>
            <p class="errors"><?php echo $_GET['categories'] ?></p>
        <?php } ?><br>
        <input type="submit" name="submit" value="Save" class="btn form-btn-art">
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

