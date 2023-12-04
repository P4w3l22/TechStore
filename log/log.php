<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = "test";
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
    if ($username === 'admin' && $password === 'admin')
    {
        session_start();
        $_SESSION['username'] = $username;

        
        header('Location: ../Main.php');
        exit();
    }
    else if ($username === 'test' && $password === 'test')
    {
        echo $hashed_pass;
        if (password_verify($password, $hashed_pass))
        {
            echo 'Działaaaaaaa';
        }
    }
    else 
    {
        header('Location: login.php?bool=1');
        exit();
    }
?>