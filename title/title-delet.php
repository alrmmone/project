<?php

require_once('../login/db.php');
$ID = $_GET['title_id'];

$sql = "DELETE FROM title WHERE id='" . $ID . "'";

if ($con->query($sql) === TRUE) {
    header('Location:../title/title.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();



