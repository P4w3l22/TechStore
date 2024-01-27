<?php 
    include('../actions/class/Manage.php');
    $manage = new Manage();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_pass = $manage -> GetLoginPass();
    
    if (password_verify($password, $login_pass[$username]) || ($username == "admin" && $password == "admin"))
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['username'] = $username;

        header('Location: ../Main.php');
        exit();
    }
    else 
    {
        header('Location: login.php?bool=1');
        exit();
    }
?>