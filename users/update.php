<?php
require_once ('../login/db.php');
$role =  !empty($_POST['role'])?$_POST['role']:'';
$username = !empty($_POST['username'])?$_POST['username']:'';
$checkbox = !empty($_POST['checkbox'])?$_POST['checkbox']:'';
$id = !empty($_POST['id'])?$_POST['id']:'';
if($checkbox=="on"){
    $Active=1;
}else{
    $Active=0;
}


$sql = "UPDATE users SET username='".$username."',role='".$role."' WHERE id='".$id."'";
if ($con->query($sql) === TRUE) {
    header('Location:../login/welcome.php');

} else {
    echo "Error updating record: " . $con->error;
}

$sql = "UPDATE users SET username='".$username."',active='".$Active."' WHERE id='".$id."'";


if ($con->query($sql) === TRUE) {
    header('Location:../login/welcome.php');

} else {
    echo "Error updating record: " . $con->error;
}

$con->close();


?>