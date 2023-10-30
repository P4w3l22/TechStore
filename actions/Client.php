<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<script>
    function confirmDelete() {
        return confirm("Czy na pewno chcesz usunąć tego klienta?");
    }
</script>
<title>Klienci</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="row-md-10 m-5">
    <h3 class="mb-5">Klienci
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
        </svg>
    </h3><br>
    <table class="table">
        <thead>
            <th scope="col" style="background-color: inherit; color: white;">#</th>
            <th scope="col" style="background-color: inherit; color: white;">Imie</th>
            <th scope="col" style="background-color: inherit; color: white;">Nazwisko</th>
            <th scope="col" style="background-color: inherit; color: white;">Email</th>
            <th scope="col" style="background-color: inherit; color: white;">Adres</th>
            <th scope="col" style="background-color: inherit; color: white;">Numer Telefonu</th>
            <th scope="col" style="background-color: inherit; color: white;">Data rejestracji</th>
            <th scope="col" style="background-color: inherit; color: white;">Usuń</th>
            <th scope="col" style="background-color: inherit; color: white;">Edytuj</th>
        </thead>
        <tbody>
            <?php $manage -> Client(); ?>
        </tbody>
    </table>
    <br>
    <button style="background-color:blueviolet; border-radius: 8px; border: none; padding: 10px 20px;"><a href="AddClient.php" style="color: white; text-decoration: none;">Dodaj nowego klienta</a></button>
</div>

<?php             
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $manage -> DeleteRow();
    }
?>

<?php include('parts/footer.php'); ?>