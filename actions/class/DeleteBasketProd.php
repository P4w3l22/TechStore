<?php 
    include('Manage.php');
    $manager = new Basket();

    if (isset($_POST['id']))
    {
        $manager -> DeleteBasketProd($_POST['id']);
        
    }

?>