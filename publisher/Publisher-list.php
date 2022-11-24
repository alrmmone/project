<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure?');
    }
</script>
<?php
include '../login/db.php';
$psql = "SELECT * FROM publisher";

if(!empty($_POST['Publisher-value'])){
    $psql.=' where name like"%'.$_POST['Publisher-value'].'%"';

}
$result = mysqli_query($con,$psql);

while ($row = $result->fetch_assoc()){
    $_SESSION['publisher_id'] = $row['id'];


    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><a href=\"/publisher/edit-Pub.php?publisher_id={$row['id']}\">Edit</a></td>";
    echo "<td><a  href=\"/publisher/delete-pub.php?publisher_id={$row['id']}\" onclick='return checkDelete()'>Delete</a></td>";    echo "</tr>";

}


