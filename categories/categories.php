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
    <title>Categories</title>
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<a href="/categories/NewCategories.php" class="new">New categories</a>
<form action="categories.php" method="post">
    <input type="text" placeholder="Search.." class="search" name="categories-value">
    <button type="submit" name="categories-btn" class="btn-search" value="Search">Search</button>
    <a href="/categories/Categories.php" class="btn-reset">Reset</a>
</form>
<div class="cont">
    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>

        <?php include '../categories/categories-list.php'; ?>

    </table>
</div>
</body>
</html>
