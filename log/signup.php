<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="style_login.css">
        <title>Rejestracja</title>
    </head>
    <body>
        <div class="box box2" style="height: 700px;">
            <form id="login-form" action="signup.php" method="post">
                <h2>Rejestracja</h2>
                <div class="inputBox">
                    <input type="text" id="name" name="name" required="required">
                    <span>Imię</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" id="second_name" name="second_name" required="required">
                    <span>Nazwisko</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" id="address" name="address" required="required">
                    <span>Adres</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" id="number" name="number" required="required">
                    <span>Numer telefonu</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" id="email" name="email" required="required">
                    <span>Email</span>
                    <i></i>
                </div>

                <input type="submit" value="Zarejestruj się" style="margin-top: 40px; width: 150px;">
                <a href="../Main.php">Wróć do strony</a>
            </form>
        </div>
        <?php
            include('../actions/class/Manage.php');
            $manage = new Manage();
            $manage -> Add('c');
        ?>
        <script src="script/searchEngine.js"></script>
        <!-- <script src="script/barchart.js"></script> -->
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="script/scripts.js"></script>
    </body>
</html>