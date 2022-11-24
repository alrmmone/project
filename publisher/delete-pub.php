<?php

require_once('../login/db.php');
$ID = $_GET['publisher_id'];

$sql = "DELETE FROM publisher WHERE id='" . $ID . "'";


if ($con->query($sql) === TRUE) {
    header('Location:../publisher/publisher.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();



