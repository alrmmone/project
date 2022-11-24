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
    <title>Articles</title>
</head>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<body>
<div>
    <a href="../Artickes/Newarticles.php" class="new">New Articles</a>
    <form action="../Artickes/articles.php" method="post">
        <input type="text" placeholder="Search.." class="search" name="filter-value">
        <button type="submit" name="filter-btn" class="btn-search" value="Search">Search</button>
        <a href="/Artickes/articles.php" class="btn-reset">Reset</a>
    </form>

</div>
<div class="cont-art">
    <table>
        <tr>
            <th>Id</th>
            <th>UserId</th>
            <th>HeadLine</th>
            <th>meta_Content</th>
            <th>Categories</th>
            <th>Title</th>
            <th>CreateAdd</th>
            <th>UpdateAdd</th>
            <th colspan="2">Action</th>
        </tr>

        <?php include '../Artickes/articleslist.php'; ?>

    </table>

</div>
<?php include '../pagination/paginaion-style.php'; ?>
</body>
</html>
