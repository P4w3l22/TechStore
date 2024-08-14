<?php 
    include('../class/Manage.php');
    $manage = new ManageOrder();
    include('parts/header.php'); 

    $forbidden = false;
    // if (!isset($_SESSION['username']) || $_SESSION['username'] != "admin@gmail.com")
    // {
    //     $forbidden = true;
    // }
?>

<title>Klienci</title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-3" style="overflow-x: auto;">
    <div style="display: flex;">
        <h3 style="margin-right: 20px">Zamówienia
        </h3><br>
        <div style="display: flex; flex-direction: column;">
            <input
                class=" form-control me-2"
                type="text"
                placeholder="Podaj nazwę klienta.."
                id="searchOrdInput"
                style="max-width: 300px;
                        max-height: 40px;
                        margin-top: 30px;
                        background-color: whitesmoke;
                        color: #404040"
            >
            <ul id="searchOrdResults" 
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
            <th scope="col" class="dark-row">Klient</th>
            <th scope="col" class="dark-row">Produkty</th>
            <th scope="col" class="dark-row">Łączna cena</th>
            <th scope="col" class="dark-row">Usuń zamówienie</th>
            <th scope="col" class="dark-row">Modyfikuj zamówienie</th>
        </thead>
        <tbody>
            <?php 
                if (isset($_GET['id']))
                {
                    $manage -> Orders($_GET['id']);
                }
                else
                {
                    $manage -> Orders(); 
                }
            ?>
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
</div>
</div>
<script>
    localStorage.setItem("searchEnginePath", "../actions_php/Get.php?m=o")
    localStorage.setItem("anchorHref", "Order.php?id=")
    localStorage.setItem("sInput", "searchOrdInput")
    localStorage.setItem("sResult", "searchOrdResults")
</script>
<script src="../script/search_engine.js"></script>
<script>
    var selects = document.querySelectorAll('select')

    selects.forEach(function(select) {
        select.addEventListener('change', function() {
            if (select.value != select.id.split('_')[2]){
                document.getElementById(select.id + "_btn").classList.remove('hiddenClass')
            }
            else {
                document.getElementById(select.id + "_btn").classList.add('hiddenClass')
            }
        })
    })
</script>
<!-- <script src="../script/forbidden.js"></script> -->

<?php include('parts/footer.php'); ?>