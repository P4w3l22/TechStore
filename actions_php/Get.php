<?php
    include('../class/Manage.php');

    if ($_GET['m'] === "c")
    {
        $manager = new ManageClient();
        $manager -> Get();
    }

    if ($_GET['m'] === "p")
    {
        $manager = new ManageProduct();
        $manager -> Get();  
    }

    if ($_GET['m'] === "o")
    {
        $manager = new ManageOrder();
        $manager -> Get();
    }
    
    if ($_GET['m'] === "m")
    {
        $manager = new Card();
        $manager -> GetCaroData($_GET['order']);
    }

    if ($_GET['m'] === "e")
    {
        $manage = new Manage();
        if (isset($_POST['email']))
        {
            $result = $manage -> CheckEmail($_POST['email']);
            echo $result;
        }
    }

    if ($_GET['m'] === 's')
    {
        $manage = new Statistics();

        $json_to_send = array(
            1 => $manage -> CategoryAmount(),
            2 => $manage -> MostFrequentlyBought(),
            3 => $manage -> ProductsAmount()
        );

        header('Content-Type: application/json');
        echo json_encode($json_to_send);
    }
?>