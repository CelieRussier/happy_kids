/* reinitialize filter */
const reinitializeBtn = document.getElementById('reinitialize');

reinitializeBtn.addEventListener("click", reinitialize => {
    const url = `path('/')`;
    fetch(url)
      .then(function() {
        window.location.href = '/';;
    })
});