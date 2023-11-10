function prod_valid() 
{
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
        Valid = false
        titleError.innerText = "Przekroczyłeś maksymalną ilość znaków!"
    }

    if (description.value.length == 0) {
        Valid = false
        descriptionError.innerText = "Wypełnij to pole"
    }

    if (category.value == "...") {
        Valid = false
        categoryError.innerText = "Wybierz odpowiednią kategorię"
    }

    if (price.value.length == 0) {
        Valid = false
        priceError.innerText = "Wypełnij to pole"
    }

    if (amount.value.length == 0) {
        Valid = false
        amountError.innerText = "Wypełnij to pole"
    }

    if (!Valid) {
        return false
    }
    else {
        return true
    }
        
}

function addProd(id=-1)
{

    if (prod_valid()) {
    
        const title = document.getElementById('title')
        const select = document.getElementById('category')
        const photo = document.getElementById('photo')
        const price = document.getElementById('price')
        const amount = document.getElementById('amount')
        const description = document.getElementById('description')
        var jsonFormat = ""
        
        if (select.value === 'drives') {
            var choice = "Dyski twarde HDD i SSD";
            jsonFormat = `{"Pojemność":"${document.getElementById('d_capacity').value}",
                            "Prędkość odczytu":"${document.getElementById('d_read_speed').value}",
                            "Prędkość zapisu":"${document.getElementById('d_save_speed').value}"}`
        }

        else if (select.value === 'graphics') {
            var choice = "Karty graficzne";
            jsonFormat = `{"Pamięć":"${document.getElementById('g_memory').value}",
                            "Rodzaj pamięci":"${document.getElementById('g_type').value}",
                            "Szyna danych":"${document.getElementById('g_memory_capacity').value}"}`
            console.log(jsonFormat)
        }

        else if (select.value === 'processors') {
            var choice = "Procesory";
            jsonFormat = `{"Gniazdo procesora":"${document.getElementById('p_socket').value}",
                            "Taktowanie procesora":"${document.getElementById('p_clock_speed').value}",
                            "Liczba rdzeni":"${document.getElementById('p_cores').value}"}`
            
        }

        else if (select.value === 'motherboards') {
            var choice = "Płyty główne";
            jsonFormat = `{"Obsługiwane rodziny procesorów":"${document.getElementById('m_fam').value}",
                            "Gniazdo procesora":"${document.getElementById('m_socket').value}",
                            "Chipset":"${document.getElementById('m_chipset').value}"}`
        }

        else if (select.value === 'cases') {
            var choice = "Obudowy komputera";
            jsonFormat = `{"Typ obudowy":"${document.getElementById('c_type').value}",
                            "Standard płyty głównej":"${document.getElementById('c_standard').value}",
                            "Podświetlenie":"${document.getElementById('c_backlight').value}"}`
        }

        else if (select.value === 'ram') {
            var choice = "Pamięci RAM";
            jsonFormat = `{"Seria":"${document.getElementById('r_series').value}",
                            "Rodzaj pamięci":"${document.getElementById('r_type').value}",
                            "Pojemność całkowita":"${document.getElementById('r_capacity').value}"}`
        }
        
        else if (select.value === 'charger') {
            var choice = "Zasilacze komputerowe";
            jsonFormat = `{"Moc maksymalna":"${document.getElementById('ch_power').value}",
                            "Standard":"${document.getElementById('ch_standard').value}",
                            "Kolor":"${document.getElementById('ch_color').value}"}`
        }

        else if (select.value === 'cooling') {
            var choice = "Chłodzenie komputerowe";

            jsonFormat = `{"Rodzaj chłodzenia":"${document.getElementById('co_type').value}",
                            "Materiał radiatora":"${document.getElementById('co_material').value}",
                            "Podświetlenie":"${document.getElementById('co_backlight').value}"}`
        }

        if (select.value !== '...')
            var xhr = new XMLHttpRequest()

        var url = 'class/Spec.php'
        
        if (id !== -1)
        {
            var url = 'class/EditProduct.php?id=' + id.toString()
        }
         console.log(url)

        xhr.open("POST", url, true)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                alert("Dodano!")
                // location.reload()
            }
        }
            
        xhr.send("json=" + jsonFormat + "&title=" + title.value + "&select=" + choice + "&photo=" + photo.value + "&price=" + price.value + "&amount=" + amount.value + "&description=" + description.value)
    }
}

function edit(id)
{
    document.getElementById('view_' + id).style.display = 'none'
    document.getElementById('edit_' + id).style.display = 'table-row'
}

function save(id)
{
    const user_name = document.getElementById("name_"+id)
    const user_second_name = document.getElementById("second_name_"+id)
    const user_email = document.getElementById("email_"+id)
    const user_address = document.getElementById("address_"+id)
    const user_phone = document.getElementById("phone_"+id)

    var xhr = new XMLHttpRequest()
    var url = 'class/Edit.php'

    xhr.open("POST", url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState == 4 && xhr.status == 200)
        {            
            location.reload()
        }
    }
    xhr.send("id="+id + "&name="+user_name.value + "&second_name="+user_second_name.value + "&email="+user_email.value + "&address="+user_address.value + "&phone="+user_phone.value)
    
    document.getElementById('view_' + id).style.display = 'table-row'
    document.getElementById('edit_' + id).style.display = 'none'
}

function darkMode()
{
    var stylesheet = document.getElementById('stylesheet_dark')

    if (stylesheet.disabled) {
        stylesheet.disabled = false
    }
    else {
        stylesheet.disabled = true
    }
}