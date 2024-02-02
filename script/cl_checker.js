const name = document.getElementById('name')
const second_name = document.getElementById('second_name')
const address = document.getElementById('address')
const number = document.getElementById('number')
const email = document.getElementById('username')
const password1 = document.getElementById('password1')
const password2 = document.getElementById('password')


const form = document.getElementById('form')
const nameErrorElement = document.getElementById('name_error')
const secondNameErrorElement = document.getElementById('second_name_error')
const addressErrorElement = document.getElementById('address_error')
const numberErrorElement = document.getElementById('number_error')
const emailErrorElement = document.getElementById('username_error')
const password2ErrorElement = document.getElementById('password_error')

form.addEventListener('submit', (e) => {
    nameErrorElement.innerText = ""
    secondNameErrorElement.innerText = ""
    addressErrorElement.innerText = ""
    numberErrorElement.innerText = ""
    emailErrorElement.innerText = ""
    password2ErrorElement.innerText = ""
    var isValid = true

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../actions_php/Get.php?m=e", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    xhr.onreadystatechange = function() 
    {
        if (xhr.readyState == 4 && xhr.status == 200) 
        {
            // var data = JSON.parse(xhr.responseText);
            console.log(xhr.responseText)
            if (xhr.responseText == "false")
            {
                isValid = false
                emailErrorElement.innerText = "Podany adres email jest już używany!"
            }
        }
    };
    
    xhr.send("email="+email.value);

    // fetch('../actions_php/Get.php?m=e', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded'
    //         },
    //         body: 'email=' + encodeURIComponent(email.value)
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (!data.result)
    //         {
    //             isValid = false
    //             emailErrorElement.innerText = "Podany adres email jest już używany!"
    //         }
    //     })
    //     .catch(error => console.error(error))
    
    if (name.value.length < 2) {
        isValid = false
        nameErrorElement.innerText = 'Za krótkie imię'
    }

    if (name.value.charAt(0) !== name.value.charAt(0).toUpperCase()) {
        isValid = false
        nameErrorElement.innerText = 'Twoje imię powinno zaczynać się od dużej litery'
    }


    if (second_name.value.charAt(0) !== second_name.value.charAt(0).toUpperCase()) {
        isValid = false
        secondNameErrorElement.innerText = 'Twoje nazwisko powinno zaczynać się od dużej litery'
    }

    if (second_name.value.length < 3) {
        isValid = false
        secondNameErrorElement.innerText = 'Za krótkie nazwisko'
    }


    if (number.value.length != 9) {
        isValid = false
        numberErrorElement.innerText = "Nieprawidłowa ilość cyfr"
    }

    if (!/^\d*$/.test(number.value)) {
        isValid = false
        numberErrorElement.innerText = "Numer telefonu musi zawierać wyłącznie cyfry"
    }

    if (!/^[\S]+@[\S]+.[\S]+$/.test(email.value)) {
        isValid = false
        emailErrorElement.innerText = "Podaj właściwy adres email"
    }
    
    if (password1.value !== password2.value)
    {
        isValid = false
        password2ErrorElement.innerText = "Podane hasła nie są identyczne!"
    }

    if (!isValid) {
        e.preventDefault()
    }
    else {
        alert('Dodano!')
    }
})


