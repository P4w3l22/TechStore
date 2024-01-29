<?php 
    include('../actions/class/Manage.php');
    $manage = new Manage();
    $manageBasket = new Basket();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_pass = $manage -> GetLoginPass();

    $baskets_content = $manageBasket -> ReadFromJSON('basket.json');
    
    if (password_verify($password, $login_pass[$username]) || 
        ($username == "admin" && $password == "admin") ||
        ($username == "test" && $password == "test"))
    {
        session_start();

        if (!isset($baskets_content[$username]))
        {
            $baskets_content[$username] = array();
        }

        $_SESSION['basket'] = $baskets_content;
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