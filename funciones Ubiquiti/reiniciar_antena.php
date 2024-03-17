<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ejecuta el comando SSH para reiniciar la antena Ubiquiti
    $output = shell_exec("ssh doblenet@122.122.125.2 'reboot'");

    // Muestra el resultado del comando SSH
    echo "<pre>$output</pre>";
}

?>
