<?php 
    include('../class/Manage.php'); 
    $manage = new Manage();
    $manage -> ModifyRow("1", "Test", "Testowy", "test@gmail.com", "Testowa 99, Warszawa",	"999888777", "2023-10-30");
    
?>
