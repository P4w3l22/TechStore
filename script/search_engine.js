var data = []
var path = localStorage.getItem("searchEnginePath")
var aHref = localStorage.getItem("anchorHref")

var sInput = localStorage.getItem("sInput")
var sResult = localStorage.getItem("sResult")


fetch(path)
    .then(response => response.json())
    .then(receiveData => {
        data = Object.entries(receiveData)
    })

document.getElementById(sInput).addEventListener("input", function () {
    const query = this.value.toLowerCase();
    const resultsContainer = document.getElementById(sResult);
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
            resultElement.href = aHref + result[0]
            resultElement.classList.add('dropdown-item')
            el.appendChild(resultElement)

            resultsContainer.appendChild(el);
        });
    }
});
document.addEventListener('click', function(event) {
    const searchResults = document.getElementById(sResult);
    const searchInput = document.getElementById(sInput);
    if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.style.display = 'none';
    }
});

document.getElementById(sInput).addEventListener('click', function() {
    const searchResults = document.getElementById(sResult);
    searchResults.style.display = 'block';
});