<?php

class conectaBD {

    public function getConn() {
        $db = new mysqli("db4free.net:3306", "github", "nohay2sin3", "proyecto_github");
        if ($db->connect_errno) {
            die("No se ha podido acceder al servidor de la base de datos");
        }
        return $db;
    }

}

?>