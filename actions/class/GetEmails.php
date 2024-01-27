<?php

    include('Manage.php');
    $manage = new Manage();
    if (isset($_POST['email']))
    {
        $result = $manage -> CheckEmail($_POST['email']);

        $response = array('result' => $result);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>