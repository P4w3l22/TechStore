<?php 
    include('class/Manage.php');
    $manage = new Manage();
    
    $id = -1;
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $product = new Product($id);
        $cat = $product -> Category();
    }
    include('parts/header.php'); 
?>
<title>Dodaj produkt</title>
</head>
<?php include('parts/contentBackground.php'); ?>
        
<div class="m-3">
    <?php echo $id; ?>
    <h3>Podaj dane</h3>
    <br>
        <div class="col-md-4">
            <label for="title" class="form-label">Tytuł</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                required
                <?php if ($id != -1) { echo 'value="'. $product -> Title() .'"'; } ?>
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
                required
                <?php 
                    if ($id != -1) 
                    { 
                        echo 'value="'; 
                        switch ($cat)
                        {
                            case "Dyski twarde HDD i SSD":
                                echo 'drives"';
                                break;
                            case "Karty graficzne":
                                echo 'graphics"';
                                break;
                            case "Procesory":
                                echo 'processors"';
                                break;
                            case "Płyty główne":
                                echo 'motherboards"';
                                break;
                            case "Obudowy komputera":
                                echo 'cases"';
                                break;
                            case "Pamięci RAM":
                                echo 'ram"';
                                break;
                            case "Zasilacze komputerowe":
                                echo 'charger"';
                                break;
                            case "Chłodzenie komputerowe":
                                echo 'cooling"';
                                break;
                            default:
                                echo 'none"';
                                break;
                        }
                    } 
                ?>
                >
                <option>...</option>
                <option value="drives" 
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Dyski twarde HDD i SSD")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Dyski twarde HDD i SSD
                </option>
                <option value="graphics"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Karty graficzne")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Karty graficzne
                </option>
                <option value="processors"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Procesory")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Procesory
                </option>
                <option value="motherboards"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Płyty główne")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Płyty główne
                </option>
                <option value="cases"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Obudowy komputera")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Obudowy komputera
                </option>
                <option value="ram"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Pamięci RAM")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Pamięci RAM
                </option>
                <option value="charger"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Zasilacze komputerowe")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Zasilacze komputerowe
                </option>
                <option value="cooling"
                    <?php 
                        if ($id != -1) 
                        {
                            if ($product -> Category() === "Chłodzenie komputerowe")
                            {
                                echo 'selected="selected"';
                            }
                        } 
                    ?> >
                    Chłodzenie komputerowe
                </option>
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
                            <?php if (isset($_GET['id']) && $cat == 'Dyski twarde HDD i SSD') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Dyski twarde HDD i SSD') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Dyski twarde HDD i SSD') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Karty graficzne') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>                            
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
                            <?php if (isset($_GET['id']) && $cat == 'Karty graficzne') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>
                            
                        >
                        <div id="g_type_error"></div>
                    </div>

                    <div class="col-md-4">
                        <label for="g_memory_capacity" class="form-label">Szyna danych</label>
                        <input
                            type="text"
                            class="form-control"
                            id="g_memory_capacity"
                            name="g_memory_capacity"
                            required
                            <?php if (isset($_GET['id']) && $cat == 'Karty graficzne') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Procesory') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Procesory') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Procesory') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Płyty główne') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Płyty główne') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Płyty główne') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Obudowy komputera') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Obudowy komputera') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>

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
                            <?php if (isset($_GET['id']) && $cat == 'Obudowy komputera') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Pamięci RAM') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Pamięci RAM') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Pamięci RAM') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Zasilacze komputerowe') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>                            
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
                            <?php if (isset($_GET['id']) && $cat == 'Zasilacze komputerowe') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Zasilacze komputerowe') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>                            
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
                            <?php if (isset($_GET['id']) && $cat == 'Chłodzenie komputerowe') { echo 'value = "'. $product -> Specification(1) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Chłodzenie komputerowe') { echo 'value = "'. $product -> Specification(2) .'"'; } ?>
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
                            <?php if (isset($_GET['id']) && $cat == 'Chłodzenie komputerowe') { echo 'value = "'. $product -> Specification(3) .'"'; } ?>
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
                    <?php if ($id != -1) { echo 'value="'. $product -> Picture() .'"'; } ?>
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
                    <?php if ($id != -1) { echo 'value="'. $product -> Price() .'"'; } ?>

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
                    <?php if ($id != -1) { echo 'value="'. $product -> Amount() .'"'; } ?>

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
                required><?php if ($id != -1) { echo  $product -> Description(); } ?></textarea>
            <div id="description_error"></div>
        </div>
        <label></label>
        <input 
            <?php if ($id != -1) 
                { 
                    echo 'onclick="addProd(' . $id . ')"'; 
                } 
            ?>
            onclick="addProd()"
            class="submit_button" 
            type="submit" 
            value="Prześlij"
        >
       

    <!-- </form> -->
</div>
<?php $manage -> Add('p'); ?>

<?php include('parts/footer.php'); ?>
