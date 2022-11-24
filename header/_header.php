<header>

    <div class="showcase-top">
        <img src="../img/logo.jpeg" alt="syndigate">
        <a class="btn-top-2" href="../login/welcome.php">Home</a>
        <?php if ($_SESSION['role'] !='users') { ?>
        <a class="btn-top" href="../users/users.php">Users</a>
        <a class="btn-top-3" href="../Artickes/articles.php">Articles</a>
        <a class="btn-top-4" href="../categories/categories.php">Categories</a>
        <a class="btn-top-5" href="../title/title.php">Title</a>
        <a class="btn-top-6" href="../publisher/publisher.php">Publisher</a>
        <?php } ?>
        <p class="session"><?php echo 'Welcome' . " " . " " . $_SESSION['username']; ?></p>
        <p class="time"><?php echo date(" h:i A")?></p>
        <a class="butt" href="../login/logout.php">Logout</a>
    </div>

</header>
