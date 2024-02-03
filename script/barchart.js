var labels = []
var data = []

var xhr = new XMLHttpRequest();
xhr.open("GET", "actions_php/Get.php?m=s", false);

xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText)
        

        for (var id in response) {
            if (response.hasOwnProperty(id)) {
                var receivedData = response[id]

                labels[id] = []
                data[id] = []
                for (var key in receivedData) {
                    if (receivedData.hasOwnProperty(key)) {
                        labels[id].push(key)
                        data[id].push(receivedData[key])
                    }
                }
            }    
        }
    }
}
xhr.send()


for (var i = 0; i < 3; i++) {

    var ctx = document.getElementById('myChart' + (i+1)).getContext('2d');
    
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels[i+1],
            datasets: [{
                label: 'Ilość produktów',
                data: data[i+1], 
                backgroundColor: 'rgb(138, 43, 226, 0.2)',
                borderColor: 'rgb(138, 43, 226)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })
}
