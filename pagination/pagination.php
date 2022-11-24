<?php
/*
require_once ('login/db.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1 ;
}
$num_per_page = 05;
$start_from = ($page-1) * 5;
echo $start_from;
exit();
$query = "select * from articles limit $start_from,$num_per_page";
$result = mysqli_query($con,$query)
    */