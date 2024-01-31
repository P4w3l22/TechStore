<?php 
    include('../actions/class/Manage.php');
    $manage = new ManageClient();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style/style_login.css">
        <title>Rejestracja</title>
    </head>
    <body>
        <div class="box box2" style="min-height: 900px;">
            <form id="login-form" action="signup.php" method="post">
                <<h2>Rejestracja</h2>
                <div class="inputBox">
                    <input type="text" id="name" name="name" required="required">
                    <span>Imię</span>
                    <i></i>
                </div>
                <div id="name_error"></div>

                <div class="inputBox">
                    <input type="text" id="second_name" name="second_name" required="required">
                    <span>Nazwisko</span>
                    <i></i>
                </div>
                <div id="second_name_error"></div>

                <div class="inputBox">
                    <input type="text" id="address" name="address" required="required">
                    <span>Adres</span>
                    <i></i>
                </div>
                <div id="address_error"></div>

                <div class="inputBox">
                    <input type="text" id="number" name="number" required="required">
                    <span>Numer telefonu</span>
                    <i></i>
                </div>
                <div id="number_error" style="color: whitesmoke"></div>

                <div class="inputBox">
                    <input type="text" id="email" name="email" required="required">
                    <span>Email</span>
                    <i></i>
                </div>
                <div id="email_error" style="color: whitesmoke"></div>

                <div class="inputBox">
                    <input type="password" id="password1" name="password" required="required">
                    <span>Hasło</span>
                    <i></i>
                </div>

                <div class="inputBox">
                    <input type="password" id="password" name="password" required="required">
                    <span>Powtórz hasło</span>
                    <i></i>
                </div>
                <div id="password_error" style="color: whitesmoke"></div>

                <input type="submit" value="Zarejestruj się" style="margin-top: 30px; width: 150px;">
                <a href="../Main.php">Wróć do strony</a>
            </form>

        

        </div>
        <?php
            $manage -> Add();

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                session_start();
                $_SESSION['username'] = "user";

                header('Location: ../Main.php');
                exit(); 
            }
        ?>
        <script>
            const email = document.getElementById('email')
            const number = document.getElementById('number')
            const password1 = document.getElementById('password1')
            const password2 = document.getElementById('password')

            const emailErrorElement = document.getElementById('email_error')
            const numberErrorElement = document.getElementById('number_error')
            const password2ErrorElement = document.getElementById('password_error')

            document.getElementById('login-form').addEventListener('submit', (e) => {
                emailErrorElement.innerText = ""
                numberErrorElement.innerText = ""
                password2ErrorElement.innerText = ""

                var isValid = true

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../actions/class/GetEmails.php", false);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

                xhr.onreadystatechange = function() 
                {
                    if (xhr.readyState == 4 && xhr.status == 200) 
                    {
                        var data = JSON.parse(xhr.responseText);
                        if (!data.result)
                        {
                            isValid = false
                            emailErrorElement.innerText = "Podany adres email jest już używany!"
                        }
                    }
                };
                
                xhr.send("email="+email.value);

                if (!/^\d*$/.test(number.value)) 
                {
                    isValid = false
                    numberErrorElement.innerText = "Numer telefonu musi zawierać wyłącznie cyfry"
                }

                if (!/^[\S]+@[\S]+.[\S]+$/.test(email.value)) 
                {
                    isValid = false
                    emailErrorElement.innerText = "Podaj właściwy adres email"
                }

                if (password1.value !== password2.value)
                {
                    isValid = false
                    password2ErrorElement.innerText = "Podane hasła nie są identyczne!"
                }

                if (!isValid)
                {
                    e.preventDefault()
                }
                else
                {
                    alert('Dodano!')
                }
            })
            
        </script>
        <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="../script/scripts.js"></script>
    </body>
</html>