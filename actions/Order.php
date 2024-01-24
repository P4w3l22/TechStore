<?php 
    include('class/Manage.php');
    $manage = new ManageOrder();
    include('parts/header.php'); 
?>
<title>Klienci</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-3" style="overflow-x: auto;">
    <div style="display: flex;">
        <h3 style="margin-right: 20px">Zamówienia
        </h3><br>
        <input
                class="prod_input form-control me-2"
                type="text"
                placeholder="Szukaj"
                id="searchOrdInput"
                style="max-width: 300px;
                    max-height: 40px;
                    margin-top: 30px;
                    background-color: whitesmoke;
                    color: #404040"
            >
    </div><br>

    <table class="table">
        <thead class="dark">
            <th scope="col" class="dark-row">#</th>
            <th scope="col" class="dark-row">Klient</th>
            <th scope="col" class="dark-row">Produkty</th>
            <th scope="col" class="dark-row">Łączna cena</th>
            <th scope="col" class="dark-row">Usuń zamówienie</th>
            <th scope="col" class="dark-row">Modyfikuj zamówienie</th>
        </thead>
        <tbody>
            <?php $manage -> Orders(); ?>
        </tbody>
    </table>
    <button 
        style="background-color:blueviolet; 
               border-radius: 8px; 
               border: none; 
               padding: 10px 20px;
               margin-top: 20px;
               margin-bottom: 10px;"
               >
        <a href="AddOrder.php" style="color: white; text-decoration: none;">
            Dodaj nowe zamówienie
        </a>
    </button>
<?php             
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $manage -> DeleteRow("o");
    }
?>

<div>
<?php include('parts/footer.php'); ?>