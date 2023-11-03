
<?php
    require('Connect.php');
    class Manage extends dbConfig
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        private $clientTable = "Clients";
        private $productTable = "Products";
        private $orderTable = "Orders";
        private $orderElementTable = "OrderElements";
        private $opinionTable = "Opinions";

        private $connection = false;

        public function __construct()
        {
            if (!$this -> connection)
            {
                $database = new dbConfig();
                $this -> hostname = $database -> hostname;
                $this -> username = $database -> username;
                $this -> password = $database -> password;
                $this -> dbname = $database -> dbname;

                $conn = mysqli_connect($this -> hostname, "root", $this -> password, "TechStore");
                if ($conn -> connect_error)
                {
                    die ("Błąd łączenia z bazą danych" . $conn -> connect_error);
                }
                else
                {
                    $this -> connection = $conn;
                }
            }
        }

        public function AddProd($title, $select, $message, $photo, $price, $amount, $description)
        {
            $sql = "INSERT INTO Products(pr_title, pr_description, pr_category, pr_specification, pr_picture, pr_price, pr_amount)
                                  VALUES('$title', '$description', '$select', '$message', '$photo', '$price', '$amount');";
            
            if ($this -> connection -> query($sql) === FALSE)
            {
                echo 'Przepraszamy, wystąpił błąd';
            }
        }

        public function Add($pointer)
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                if ($pointer == 'c')
                {
                    $Imie =  $_POST['name'];
                    $Nazwisko= $_POST['second_name'];
                    $Email = $_POST['email'];
                    $Adres =  $_POST['address'];
                    $Telefon = $_POST['number'];
                            

                    $sql = "INSERT INTO Clients(cl_name, cl_second_name, cl_email, cl_address, cl_phone_number, cl_create_date)
                    VALUES ('$Imie', '$Nazwisko', '$Email', '$Adres', '$Telefon', NOW())";

                    if ($this -> connection -> query($sql) === FALSE) 
                    {
                        echo 'Przepraszamy, wystąpił błąd';
                    }
                }

                // else
                // {
                //     $Title = $_POST['title'];
                //     $Description = $_POST['description'];
                //     $Category = $_POST['category'];
                //     // $Specification = $_POST['specification'];
                //     $Picture = $_POST['photo'];
                //     $Price = $_POST['price'];
                //     $Amount = $_POST['amount'];

                //     $sql = "INSERT INTO Products(pr_title, pr_description, pr_category, pr_picture, pr_price, pr_amount)
                //                           VALUES('$Title', '$Description', '$Category', '$Picture', '$Price', '$Amount');";
                //     if ($this -> connection -> query($sql) === FALSE)
                //     {
                //         echo 'Przepraszamy, wystąpił błąd';
                //     }
                // }
            }
        }

        public function Products()
        {
            $sql = "SELECT * FROM Products;";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if (strlen($row['pr_description']) > 120)
                    {
                        $shortDescription = substr($row['pr_description'], 0, 120) . " ...";
                    }
                    else
                    {
                        $shortDescription = $row['pr_description'];
                    }

                    echo '  <div>
                                <tr id="view_' . $row['pr_id'] . '">
                                    <th scope="row">' . $counter . '</th>
                                    <td style="max-height: 50px;">' . $row['pr_title'] . '</td>
                                    <td style="max-height: 50px;">' . $shortDescription . '</td>
                                    <td style="max-height: 50px;">' . $row['pr_category'] . '</td>                                
                                    <td style="max-height: 50px;">' . $row['pr_specification'] . '</td>
                                    <td style="max-height: 50px;">' . $row['pr_picture'] . '</td>
                                    <td style="max-height: 50px;">' . $row['pr_price'] . '</td>
                                    <td style="max-height: 50px;">' . $row['pr_amount'] . '</td>

                                    <td>
                                        <form action="Product.php" method="post">
                                            <input type="hidden" name="id" value="' . $row['pr_id'] . '">
                                            <button style="border-radius: 6px; background-color: red; border: none; color: white;" title="Usuń produkt" type="submit" onclick="return confirmDelete()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button class="edition" style="border-radius: 6px; background-color: orange; border: none; color: white;" title="Edytuj dane">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </div>';
                    $counter++;
                }
            }
            else
            {
                echo "Brak produktów";
            }
        }

        public function Client() 
        {
            $sql = "SELECT * FROM Clients;";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '  <div>
                                <tr id="view_' . $row['cl_id'] . '">
                                    <th scope="row">' . $counter . '</th>
                                    <td>' . $row['cl_name'] . '</td>
                                    <td>' . $row['cl_second_name'] . '</td>
                                    <td>' . $row['cl_email'] . '</td>                                
                                    <td>' . $row['cl_address'] . '</td>
                                    <td>' . $row['cl_phone_number'] . '</td>
                                    <td>' . $row['cl_create_date'] . '</td>
                                    <td>
                                        <form action="Client.php" method="post">
                                            <input type="hidden" name="id" value="' . $row['cl_id'] . '">
                                            <button style="border-radius: 6px; background-color: red; border: none; color: white;" title="Usuń klienta" type="submit" onclick="return confirmDelete()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button class="edition" style="border-radius: 6px; background-color: orange; border: none; color: white;" title="Edytuj dane" onclick="edit(' . $row['cl_id'] . ')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </div>

                            <div>
                                <tr style="display: none;" id="edit_' . $row['cl_id'] . '">
                                    <th >' . $counter . '</th>
                                    <td><input class="form-control" id="name_' . $row['cl_id'] . '" type="text" value="' . $row['cl_name'] . '"></td>
                                    <td><input class="form-control" id="second_name_' . $row['cl_id'] . '" type="text" value="' . $row['cl_second_name'] . '"></td>
                                    <td><input class="form-control" id="email_' . $row['cl_id'] . '" type="text" value="' . $row['cl_email'] . '"></td>
                                    <td><input class="form-control" id="address_' . $row['cl_id'] . '" type="text" value="' . $row['cl_address'] . '"></td>
                                    <td><input class="form-control" id="phone_' . $row['cl_id'] . '" type="text" value="' . $row['cl_phone_number'] . '"></td>
                                    <td>' . $row['cl_create_date'] . '</td>
                                    <td>
                                        <button disabled style="border-radius: 6px; background-color: gray; border: none; color: white;" title="Usuń klienta" type="submit" onclick="return confirmDelete()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                    </td>
                                    <td>
                                        <button style="border-radius: 6px; background-color: green; border: none; color: white; height: 25px;" title="Edytuj dane" onclick="save(' . $row['cl_id'] . ')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </div>';
                    $counter++;
                }
            }
            else
            {
                echo "Brak klientów";
            }
        }


        public function DeleteRow($table)
        {
            if ($table == "c")
            {
                foreach ($_POST as $value)
                {
                    $sql = "DELETE FROM Clients WHERE cl_id = " . $value;

                    if ($this -> connection->query($sql) === TRUE)
                    {
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    else
                    {
                        echo "Wystąpił błąd";
                    }
                }
            }
            else
            {
                foreach ($_POST as $value)
                {
                    $sql = "DELETE FROM Products WHERE pr_id = " . $value;

                    if ($this -> connection->query($sql) === TRUE)
                    {
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                    else
                    {
                        echo "Wystąpił błąd";
                    }
                }
            }
        }

        public function EditRow($id, $name, $second_name, $email, $address, $phone)
        {
            $sql = 'UPDATE Clients 
                    SET cl_name = "' . $name . '", 
                        cl_second_name = "' . $second_name . '", 
                        cl_email = "' . $email . '", 
                        cl_address = "' . $address . '", 
                        cl_phone_number = "' . $phone . '"
                    WHERE cl_id = ' . $id . ';';
            if ($this -> connection -> query($sql) === TRUE) {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "Wystąpił błąd";
            }
            
        }

    }

    // PRODUCT CLASS
    class Product extends dbConfig
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        private $productTable = "products";
        private $connection = false;
        private $avaible;
        
        private $product_id;
        public $title;
        public $description;
        public $picture;
        public $price;
        public $amount;
        public $specification;
        public $opinions;
        

        public function __construct()
        {
            $this -> avaible = true;
            
            if (!$this -> connection)
            {
                $database = new dbConfig();
                $this -> hostname = $database -> hostname;
                $this -> username = $database -> username;
                $this -> password = $database -> password;
                $this -> dbname = $database -> dbname;

                $conn = mysqli_connect($this -> hostname, "root", $this -> password, "bookstore");
                if ($conn -> connect_error)
                {
                    die ("Błąd łączenia z bazą danych" . $conn -> connect_error);
                }
                else
                {
                    $this -> connection = $conn;
                }                
            }
        }

        public function Title()
        {
            echo "Gigabyte GeForce RTX 3060 Ti EAGLE OC 8GB GDDR6X";
        }

        public function Picture()
        {
            echo "https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/3/pr_2023_3_31_14_15_20_474_00.jpg";
        }

        public function Price()
        {
            echo "1 899,00 zł";
        }

        public function IfAvaible()
        {
            if($this -> avaible)
            {
                echo '<svg class="m-2" style="color:rgb(43, 226, 116);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                  <p>Dostępny</p>';
            }
            else
            {
                echo '<svg class="m-2" style="color:red;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                          <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                      </svg>
                  <p>Niedostępny</p>';
            }
        }

        public function Amount()
        {
            $amount = "34";

            if ($this -> avaible)
            {
                echo '<svg class="m-2" style="color:rgb(43, 226, 116);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                      <p>' . $amount . ' dostępnych sztuk</p>';
            }

        }     
        
        public function Description()
        {
            echo '<h3>System chłodzenia WINDFORCE 3X</h3>
            System chłodzenia WINDFORCE 3X obejmuje trzy 80-milimetrowe unikalne wentylatory łopatkowe, obracające się naprzemiennie, 4 kompozytowe miedziane rurki cieplne, bezpośredni dotyk GPU, aktywny wentylator 3D i chłodzenie ekranu, które razem zapewniają wysoką wydajność rozpraszania ciepła.
    
            <br><br><br><h3>Płynny przepływ powietrza</h3>
            Alternatywne wirowanie może zmniejszyć turbulencje sąsiednich wentylatorów i zwiększyć ciśnienie powietrza. GIGABYTE obraca sąsiednie wentylatory w przeciwnym kierunku, dzięki czemu kierunek przepływu powietrza między dwoma wentylatorami jest taki sam, zmniejszając turbulencje i zwiększając ciśnienie przepływu powietrza. Aktywny wentylator 3D zapewnia półpasywne chłodzenie, a wentylatory pozostaną wyłączone, gdy GPU jest w trybie niskiego obciążenia lub niskiego poboru mocy. Strumień powietrza jest rozlewany przez trójkątną krawędź wentylatora i płynnie prowadzony przez krzywą paska 3D na powierzchni wentylatora. Nanosmar grafenowy może wydłużyć żywotność wentylatora łożyska ślizgowego 2,1 razy, blisko żywotności podwójnego łożyska kulkowego i jest cichszy.
    
            <br><br><br><h3>Przemyślana konstrukcja radiatora</h3>
            Rozszerzona konstrukcja radiatora umożliwia przepływ powietrza, zapewniając lepsze odprowadzanie ciepła. Kształt rurki cieplnej z czystej miedzi maksymalizuje powierzchnię bezpośredniego kontaktu z GPU. Rura cieplna obejmuje również pamięć VRAM przez duży styk metalowej płytki, aby zapewnić odpowiednie chłodzenie.
    
            <br><br><br><h3>Metalowy backplate</h3>
            Metalowa płyta tylna zapewnia nie tylko estetyczny kształt, ale także wzmacnia strukturę karty graficznej, zapewniając pełną ochronę.
    
            <br><br><br><h3>Wysokiej jakości komponenty</h3>
            Najwyższej jakości metalowe dławiki z certyfikatem Ultra Durable, kondensatory stałe o niższym ESR, miedziana płytka drukowana o pojemności 2 uncji i tranzystory MOSFET o niższym RDS(on), a także konstrukcja chroniąca przed przegrzaniem, zapewniająca doskonałą wydajność i dłuższą żywotność systemu.
    
            <br><br><br><h3>Przyjazny projekt PCB</h3>
            W pełni zautomatyzowany proces produkcyjny zapewnia najwyższą jakość płytek drukowanych i eliminuje ostre wystające złącza lutownicze widoczne na konwencjonalnej powierzchni PCB. Ta przyjazna konstrukcja zapobiega skaleczeniu dłoni lub przypadkowemu uszkodzeniu komponentów podczas tworzenia konstrukcji.
    
            Gigabyte Control Center
            Gigabyte Control Center (GCC) to ujednolicone oprogramowanie dla wszystkich obsługiwanych produktów GIGABYTE. Zapewnia intuicyjny interfejs, który pozwala użytkownikom dostosować częstotliwość zegara, napięcie, tryb wentylatora i docelową moc w czasie rzeczywistym.';
        }

        public function Specification()
        {
            echo 'Specyfikacja';
        }

        public function Opinions()
        {
            echo 'Opinie : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, laudantium ipsum. A velit ipsum earum laudantium architecto. Est, ut amet quidem, magni minus saepe accusamus numquam voluptatibus exercitationem, labore fugiat.';
        }
   
    }
?>
