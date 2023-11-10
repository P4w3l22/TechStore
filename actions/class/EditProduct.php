<?php

    include('Manage.php');
    $manager = new Manage();

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
        echo $title . ' - ';
        echo $message . ' - ';
        echo $photo . ' - ';
        echo $price . ' - ';
        echo $amount . ' - ';
        echo $select . ' - ';
        echo $description . ' - ';
        echo 'po';

        if (!isset($_GET['id']))
        {
            $manager -> AddProd($title, $select, $message, $photo, $price, $amount, $description);
        }
        else
        {
            $manager -> EditProd(intval($_GET['id']), $title, $select, $message, $photo, $price, $amount, $description);

        }
        
    }

?>