// functio firstChart() {
var labels = []
var data = []

var xhr = new XMLHttpRequest();
xhr.open("GET", "actions/class/GetStatistics.php", false);
// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText)
        

        for (var id in response)
        {
            if (response.hasOwnProperty(id))
            {
                var receivedData = response[id]

                labels[id] = []
                data[id] = []
                for (var key in receivedData)
                {
                    if (receivedData.hasOwnProperty(key))
                    {
                        labels[id].push(key)
                        data[id].push(receivedData[key])
                    }
                }
            }    
        }
        console.log(labels[1][0])
        console.log("    -    ")
        console.log('myChart' + 1)
        console.log(data)

        // for (var key in response) {
        //     if (response.hasOwnProperty(key)) {
        //         labels.push(key)
        //         data.push(response[key])
        //     }
        // }
    }
}

xhr.send()

for (var i = 0; i < 3; i++) {

    var ctx = document.getElementById('myChart' + (i+1)).getContext('2d');
    // Utworzenie nowego wykresu używając Chart.js
    var myChart = new Chart(ctx, {
        type: 'bar', // Typ wykresu (kolumnowy w tym przypadku)
        data: {
            labels: labels[i+1], // Etykiety na osi X
            datasets: [{
                label: 'Ilość produktów',
                data: data[i+1], // Dane na osi Y
                backgroundColor: 'rgb(138, 43, 226, 0.2)', // Kolor wypełnienia słupków
                borderColor: 'rgb(138, 43, 226)', // Kolor obrysu słupków
                borderWidth: 1 // Grubość obrysu słupków
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Oś Y zaczyna się od zera
                }
            }
        }
    })
}

// var ctx = document.getElementById('myChart2').getContext('2d');
// }