<?php 
    include('class/Manage.php');
    $manage = new Manage();
    
    include('parts/header.php'); 
?>
<title>Dodaj produkt</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="m-3 cate">
    <nav class="navbar-expand-lg">
        <div class="container" style="padding-right: 2px;">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav flex-column me-auto">
                    <li class="nav-item dropdown cat_choice">       
                        <a class="nav-link dropdown-item" href="#">
                            Dyski twarde HDD i SSD
                        </a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">
                            Karty graficzne
                        </a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Procesory</a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Płyty główne</a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Obudowy komputera</a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Pamięci RAM</a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Zasilacze komputerowe</a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">Chłodzenie komputerowe</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="dis row mx-4">
        <!-- <h3>Dyski twarde HDD i SSD</h3> -->
        <?php 
            $manage -> Category("Dyski twarde HDD i SSD");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Karty graficzne");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Procesory");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Płyty główne");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Obudowy komputera");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Pamięci RAM");
        ?>
    </div>
    
    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Zasilacze komputerowe");
        ?>
    </div>

    <div class="dis row mx-4">
        <?php 
            $manage -> Category("Chłodzenie komputerowe");
        ?>
    </div>

</div>


<?php include('parts/footer.php'); ?>