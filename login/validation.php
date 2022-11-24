<?php
    require_once ('../login/db.php');
    session_start();

    $username = !empty($_POST['username'])?$_POST['username']:'';
    $password =  !empty($_POST['password'])?$_POST['password']:'';

        $query = "select * from users where username= '" . $_POST['username'] . "' and password='" . $_POST['password'] . "'";
        $result = mysqli_query($con, $query);

    if (($username == 0)) {
        echo '';
    } elseif ($data=mysqli_fetch_assoc($result)) {

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['user_id'] = $data['id'];

        header("location:../login/welcome.php");
    } else {
        if (empty($username)) {
            $nameErr = 'Login cannot be blank';
        }
        if (empty($password)) {
            $passErr = 'Password cannot be blank';
        }
        include('../login/index.php');
    }










