document.getElementById("searchForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    
    var formData = new FormData(this);
    
    fetch(this.action, {
        method: this.method,
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});
