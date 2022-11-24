<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure?');
    }
</script>
<?php
include '../login/db.php';
$ssq = "SELECT * FROM title";

if(!empty($_POST['title-value'])){
    $ssq.=' where name like"%'.$_POST['title-value'].'%"';
}

$result = mysqli_query($con,$ssq);


while ($title = $result->fetch_assoc()){


    $psql = "SELECT * FROM publisher where id='".$title['pub_id']."'";
    $publisher = mysqli_query($con,$psql);

    echo "<tr>";
    echo "<td>" . $title['id'] . "</td>";
    echo "<td>" . $title['name'] . "</td>";
    while ($publisher_row =$publisher->fetch_assoc()) {
        echo "<td>" . $publisher_row['name'] . "</td>";
    }
    echo "<td><a href=\"/title/edit-title.php?title_id={$title['id']}\">Edit</a></td>";
    echo "<td><a  href=\"/title/title-delet.php?title_id={$title['id']}\" onclick='return checkDelete()'>Delete</a></td>";    echo "</tr>";
;
}


