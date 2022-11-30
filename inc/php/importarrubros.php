<?php

$cuenta = $_POST["idcuenta"];

$mysqli = new mysqli("localhost", "root", "", "finanzas");

if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

if ($resultado = $mysqli->query("SELECT * from rubros WHERE idcuenta='".$cuenta."'")) {

    echo "<label for='rubros'>Rubro:</label>";
    echo "<select name='rubros' id='rubros'>";
    echo "<option value='0'>Seleccione un Rubro</option>";
    
    while ($fila = $resultado->fetch_row()) {
        echo "<option value='".$fila[0]."'>";
        echo utf8_encode($fila[2]);
        echo "</option>";
    }

    echo "</select>";

}
?>