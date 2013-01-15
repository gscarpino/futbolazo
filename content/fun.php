<?php

function conectar(){
// Test online
// 	$mysql = new mysqli("localhost","tw000534_gin0","pelle44TT","tw000534_futbolazo");
// Test offline
	$mysql = new mysqli("localhost","admin","123456","futbolazo");
	
	if ($mysql->connect_error) {
		die('Error de Conexión (' . $mysql->connect_errno . ') '
				. $mysql->connect_error);
	}

	return $mysql;
	
}

function empezarTabla(){
	echo '<div id="divContainer">';
	echo '<table class="formatHTML5">';
}

function empezarTablaTam($tam){
	echo '<div id="divContainer" style="width:' . $tam .'%;">';
	echo '<table class="formatHTML5">';
}

function finalizarTabla($colspan){
	echo '</tbody>';
	echo '<tfoot>';
	echo '<tr><td colspan="' . $colspan . '">Los datos pueden llegar a ser incorrectos</td></tr>';
	echo '</tfoot>';
	echo '</table>';
	echo '</div>';
}

function genEncabezado($nombres){
	echo '<thead>';
    echo '<tr>';
	foreach ($nombres as $n){
		echo '<th>' . $n . '</th>';
	}
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	
}


function genFila($fila){
	echo '<tr>';
	foreach ($fila as $f){
		if(substr_count($f,"@")==1){
			echo '<td><a href="mailto:' . $f . '"><img src="imgs/mail_small.png"></a></td>';
		}
		else{
			echo '<td>' . $f . '</td>';
		}
	}
	echo '</tr>';
}

function genFilaLink($fila,$link){
	echo '<tr>';
	foreach($fila as $f){
		if((substr_count($f,"@")==1) && (substr_count($f,".com")==1)){
			echo '<td><a href="mailto:' . $f . '"><img src="imgs/mail_small.png"></a></td>';
		}
		else{
			echo '<td><a href="' . $link . '">' . $f . '</a></td>';
		}
	}
	echo '</tr>';
}
function logueado(){
	if(!isset($_SESSION['logged'])){
		header('location:index.php');
	}
}

function agregarEquipo($nombre,$cat,$mail){
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM equipo WHERE Nombre = '$nombre'");

	if($res->num_rows == 1){
		return false;
	}
	else{
		$res = $mydb->query("INSERT INTO equipo VALUES ('$nombre','$cat','$mail',0,0,0,0,0,0,0,0)");
	return true;
		
	}
}

function agregarJugador($nombre,$dni,$equipo){
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM jugadores WHERE Nombre = '$nombre'");

	if($res->num_rows == 1){
		return false;
	}
	else{
		$res = $mydb->query("INSERT INTO jugadores VALUES ('$nombre','$dni','$equipo',0,0,0,0)");
	}
	return $res;
}


function displayError($titulo, $texto){
	echo '<div class="errorMsg"><br>';
	echo '<div class="ui-state-error ui-corner-all"><br><strong>' . $titulo . '</strong>';
	echo '<p class="perrorMsg"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' . $texto . '</p><br>';
	echo '</div>';
	echo '</div>';
}

function displayGreen($titulo, $texto){
	echo '<div class="errorMsg"><br>';
	echo '<div class="ui-state-green ui-corner-all"><br><strong>' . $titulo . '</strong>';
	echo '<p class="pgreenMsg"><span class="ui-icon ui-icon-check" style="float: left; margin-right: .3em;"></span>' . $texto . '</p><br>';
	echo '</div>';
	echo '</div>';
}

function listaEquipos(){
	$equipos = obtenerEquipos();
	
	foreach ($equipos as $e){
		echo '<option value="' . $e . '">';
	}
}

function obtenerEquipos(){
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM equipo");
	$equip = new SplQueue();
	while ($fila = $res->fetch_row()){
		$equip[] = $fila[0];
	}
	return $equip;
}


