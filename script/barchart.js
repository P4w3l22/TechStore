var labels = ['Karta graficzna', 'Procesor', 'Płyta główna', 'Chłodzenie procesora', 'Obudowa'];
        var data = [10, 15, 7, 20, 14];

        // Utworzenie kontekstu wykresu
        var ctx = document.getElementById('myChart').getContext('2d');

        // Utworzenie nowego wykresu używając Chart.js
        var myChart = new Chart(ctx, {
            type: 'bar', // Typ wykresu (kolumnowy w tym przypadku)
            data: {
                labels: labels, // Etykiety na osi X
                datasets: [{
                    label: 'Ilość produktów',
                    data: data, // Dane na osi Y
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
        });