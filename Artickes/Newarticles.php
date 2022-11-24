<?php
session_start();
$headline = !empty($_POST['headline']) ? $_POST['headline'] : '';
$content = !empty($_POST['content']) ? $_POST['content'] : '';
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if adding users button is clicked
if (isset($_POST['headline'])) {
// ensure that form fields are filled properly :
    if (empty($headline)) {
        $errors['headline'] = "headline is required";  // add error to errors array :
    }
    if (empty($content)) {
        $errors['content'] = "content is required";
    }
    if (count($errors)) {
        // return to the form with errors:

        echo header('location:Artickes/Newarticles.php?' . http_build_query($errors));
        exit();
    }
}
if (isset($_POST['submit'])) {
    $cat_id = !empty($_POST['cat_id']) ? $_POST['cat_id'] : '';
    $userid = $_SESSION['user_id'];
    $title_id = !empty($_POST['title_id']) ? $_POST['title_id'] : '';



    $createAdd = strtotime('now');
    $updateAdd = strtotime('now');

    // if there are no errors, save user to database
    $meta_content = substr($content, 0, 20);

    $sql = "INSERT INTO articles (userid,headline,content,createadd,updateadd,meta_content,cat_id,title_id) VALUES ('$userid','$headline','$content','$createAdd','$updateAdd','$meta_content','$cat_id','$title_id')";
    $db->query($sql);
    $db->close();

    session_start();
    $_SESSION['id'] = $userid;
    header('location:Artickes/articles.php');
}

$sq = "SELECT * FROM categories";
$res = mysqli_query($db,$sq);
$sql ="SELECT * FROM title";
$resu = mysqli_query($db,$sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New User</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php" ?>
</header>
<div class="from-container-box">
    <form action="Newarticles.php" method="POST">
        <h2 class="title_art">Add Articles</h2>
        <label>Head Line</label>
        <input type="text" name="headline" class="headline" placeholder="New Head Line"><br>
        <?php if (isset($_GET['headline'])) { ?>
            <p class="errors"><?php echo $_GET['headline'] ?></p>
        <?php } ?><br>
        <label>Content</label>
        <textarea name="content" rows="5" class="area"></textarea><br>
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
        <input type="submit" name="submit" value="Add User" class="btn form-btn-art">
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>
