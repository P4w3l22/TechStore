<?php
    include('Manage.php');
    $manage = new Basket();
    session_start();

    if (isset($_POST['id']))
    {
        array_push($_SESSION["basket"][$_SESSION['username']], $_POST['id']);
        $manage -> SaveToJSON($_SESSION['basket']);
    }

?>