<?php

include 'conexion.php';

class Peliculas {

    public function select() {

        $obj = new conectaBD();
        $db = $obj->getConn();


        $consulta = "select * from peliculas";

        $resultado = $db->query($consulta);

        $filas = $db->affected_rows;

        $puntero = $filas;

        echo"<table>";
        for ($i = 0; $i < $filas; $i++) {
            $resultado->data_seek($puntero - 1);
            $fila = $resultado->fetch_assoc();
            echo"<tr>";
            echo"<td>" . $fila['nombre'] . "</td>";
            echo"<td>" . $fila['genero'] . "</td>";
            echo"<td>" . $fila['sinopsis'] . "</td>";
            $puntero--;
            echo"</tr>";
        }

        $db->close();
    }

}