function agregarPartido($equip1,$equip2,$fecha,$numero,$goles1,$goles2,$datos){
	$mydb = conectar();
	$claves = array_keys($datos);
	
	$amarillas[] = array();
	unset($amarillas[0]);
	$expulsados1[] = array();
	unset($expulsados1[0]);
	$expulsados2[] = array();
	unset($expulsados2[0]);
	$goleadores[] = array();
	unset($goleadores[0]);
	
	foreach($claves as $c){
		if(substr_count($c,"Amarilla") > 0){
			if($datos[$c] == "on"){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Amarillas FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Amarillas = $valor WHERE DNI = $dni");
				$amarillas[] = "$dni";
			}
		}
		if(substr_count($c,"Expulsion1") > 0){
			if($datos[$c] == "on"){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Expulsiones1 FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Expulsiones1 = $valor WHERE DNI = $dni");
				$expulsados1[] = "$dni";
			}
		}
		if(substr_count($c,"Expulsion2") > 0){
			if($datos[$c] == "on"){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Expulsiones2 FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Expulsiones2 = $valor WHERE DNI = $dni");
				$expulsados2[] = "$dni";
			}
		}
		if(substr_count($c,"Goles") > 0){
			if(((int)$datos[$c]) > 0){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Goles FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor = $valor + ((int)$datos[$c]);
				$res = $mydb->query("UPDATE jugadores SET Goles = $valor WHERE DNI = $dni");
				$goleadores[] = $dni . '(' .((int)$datos[$c]) .')';
			}
		}
	}
	
	$comentario = $datos['comentario'];
	$gols = implode(",",$goleadores);
	$amas = implode(",",$amarillas);
	$exp1 = implode(",",$expulsados1);
	$exp2 = implode(",",$expulsados2);
	
	echo '<br>' . $gols;
	echo '<br>' . $amas;
	echo '<br>' . $exp1;
	echo '<br>' . $exp2;
	
	//Error, buscar
	$res = $mydb->query("INSERT INTO partido VALUES($numero,$equip1,$equip2,$goles1,$goles2,$gols,$amas,$exp1,$exp2,$fecha,$comentario)");
	return true;
}

