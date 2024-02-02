<?php 
    include('../class/Manage.php');
    $manage = new Product($_GET['id']);
    include('parts/header.php'); 
?>
<title><?php echo $manage -> Title(); ?></title>
</head>
<?php include('parts/contentBackground.php'); ?>
<div class="m-5">
    <h2><?php echo $manage -> Title(); ?></h2>
</div>

<div class="container">
    <div class="row" style="justify-content: space-around;">
        <div class="col-md-7">
            <img class="col-md-6" 
                    src=<?php echo $manage -> Picture(); ?>  
                    alt="" 
                    style="width: 100%;">
        </div>
        
        <div class="col-md-5 m-6" style="border: 1px solid gray; border-radius: 8px; width: 30%; min-width: 250px; text-align: right; margin-top:30px; margin-left: 20px;">
            <h3 class="m-4"><?php echo $manage -> Price(); ?> zł</h3>
            <button class="m-3" style="width: 200px; border-radius: 50pc; background-color: rgb(12, 174, 77); color: white; border: none; height: 40px" 
                    onclick="<?php 
                                session_start();
                                if (isset($_SESSION["username"]))
                                {
                                    echo "addToBasket(" . $_GET['id'] . ")";
                                }
                                else
                                {
                                    echo "goToLoginPage()";
                                }

                             ?>">Dodaj do koszyka</button>
                    <!-- onclick="addToBasket(<?php echo $_GET['id']; ?>)">Dodaj do koszyka</button> -->
            
            <div style="display: flex;
                        text-align: left; 
                        padding: 20px; 
                        border-top: 1px solid gray; 
                        margin-left: none;">
                <?php echo $manage -> IfAvaible(); ?>
            </div>
            <div style="display: flex;
                        text-align: left; 
                        padding: 20px; 
                        border-top: 1px solid gray; 
                        margin-left: none;">
                <svg class="m-2" style="color:rgb(43, 226, 116);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <p><?php echo $manage -> Amount(); ?> dostępnych sztuk</p>
                
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <ul class="nav mb-3" id="pills-tab" role="tablist" style="border-bottom: 1px solid gray; padding-bottom: 20px;">
        <li class="nav-item" role="presentation">
            <button
            class="nav-link active"
            id="pills-description-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-description"
            type="button"
            role="tab"
            aria-controls="pills-description"
            aria-selected="true"
            style="color: white;"
            >
            Opis
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button
            class="nav-link"
            id="pills-specification-tab"
            data-bs-toggle="pill"
            data-bs-target="#pills-specification"
            type="button"
            role="tab"
            aria-controls="pills-specification"
            aria-selected="false"
            style="color: white;"

            >
            Specyfikacja
            </button>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent" style="text-align: center; margin: 80px 0px 120px 0px;">
        <div
            class="tab-pane fade show active"
            id="pills-description"
            role="tabpanel"
            aria-labelledby="pills-description-tab"
        >
            <?php echo $manage -> Description(); ?>
        </div>
        <div
            class="tab-pane fade"
            id="pills-specification"
            role="tabpanel"
            aria-labelledby="pills-specification-tab"
            style="text-align: left;"
        >
            <?php echo $manage -> Specification(); ?>
        </div>

    </div> 
</div>

<div class="row-md-10 m-5">
</div>

<script> 
    function addToBasket(id)
    {
        destination_url = "../actions_php/Bas.php?m=a"
        alert_message = "Dodano do koszyka"
        xhr_content = "id=" + id
        
        xhrRequest(destination_url, alert_message, xhr_content)
    }

    function goToLoginPage()
    {
        window.location.href = "../log/login.php"
    }
</script>

<?php include('parts/footer.php'); ?>
