<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table{
                border: 1px solid black;
            }

            th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
        include 'modelo/Peliculas.php';
        include 'modelo/Cds.php';
        include 'modelo/Usuarios.php';

        if (isset($_POST['opcion'])) {

            $opcion = $_POST['opcion'];

            switch ($opcion) {
                case "libros":


                    break;
                case "cds":

                    consultaCDS();

                    break;

                case "peliculas":

                    consultaPelis();

                    break;
                
                case "usuarios":

                    consultaUsuarios();

                    break;
                default:
                    break;
            }
        }
        ?>
        <form  method="post" action="crud.php">
            <input type="submit" name="opcion" value="libros">
            <input type="submit" name="opcion" value="cds">
            <input type="submit" name="opcion" value="peliculas">
            <input type="submit" name="opcion" value="usuarios">
        </form>
    </body>
</html>
