<?php 
    include('Manage.php');
    $manager = new Manage();

    if (isset($_POST['id']))
    {
        $manager -> DeleteBasketProd($_POST['id']);
        
    }

?>