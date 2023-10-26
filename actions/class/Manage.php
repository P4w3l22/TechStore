<?php
    require('Connect.php');
    class Manage extends dbConfig
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        private $clientTable = "clients";
        private $productTable = "products";
        private $orderTable = "orders";
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

        public function Add()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $Imie =  $_POST['name'];
                $Nazwisko= $_POST['second_name'];
                $Adres =  $_POST['address'];
                $Telefon = $_POST['number'];
                $Email = $_POST['email'];          

                $sql = "INSERT INTO clients(name, second_name, address, tel_number, email)
                VALUES ('$Imie', '$Nazwisko', '$Adres', '$Telefon', '$Email')";

                if ($this -> connection -> query($sql) === FALSE) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Przepraszamy, wystąpił błąd</strong>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"
                                ></button>
                            </div>';
                }
            }
        }

        public function CheckedList()
        {
            $sql = "SELECT Id_client, name, second_name, address, tel_number, email FROM clients";

            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '<tr>
                            <td><input class="form-check-label" type="checkbox" name="' . $row['Id_client'] . '"></td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['second_name'] . '</td>
                            <td>' . $row['address'] . '</td>
                            <td>' . $row['tel_number'] . '</td>
                            <td>' . $row['email'] . '</td>
                        </tr>';
                }
            }
        }

        public function DeleteChecked()
        {
            function checkboxStatus($id)
            {
                if (isset($_POST[$id])) {
                    return true;
                } else {
                    return false;
                }
            }

            $sql = "SELECT Id_client FROM clients";
            $sql_del = "DELETE FROM clients WHERE clients.Id_client IN (";

            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if (checkboxStatus($row['Id_client']))
                    {
                        $sql_del .= (int)$row['Id_client'] . ", ";
                    }
                }
                $sql_delete = substr($sql_del, 0, -2) . ");";

                if (strlen($sql_delete) > 0)
                {
                    if ($this -> connection->query($sql_delete) === TRUE)
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

        public function Show()
        {
            $sql = "SELECT name FROM clients;";

            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<option>" . $row['name'] . "</option>";
                }
            }
        }

        public function ShowSingleRow()
        {
            echo
                '<table class="table">
                    <thead>
                        <th scope="col" style="background-color: inherit; color: white;">Imię</th>
                        <th scope="col" style="background-color: inherit; color: white;">Nazwisko</th>
                        <th scope="col" style="background-color: inherit; color: white;">Adres</th>
                        <th scope="col" style="background-color: inherit; color: white;">Numer telefonu</th>
                        <th scope="col" style="background-color: inherit; color: white;">Email</th>
                    </thead>
                    <tbody>';
            
            $sql = "SELECT name, second_name, address, tel_number, email FROM clients WHERE name = '" . $_POST['choice'] . "'";
            $result = mysqli_query($this -> connection, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<tr>
                        <th scope="row">' . $row['name'] . '</th>
                        <td>' . $row['second_name'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['tel_number'] . '</td>
                        <td>' . $row['email'] . '</td>
                    </tr>
                </tbody>
            </table>';
        
        }

        public function View()
        {
            $sql = "SELECT Id_client, name, second_name, address, tel_number, email FROM clients";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 0;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '<tr>
                                <th scope="row">' . ++$counter . '</th>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['second_name'] . '</td>
                                <td>' . $row['address'] . '</td>
                                <td>' . $row['tel_number'] . '</td>
                                <td>' . $row['email'] . '</td>
                            </tr>';
                }
            }
            else
            {
                echo "Brak klientów";
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