<?php

$tipomov = $_POST["tipomovimiento"];

$mysqli = new mysqli("localhost", "root", "", "finanzas");

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

if ($resultado = $mysqli->query("SELECT * from cuentas WHERE tipomovimiento='".$tipomov."'")) {

    echo "<label for='cuentas'>Cuenta:</label>";
    echo "<select name='cuentas' id='cuentas'>";
    echo "<option value='0'>Seleccione una Cuenta</option>";
    
    while ($fila = $resultado->fetch_row()) {
        echo "<option value='".$fila[0]."'>";
        echo utf8_encode($fila[1]);
        echo "</option>";
    }

    echo "</select>";

}
?>