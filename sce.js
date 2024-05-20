document.getElementById('searchInput').addEventListener('input', function () {
    search();
});

function search() {
    var input = document.getElementById('searchInput').value.toLowerCase();
    var paragraphs = document.getElementsByTagName('p');
    var resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = '';

    for (var i = 0; i < paragraphs.length; i++) {
        var paragraphText = paragraphs[i].textContent.toLowerCase();

        if (paragraphText.includes(input)) {
            var resultItem = document.createElement('p');
            resultItem.textContent = paragraphs[i].textContent;
            resultsContainer.appendChild(resultItem);
        }
    }
}

window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})