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
    </head>
    <body>
        
        <?php
        include 'modelo/Peliculas.php';
        include 'modelo/Cds.php';
        
            if(isset($_POST['opcion'])){
                
                $opcion=$_POST['opcion'];
                
                switch ($opcion) {
                    case "libros":


                        break;
                    case "cds":
                        
                        consultaCDS();
                        
                        break;
                    
                    case "peliculas":
                                        
                        $obj=new Peliculas();
                        $obj->select();
                        
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
        </form>
    </body>
</html>
