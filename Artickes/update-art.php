<?php
require_once ('../login/db.php');
$headline = !empty($_POST['headline'])?$_POST['headline']:'';
$content = !empty($_POST['content'])?str_replace("'", "\'", $_POST['content']):'';
$id = !empty($_POST['article_id'])?$_POST['article_id']:'';
$meta_content = substr($content, 0, 20);
$updateAdd = strtotime('now');

$cat_id = !empty($_POST['cat_id'])?$_POST['cat_id']:'';
$title_id = !empty($_POST['title_id'])?$_POST['title_id']:'';


$sql = "UPDATE articles SET headline='".$headline."',content='".$content."',meta_content='".$meta_content."',updateAdd='".$updateAdd."',cat_id='".$cat_id."',title_id='".$title_id."' WHERE id='".$id."'";

if ($con->query($sql) === TRUE) {
    header('Location:../Artickes/articles.php');

} else {
    echo "Error updating record: " . $con->error;
}
if ($con->query($sql) === TRUE) {
    header('Location:./articles.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();


?>