function edit(id)
{
    document.getElementById('view_' + id).style.display = 'none'
    document.getElementById('edit_' + id).style.display = 'table-row'
}
function save(id) {
    
    const name = document.getElementById("name_"+id)
    const second_name = document.getElementById("second_name_"+id)
    const email = document.getElementById("email_"+id)
    const address = document.getElementById("address_"+id)
    const phone = document.getElementById("phone_"+id)

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
    xhr.send("id="+id + "&name="+name.value + "&second_name="+second_name.value + "&email="+email.value + "&address="+address.value + "&phone="+phone.value)
    
    document.getElementById('view_' + id).style.display = 'table-row'
    document.getElementById('edit_' + id).style.display = 'none'
}