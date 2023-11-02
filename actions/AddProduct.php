<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Dodaj produkt</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="row-md-10 m-5">
    <h3>Podaj dane
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
        </svg>
    </h3><br>
    <form class="row g-3 needs-validation" action="AddProduct.php" method="post" id="prodForm" style="display: block; min-width: 50px;">
        <div class="col-md-4">
            <label for="title" class="form-label">Tytuł</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                required
            >
            <div id="title_error"></div>
        </div>

        <div class="col-md-4 my-3">
            <label for="category" class="form-label">Kategoria</label>
            <select
                type="text"
                class="form-select"
                id="category"
                name="category"
                required>
                <option>...</option>
                <option value="Dyski twarde HDD i SSD">Dyski twarde HDD i SSD</option>
                <option value="Karty graficzne">Karty graficzne</option>
                <option value="Procesory">Procesory</option>
                <option value="Płyty główne">Płyty główne</option>
                <option value="Obudowy komputera">Obudowy komputera</option>
                <option value="Pamięci RAM">Pamięci RAM</option>
                <option value="Zasilacze komputerowe">Zasilacze komputerowe</option>
                <option value="Chłodzenie komputerowe">Chłodzenie komputerowe</option>
            </select>
            <div id="category_error"></div>
        </div>

        <div style="margin-left: 50px; padding-right: 20px;">
            <div class="row dis" id="Dyski twarde HDD i SSD">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="capacity" class="form-label">Pojemność</label>
                        <input
                            type="text"
                            class="form-control"
                            id="capacity"
                            name="capacity"
                            required
                        >
                        <div id="capacity_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="format" class="form-label">Format</label>
                        <input
                            type="text"
                            class="form-control"
                            id="format"
                            name="format"
                            required
                        >
                        <div id="format_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="interface" class="form-label">Interfejs</label>
                        <input
                            type="text"
                            class="form-control"
                            id="interface"
                            name="interface"
                            required
                        >
                        <div id="interface_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="read_speed" class="form-label">Prędkość odczytu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="read_speed"
                            name="read_speed"
                            required
                        >
                        <div id="read_speed_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="save_speed" class="form-label">Prędkość zapisu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="save_speed"
                            name="save_speed"
                            required
                        >
                        <div id="save_speed_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="bone_type" class="form-label">Rodzaj kości pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="bone_type"
                            name="bone_type"
                            required
                        >
                        <div id="bone_type_error"></div>
                    </div>
                </form>
            </div>

            <div class="row dis" id="Karty graficzne">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="memory" class="form-label">Pamięć</label>
                        <input
                            type="text"
                            class="form-control"
                            id="memory"
                            name="memory"
                            required
                        >
                        <div id="memory_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="memory_act" class="form-label">Szyna pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="memory_act"
                            name="memory_act"
                            required
                        >
                        <div id="memory_act_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="type" class="form-label">Rodzaj pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="type"
                            name="type"
                            required
                        >
                        <div id="type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="memory_capacity" class="form-label">Przepustowość pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="memory_capacity"
                            name="memory_capacity"
                            required
                        >
                        <div id="memory_capacity_error"></div>
                    </div>
                </form>
            </div>

            <div class="row dis" id="Procesory">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="type" class="form-label">Rodzina procesorów</label>
                        <input
                            type="text"
                            class="form-control"
                            id="type"
                            name="type"
                            required
                        >
                        <div id="type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="series" class="form-label">Seria procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="series"
                            name="series"
                            required
                        >
                        <div id="series_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="socket" class="form-label">Gniazdo procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="socket"
                            name="socket"
                            required
                        >
                        <div id="socket_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="clock_speed" class="form-label">Taktowanie procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="clock_speed"
                            name="clock_speed"
                            required
                        >
                        <div id="clock_speed_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="cores" class="form-label">Liczba rdzeni</label>
                        <input
                            type="text"
                            class="form-control"
                            id="cores"
                            name="cores"
                            required
                        >
                        <div id="cores_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="threads" class="form-label">Liczba wątków</label>
                        <input
                            type="text"
                            class="form-control"
                            id="threads"
                            name="threads"
                            required
                        >
                        <div id="threads_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="memory" class="form-label">Pamięć podręczna</label>
                        <input
                            type="text"
                            class="form-control"
                            id="memory"
                            name="memory"
                            required
                        >
                        <div id="memory_error"></div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 dis" id="Płyty główne">Opcja 4</div>
        </div>

        <!-- <div class="col-md-4">
            <label for="specification" class="form-label">Specyfikacja</label>
            <input
                type="text"
                class="form-control"
                id="specification"
                name="specification"
                required
            >
            <div id="specification_error"></div>
        </div> -->
        <!-- <div> -->

        <div class="row my-4">
            <div class="col-md-4">
                <label for="photo" class="form-label">Zdjęcie</label>
                <input
                    type="text"
                    class="form-control"
                    id="photo"
                    name="photo"
                >
                <div id="photo_error"></div>
            </div>

            <div class="col-md-4">
                <label for="price" class="form-label">Cena</label>
                <input
                    type="text"
                    class="form-control"
                    id="price"
                    name="price"
                    required
                >
                <div id="price_error"></div>
            </div>

            <div class="col-md-4">
                <label for="amount" class="form-label">Ilość sztuk</label>
                <input
                    type="text"
                    class="form-control"
                    id="amount"
                    name="amount"
                    required
                >
                <div id="amount_error"></div>
            </div>
        </div>
        <!-- </div> -->

        <div class="col-md-4" style="width: 100%;">
            <label for="description" class="form-label">Opis</label>
            <textarea
                type="text"
                class="form-control"
                id="description"
                name="description"
                style="height: 200px;"
                required
            ></textarea>
            <div id="description_error"></div>
        </div>

        <label></label>
        <input class="submit_button" type="submit" style="margin-left: 8px;" value="Prześlij">
       

    </form>
</div>
<?php $manage -> Add('p'); ?>

<?php include('parts/footer.php'); ?>