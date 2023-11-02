const title = document.getElementById('title')
const description = document.getElementById('description')
const category = document.getElementById('category')
const specification = document.getElementById('specification')
const photo = document.getElementById('photo')
const price = document.getElementById('price')
const amount = document.getElementById('amount')

const prodForm = document.getElementById('prodForm')
const titleError = document.getElementById('title_error')
const descriptionError = document.getElementById('description_error')
const categoryError = document.getElementById('category_error')
const specificationError = document.getElementById('specification_error')
const photoError = document.getElementById('photo_error')
const priceError = document.getElementById('price_error')
const amountError = document.getElementById('amount_error')

prodForm.addEventListener('submit', (e) => {
    titleError.innerText = ""
    descriptionError.innerText = ""
    categoryError.innerText = ""
    specificationError.innerText = ""
    photoError.innerText = ""
    priceError.innerText = ""
    amountError.innerText = ""
    var Valid = true

    if (title.value.charAt(0) != title.value.charAt(0).toUpperCase()) {
        Valid = false
        titleError.innerText = 'Tytuł powinien zaczynać się z dużej litery'
    }

    if (title.value.length < 3) {
        Valid = false
        titleError.innerText = "Za krótki tytuł"
    }

    if (title.value.length >= 255) {
        console.log("warunek if")
        Valid = false
        titleError.innerText = "Przekroczyłeś maksymalną ilość znaków!"
    }

    if (!Valid) {
        e.preventDefault()
    }
    else {
        alert('Dodano!')
    }
    
})