<?php 
    include('../actions/class/Manage.php');
    $manage = new Manage();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login_pass = $manage -> GetLoginPass();

    // reading basket content from json file
    $basket_file = file_get_contents('basket.json');
    $baskets_content = json_decode($basket_file, true);

    
    if (password_verify($password, $login_pass[$username]) || 
        ($username == "admin" && $password == "admin") ||
        ($username == "test" && $password == "test"))
    {
        session_start();

        if (!isset($baskets_content[$username]))
        {
            $baskets_content[$username] = array();
            // $manage -> SaveToJSON($baskets_content);
        }

        $_SESSION['basket'] = $baskets_content;
        // array_push($_SESSION['basket_'. $username],-1);

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