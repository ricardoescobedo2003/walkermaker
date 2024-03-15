function mostrarMonto() {
    var clienteId = document.getElementById("cliente").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("monto").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "get_monto.php?id=" + clienteId, true);
    xhttp.send();
}
