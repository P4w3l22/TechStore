<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin')
    {
        session_start();
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