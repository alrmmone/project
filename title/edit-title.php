<?php
$ID = $_GET['title_id'];
include '../login/db.php';
$isql = "SELECT * from title WHERE id='".$ID."'";
$result=mysqli_query($con,$isql);
$singleRow = mysqli_fetch_row($result);

$psql ="SELECT * FROM publisher";
$query = mysqli_query($con,$psql);
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
    <form  action="../title/update-title.php" method="POST">
        <input name="title_id" type="hidden" value=" <?php echo $_GET['title_id']?> ">
        <h2 class="title_img">Edit Title</h2>
        <label>Title Name</label>
        <input type="text" name="title" class="headline" placeholder="New title" value="<?= $singleRow[1]?>"><br>
        <?php if (isset($_GET['title'])) { ?>
            <p class="errors"><?php echo $_GET['title'] ?></p>
        <?php } ?><br>
        <label>Choose Publisher :</label>
        <select name="publisher_id" class="pub-role" id="role">
            <?php
            while ($rows = $query->fetch_assoc()){

                ?>
                <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?></option>
                <?php
            }
            ?>
        <input type="submit" name="submit" value="Save" class="btn form-btn-art">
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

