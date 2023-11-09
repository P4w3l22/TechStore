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

        $manager -> AddProd($title, $select, $message, $photo, $price, $amount, $description);
    }

?>