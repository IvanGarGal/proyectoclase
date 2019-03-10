<?php

include_once 'conexion.php';

function consultaLibros() {

    $obj = new conectaBD();
    $db = $obj->getConn();

    $consulta = "select * from libros";

    $resultado = $db->query($consulta);

    $filas = $db->affected_rows;

    $puntero = $filas;

    echo"<table>";
    for ($i = 0; $i < $filas; $i++) {
        $resultado->data_seek($puntero - 1);
        $fila = $resultado->fetch_assoc();
        echo"<tr>";
        echo"<td>" . $fila['nombre'] . "</td>";
        echo"<td>" . $fila['descripcion'] . "</td>";
        echo"<td>" . $fila['existencias'] . "</td>";
        $puntero--;
        echo"</tr>";
    }
    echo "</table>";

    $db->close();
}
