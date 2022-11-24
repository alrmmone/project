<?php
$ID = $_GET['article_id'];
include '../login/db.php';
$ssql = "SELECT * from articles WHERE id='".$ID."'";
$result=mysqli_query($con,$ssql);
$singleRow = mysqli_fetch_row($result);
$sq = "SELECT * FROM categories";
$res = mysqli_query($con,$sq);
$sql ="SELECT * FROM title";
$resu = mysqli_query($con,$sql);
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
<div class="from-container-box">
    <form action="../Artickes/update-art.php" method="POST">
        <input name="article_id" type="hidden" value=" <?php echo $_GET['article_id']?> ">

        <h2 class="title_art">Edit Articles</h2>
        <label>Head Line</label>
        <input type="text" name="headline" class="headline" placeholder="New Head Line" value="<?= $singleRow[2]?>"><br>
        <?php if (isset($_GET['headline'])) { ?>
            <p class="errors"><?php echo $_GET['headline'] ?></p>
        <?php } ?><br>
        <label>Content</label>
        <textarea name="content" rows="5" class="area"><?= $singleRow[3]?></textarea><br>
        <?php if (isset($_GET['content'])) { ?>
            <p class="errors"><?php echo $_GET['content'] ?></p>
        <?php } ?><br>
        <label>Choose Categories :</label>
        <select name="cat_id" class="rool" id="role">
            <?php
            while ($row = mysqli_fetch_array($res)){
                $_SESSION['name'] = $row['name'];
                ?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php
            }
            ?>
        </select><br>
        <label>Choose Title :</label>
        <select name="title_id" class="rool" id="role">
            <?php
            while ($row = mysqli_fetch_array($resu)){
                $_SESSION['name'] = $row['name'];
                ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
            }
            ?>

        </select>
        <input type="submit" name="submit" value="Save" class="btn form-btn-art">
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

