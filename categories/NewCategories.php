<?php
session_start();
$name = !empty($_POST['Categories']) ? $_POST['Categories'] : '';
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if adding users button is clicked
if (isset($_POST['Categories'])) {
// ensure that form fields are filled properly :
    if (empty($name)) {
        $errors['Categories'] = "Categories name is required";  // add error to errors array :
    }
    if (count($errors)) {
        // return to the form with errors:

        echo header('location:../categories/NewCategories.php?' . http_build_query($errors));
        exit();
    }

    // if there are no errors, save user to database
    $content = !empty($_POST['content']) ? $_POST['content'] : '';
    $meta_content = substr($content, 0, 20);
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    $db->query($sql);
    $db->close();

    $id = $_SESSION['id'];
    header('location:../categories/categories.php');
}
?>

<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>New Categories</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<div class="from-container">
    <form action="../categories/NewCategories.php" method="POST">
        <h2 class="title_img">Add Categories</h2>
        <label>Categories</label>
        <input type="text" name="Categories" class="boxs" placeholder="New Categories Name">
        <?php if (isset($_GET['Categories'])) { ?>
            <p class="errors"><?php echo $_GET['Categories'] ?></p>
        <?php } ?><br>
        <input type="submit" name="submit" value="Add categories" class="btn form-btn"><br>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

