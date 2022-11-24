<?php
require_once('../login/db.php');
$name = !empty($_POST['categories']) ? $_POST['categories'] : '';
$id = !empty($_POST['categories_id'])?$_POST['categories_id']:'';

$sql = "UPDATE categories SET name='" . $name . "'WHERE id='".$id."'";

if ($con->query($sql) === TRUE) {
    header('Location:../categories/categories.php');

} else {
    echo "Error updating record: " . $con->error;
}

if ($con->query($sql) === TRUE) {
    header('Location:../categories/categories.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();


