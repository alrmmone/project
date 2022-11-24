<?php

require_once('../login/db.php');
$ID = $_GET['categories_id'];
$sql = "DELETE FROM categories WHERE id='" . $ID . "'";



if ($con->query($sql) === TRUE) {
    header('Location:../categories/categories.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();



