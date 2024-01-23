<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Klienci</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-3" style="overflow-x: auto;">
    <h3>Zamówienia</h3>
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