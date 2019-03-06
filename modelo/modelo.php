<?php
    class Biblioteca {
            private $db;
        private $biblioteca;

        public function __construct(){
            //método singleton que crea instancia sí no está creada
            $this->db = Conecta::obtenerConexion(); 
            $this->biblioteca=array();
        }

        ////////////
        // SELECTS //
        ////////////

        function selectCds() {
            $consulta=$this->db->consulta("select * from cds;");
            $this->biblioteca = $this->db->recorrer_consulta($consulta);
            return $this->biblioteca;
        }

        function selectLibros() {
            $consulta=$this->db->consulta("select * from libros;");
            $this->biblioteca = $this->db->recorrer_consulta($consulta);
            return $this->biblioteca;
        }

        function selectPeliculas() {
            $consulta=$this->db->consulta("select * from peliculas;");
            $this->biblioteca = $this->db->recorrer_consulta($consulta);
            return $this->biblioteca;
        }

        function selectUsuarios() {
            $consulta=$this->db->consulta("select * from usuarios;");
            $this->biblioteca = $this->db->recorrer_consulta($consulta);
            return $this->biblioteca;
        }

        function selectUsuario($nombre) {
            $consulta = $this->db->consulta("select * from usuarios where id=".$nombre."");
            $this->biblioteca = $this->db->recorrer_consulta($consulta);
            return $this->biblioteca;
        }

        /////////////
        // INSERTS //
        /////////////

        function insertCd($nombre, $canciones, $existencias) {
            $consulta=$this->db->consulta("insert into cds (nombre,canciones,existencias) values('".$nombre."','".$canciones."','".$existencias."');");
            if ($consulta) {
                return "AGREGADO CORRECTAMENTE";
            } else {
                return "ERROR AL AGREGAR";
            }
        }

        function insertLibro($nombre, $descripcion, $existencias) {
            $consulta=$this->db->consulta("insert into libros (nombre,descripcion,existencias) values('".$nombre."','".$descripcion."','".$existencias."');");
            if ($consulta) {
                return "AGREGADO CORRECTAMENTE";
            } else {
                return "ERROR AL AGREGAR";
            }
        }

        function insertPelicula($nombre, $genero, $sinopsis) {
            $consulta=$this->db->consulta("insert into peliculas (nombre,genero,sinopsis) values('".$nombre."','".$genero."','".$sinopsis."');");
            if ($consulta) {
                return "AGREGADO CORRECTAMENTE";
            } else {
                return "ERROR AL AGREGAR";
            }
        }

        function insertUsuario($nombre, $password, $email) {
            $consulta=$this->db->consulta("insert into usuarios (nombre,password,email) values('".$nombre."','".$password."','".$email."');");
            if ($consulta) {
                return "AGREGADO CORRECTAMENTE";
            } else {
                return "ERROR AL AGREGAR";
            }
        }

        /////////////
        // UPDATES //
        /////////////

        function updateCd($id, $nombre, $canciones, $existencias) {
            $consulta = $this->db->consulta("select * from cds where id=".$id."");
            $numfilas = $this->db->numero_filas($consulta);

            if ($numfilas == 1) {
                    $consulta = $this->db->consulta("update cds set nombre='".$nombre."', canciones='".$canciones."', existencias='".$existencias."' where id='".$id."'");
                    if ($consulta) {
                        return "ACTUALIZADO CORRECTAMENTE";
                    } else {
                        return "ERROR AL ACTUALIZAR";
                    }
            }
            else {
                    return "NO SE PUEDE ACTUALIZAR. CARGUE REGISTRO A ACTUALIZAR";
            }
        }

        function updateLibro($id, $nombre, $descripcion, $existencias) {
            $consulta = $this->db->consulta("select * from libros where id=".$id."");
            $numfilas = $this->db->numero_filas($consulta);

            if ($numfilas == 1) {
                    $consulta = $this->db->consulta("update libros set nombre='".$nombre."', descripcion='".$descripcion."', existencias='".$existencias."' where id='".$id."'");
                    if ($consulta) {
                        return "ACTUALIZADO CORRECTAMENTE";
                    } else {
                        return "ERROR AL ACTUALIZAR";
                    }
            }
            else {
                    return "NO SE PUEDE ACTUALIZAR. CARGUE REGISTRO A ACTUALIZAR";
            }
        }

        function updatePelicula($id, $nombre, $genero, $sinopsis) {
            $consulta = $this->db->consulta("select * from peliculas where id=".$id."");
            $numfilas = $this->db->numero_filas($consulta);

            if ($numfilas == 1) {
                    $consulta = $this->db->consulta("update peliculas set nombre='".$nombre."', genero='".$genero."', sinopsis='".$sinopsis."' where id='".$id."'");
                    if ($consulta) {
                        return "ACTUALIZADO CORRECTAMENTE";
                    } else {
                        return "ERROR AL ACTUALIZAR";
                    }
            }
            else {
                    return "NO SE PUEDE ACTUALIZAR. CARGUE REGISTRO A ACTUALIZAR";
            }
        }

        function updateUsuario($id, $nombre, $password, $email) {
            $consulta = $this->db->consulta("select * from usuarios where id=".$id."");
            $numfilas = $this->db->numero_filas($consulta);

            if ($numfilas == 1) {
                    $consulta = $this->db->consulta("update usuarios set nombre='".$nombre."', password='".$password."', email='".$email."' where id='".$id."'");
                    if ($consulta) {
                        return "ACTUALIZADO CORRECTAMENTE";
                    } else {
                        return "ERROR AL ACTUALIZAR";
                    }
            }
            else {
                    return "NO SE PUEDE ACTUALIZAR. CARGUE REGISTRO A ACTUALIZAR";
            }
        }

        /////////////
        // DELETES //
        /////////////

        function deleteCd($id) {
            if ($id != "") {
                $consulta = $this->db->consulta("select * from cds where id=".$id."");
                $numfilas = $this->db->numero_filas($consulta);

                if ($numfilas == 1) {
                        if ($this->db->consulta("delete from cds where id=".$id)){
                                return "ELIMINADO CORRECTAMENTE";
                        }  
                        else {
                                return "ERROR AL ELIMINAR. FOREIGN KEY EN NOTAS";
                        }
                }
                else {
                        return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
                }
            }
            else {
                    return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
            }
        }

        function deleteLibro($id) {
            if ($id != "") {
                $consulta = $this->db->consulta("select * from libros where id=".$id."");
                $numfilas = $this->db->numero_filas($consulta);

                if ($numfilas == 1) {
                        if ($this->db->consulta("delete from libros where id=".$id)){
                                return "ELIMINADO CORRECTAMENTE";
                        }  
                        else {
                                return "ERROR AL ELIMINAR. FOREIGN KEY EN NOTAS";
                        }
                }
                else {
                        return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
                }
            }
            else {
                    return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
            }
        }

        function deletePelicula($id) {
            if ($id != "") {
                $consulta = $this->db->consulta("select * from peliculas where id=".$id."");
                $numfilas = $this->db->numero_filas($consulta);

                if ($numfilas == 1) {
                        if ($this->db->consulta("delete from cds where id=".$id)){
                                return "ELIMINADO CORRECTAMENTE";
                        }  
                        else {
                                return "ERROR AL ELIMINAR. FOREIGN KEY EN NOTAS";
                        }
                }
                else {
                        return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
                }
            }
            else {
                    return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
            }
        }

        function deleteUsuario($id) {
            if ($id != "") {
                $consulta = $this->db->consulta("select * from usuarios where id=".$id."");
                $numfilas = $this->db->numero_filas($consulta);

                if ($numfilas == 1) {
                        if ($this->db->consulta("delete from usuarios where id=".$id)){
                                return "ELIMINADO CORRECTAMENTE";
                        }  
                        else {
                                return "ERROR AL ELIMINAR. FOREIGN KEY EN NOTAS";
                        }
                }
                else {
                        return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
                }
            }
            else {
                    return "NO SE PUEDE ELIMINAR. CARGUE REGISTRO A ELIMINAR";
            }
        }

        ///////////////////////
        // CERRAR CONEXIONES //
        ///////////////////////

        function cerrarConexion() {
                $this->db->cierraConexion();
        }
    }
?>