<?php
    include('Manage.php');
    $manager = new Manage();
    
    $manager -> GetCaroData($_GET['order']);

?>