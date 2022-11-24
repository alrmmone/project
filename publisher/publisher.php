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
    <title>Publisher</title>
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<br><br><br>
    <div>
        <a href="../publisher/New-publisher.php" class="new">New Publisher</a>
        <form action="../Publisher/Publisher.php" method="post">
            <input type="text" placeholder="Search.." class="search" name="Publisher-value">
            <button type="submit" name="Publisher-btn" class="btn-search" value="Search">Search</button>
            <a href="Publisher.php" class="btn-reset">Reset</a>

        </form>
    </div>
<div class="cont">
    <table>

        <tr>
            <th>ID</th>
            <th>Publisher Name</th>
            <th colspan="2">Action</th>
        </tr>

        <?php include '../publisher/Publisher-list.php'; ?>

    </table>
</div>
</body>
</html>
