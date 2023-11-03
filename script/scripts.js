function addProd()
{
    const title = document.getElementById('title')
    const select = document.getElementById('category')
    const photo = document.getElementById('photo')
    const price = document.getElementById('price')
    const amount = document.getElementById('amount')
    const description = document.getElementById('description')

    console.log(select.value)
    var jsonFormat = ""
    
    if (select.value === 'drives')
    {
        jsonFormat = `{"Pojemność":"${document.getElementById('d_capacity').value}",
                            "Prędkość odczytu":"${document.getElementById('d_read_speed').value}",
                            "Prędkość zapisu":"${document.getElementById('d_save_speed').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'graphics')
    {
        jsonFormat = `{"Pamięć":"${document.getElementById('g_memory').value}",
                            "Rodzaj pamięci":"${document.getElementById('g_type').value}",
                            "Przepustowość pamięci":"${document.getElementById('g_memory_capacity').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'processors')
    {
        jsonFormat = `{"Gniazdo procesora":"${document.getElementById('p_socket').value}",
                    "Taktowanie procesora":"${document.getElementById('p_clock_speed').value}",
                    "Liczba rdzeni":"${document.getElementById('p_cores').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'motherboards')
    {
        jsonFormat = `{"Obsługiwane rodziny procesorów":"${document.getElementById('m_fam').value}",
                    "Gniazdo procesora":"${document.getElementById('m_socket').value}",
                    "Chipset":"${document.getElementById('m_chipset').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'cases')
    {
        jsonFormat = `{"Typ obudowy":"${document.getElementById('c_type').value}",
                    "Standard płyty głównej":"${document.getElementById('c_standard').value}",
                    "Podświetlenie":"${document.getElementById('c_backlight').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'ram')
    {
        jsonFormat = `{"Seria":"${document.getElementById('r_series').value}",
                    "Rodzaj pamięci":"${document.getElementById('r_type').value}",
                    "Pojemność całkowita":"${document.getElementById('r_capacity').value}"}`
        console.log(jsonFormat)
    }
    
    else if (select.value === 'charger')
    {
        jsonFormat = `{"Moc maksymalna":"${document.getElementById('ch_power').value}",
                    "Standard":"${document.getElementById('ch_standard').value}",
                    "Kolor":"${document.getElementById('ch_color').value}"}`
        console.log(jsonFormat)
    }

    else if (select.value === 'cooling')
    {
        jsonFormat = `{"Rodzaj chłodzenia":"${document.getElementById('co_type').value}",
                    "Materiał radiatora":"${document.getElementById('co_material').value}",
                    "Podświetlenie":"${document.getElementById('co_backlight').value}"}`
        console.log(jsonFormat)
    }

    if (select.value !== '...')
        var xhr = new XMLHttpRequest()
        var url = 'class/Spec.php'

        xhr.open("POST", url, true)
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

        xhr.onreadystatechange = function () 
        {
            if (xhr.readyState == 4 && xhr.status == 200)
            {            
                alert("Dodano!")
                location.reload()

            }
        }
        xhr.send("json="+jsonFormat + "&title="+title.value + "&select="+select.value + "&photo="+photo.value + "&price="+price.value + "&amount="+amount.value + "&description="+description.value)       
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