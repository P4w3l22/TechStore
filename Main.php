<?php include('actions/class/Session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_button.css">

    <link id="stylesheet_dark" rel="stylesheet" href="style/style_dark.css" disabled>
    <link rel="icon" href="images/cpu.svg">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>TechStore</title>
</head>
<body style="text-align: center;">
    <!-- 1681 -->
    <div class="first_view">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                        <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                    </svg>
                TechStore</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    style="border-radius: 10px;"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: left;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-item" href="actions/Client.php">Klient</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >Produkt</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="actions/Product.php">Produkty</a></li>
                                <li><a class="dropdown-item" href="actions/Category.php">Kategorie</a></li> <!--  target="_blank" -->
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-item" href="actions/Order.php">Zamówienia</a>
                        </li>
                    </ul>
                    
                    <div style="display: flex; flex-direction: row;">
                        <div style="display: flex; flex-direction: column;">
                            <form id="searchForm" class="d-flex" >
                                <input
                                    class="form-control me-2"
                                    type="text"
                                    placeholder="Search"
                                    id="searchInput"
                                >
                                <!-- <button 
                                    class="btn btn-primary button-round"
                                    type="submit">
                                    Search
                                </button> -->
                            </form>
                            <ul id="searchResults" 
                                class="dropdown-menu"
                                style="position: absolute; 
                                       margin-top: 40px; 
                                       width: 400px; 
                                       overflow: hidden;
                                       max-height: 300px;
                                       overflow-y: scroll;"></ul>
                        
                        </div>
                        <label for="theme" class="theme" style="width: 100px; z-index: 1;">
                            <span class="theme__toggle-wrap">
                                <input
                                type="checkbox"
                                class="theme__toggle"
                                id="theme"
                                role="switch"
                                name="theme"
                                value="dark"
                                />
                                <span class="theme__fill"></span>
                                <span class="theme__icon">
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                <span class="theme__icon-part"></span>
                                </span>
                            </span>
                        </label>
                        <?php if (isset($_SESSION['username'])) : ?>
                            <div class="dropdown">
                                <a  style=" display: block;
                                            padding-top: 8px;
                                            color: blueviolet;" 
                                    href="#"
                                    title="Wyloguj"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><p class="dropdown-item"><?php echo $_SESSION['username']; ?></p></li>
                                    <li><a class="dropdown-item" href="actions/class/SessionDestroy.php">Wyloguj</a></li>
                                    <li><a class="dropdown-item" href="actions/Basket.php">Koszyk</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <a href="log/login.php" style="display: flex; justify-content: center; align-items: center; color: white;" title="Zaloguj">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </a>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="fade-el">
            <!-- 400% -->
            <h1>Witamy w naszym sklepie!</h1> 
            <h4>Zajrzyj do naszej oferty i znajdź coś dla siebie - dobierz potrzebne komponenty i zbuduj komputer marzeń!</h4>
        </div>
    </div>

    <!-- CAROUSEL VIEW -->
    <div class="second_view">
        <h1>Proponowane dla Ciebie</h1>
        <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride = "carousel"
        >
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="cardProp">
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
    </div>

    <div class="second_view">
        <h1>Najczęściej kupowane</h1>
        <div
            id="carouselExampleControls1"
            class="carousel slide"
            data-bs-ride = "carousel"
        >
        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="cardMost">
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleControls1"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleControls1"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
    </div>

    <div class="second_view" style="border-radius: 0 0 15px 15px;">
        <h1>Ostatnio dodane</h1>
        <div
            id="carouselExampleControls2"
            class="carousel slide"
            data-bs-ride = "carousel"
        >
        <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="cardLast">
            </div>
            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleControls2"
                data-bs-slide="prev"
            >
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleControls2"
                data-bs-slide="next"
            >
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
    </div>

    <div class="third_view">
        <h1>Statystyki</h1>
        <div class="menu">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <button
                        class="nav-link active"
                        id="pills-home-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-home"
                        type="button"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                    >Ilość produktów</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link active dark_mode"
                        id="pills-home-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-home"
                        type="button"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                    >Ilość klientów (ostatnie 7 dni)</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link active"
                        id="pills-home-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-home"
                        type="button"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                    >Najczęściej kupowane</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link active"
                        id="pills-home-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-home"
                        type="button"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                    >Ostatnio dodane</button>
                </li>
                <li class="nav-item">
                    <button
                        class="nav-link active"
                        id="pills-home-tab"
                        data-bs-toggle="pill"
                        data-bs-target="#pills-home"
                        type="button"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                    >Producenci</button>
                </li>
            </ul>
        </div>
        <div id="statistics">
            <canvas id="myChart" width="300px" height="100%"></canvas>
        </div>
    </div>

    <div class="fourth_view">
        <h1>O nas</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore hic sunt delectus ipsum, modi, ut, pariatur corrupti expedita accusantium magni ipsam? Odio velit dignissimos ipsam, libero expedita officiis accusantium corrupti?</p>
    </div>
    
    <script src="script/searchEngine.js"></script>
    <script src="script/barchart.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="script/scripts.js"></script>
    <script>
        var stylesheet = document.getElementById('stylesheet_dark')
        var currentTheme = localStorage.getItem('theme');
        var button = document.getElementById('theme')

        if (currentTheme === null) {
            currentTheme = 'light'
        }

        if (currentTheme === 'light')
        {
            stylesheet.disabled = true
        } else {
            stylesheet.disabled = false
            button.click()
        }

        button.addEventListener('click', (e) => {
            if (stylesheet.disabled) {
                currentTheme = 'dark'
                stylesheet.disabled = false
            }
            else {
                currentTheme = 'light'
                stylesheet.disabled = true
            }
            localStorage.setItem('theme', currentTheme)
        })
    </script>
    <script>
        fetch('actions/class/GetCaroData.php?order=pr_price')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('cardProp').innerHTML = data
                })
                .catch(error => console.error('Error: ', error))
        
        fetch('actions/class/GetCaroData.php?order=pr_amount')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('cardMost').innerHTML = data
                })
                .catch(error => console.error('Error: ', error))

        fetch('actions/class/GetCaroData.php?order=pr_title')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('cardLast').innerHTML = data
                })
                .catch(error => console.error('Error: ', error))

    </script>

</body>
</html>