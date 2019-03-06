<?php
	class Conecta //Clase singleton
	{ 
            private $Idb; 
            private static $instancia; // contenedor de la instancia

            private function __construct() // un constructor privado evita crear nuevos objetos desde fuera de la clase
            { 

                // CONEXION A BBDD DE CLASE 

                $this->Idb = new mysqli("db4free.net:3306", "github", "nohay2sin3", "proyecto_github");
                $this->Idb->set_charset("utf8");

                // Comprobar conexión
                if($this->Idb->connect_error){
                    die("La conexión ha fallado, error número " . $this->Idb->connect_errno . ": " . $this->Idb->connect_error);
                }
            }

            public static function obtenerConexion() //método singleton que crea instancia sí no está creada
            { 
                if (!isset(self::$instancia)) {
                        $miclase = __CLASS__;
                        self::$instancia = new $miclase;
                }
                return self::$instancia;
            }

            public function __clone() // Evita que el objeto se pueda clonar
            { 
                trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
            }

            public function consulta($consulta) {
                return $this->Idb->query($consulta);
            }

            public function numero_filas($consulta) {
                return $consulta->num_rows;  	
            }

            public function recorrer_consulta($consulta) {
                $asignaturas = array();
                while($filas=$consulta->fetch_assoc()){
                    $asignaturas[]=$filas;
                }
                return $asignaturas;
            }

            public function cierraConexion() {
                if (!$this->Idb) {
                    die("El cierre de conexion ha fallado, error número " . $this->Idb->connect_errno . ": " . $this->Idb->connect_error);
                } else {
                    $this->Idb->close();
                }
            }
        }
?>