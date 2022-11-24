<?php
require_once('../login/db.php');
$name = !empty($_POST['title']) ? $_POST['title'] : '';
$id = !empty($_POST['title_id']) ? $_POST['title_id'] : '';
$pub_id = !empty($_POST['publisher_id'])?$_POST['publisher_id']:'';

$sql = "UPDATE title SET name='" . $name . "', pub_id='".$pub_id."' WHERE id='" . $id . "'";

if ($con->query($sql) === TRUE) {
    header('Location:../title/title.php');

} else {
    echo "Error updating record: " . $con->error;
}

if ($con->query($sql) === TRUE) {
    header('Location:../title/title.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();


