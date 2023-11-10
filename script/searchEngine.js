var data = []

fetch('actions/class/GetData.php')
    .then(response => response.json())
    .then(receiveData => {
        data = Object.entries(receiveData)
    })

document.getElementById("searchInput").addEventListener("input", function () {
    const query = this.value.toLowerCase();
    const resultsContainer = document.getElementById("searchResults");
    resultsContainer.innerHTML = "";

    const results = data.filter(([key, value]) => value.toLowerCase().includes(query));

    if (results.length === 0) {
        resultsContainer.innerHTML = "Brak wyników.";
    }
    else {
        results.forEach(result => {
            const el = document.createElement('li')
            const resultElement = document.createElement('a')
            resultElement.textContent = result[1]
            resultElement.href = "actions/ProductSite.php?id=" + result[0]
            resultElement.classList.add('dropdown-item')
            el.appendChild(resultElement)

            resultsContainer.appendChild(el);
        });
    }
});
document.addEventListener('click', function(event) {
    const searchResults = document.getElementById('searchResults');
    const searchInput = document.getElementById('searchInput');
    if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.style.display = 'none';
    }
});

document.getElementById('searchInput').addEventListener('click', function() {
    const searchResults = document.getElementById('searchResults');
    searchResults.style.display = 'block';
});