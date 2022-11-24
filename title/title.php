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
    <title>Title</title>
</head>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<body>
    <div>
        <a href="../title/Newtitle.php" class="new">New Title</a>
        <form action="../title/title.php" method="post">
            <input type="text" placeholder="Search.." class="search" name="title-value">
            <button type="submit" name="title-btn" class="btn-search" value="Search">Search</button>
            <a href="/title/title.php" class="btn-reset">Reset</a>
        </form>
    </div>
<div class="cont">
    <table>
        <tr>
            <th>ID</th>
            <th>Title Name</th>
            <th>Publisher Name</th>
            <th colspan="2">Action</th>
        </tr>

        <?php include '../title/title-list.php'; ?>

    </table>
</div>
</body>
</html>
