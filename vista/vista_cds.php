<?php

include_once 'conexion.php';

function consultaCDS() {

        $conecta = new conectaBD();
        $conexion = $conecta->getConn();

        $orden = "select * from cds";
        $q = $conexion->query($orden);

        $filas = $conexion->affected_rows;

        $puntero = $filas;

        echo"<table>";
        for ($i = 0; $i < $filas; $i++) {
            $q->data_seek($puntero - 1);
            $fila = $q->fetch_assoc();
            echo"<tr>";
            echo"<td>" . $fila['id'] . "</td>";
            echo"<td>" . $fila['nombre'] . "</td>";
            echo"<td>" . $fila['canciones'] . "</td>";
            echo"<td>" . $fila['existencias'] . "</td>";
            $puntero--;
            echo"</tr>";
        }
        echo "</table>";

    $conexion->close();
}
