<?php 
    include('../class/Manage.php');
    $manage = new ManageClient();
    include('parts/header.php'); 
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
        <a href="Client.php" style="color: white; text-decoration: none;">
            Wróć do klientów
        </a>
    </button>
    <h3>Podaj dane
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
        </svg>
    </h3><br>
    <form class="row g-3 needs-validation" action="AddClient.php" method="post" id="form">
        <div class="col-md-4">
            <label for="name" class="form-label">Imię</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
            >
            <div id="name_error"></div>
        </div>

        <div class="col-md-4">
            <label for="second_name" class="form-label">Nazwisko</label>
            <input
                type="text"
                class="form-control"
                id="second_name"
                name="second_name"
                required
            >
            <div id="second_name_error"></div>
        </div>

        <div class="col-md-4">
            <label for="address" class="form-label">Adres</label>
                <input
                type="text"
                class="form-control"
                id="address"
                name="address"
                required
                />
                <div id="address_error"></div>
        </div>

        <div class="col-md-4">
            <label for="number" class="form-label">Numer Telefonu</label>
            <input
                type="text"
                class="form-control"
                id="number"
                name="number"
                required
            >
            <div id="number_error"></div>
        </div>

        <div class="col-md-4">
            <label for="username" class="form-label">Email</label>
            <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                required
            >
            <div id="username_error"></div>
        </div>

        <div class="col-md-4">
            <label for="password1" class="form-label">Hasło</label>
            <input
                type="password"
                class="form-control"
                id="password1"
                name="password1"
                required
            >
            <div id="password1_error"></div>
        </div>

        <div class="col-md-4">
            <label for="password" class="form-label">Powtórz hasło</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
            >
            <div id="password_error"></div>
        </div>

        <label></label>
        <input 
            class="submit_button" 
            type="submit" 
            value="Prześlij"
            style="margin-left: 10px;"
            >
    </form>
</div>
<?php $manage -> Add(); ?>
</div>

<script src="../script/cl_checker.js"></script>

<?php include('parts/footer.php'); ?>