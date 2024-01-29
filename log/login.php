<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="style_login.css">
        <title>Document</title>
    </head>
    <body>
        <?php if (isset($_GET['bool']) && $_GET['bool'] === 1) 
                  { 
                      echo "<p style='color: white; 
                                      position: absolute; 
                                      z-index: 3; 
                                      top: 0px; 
                                      left: 0px; 
                                      background-color: #C61F1F;
                                      padding: 10px 20px;
                                      border-radius: 0px 0px 20px 0px;
                                      '>Błędne dane logowania!</p>"; 
                  } 
        ?>
            
        <div class="box">
            <form id="login-form" action="log.php" method="post">
                <h2>Logowanie</h2>
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span>Login</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Hasło</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="#">Zapomniałeś hasła?</a>
                    <a href="signup.php">Rejestracja</a>
                </div>
                <input type="submit" value="Zaloguj">

            </form>
        </div>
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="script/scripts.js"></script>
    </body>
</html>