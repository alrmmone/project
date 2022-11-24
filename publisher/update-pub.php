<?php
require_once('../login/db.php');
$name = !empty($_POST['publisher']) ? $_POST['publisher'] : '';
$id = !empty($_POST['publisher_id']) ? $_POST['publisher_id'] : '';

$sql = "UPDATE publisher SET name='" . $name . "'WHERE id='" . $id . "'";

if ($con->query($sql) === TRUE) {
    header('Location:../publisher/publisher.php');

} else {
    echo "Error updating record: " . $con->error;
}

if ($con->query($sql) === TRUE) {
    header('Location:../publisher/publisher.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();


