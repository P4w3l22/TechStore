<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Produkty</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-3" style="overflow-x: auto;">
    <h3 style="margin-top: 30px">Produkty
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
            <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V1Zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0Zm2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0ZM9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5ZM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5ZM1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2H1.5Z"/>
        </svg>
    </h3><br>
    <table class="table">
        <thead class="dark">
            <th scope="col" class="dark-row">#</th>
            <th scope="col" class="dark-row">Tytuł</th>
            <th scope="col" class="dark-row">Opis</th>
            <th scope="col" class="dark-row">Kategoria</th>
            <th scope="col" class="dark-row">Specyfikacja</th>
            <th scope="col" class="dark-row">Zdjęcie</th>
            <th scope="col" class="dark-row">Cena</th>
            <th scope="col" class="dark-row">Ilość</th>
            <th scope="col" class="dark-row">Usuń</th>
            <th scope="col" class="dark-row">Edytuj</th>
        </thead>
        <tbody>
            <?php $manage -> Products(); ?>
        </tbody>
    </table>
    <br>
    <button style="background-color:blueviolet; border-radius: 8px; border: none; padding: 10px 20px;"><a href="AddProduct.php" style="color: white; text-decoration: none;">Dodaj nowy produkt</a></button>
</div>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $manage -> DeleteRow("p");
    }
?>

<?php include('parts/footer.php'); ?>