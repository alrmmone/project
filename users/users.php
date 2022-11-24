<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Users</title>
</head>
<body>
<header class="showcase">
    <?php include "../header/_header.php"?>
</header>
<br><br><br>
        <a href="../users/newuser.php" class="new">New user</a>
<form action="users.php" method="post">
    <input type="text" placeholder="Search.." class="search" name="users-value">
    <button type="submit" name="users-btn" class="btn-search" value="Search">Search</button>
    <a href="../users/users.php" class="btn-reset">Reset</a>
</form>
<div class="cont">
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Active</th>
            <th>Statues</th>
            <th colspan="2">Action</th>
        </tr>

        <?php include '../users/userlist.php'; ?>

    </table>
</div>
</body>
</html>
