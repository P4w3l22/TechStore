<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
    session_start();
?>
<title>Koszyk</title>
</head>
<?php include('parts/contentBackground.php'); ?>

<div class="m-3" style="overflow-x: auto;">
    <div class="row mx-4">
        <h3  style="margin-bottom: 30px">Twój koszyk</h3>
    </div>
    <table class="table">
        <thead class="dark">
            <th scope="col" class="dark-row">#</th>
            <th scope="col" class="dark-row">Produkt</th>
            <th scope="col" class="dark-row">Zdjęcie</th>
            <th scope="col" class="dark-row">Cena</th>
            <th scope="col" class="dark-row">Usuń</th>
        </thead>
        <tbody>
            <?php 
                $manage -> Basket($_SESSION['basket'][$_SESSION['username']]);
            
            ?>
        </tbody>
    </table>
    <form action="Basket.php" method="POST">
        <input type="hidden" name="">
    </form>
    <button 
        style="background-color:blueviolet; 
               border-radius: 8px; 
               border: none; 
               padding: 10px 20px;
               margin-bottom: 30px;
               color: white;"
        onclick="addOrder()"
               >Złóż zamówienie
    </button>
</div>

<script>
    function addOrder()
    {
        var xhr = new XMLHttpRequest()
        var url = 'class/NewOrder.php'

        xhr.open("POST", url, true)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                alert("Zamówienie dodane do realizacji!")
                location.reload()
            }
        }
        xhr.send()
    }
</script>

<?php include('parts/footer.php'); ?>