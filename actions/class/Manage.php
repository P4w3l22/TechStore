
<?php
    // session_start();
    require('Connect.php');
    class Manage extends dbConfig
    {
        protected $hostname;
        protected $username;
        protected $password;
        protected $dbname;

        protected $clientTable;
        protected $productTable;
        protected $orderTable;
        protected $orderElementTable = "OrderElements";
        protected $opinionTable = "Opinions";

        protected $connection = false;

        public function __construct()
        {
            $clientTable = "Clients";
            $productTable = "Products";
            $orderTable = "Orders";

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

        public function CategoryAmount()
        {
            $sql = "SELECT pr_category,
                           COUNT(*) AS cat_amount
                    FROM Products
                    GROUP BY pr_category
                    ORDER BY cat_amount DESC;";
            $result = mysqli_query($this -> connection, $sql);
            $output = array();

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $output[$row['pr_category']] = $row['cat_amount'];
                }
            }
            // header('Content-Type: application/json');
            return $output;
        }

        public function MostFrequentlyBought()
        {
            $sql = "SELECT pr_title, 
                        COUNT(Orders.pr_id) AS amount
                    FROM Orders, Products
                     WHERE Products.pr_id = Orders.pr_id
                    GROUP BY Orders.pr_id
                    ORDER BY amount DESC;";
            $result = mysqli_query($this -> connection, $sql);
            $output = array();

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $output[$row['pr_title']] = $row['amount'];
                }
            }
            // header('Content-Type: application/json');
            return $output;
        }

        public function ProductsAmount()
        {
            $sql = "SELECT pr_title, pr_amount
                    FROM Products
                    ORDER BY pr_amount DESC;";
            $result = mysqli_query($this -> connection, $sql);
            $output = array();

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $output[$row['pr_title']] = $row['pr_amount'];
                }
            }
            return $output;

        }

        public function ReadFromJSON()
        {
            
            $path = "../log/basket.json";
            $basket_file = file_get_contents($path);
            return json_decode($basket_file, true);
        }

        public function SaveToJSON($new_basket)
        {
            // session_start();
            // $new_basket = $_SESSION['basket'];
            $path = "../../log/basket.json";
            file_put_contents($path, json_encode($new_basket, JSON_PRETTY_PRINT));

        }

        public function DeleteBasketProd($id)
        {
            session_start();
            unset($_SESSION['basket'][$_SESSION['username']][$id]);
            $this -> SaveToJSON($_SESSION['basket']);
        }

        public function DeleteRow($table)
        {
            if ($table == "c")
            {
                foreach ($_POST as $value)
                {
                    $sql = "DELETE FROM Clients 
                            WHERE cl_id = " . $value;

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
            else if ($table == "o")
            {
                foreach ($_POST as $value)
                {
                    $sql = "DELETE FROM Orders 
                            WHERE cl_id = " . $value;

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
            else if ($table == "p")
            {
                foreach ($_POST as $value)
                {
                    $sql = "DELETE FROM Products 
                            WHERE pr_id = " . $value;

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

        public function DisplayProducts($id = -1)
        {
            $sql = "SELECT pr_id,
                           pr_title
                    FROM Products;";
            $output = "";
            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $output .= '<option value="'. $row['pr_id'] .'" ';
                    if ($id != -1 && $id == $row['pr_id'])
                    {
                        $output .= 'selected="selected"';
                    }
                    $output .= ' >
                                    '. $row['pr_title'] .'
                                </option>';
                }
            }
            else
            {
                return "Brak klientów";
            }
            return $output;
        }

        public function DisplayClients()
        {
            $sql = "SELECT cl_id, 
                           CONCAT(cl_name, ' ', cl_second_name) AS cl_full_name 
                    FROM Clients;";

            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo '  <option value="'. $row['cl_id'] .'">
                                '. $row['cl_full_name'] .'
                            </option>';
                }
            }
            else 
            {
                echo "Brak klientów";
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
                $counter = 0;
                for ($i = 0; $i < count($idList); $i++)
                {
                    $this -> BasketRow($idList[$i], $counter);
                    $counter++;
                }
            }
        }

        public function BasketRow($id, $counter)
        {
            $product = new Product($id);
            echo '  <div>
                        <tr id="view">
                            <th scope="row">' . $counter+1 . '</th>
                            <td>' . $product -> Title() . '</td>
                            <td style="max-height: 50px;">
                                <img
                                    class="card-img-top"
                                    src="' . $product -> Picture() . '"
                                    alt=""
                                    style="width: 150px; height: 150px"
                                />
                            </td>
                            <td>' . $product -> Price() . '</td>
                            <td>
                                <button style="border-radius: 6px; background-color: red; border: none; color: white;" title="Usuń" type="submit" onclick="deleteBasketProd('. $counter .'); return confirmDelete()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </div>';
            $counter++; 
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
                    echo   '<div class="card-body" style="background-color: #101010;">
                                <h5 class="card-title" style="color: white">'. $row['pr_price'] .' zł</h5>
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

        public function GetLoginPass()
        {
            $sql = "SELECT cl_email, cl_hash_pass
                    FROM Clients;";
            $result = mysqli_query($this -> connection, $sql);
            $output = array();
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $output[$row['cl_email']] = $row['cl_hash_pass'];
                }
            }
            return $output;
        }

        public function CheckEmail($email)
        {
            $sql = "SELECT cl_email FROM Clients";
            $result = mysqli_query($this -> connection, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if ($row['cl_email'] === $email)
                    {
                        return false;
                    }
                }
            }
            return true;
        }

        public function __destruct()
        {
            $this -> connection -> close();
        }
    }

    class ManageProduct extends Manage
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function Products($id = -1)
        {
            $sql = "SELECT * FROM Products;";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if (($id != -1 && $row['pr_id'] == $id) || $id == -1)
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
            }
            else
            {
                echo "Brak produktów";
            }
        }

        public function Add($title, $select, $message, $photo, $price, $amount, $description)
        {
            $sql = "INSERT INTO Products (pr_title, pr_description, pr_category, pr_specification, pr_picture, pr_price, pr_amount)
                                  VALUES('$title', '$description', '$select', '$message', '$photo', '$price', '$amount');";
            
            if ($this -> connection -> query($sql) === FALSE)
            {
                echo 'Przepraszamy, wystąpił błąd';
            }
        }

        public function Edit($id, $title, $select, $message, $photo, $price, $amount, $description)
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

            if ($this -> connection -> query($sql) === TRUE) {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "Wystąpił błąd";
            }
        }

        public function Get()
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

        public function Category($category)
        {
            $sql = "SELECT pr_id 
                    FROM Products 
                    WHERE pr_category='" . $category . "' 
                    ORDER BY pr_price;";
            $result = mysqli_query($this -> connection, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $this -> Card($row['pr_id']);
                }
            }
        }

        public function __destruct()
        {
            parent::__destruct();
        }

    }

    class ManageClient extends Manage
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function Client($id = -1) 
        {
            $sql = "SELECT * FROM Clients;";

            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if (($id != -1 && $row['cl_id'] == $id) || $id == -1)
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
            }
            else
            {
                echo "Brak klientów";
            }
        }

        public function Add()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $Imie =  $_POST['name'];
                $Nazwisko= $_POST['second_name'];
                $Email = $_POST['email'];
                $Adres =  $_POST['address'];
                $Telefon = $_POST['number'];
                
                $Password = password_hash($_POST['password'], PASSWORD_BCRYPT);                        

                $sql = "INSERT INTO Clients (cl_name, cl_second_name, cl_email, cl_address, cl_phone_number, cl_create_date, cl_hash_pass)
                        VALUES ('$Imie', '$Nazwisko', '$Email', '$Adres', '$Telefon', NOW(), '$Password')";

                if ($this -> connection -> query($sql) === FALSE) 
                {
                    echo 'Przepraszamy, wystąpił błąd';
                }
            }
        }

        public function Edit($id, $name, $second_name, $email, $address, $phone)
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

        public function Get()
        {
            $sql = 'SELECT cl_id, CONCAT(cl_name, " - ", cl_second_name) AS cl_name 
                    FROM Clients;';
            $result = mysqli_query($this -> connection, $sql);

            if ($result -> num_rows > 0)
            {
                $data = array();
                while ($row = $result -> fetch_assoc())
                {
                    $data[$row['cl_id']] = $row['cl_name'];
                }
                header('Content-Type: application/json');
                echo json_encode($data);
            }
            else
            {
                echo 'Brak wyników';
            }
        }

        public function __destruct()
        {
            parent::__destruct();
        }

    }

    class ManageOrder extends Manage
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function Orders($id = -1)
        {
            $sql = "SELECT CONCAT(C.cl_name, ' ', C.cl_second_name) AS name,
                           O.cl_id AS client_id,
                           SUM(P.pr_price) AS price_sum
                    FROM Orders AS O, Clients AS C, Products AS P
                     WHERE O.cl_id = C.cl_id AND O.pr_id = P.pr_id
                    GROUP BY name, client_id
                    ORDER BY price_sum;";

            
            $result = mysqli_query($this -> connection, $sql);
            $counter = 1;
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if (($id != -1 && $row['client_id'] == $id) || $id == -1)
                    {
                        $products_id = $this -> OrderElements($row['client_id'], false);
                        echo '  <div>
                                    <tr id="show_'. $row['client_id'] .'">
                                        <th scope="row">' . $counter . '</th>
                                        <td style="max-height: 50px;">' . $row['name'] . '</td>
                                        
                                        <td style=" max-height: 50px;">' . $this -> OrderElements($row['client_id'], true) . '</td>
                                        <td style="max-height: 50px;">' . $row['price_sum'] . '</td>
                                        <td style="max-height: 50px;">
                                            <form action="Order.php" method="post">
                                                <input type="hidden" name="id" value="'. $row['client_id'] .'">
                                                <button style="border-radius: 6px; background-color: red; border: none; color: white;" title="Usuń zamówienie" type="submit" onclick="return confirmDelete()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="edition" style="border-radius: 6px; background-color: orange; border: none; color: white;" title="Edytuj" onclick="editOrder(' . $row['client_id'] . ', true)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </div>


                                <div>
                                    <tr style="display: none" id="edit_'. $row['client_id'] .'">
                                        <th scope="row">' . $counter . '</th>
                                        <td style="max-height: 50px;">' . $row['name'] . '</td>
                                        <td style=" max-height: 50px;">' . $this -> EditOrderElements($row['client_id']) . '</td>
                                        <td style="max-height: 50px;">' . $row['price_sum'] . '</td>
                                        <td style="max-height: 50px;"></td>

                                        <td>
                                            <button style="border-radius: 6px; background-color: green; border: none; color: white; height: 25px;" title="Edytuj dane" onclick="editOrder(' . $row['client_id'] . ', false)">
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
            }
            else 
            {
                echo 'Brak zamówień';
            }
        }

        public function Add($username = -1, $prod_id = array())
        {
            if (($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cl_choice']) && $_POST['cl_choice'] != '') || ($username != -1 && $prod_id != -1))
            {
                if ($username != -1)
                {
                    $cl_id = $this -> GetId($username);
                    $pr_id = $prod_id;
                    
                    foreach ($pr_id as $p_id)
                    {
                        $sql = "INSERT INTO Orders (cl_id, pr_id, order_date)
                                       VALUES('$cl_id', $p_id, NOW())";
                        echo $sql;
                        if ($this -> connection -> query($sql) === FALSE)
                        {
                            echo 'Przepraszamy, wystąpił błąd łączenia z bazą danych';
                        }
                    }
                }
                else
                {
                    $cl_id = $_POST['cl_choice'];
                    $pr_id = $_POST['pr_choice'];

                    $sql = "INSERT INTO Orders (cl_id, pr_id, order_date)
                                        VALUES('$cl_id', '$pr_id', NOW());";
                    if ($this -> connection -> query($sql) === FALSE)
                    {
                        echo 'Przepraszamy, wystąpił błąd łączenia z bazą danych';
                    }
                    else
                    {
                        echo '  <script>
                                    alert("Dodano zamówienie!");
                                </script>';
                    }
                    $_POST['cl_choice'] = "";
                    $_POST['pr_choice'] = "";
                }
            }
        }

        public function Edit($id, $previous_id, $present_id)
        {
            $sql = 'UPDATE Orders
                    SET pr_id = ' . $present_id . ' 
                    WHERE cl_id = ' . $id . ' 
                        AND pr_id = '. $previous_id .';';
            if ($this -> connection -> query($sql) === TRUE) 
            {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "Wystąpił błąd";
            }
        }

        public function Get()
        {
            $sql = 'SELECT Orders.cl_id AS cl_id, 
                           CONCAT(cl_name, " ", cl_second_name) AS cl_name,
                           COUNT(Orders.cl_id) AS amount
                    FROM Orders, Clients
                     WHERE Orders.cl_id = Clients.cl_id
                    GROUP BY Orders.cl_id, cl_name;';
            $result = mysqli_query($this -> connection, $sql);

            if ($result -> num_rows > 0)
            {
                $data = array();
                while ($row = $result -> fetch_assoc())
                {
                    $data[$row['cl_id']] = $row['cl_name'] . " (" . $row['amount'] . ")";
                }
                header('Content-Type: application/json');
                echo json_encode($data);
            }
            else
            {
                echo 'Brak wyników';
            }
        }

        public function OrderElements($cl_id, $toStringList)
        {
            $sql = "SELECT Products.pr_id, 
                           pr_title
                    FROM Products, Orders
                    WHERE Products.pr_id = Orders.pr_id
                      AND Products.pr_id IN (SELECT pr_id
                                             FROM Orders
                                             WHERE cl_id = " . $cl_id . ")
                    GROUP BY Products.pr_id, pr_title;";

            $result = mysqli_query($this -> connection, $sql);
            $prod_list = array();
            $prod_id_list = array();
            $output = "";
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    array_push($prod_list, $row['pr_title']);
                    array_push($prod_id_list, $row['pr_id']);
                }
            }

            if ($toStringList)
            {
                for ($i = 0; $i < count($prod_list); $i++)
                {
                    $output .= '<p id="">' . $prod_list[$i] . " (" . $this -> CountOrderElements($cl_id, $prod_id_list[$i]) .")</p>";
                }
            }
            else
            {
                return $prod_id_list;
            }
            
            return $output;
        }

        public function EditOrderElements($cl_id)
        {
            $product_list = $this -> OrderElements($cl_id, false);
            $result = "";
            foreach ($product_list as $product_id)
            {
                $result .= '<select
                                type="text"
                                class="order_change form-select"
                                id="order_'. $cl_id .'_'. $product_id .'"
                                name="order_'. $cl_id .'_'. $product_id .'"
                                style="width: 80%"
                                requierd
                                value="'. $product_id .'"
                            >
                                '. $this -> DisplayProducts($product_id) .'
                            </select>
                            <button style="border-radius: 6px; background-color: red; border: none; color: white;" title="Usuń zamówienie" type="submit" onclick="saveOrder('. $cl_id .', '. $product_id .', 2); return confirmDelete(); ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                </svg>
                            </button>
                            <button id="order_'. $cl_id .'_'. $product_id .'_btn" class="hiddenClass" style="border-radius: 6px; background-color: green; border: none; color: white; height: 25px;" title="Kliknij by zapisać zmianę tego zamówienia" onclick="saveOrder('. $cl_id .', '. $product_id .', 1)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg>
                            </button><br><br>
                            ';
            }
            return $result;
        }

        public function CountOrderElements($cl_id, $pr_id)
        {
            $sql = "SELECT COUNT(*) AS amount
                    FROM Orders
                    WHERE cl_id = ". $cl_id . " AND pr_id = ". $pr_id;
            $result = mysqli_query($this -> connection, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                return $row['amount'];
            }
        }

        public function DeleteSignleOrder($cl_id, $prod_id)
        {
            $sql = 'DELETE FROM Orders WHERE cl_id = '. $cl_id .' AND pr_id = ' . $prod_id;

            if ($this -> connection -> query($sql) === TRUE) 
            {
                echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "Wystąpił błąd";
            }

        }

        public function Update()
        {
            $sql = "DELETE 
                    FROM Orders
                    WHERE NOT cl_id IN (SELECT cl_id
                                        FROM Clients);";
            if ($this -> connection->query($sql) === FALSE)
            {
                echo "Wystąpił błąd";
            }
        }

        public function GetId($email)
        {
            $sql = "SELECT cl_id
                    FROM Clients
                    WHERE cl_email = '$email'";
            $result = mysqli_query($this -> connection, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                return $row['cl_id'];
            }
            
        }

        public function __destruct()
        {
            parent::__destruct();
        }
    }

    class Product extends Manage
    {
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
            parent::__construct();

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
   
        public function __destruct()
        {
            parent::__destruct();
        }

    }

?>
