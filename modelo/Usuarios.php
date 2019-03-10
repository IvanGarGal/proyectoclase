<?php

include_once 'conexion.php';

function consultaUsuarios() {

    $obj = new conectaBD();
    $db = $obj->getConn();


    $consulta = "select * from usuarios";

    $resultado = $db->query($consulta);

    $filas = $db->affected_rows;

    $puntero = $filas;

    echo"<table>";
        echo"<th> NOMBRE </th>";
        echo"<th> CONTRASEÑA </th>";
        echo"<th> EMAIL </th>";
    for ($i = 0; $i < $filas; $i++) {
        $resultado->data_seek($puntero - 1);
        $fila = $resultado->fetch_assoc();
        echo"<tr>";
        echo"<td>" . $fila['nombre'] . "</td>";
        echo"<td>" . $fila['password'] . "</td>";
        echo"<td>" . $fila['email'] . "</td>";
        $puntero--;
        echo"</tr>";
    }
    echo "</table>";

    $db->close();
}


