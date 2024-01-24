<?php

    include('Manage.php');
    $manager = new ManageProduct();

    if (isset($_POST['json']) && isset($_POST['title']) && isset($_POST['select']) && isset($_POST['photo']) && isset($_POST['price']) && isset($_POST['amount']) && isset($_POST['description']))
    {
        $title = $_POST['title'];
        $select = $_POST['select'];
        $message = $_POST['json'];
        $photo = $_POST['photo'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];

        echo 'przed' . ' - ';
        echo $_GET['id'] . ' - ';
        echo $message . ' - ';
        echo 'po';

        $message = mb_convert_encoding($message, 'UTF-8', 'auto');

        echo $message . " - ";

        if (!isset($_GET['id']))
        {
            $manager -> Add($title, $select, $message, $photo, $price, $amount, $description);
        }
        else
        {
            $manager -> Edit(intval($_GET['id']), $title, $select, $message, $photo, $price, $amount, $description);

        }
        
    }

?>