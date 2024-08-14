<?php 
    include('../class/Manage.php');
    $manage = new ManageOrder();
    $manage2 = new SearchDisplay();
    include('parts/header.php');

    // if (!isset($_SESSION['username']) || $_SESSION['username'] != "admin@gmail.com")
    // {
    //     $forbidden = true;
    // }

?>

<title>Dodaj klienta</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="m-3">
    <button 
        style="background-color:blueviolet; 
                border-radius: 8px; 
                border: none; 
                padding: 10px 20px;
                margin-top: 20px;
                margin-bottom: 10px;"
                >
        <a href="Order.php" style="color: white; text-decoration: none;">
            Wróć do zamówień
        </a>
    </button>
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
                <?php $manage2 -> DisplayClients(); ?>
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
                <?php echo $manage2 -> DisplayProducts(); ?>
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
<?php $manage -> Add(); ?>

<!-- <script src="../script/forbidden.js"></script> -->

<?php include('parts/footer.php'); ?>