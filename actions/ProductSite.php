<?php 
    include('class/Manage.php');
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
            <button class="m-3" style="width: 200px; border-radius: 50pc; background-color: rgb(12, 174, 77); color: white; border: none; height: 40px">Dodaj do koszyka</button>
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
                <?php echo $manage -> Amount(); ?>
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
        <li class="nav-item" role="presentation">
            <button
                class="nav-link"
                id="pills-opinions-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-opinions"
                type="button"
                role="tab"
                aria-controls="pills-opinions"
                aria-selected="false"
                style="color: white;"
            >
                Opinie
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
        <div
            class="tab-pane fade"
            id="pills-opinions"
            role="tabpanel"
            aria-labelledby="pills-opinions-tab"
        >
            <?php echo $manage -> Opinions(); ?>
        </div>
    </div> 
</div>

<div class="row-md-10 m-5">
</div>

<?php include('parts/footer.php'); ?>
