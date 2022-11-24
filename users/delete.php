<?php
require_once ('../login/db.php');
$ID = $_GET['userId'];
$sql = "DELETE FROM users WHERE id='".$ID."'";


if ($con->query($sql) === TRUE) {
    header('Location:../users/users.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();



?>