<?php
    include('Manage.php');
    $manage = new Manage();

    $json_to_send = array(
        1 => $manage -> CategoryAmount(),
        2 => $manage -> MostFrequentlyBought(),
        3 => $manage -> ProductsAmount()
    );

    header('Content-Type: application/json');
    echo json_encode($json_to_send);

?>