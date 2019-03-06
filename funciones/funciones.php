<?php
    function filtrado($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    function test_email($email) {
        $patron = "/^[a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,3}$/" ;
        if ( preg_match( $patron , $email) ) {
            return true;
        }
        return false;
    }
    
    function contra($cont) {
        $contra ="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{3,}$/";				
        if ( preg_match( $contra , $cont) ) {
            return true;
        }
        return false;
    }

    function hashear ($contrasena) {
        $cifrada = password_hash($contrasena,PASSWORD_DEFAULT, ['cost'=>15]);
    }

    function comprobar_password ($contrasena,$hash) {
        if(password_verify($contrasena, $hash)){
            return true;
        } 
        return false;
    }
?>

