<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure?');
    }
</script>
<?php
include '../login/db.php';
$msql = "SELECT * from categories";

if(!empty($_POST['categories-value'])) {
    $msql .= ' where name like"%' . $_POST['categories-value'] . '%"';
}
$result = $con->query($msql);

while ($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><a href=\"/categories/edit-categories.php?categories_id={$row['id']}\">Edit</a></td>";
    echo "<td><a  href=\"/categories/categories-delete.php?categories_id={$row['id']}\" onclick='return checkDelete()'>Delete</a></td>";    echo "</tr>";

}

$con->close();

