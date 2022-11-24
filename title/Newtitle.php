<?php
session_start();
$name = !empty($_POST['title']) ? $_POST['title'] : '';
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if adding users button is clicked
if (isset($_POST['title'])) {
// ensure that form fields are filled properly :
    if (empty($name)) {
        $errors['title'] = "Title Name is Required";  // add error to errors array :
    }
    if (count($errors)) {
        // return to the form with errors:

        echo header('location:../title/Newtitle.php?' . http_build_query($errors));
        exit();
    }
}
if (isset($_POST['submit'])) {
    $pub_id = $_SESSION['publisher_id'];
    var_dump($pub_id);

    // if there are no errors, save user to database
    $sql = "INSERT INTO title (name,pub_id) VALUES ('$name','$pub_id')";
    $db->query($sql);
    $db->close();

    header('location:../title/title.php');
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
    <form action="../title/Newtitle.php" method="POST">
        <h2 class="title_img">Add Title</h2>
        <label>Title Name</label>
        <input type="text" name="title" class="boxs" placeholder="New Title Name">
        <?php if (isset($_GET['title'])) { ?>
            <p class="errors"><?php echo $_GET['title'] ?></p>
        <?php } ?><br>
        <input type="submit" name="submit" value="Add title" class="btn form-btn"><br>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

