<?php 
    include('class/Manage.php');
    $manage = new Manage();
    include('parts/header.php'); 
?>
<title>Dodaj produkt</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="m-3">
    <h3>Podaj dane
    </h3><br>
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
                <option value="drives">Dyski twarde HDD i SSD</option>
                <option value="graphics">Karty graficzne</option>
                <option value="processors">Procesory</option>
                <option value="motherboards">Płyty główne</option>
                <option value="cases">Obudowy komputera</option>
                <option value="ram">Pamięci RAM</option>
                <option value="charger">Zasilacze komputerowe</option>
                <option value="cooling">Chłodzenie komputerowe</option>
            </select>
            <div id="category_error"></div>
        </div>

        <div class="dropdown-content">
            <div class="row dis" id="drives">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="d_capacity" class="form-label">Pojemność</label>
                        <input
                            type="text"
                            class="form-control"
                            id="d_capacity"
                            name="d_capacity"
                            required
                        >
                        <div id="d_capacity_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="d_read_speed" class="form-label">Prędkość odczytu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="d_read_speed"
                            name="d_read_speed"
                            required
                        >
                        <div id="d_read_speed_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="d_save_speed" class="form-label">Prędkość zapisu</label>
                        <input
                            type="text"
                            class="form-control"
                            id="d_save_speed"
                            name="d_save_speed"
                            required
                        >
                        <div id="d_save_speed_error"></div>
                    </div>
                </form>
            </div>

            <div class="row dis" id="graphics">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="g_memory" class="form-label">Pamięć</label>
                        <input
                            type="text"
                            class="form-control"
                            id="g_memory"
                            name="g_memory"
                            required
                        >
                        <div id="g_memory_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="g_type" class="form-label">Rodzaj pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="g_type"
                            name="g_type"
                            required
                        >
                        <div id="g_type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="g_memory_capacity" class="form-label">Przepustowość pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="g_memory_capacity"
                            name="g_memory_capacity"
                            required
                        >
                        <div id="g_memory_capacity_error"></div>
                    </div>
                </form>
            </div>

            <div class="row dis" id="processors">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="p_socket" class="form-label">Gniazdo procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="p_socket"
                            name="p_socket"
                            required
                        >
                        <div id="p_socket_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="p_clock_speed" class="form-label">Taktowanie procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="p_clock_speed"
                            name="p_clock_speed"
                            required
                        >
                        <div id="p_clock_speed_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="p_cores" class="form-label">Liczba rdzeni</label>
                        <input
                            type="text"
                            class="form-control"
                            id="p_cores"
                            name="p_cores"
                            required
                        >
                        <div id="p_cores_error"></div>
                    </div>
                </form>
            </div>
            <div class="row dis" id="motherboards">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="m_fam" class="form-label">Obsługiwane rodziny procesorów</label>
                        <input
                            type="text"
                            class="form-control"
                            id="m_fam"
                            name="m_fam"
                            required
                        >
                        <div id="m_fam_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="m_socket" class="form-label">Gniazdo procesora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="m_socket"
                            name="m_socket"
                            required
                        >
                        <div id="m_socket_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="m_chipset" class="form-label">Chipset</label>
                        <input
                            type="text"
                            class="form-control"
                            id="m_chipset"
                            name="m_chipset"
                            required
                        >
                        <div id="m_chipset_error"></div>
                    </div>
                </form>
            </div>
            <div class="row dis" id="cases">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="c_type" class="form-label">Typ obudowy</label>
                        <input
                            type="text"
                            class="form-control"
                            id="c_type"
                            name="c_type"
                            required
                        >
                        <div id="c_type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="c_standard" class="form-label">Standard płyty głównej</label>
                        <input
                            type="text"
                            class="form-control"
                            id="c_standard"
                            name="c_standard"
                            required
                        >
                        <div id="c_standard_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="c_backlight" class="form-label">Podświetlenie</label>
                        <input
                            type="text"
                            class="form-control"
                            id="c_backlight"
                            name="c_backlight"
                            required
                        >
                        <div id="c_backlight_error"></div>
                    </div>
                </form>
            </div>
            <div class="row dis" id="ram">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="r_series" class="form-label">Seria</label>
                        <input
                            type="text"
                            class="form-control"
                            id="r_series"
                            name="r_series"
                            required
                        >
                        <div id="r_series_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="r_type" class="form-label">Rodzaj pamięci</label>
                        <input
                            type="text"
                            class="form-control"
                            id="r_type"
                            name="r_type"
                            required
                        >
                        <div id="r_type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="r_capacity" class="form-label">Pojemność całkowita</label>
                        <input
                            type="text"
                            class="form-control"
                            id="r_capacity"
                            name="r_capacity"
                            required
                        >
                        <div id="r_capacity_error"></div>
                    </div>
                </form>
            </div>
            <div class="row dis" id="charger">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="ch_power" class="form-label">Moc maksymalna</label>
                        <input
                            type="text"
                            class="form-control"
                            id="ch_power"
                            name="ch_power"
                            required
                        >
                        <div id="ch_power_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="ch_standard" class="form-label">Standard</label>
                        <input
                            type="text"
                            class="form-control"
                            id="ch_standard"
                            name="ch_standard"
                            required
                        >
                        <div id="ch_standard_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="ch_color" class="form-label">Kolor</label>
                        <input
                            type="text"
                            class="form-control"
                            id="ch_color"
                            name="ch_color"
                            required
                        >
                        <div id="ch_color_error"></div>
                    </div>
                </form>
            </div>
            <div class="row dis" id="cooling">
                <form action="AddProduct.php" method="post">
                    <div class="col-md-4">
                        <label for="co_type" class="form-label">Rodzaj chłodzenia</label>
                        <input
                            type="text"
                            class="form-control"
                            id="co_type"
                            name="co_type"
                            required
                        >
                        <div id="co_type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="co_material" class="form-label">Materiał radiatora</label>
                        <input
                            type="text"
                            class="form-control"
                            id="co_material"
                            name="co_material"
                            required
                        >
                        <div id="co_material_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="co_backlight" class="form-label">Podświetlenie</label>
                        <input
                            type="text"
                            class="form-control"
                            id="co_backlight"
                            name="co_backlight"
                            required
                        >
                        <div id="co_backlight_error"></div>
                    </div>
                </form>
            </div>
        </div>

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
        <input class="submit_button" onclick="addProd()" type="submit" value="Prześlij">
       

    <!-- </form> -->
</div>
<?php $manage -> Add('p'); ?>

<?php include('parts/footer.php'); ?>