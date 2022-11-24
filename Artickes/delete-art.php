<?php
require_once ('../login/db.php');
$ID = $_GET['article_id'];
$sql = "DELETE FROM articles WHERE id='".$ID."'";


if ($con->query($sql) === TRUE) {
    header('Location:../Artickes/articles.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();



?>