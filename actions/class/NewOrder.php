<?php
    include('Manage.php');
    $manager = new ManageOrder();
    $manager2 = new Basket();
    session_start();

    // echo $_SESSION['basket'][$_SESSION['username']];

    // foreach ($_SESSION['basket'][$_SESSION['username']] as $v)
    // {
    //     echo $v . " ";
    // }

    $manager -> Add($_SESSION['username'], $_SESSION['basket'][$_SESSION['username']]);

    $_SESSION['basket'][$_SESSION['username']] = array();
    $manager2 -> SaveToJSON($_SESSION['basket']);

?>