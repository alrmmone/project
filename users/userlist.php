<?php
include '../login/db.php';
$data = $_SESSION['role'];
switch ($data) {
    case "admin";
        $sql = "SELECT * from users where role='users'";
    break;
    case "super admin";
        $sql = "SELECT * from users";
    break;
    case "users";
        header('location:../login/welcome.php');
    break;
}

if(!empty($_POST['users-value'])){
    $sql.=' where username like"%'.$_POST['users-value'].'%"';
    $sql.=' or  role like"%'.$_POST['users-value'].'%"';

}


$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    if ($row['active'] == 1) {
        $active = 'Active';
    } else {
        $active = 'Non Active';
    }

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $active . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td><a href=\"../users/edit.php?userId={$row['id']}\">Edit</a></td>";
    echo "<td><a href=\"../users/delete.php?userId={$row['id']}\">Delete</a></td>";
    echo "</tr>";

    }

    $con->close();
