
<!DOCTYPE html>
<html>
<body>

<?php
$db = mysqli_connect('localhost', 'root', '', 'syndigate');
$sql="select * from articles";
$result=mysqli_query($db,$sql);
$row = mysqli_num_rows($result);
$number_of_articles=$row;
$per=3;
$number_of_pages=$number_of_articles/$per;

?>
<div class="pagination">
    <?php if ($_GET['pageno'] != 1) {?>
    <a href="/Artickes/articles.php?pageno=<?=$_GET['pageno']-1; ?>">&laquo;</a>
    <?php } ?>
        <?php for($i=1;$i<=$number_of_pages;$i++): ?>
    <a href="/Artickes/articles.php?pageno=<?= $i ?>" class="active"><?php if($_GET['pageno'] == $i) {?><?= $i ?><?php } ?></a>
    <?php endfor; ?>
    <?php if ($_GET['pageno'] < $number_of_pages) {?>
        <a href="/Artickes/articles.php?pageno=<?= $_GET['pageno']+1; ?>">&raquo;</a>
    <?php } ?>
</div>
</body>