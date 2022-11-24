<?php
session_start();
$name = !empty($_POST['publisher']) ? $_POST['publisher'] : '';
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'syndigate');

// if adding users button is clicked
if (isset($_POST['publisher'])) {
// ensure that form fields are filled properly :
    if (empty($name)) {
        $errors['publisher'] = "Publisher Name is Required";  // add error to errors array :
    }
    if (count($errors)) {
        // return to the form with errors:

        echo header('location:../publisher/New-publisher.php?' . http_build_query($errors));
        exit();
    }
}
if (isset($_POST['submit'])) {
    // if there are no errors, save user to database
    $sql = "INSERT INTO publisher (name) VALUES ('$name')";
    $db->query($sql);
    $db->close();

    header('location:../publisher/publisher.php');
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
    <form action="../publisher/New-publisher.php" method="POST">
        <h2 class="title_img">Add Publisher</h2>
        <label>Publisher Name</label>
        <input type="text" name="publisher" class="boxs" placeholder="New Publisher Name">
        <?php if (isset($_GET['publisher'])) { ?>
            <p class="errors"><?php echo $_GET['publisher'] ?></p>
        <?php } ?><br>
        <input type="submit" name="submit" value="Add Publisher" class="btn form-btn"><br>
    </form>
</div>
</body>
<?php include "../footer/_footer.php" ?>
</html>

