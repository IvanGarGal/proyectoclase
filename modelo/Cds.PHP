<?php
	include 'conexion.php';
	function consultaCDS(){
		try {
			$conecta = new conectaBD();
			$conexion = $conecta->getConn();
			
			$orden = "select * from usuario";
			$q = $conexion->query($orden);
			$filas=array();
			$q->setFetchMode (PDO::FETCH_ASSOC);
			while ( $r = $q->fetch() ){
				$filas[]=$r; 
			}
			foreach ($filas as $k=>$fila){
				if ($k==0) { 
					echo "<table><tr><th>ID</th><th>Nombre</th><th>Canciones</th><th>Existencias</th></tr>"; 
				}
				echo "<tr><td>". $fila[ 'id' ]."</td><td>".$fila['nombre']."</td><td>".$fila['canciones']."</td><td>".$fila['existencias']."</td></tr>";
			}
			echo "</table>";
		} 
		catch ( PDOException $e) {
				echo ( "¡Error! al ejecutar consulta: " . $e->getMessage() . "<br/>");
			return false; 
		}
	}
