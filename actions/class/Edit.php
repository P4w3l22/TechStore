<?php 
    include('Manage.php');
    $manager = new ManageClient();
    
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['second_name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['phone']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $second_name = $_POST['second_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $manager -> Edit($id, $name, $second_name, $email, $address, $phone);
    }

?>