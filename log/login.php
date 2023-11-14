<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin')
    {
        header('Location: ../Main.html');
        exit();
    }
    else 
    {
        echo 'Błędne dane logowania!';
    }
?>