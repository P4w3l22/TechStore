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
            <th scope="col" class="dark-row">Data zamówienia</th>
        </thead>
        <tbody>
            <?php $manage -> Orders(); ?>
        </tbody>

    </table>

<div>
<?php include('parts/footer.php'); ?>