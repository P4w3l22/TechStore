<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Dodaj klienta</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="m-3">
    <h3>Podaj dane zamówienia
    </h3><br>
    <form class="row g-3 needs-validation" action="AddOrder.php" method="post" id="form">
        <div class="col-md-4">
            <label for="cl_choice" class="form-label">Wybierz klienta</label>
            <select
                type="text"
                class="form-select"
                id="cl_choice"
                name="cl_choice"
                requierd
            >
                <?php $manage -> DisplayClients(); ?>
            </select>
            <div id="cl_choice_error"></div>
        </div>

        <div class="col-md-4">
            <label for="pr_choice" class="form-label">Wybierz produkt</label>
            <select
                type="text"
                class="form-select"
                id="pr_choice"
                name="pr_choice"
                requierd
            >
                <?php echo $manage -> DisplayProducts(); ?>
            </select>
            <div id="pr_choice_error"></div>
        </div>

        <label></label>
        <input 
            class="submit_button" 
            type="submit" 
            value="Dodaj"
            style="margin-left: 10px;"
            >
    </form>
</div>
<?php $manage -> AddOrder(); ?>

<?php include('parts/footer.php'); ?>