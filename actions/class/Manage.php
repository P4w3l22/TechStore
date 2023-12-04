
<?php
    require('Connect.php');

    class Product extends dbConfig
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        private $productTable = "products";
        private $connection = false;
        private $avaible;
        
        private $user;
        public $title;
        public $description;
        public $picture;
        public $price;
        public $amount;
        public $specification;
        public $opinions;

        public function __construct($id)
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

            $sql = "SELECT * FROM Products WHERE pr_id = '" . $id . "';";

            $result = mysqli_query($this -> connection, $sql);
            $row = mysqli_fetch_assoc($result);

            $this -> user = $row;

            if (intval($this -> user['pr_amount']) > 0) {
                $this -> avaible = true;
            }

        }

        public function Title()
        {
            return $this -> user['pr_title'];
        }

        public function Category()
        {
            return $this -> user['pr_category'];
        }

        public function Picture()
        {
            if (substr($this -> user['pr_picture'], 0, 7) === "http://" || substr($this -> user['pr_picture'], 0, 8) === "https://")
            {
                return $this -> user['pr_picture'];
            }
            else 
            {
                return "https://t3.ftcdn.net/jpg/02/15/15/46/360_F_215154625_hJg9QkfWH9Cu6LCTUc8TiuV6jQSI0C5X.jpg";
            }
            
        }

        public function Price()
        {
            return $this -> user['pr_price'];
        }

        public function IfAvaible()
        {
            if($this -> avaible)
            {
                return '<svg class="m-2" style="color:rgb(43, 226, 116);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                  <p>Dostępny</p>';
            }
            else
            {
                return '<svg class="m-2" style="color:red;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                          <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                      </svg>
                  <p>Niedostępny</p>';
            }
        }

        public function Amount()
        {
            $amount = $this -> user['pr_amount'];

            if ($this -> avaible)
            {
                return $amount;
            }

        }     
        
        public function Description()
        {
            return $this -> user['pr_description'];
        }

        public function Specification($option=-1)
        {
            $decodeSpec = json_decode($this -> user['pr_specification'], true);
            $result = "";
            $values = array_values($decodeSpec);

            if ($option != -1)
            {
                return $values[$option-1];
            }
            
            foreach ($decodeSpec as $key => $value)
            {
                $result .= '<li class="nav-item">'. $key .': '. $value .'</li>';
            }
            return $result;
        }

        public function Opinions()
        {
            return 'Opinie : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, laudantium ipsum. A velit ipsum earum laudantium architecto. Est, ut amet quidem, magni minus saepe accusamus numquam voluptatibus exercitationem, labore fugiat.';
        }
   
    }

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

        public function EditProd($id, $title, $select, $message, $photo, $price, $amount, $description)
        {
            $sql = 'UPDATE Products 
                    SET pr_title = "' . $title . '", 
                        pr_description = "' . $description . '", 
                        pr_category = "' . $select . '", 
                        pr_specification = \'' . $message . '\', 
                        pr_picture = "' . $photo . '",
                        pr_price = ' . $price . ',
                        pr_amount = ' . $amount . '
                    WHERE Products.pr_id = ' . $id . ';';

            echo 'Funkcja EditProd : ' . $sql;
            

            if ($this -> connection -> query($sql) === TRUE) {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "Wystąpił błąd";
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
                    
                    $Password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                            

                    $sql = "INSERT INTO Clients(cl_name, cl_second_name, cl_email, cl_address, cl_phone_number, cl_create_date, cl_hash_pass)
                            VALUES ('$Imie', '$Nazwisko', '$Email', '$Adres', '$Telefon', NOW(), '$Password')";

                    if ($this -> connection -> query($sql) === FALSE) 
                    {
                        echo 'Przepraszamy, wystąpił błąd';
                    }
                }
            }
        }

        public function GetData()
        {
            $sql = 'SELECT pr_id, pr_title FROM Products;';
            $result = mysqli_query($this -> connection, $sql);

            if ($result -> num_rows > 0)
            {
                $data = array();
                while ($row = $result -> fetch_assoc())
                {
                    $data[$row['pr_id']] = $row['pr_title'];
                }
                header('Content-Type: application/json');
                echo json_encode($data);
            }
            else
            {
                echo 'Brak wyników';
            }
        }

        public function Orders()
        {
            $sql = "SELECT (SELECT CONCAT(cl_name, ' ', cl_second_name) 
                            FROM Clients
                            WHERE Clients.cl_id = Orders.cl_id) AS name,
                           (SELECT pr_title
                            FROM Products
                            WHERE Products.pr_id = Orders.pr_id) AS prod,
                           (SELECT SUM(pr_price)
                            FROM Products
                            WHERE Products.pr_id = Orders.pr_id) AS price_sum,
                            order_date
                    FROM Orders;";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '  <div>
                                <tr id="">
                                    <th scope="row">' . $counter . '</th>
                                    <td style="max-height: 50px;">' . $row['name'] . '</td>
                                    <td style="max-height: 50px;">' . $row['prod'] . '</td>
                                    <td style="max-height: 50px;">' . $row['price_sum'] . '</td>
                                    <td style="max-height: 50px;">' . $row['order_date'] . '</td>
                                </tr>
                            </div>';
                }
            }
            else 
            {
                echo 'Brak zamówień';
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
                                    <td style="max-height: 50px;">
                                        <img
                                            class="card-img-top"
                                            src="' . $row['pr_picture'] . '"
                                            alt=""
                                        />
                                        
                                    </td>
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
                                        <a href="AddProduct.php?id='. $row['pr_id'] .'">
                                        <button class="edition" style="border-radius: 6px; background-color: orange; border: none; color: white;" title="Edytuj dane">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                        </a>
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
                    echo   '<div>
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

        public function Category($category)
        {
            $sql = "SELECT pr_id FROM Products WHERE pr_category='" . $category . "' ORDER BY pr_price;";
            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $this -> Card($row['pr_id']);
                }
            }
        }

        public function Basket($idList)
        {
            if (count($idList) == 0)
            {
                echo "Brak produktów w koszyku";
            }
            else
            {
                for ($i = 0; $i < count($idList); $i++)
                {
                    $this -> Card($idList[$i]);
                }
            }
        }

        public function Card($id)
        {
            $product = new Product($id);
            echo   '<div class="card my-2" style="overflow:hidden" >
                        <img
                            class="img-fluid"
                            src="' . $product -> Picture() . '" 
                            alt="..."
                            style="width: 200px;"
                        />
                        <div class="card-body" style="height: 95%">
                            <h5 class="card-title"><a href="ProductSite.php?id='. $id .'" style="text-decoration:none; color: white;">' . $product -> Title() . '</a></h5>
                            <h6 class="">'. $product -> Price() .' zł</h6>
                            <ul class="card-text navbar-nav" style="padding-bottom: 14x;">
                                '. $product -> Specification() .'
                            </ul>
                        </div>
                    </div>';
        }

        public function GetCaroData($order)
        {
            // $order = "ORDER BY " . ;
            $sql = "SELECT pr_id, pr_picture, pr_price, pr_title 
                    FROM Products
                    ORDER BY ". $order ." 
                    LIMIT 12;";
            $result = mysqli_query($this -> connection, $sql);
            $counter = 0;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if ($counter%4 == 0)
                    {
                        if ($counter == 0)
                        {
                            echo '<div class="carousel-item active">';
                            
                        }
                        else 
                        {
                            echo '<div class="carousel-item">';
                        }
                        echo '<div class="cards-wrapper">';
                    }

                    if ($counter%4 == 0)
                    {
                        echo '<div class="card">';
                    }
                    else
                    {
                        echo '<div class="card d-none d-md-block">';
                    }
                    echo   '<img
                                class="card-img-top"
                                src="'. $row['pr_picture'] .'"
                                alt=""
                            />';
                    echo   '<div class="card-body">
                                <h5 class="card-title">'. $row['pr_price'] .' zł</h5>
                                <p class="card-text"><a class="a_view" href="actions/ProductSite.php?id='. $row['pr_id'] .'">'. $row['pr_title'] .'</a></p>
                            </div></div>';
                    
                    if ($counter == 3 || $counter == 7 || $counter == 11)
                    {
                        echo '</div></div>';
                    }

                    $counter++;
                }
            }
        }
    }

    // PRODUCT CLASS
    
?>
