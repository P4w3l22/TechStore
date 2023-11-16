<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Koszyk</title>
</head>
<?php include('parts/contentBackground.php'); ?>

<div class="m-3" style="overflow-x: auto;">
    <div class="row mx-4">
        <h3  style="margin-bottom: 30px">Twój koszyk</h3>
        <?php $manage -> Basket(array(20, 21)); ?>
    </div>
</div>

<?php include('parts/footer.php'); ?>