<?php 
    include('class/Manage.php');
    $manage = new ManageClient();
    include('parts/header.php'); 
?>
<title>Klienci</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-3" style="overflow-x: auto;">
    <div style="display: flex;">
        <h3 style="margin-right: 20px">Klienci
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
            </svg>
        </h3><br>
        <div style="display: flex; flex-direction: column;">
            <input
                class="prod_input form-control me-2"
                type="text"
                placeholder="Podaj nazwę klienta.."
                id="searchClInput"
                style="max-width: 300px;
                        max-height: 40px;
                        margin-top: 30px;
                        background-color: whitesmoke;
                        color: #404040"
            >
            <ul id="searchClResults" 
                class="dropdown-menu"
                style="position: absolute; 
                        margin-top: 70px; 
                        width: 400px; 
                        overflow: hidden;
                        max-height: 300px;
                        overflow-y: scroll;"></ul>
        </div>
    </div><br>
    <table class="table">
        <thead class="dark">
            <th scope="col" class="dark-row">#</th>
            <th scope="col" class="dark-row">Imie</th>
            <th scope="col" class="dark-row">Nazwisko</th>
            <th scope="col" class="dark-row">Email</th>
            <th scope="col" class="dark-row">Adres</th>
            <th scope="col" class="dark-row">Numer Telefonu</th>
            <th scope="col" class="dark-row">Data rejestracji</th>
            <th scope="col" class="dark-row">Usuń</th>
            <th scope="col" class="dark-row">Edytuj</th>
        </thead>
        <tbody>
            <?php 
                if (isset($_GET['id']))
                {
                    $manage -> Client($_GET['id']);
                }
                else
                {
                    $manage -> Client(); 
                }
            
            ?>
        </tbody>
    </table>
    <br>
    <button 
        style="background-color:blueviolet; 
               border-radius: 8px; 
               border: none; 
               padding: 10px 20px;
               margin-bottom: 30px;"
               >
        <a href="AddClient.php" style="color: white; text-decoration: none;">Dodaj nowego klienta</a></button>
    </div>

    <?php             
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $manage -> DeleteRow("c");
            // $manage2 = new ManageOrder();
            // $manage2 -> Update();
        }
    ?>
</div>
</div>

<script src="../script/search_engine_cl.js"></script>

<?php include('parts/footer.php'); ?>