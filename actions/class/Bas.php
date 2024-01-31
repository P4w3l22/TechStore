<?php

    include('Manage.php');
    session_start();

    if ($_GET['m'] === 'd')
    {
        $manager = new Basket();

        if (isset($_POST['id']))
        {
            $manager -> DeleteBasketProd($_POST['id']);
        }
    }
    
    if ($_GET['m'] === 's')
    {
        $manager = new ManageOrder();
        $manager2 = new Basket();

        $manager -> Add($_SESSION['username'], $_SESSION['basket'][$_SESSION['username']]);

        $_SESSION['basket'][$_SESSION['username']] = array();
        $manager2 -> SaveToJSON($_SESSION['basket']);
    }

    if ($_GET['m'] === 'a')
    {
        $manage = new Basket();

        if (isset($_POST['id']))
        {
            array_push($_SESSION["basket"][$_SESSION['username']], $_POST['id']);
            $manage -> SaveToJSON($_SESSION['basket']);
        }
    }


    



    

?>