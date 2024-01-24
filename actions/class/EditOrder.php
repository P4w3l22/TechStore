<?php 
    include('Manage.php');
    $manager = new ManageOrder();

    if (isset($_POST['id']) && isset($_POST['previous_id']) && isset($_POST['present_id']))
    {
        $id = $_POST['id'];
        $previous_id = $_POST['previous_id'];
        $present_id = $_POST['present_id'];

        $manager -> Edit($id, $previous_id, $present_id);
    }
    else if (isset($_POST['id']) && isset($_POST['previous_id']))
    {
        $id = $_POST['id'];
        $previous_id = $_POST['previous_id'];

        $manager -> DeleteSignleOrder($id, $previous_id);
    }

?>