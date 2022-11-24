
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure?');
    }
</script>
<?php
include '../login/db.php';
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;
$msql = "SELECT * from articles LIMIT $offset, $no_of_records_per_page";

if(!empty($_POST['filter-value'])) {

    $msql = 'SELECT * FROM articles LEFT JOIN title ON title.id=articles.title_id';
    $msql .= ' LEFT JOIN categories ON categories.id=articles.cat_id';
    $msql .= ' where headline like"%' . $_POST['filter-value'] . '%"';
    $msql .= ' or meta_content like"%' . $_POST['filter-value'] . '%"';
    $msql .= ' or title.name like"%' . $_POST['filter-value'] . '%"';
    $msql .= ' or categories.name like"%' . $_POST['filter-value'] . '%"';

}


$result = $con->query($msql);



while ($row = mysqli_fetch_assoc($result)) {

    $sq = "SELECT * FROM title where id='" . $row['title_id'] . "'";
    $resu = mysqli_query($con, $sq);

    $createAdd = date("Y/m/d h:i A", $row['createAdd']);
    $updateAdd = date("Y/m/d h:i A", $row['updateAdd']);

    $sql = "SELECT * FROM categories where id='" . $row['cat_id'] . "'";
    $res = mysqli_query($con, $sql);


    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['userid'] . "</td>";
    echo "<td>" . $row['headline'] . "</td>";
    echo "<td>" . $row['meta_content'] . "</td>";
    while ($rows = mysqli_fetch_assoc($res)) {
        echo "<td>" . $rows['name'] . "</td>";
    }
    while ($rowt = mysqli_fetch_assoc($resu)) {
        echo "<td>" . $rowt['name'] . "</td>";
    }
    echo "<td>" . $createAdd . "</td>";
    echo "<td>" . $updateAdd . "</td>";
    echo "<td><a href=\"/Artickes/edit-art.php?userId={$row['userid']}&article_id={$row['id']}\">Edit</a></td>";
    echo "<td><a  href=\"/Artickes/delete-art.php?userId={$row['userid']}&article_id={$row['id']}\" onclick='return checkDelete()'>Delete</a></td>";
    echo "</tr>";
}

$con->close();
