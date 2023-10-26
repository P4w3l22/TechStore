<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="icon" href="../images/cpu.svg">
        <title>Pokaż produkt</title>
    </head>
    <body style="margin: 6px;">
        <div class="addClientFirst">
            <div class="logo">
                <a href="../Main.html" class="navbar-brand" style="text-decoration: none; color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                        <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                    </svg> TechStore
                </a>
            </div>

            <!-- <div> -->
            <form action="ShowProduct.php" method="post" class="row-md-10" style="margin: 20px;">
                <label for="choice" class="form-label">Wybierz produkt</label>
                <select 
                    class="form-select" 
                    id="choice" 
                    name="choice" 
                    style="width: 20%;"
                    requierd>
                    <?php
                        require('Connect.php');

                        $sql = "SELECT title FROM products";

                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option>" . $row['title'] . "</option>";
                            }
                        }
                    ?>
                </select>
                <input class="submit_button" type="submit" style="margin-top: 30px;" value="Szukaj">
            </form>
            <!-- </div> -->
            
            <div class="row-md-10 m-5">

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        require('Connect.php');

                        echo
                            '<table class="table">
                                <thead>
                                    <th scope="col" style="background-color: inherit; color: white;">Nazwa</th>
                                    <th scope="col" style="background-color: inherit; color: white;">Opis</th>
                                    <th scope="col" style="background-color: inherit; color: white;">Kategoria</th>
                                    <th scope="col" style="background-color: inherit; color: white;">Cena</th>
                                    <th scope="col" style="background-color: inherit; color: white;">Zdjęcie</th>
                                    <th scope="col" style="background-color: inherit; color: white;">Ilość</th>
                                </thead>
                                <tbody>';
                        
                        $sql = "SELECT title, description, category, price, image, amount FROM products WHERE title = '" . $_POST['choice'] . "'";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo '<tr>
                                  <th scope="row">' . $row['title'] . '</th>
                                  <td>' . $row['description'] . '</td>
                                  <td>' . $row['category'] . '</td>
                                  <td>' . $row['price'] . '</td>
                                  <td>' . $row['image'] . '</td>
                                  <td>' . $row['amount'] . '</td>
                              </tr>
                          </tbody>
                      </table>';
                      $connection->close();
                    }
                ?>
            </div>


        </div>
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>