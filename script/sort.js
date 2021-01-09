const sortBy = document.querySelector('.sort-by')

sortBy.addEventListener('change', (e) => {
    //Todo: send data to backend
    fetch('/Account/sort.php', {
        method: 'POST',
        body: sortBy.value
    })
        .then(response => response.text())
        .then(data => console.log(data))
    //Todo: reload page
})