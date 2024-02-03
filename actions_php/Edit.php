<?php 
    include('../class/Manage.php');
    
    if ($_GET['m'] === "c")
    {
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
    }

    if ($_GET['m'] === "o")
    {
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
    }

    if ($_GET['m'] === "p")
    {
        $manager = new ManageProduct();

        if (isset($_POST['json']) && isset($_POST['title']) && isset($_POST['select']) && isset($_POST['photo']) && isset($_POST['price']) && isset($_POST['amount']) && isset($_POST['description']))
        {
            $title = $_POST['title'];
            $select = $_POST['select'];
            $message = $_POST['json'];
            $photo = $_POST['photo'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];

            $message = mb_convert_encoding($message, 'UTF-8', 'auto');

            if (!isset($_GET['id']))
            {
                $manager -> Add($title, $select, $message, $photo, $price, $amount, $description);
            }
            else
            {
                $manager -> Edit(intval($_GET['id']), $title, $select, $message, $photo, $price, $amount, $description);
            }
        }
    }
?>