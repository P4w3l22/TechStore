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
                            <!-- <svg class="test" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-device-hdd" viewBox="0 0 16 16">
                                <path d="M12 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm-7.5.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>
                                <path d="M12 7a4 4 0 0 1-3.937 4c-.537.813-1.02 1.515-1.181 1.677a1.102 1.102 0 0 1-1.56-1.559c.1-.098.396-.314.795-.588A4 4 0 0 1 8 3a4 4 0 0 1 4 4Zm-1 0a3 3 0 1 0-3.891 2.865c.667-.44 1.396-.91 1.955-1.268.224-.144.483.115.34.34l-.62.96A3.001 3.001 0 0 0 11 7Z"/>
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4Z"/>
                            </svg>  -->
                            Dyski twarde HDD i SSD
                        </a>
                    </li>

                    <li class="nav-item dropdown cat_choice">
                        <a class="nav-link dropdown-item" href="#">
                            <!-- <svg class="test" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16">
                                <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
                                <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5Zm5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5ZM9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0Z"/>
                                <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5v-1Zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5Z"/>
                            </svg>  -->
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

    <div id="graphic" class="dis row mx-4">
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
    </div>


    <div id="" class="dis row mx-4">
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
        <div class="card my-2">
            <img
                class="img-fluid"
                src="https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2021/6/pr_2021_6_15_13_24_23_26_05.jpg" 
                alt="..."
            />
            <div class="card-body" >
                <h5 class="card-title"><a href="#">Gigabyte GeForce RTX 3060 GAMING OC LHR 12GB GDDR6</a></h5>
                <ul class="card-text navbar-nav">
                    <li class="nav-item">Układ: GeForce RTX 3060</li>
                    <li class="nav-item">Pamięć: 12GB</li>
                    <li class="nav-item">Rodzaj pamięci: GDDR6</li>
                </ul>
                <h6 class="m-2">1 599,00 zł</h6>
            </div>
        </div>
    </div>
        
</div>


<?php include('parts/footer.php'); ?>