function edit(id)
{
    document.getElementById('view_' + id).style.display = 'none'
    document.getElementById('edit_' + id).style.display = 'table-row'
}
function save(id) {
    
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