function agregarUsuario($nombre,$pass,$mail){
	if($nombre == "" || $pass == ""){
		return false;
	}
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre'");
	
	if($res->num_rows == 1){
		return false;
	}
	else{
		$pass = crypt($pass,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
		$res = $mydb->query("INSERT INTO usuarios VALUES ('$nombre','$pass','$mail')");
		return true;
	}	
}

function modificarrUsuario($nombre,$passOld,$passNew,$mail){
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre'");
	
	if($res->num_rows < 1){
		return false;
	}
	else{
		$fila = $res->fetch_row();
		$passTmp = $fila[1];
		$passOld = crypt($passOld,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
		if($passOld != $passTmp){
			return false;
		}
		else{
			if($passNew != ""){
				$passNew = crypt($passNew,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
				$res = $mydb->query("UPDATE usuarios SET Password = '$passNew' WHERE Nombre='$nombre'");
			}
			if($mail != ""){
				$res = $mydb->query("UPDATE usuarios SET Mail = '$mail' WHERE Nombre='$nombre'");
			}
			return true;
		}
	}
}

function  borrarUsuario($nombre){
	$mydb = conectar();
	$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre'");
	if($res->num_rows < 1){
		return false;
	}
	else{
		$res = $mydb->query("DELETE FROM usuarios WHERE Nombre = '$nombre'");
		return true;
	}
}

function sacarJugadorDeEquipo($dni,$pass){
	if(!isset($_SESSION['nombre'])){
		return false;
	}
	else{
		$nombre = $_SESSION['nombre'];
		$mydb = conectar();
		$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre'");
		if($res->num_rows < 1){
			return false;
		}
		else{
			$fila = $res->fetch_row();
			$passDB = $fila[1];
			$pass = crypt($pass,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
			if($pass != $passDB){
				return false;
			}
			else{
				$res = $mydb->query('UPDATE jugadores SET Equipo="[SIN EQUIPO]" WHERE DNI = ' . $dni);
				return true;
			}
		}
	}
}

function borrarEquipo($nEquipo,$pass){
	if(!isset($_SESSION['nombre'])){
		return false;
	}
	else{
		$nombre = $_SESSION['nombre'];
		$mydb = conectar();
		$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre'");
		if($res->num_rows < 1){
			return false;
		}
		else{
			$fila = $res->fetch_row();
			$passDB = $fila[1];
			$pass = crypt($pass,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
			if($pass != $passDB){
				return false;
			}
			else{
				if($res = $mydb->query("SELECT * FROM jugadores WHERE Equipo = '$nEquipo'")){
					while ($fila = $res->fetch_row()){
						$dni = $fila[1];
						$res2 = $mydb->query('UPDATE jugadores SET Equipo="[SIN EQUIPO]" WHERE DNI = ' . $dni);
					}
					$res = $mydb->query("DELETE FROM equipo WHERE Nombre = '$nEquipo'");
					return true;
				}
				else{
					return false;
				}
			}
		}
	}
}


function modificarEquipo($nombreEquipo,$pass,$nombre,$categoria,$mail,$pg,$pp,$emp,$gf,$gc,$amarillas,$expulsiones1,$expulsiones2){
	if(!isset($_SESSION['nombre'])){
		return false;
	}
	else{
		$nombreAdm = $_SESSION['nombre'];
		$mydb = conectar();
		$res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombreAdm'");
		if($res->num_rows < 1){
			return false;
		}
		else{
			$fila = $res->fetch_row();
			$passDB = $fila[1];
			$pass = crypt($pass,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
			if($pass != $passDB){
				return false;
			}
			else{
				if($res = $mydb->query("SELECT * FROM equipo WHERE Nombre = '$nombreEquipo'")){
					$fila = $res->fetch_row();
					$nombre = trim($nombre);
					$res1 = $res2 = $res3 = $res4 = $res5 = $res6 = $res7 = $res8 = $res9 = $res10 = $res11 = true;
					if(($nombre != $nombreEquipo) && (strlen($nombre) > 0)){
						$res1 = $mydb->query('UPDATE equipo SET Nombre="' . $nombre . '" WHERE Nombre = "' . $nombreEquipo . '"');
						$nombreEquipo = $nombre;
						if(!$res1){
							displayError("Nuevo nombre","No se pudo actualizar el nombre del equipo.");	
						}
					}
					
 					if($categoria != "0"){
 						$res2 = $mydb->query('UPDATE equipo SET Categoria="' . $categoria . '" WHERE Nombre = "' . $nombreEquipo . '"');
						if(!$res2){
							displayError("Nueva categoría","No se pudo actualizar la categoría del equipo.");	
						}
 					}
					
 					if($mail != " "){
						$res3 = $mydb->query('UPDATE equipo SET Mail="' . $mail . '" WHERE Nombre = "' . $nombreEquipo . '"');
						if(!$res3){
							displayError("Nuevo mail","No se pudo actualizar el mail del equipo.");	
						}
 					}

					
					
					if($pg != "-1"){
						$res4 = $mydb->query("UPDATE equipo SET PartidosGanados = $pg WHERE Nombre = '$nombreEquipo'");
						if(!$res4){
							displayError("Partidos ganados","No se pudo actualizar la cantidad de partidos ganados del equipo.");	
						}
					}
					
					if($pp != "-1"){
						$res5 = $mydb->query("UPDATE equipo SET PartidosPerdidos = $pp WHERE Nombre = '$nombreEquipo'");
						if(!$res5){
							displayError("Partidos perdidos","No se pudo actualizar la cantidad de partidos perdidos del equipo.");	
						}
					}
					
					if($emp != "-1"){
						$res6 = $mydb->query("UPDATE equipo SET Empates = $emp WHERE Nombre = '$nombreEquipo'");
						if(!$res6){
							displayError("Partidos empatados","No se pudo actualizar la cantidad de partidos empatados del equipo.");	
						}
					}
					
					if($gf != "-1"){
						$res7 = $mydb->query("UPDATE equipo SET GolesConvertidos = $gf WHERE Nombre = '$nombreEquipo'");
						if(!$res7){
							displayError("Goles a favor","No se pudo actualizar la cantidad de goles a favor del equipo.");	
						}
					}
					
					if($gc != "-1"){
						$res8 = $mydb->query("UPDATE equipo SET GolesRecibidos = $gc WHERE Nombre = '$nombreEquipo'");
						if(!$res8){
							displayError("Goles en contra","No se pudo actualizar la cantidad de goles en contra del equipo.");	
						}
					}
					
					if($amarillas != "-1"){
						$res9 = $mydb->query("UPDATE equipo SET Amarillas = $amarillas WHERE Nombre = '$nombreEquipo'");
						if(!$res9){
							displayError("Tarjetas amarillas","No se pudo actualizar la cantidad de tarjetas amarillas del equipo.");	
						}
					}
					
					if($expulsiones1 != "-1"){
						$res10 = $mydb->query("UPDATE equipo SET Expulsiones1 = $expulsiones1 WHERE Nombre = '$nombreEquipo'");
						if(!$res10){
							displayError("Expulsiones 5\'","No se pudo actualizar la cantidad de expulsiones de 5 minutos del equipo.");	
						}
					}
					
					if($expulsiones2 != "-1"){
						$res11 = $mydb->query("UPDATE equipo SET Expulsiones2 = $expulsiones2 WHERE Nombre = '$nombreEquipo'");
						if(!$res4){
							displayError("Expulsiones","No se pudo actualizar la cantidad de expulsiones del equipo.");	
						}
					}
					
					
					
					return $res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7 && $res8 && $res9 && $res10 && $res11;
				}
				else{
					return false;
				}
			}
		}
	}
}

?>