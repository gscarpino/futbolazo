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

function finalizarTabla($colspan,$texto){
	echo '</tbody>';
	echo '<tfoot>';
	echo '<tr><td colspan="' . $colspan . '">' . $texto . '</td></tr>';
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
		$res = $mydb->query("INSERT INTO jugadores VALUES ('$nombre','$dni','$equipo',0,0,0,0,0,0,0,0)");
	}
	return $res;
}


function displayError($titulo, $texto){
	echo '<div class="errorMsg" id="Msg"><br>';
	echo '<div class="ui-state-error ui-corner-all"><br><strong>' . $titulo . '</strong>';
	echo '<p class="perrorMsg"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' . $texto . '</p><br>';
	echo '</div>';
	echo '</div>';
}

function displayGreen($titulo, $texto){
	echo '<div class="errorMsg" id="Msg"><br>';
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

function listaEquiposSelect($cat){
	$equipos = obtenerEquiposDeCat($cat);

	foreach ($equipos as $e){
		echo '<option value="' . $e . '">' . $e . '</option>';
	}
}

function obtenerEquipos(){
	$mydb = conectar();
	$res = $mydb->query('SELECT * FROM equipo WHERE Nombre != "[SIN EQUIPO]"');
	$equip = new SplQueue();
	$equip[] = " ";
	while ($fila = $res->fetch_row()){
		$equip[] = $fila[0];
	}
	return $equip;
}

function obtenerEquiposDeCat($cat){
	$mydb = conectar();
	$res = $mydb->query('SELECT * FROM equipo WHERE Nombre != "[SIN EQUIPO]" AND Categoria = "' . $cat . '"');
	$equip = new SplQueue();
	$equip[] = " ";
	while ($fila = $res->fetch_row()){
		$equip[] = $fila[0];
	}
	return $equip;
}

function agregarPartido($equipo1,$equipo2,$fecha,$hora){
	$mydb = conectar();
	if($res = $mydb->query('SELECT * FROM partido WHERE Fecha = "' . $fecha . '" AND Hora = "' . $hora . '"')){
		if($res->num_rows > 0){
			return false;
		}
		else{
			$res = $mydb->query('INSERT INTO partido (Equipo1,Equipo2,Fecha,Hora,Estado) VALUES ("' . $equipo1 . '","' . $equipo2 . '","' . $fecha . '","' . $hora . '","Programado")');
			return true;
		}	
	}
	else{
		return false;
	}
	
}


function jugarPartido($equip1,$equip2,$fecha,$numero,$goles1,$goles2,$datos){
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
				$res = $mydb->query("SELECT Equipo,Amarillas FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[1];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Amarillas = $valor WHERE DNI = $dni");
				$amarillas[] = "$dni";
				$eq = $fila[0];
				$res = $mydb->query('SELECT Amarillas FROM equipo WHERE Nombre = "' . $eq . '"');
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query('UPDATE equipo SET Amarillas = ' . $valor . ' WHERE Nombre = "' . $eq . '"');
			}
		}
		if(substr_count($c,"Expulsion1") > 0){
			if($datos[$c] == "on"){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Equipo,Expulsiones1 FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[1];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Expulsiones1 = $valor WHERE DNI = $dni");
				$expulsados1[] = "$dni";
				$eq = $fila[0];
				$res = $mydb->query('SELECT Expulsiones1 FROM equipo WHERE Nombre = "' . $eq . '"');
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query('UPDATE equipo SET Expulsiones1 = ' . $valor . ' WHERE Nombre = "' . $eq . '"');
			}
		}
		if(substr_count($c,"Expulsion2") > 0){
			if($datos[$c] == "on"){
				$pos = strpos($c,"_");
				$dni = substr($c,0,$pos);
				$res = $mydb->query("SELECT Equipo,Expulsiones2 FROM jugadores WHERE DNI = $dni");
				$fila = $res->fetch_row();
				$valor = $fila[1];
				$valor++;
				$res = $mydb->query("UPDATE jugadores SET Expulsiones2 = $valor WHERE DNI = $dni");
				$expulsados2[] = "$dni";
				$eq = $fila[0];
				$res = $mydb->query('SELECT Expulsiones2 FROM equipo WHERE Nombre = "' . $eq . '"');
				$fila = $res->fetch_row();
				$valor = $fila[0];
				$valor++;
				$res = $mydb->query('UPDATE equipo SET Expulsiones2 = ' . $valor . ' WHERE Nombre = "' . $eq . '"');
			
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
	

	$res = $mydb->query('SELECT GolesConvertidos FROM equipo WHERE Nombre = "' . $equip1 . '"');
	$fila = $res->fetch_row();
	$valor = $fila[0];
	$valor = $valor + $goles1;
	$res = $mydb->query('UPDATE equipo SET GolesConvertidos = ' . $valor . ' WHERE Nombre = "' . $equip1 . '"');
	
	
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


function modificarEquipo($nombreEquipo,$pass,$nombre,$categoria,$mail,$pgActuales,$ppActuales,$empActuales,$gfActuales,$gcActuales,$amarillasActuales,$expulsiones1Actuales,$expulsiones2Actuales,$pg,$pp,$emp,$gf,$gc,$amarillas,$expulsiones1,$expulsiones2,$fecha,$historial){
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
					$res12 = $res13 = $res14 = $res15 = $res16 = $res17 = $res18 = $res19 = $res20 = $res21 = $res1;
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

					
					
					if($pgActuales != "-1"){
						$res4 = $mydb->query("UPDATE equipo SET PartidosGanadosActuales = $pgActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res4){
							displayError("Partidos ganados","No se pudo actualizar la cantidad de partidos ganados del equipo.");	
						}
					}
					
					if($ppActuales != "-1"){
						$res5 = $mydb->query("UPDATE equipo SET PartidosPerdidosActuales = $ppActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res5){
							displayError("Partidos perdidos","No se pudo actualizar la cantidad de partidos perdidos del equipo.");	
						}
					}
					
					if($empActuales != "-1"){
						$res6 = $mydb->query("UPDATE equipo SET EmpatesActuales = $empActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res6){
							displayError("Partidos empatados","No se pudo actualizar la cantidad de partidos empatados del equipo.");	
						}
					}
					
					if($gfActuales != "-1"){
						$res7 = $mydb->query("UPDATE equipo SET GolesConvertidosActuales = $gfActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res7){
							displayError("Goles a favor","No se pudo actualizar la cantidad de goles a favor del equipo.");	
						}
					}
					
					if($gcActuales != "-1"){
						$res8 = $mydb->query("UPDATE equipo SET GolesRecibidosActuales = $gcActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res8){
							displayError("Goles en contra","No se pudo actualizar la cantidad de goles en contra del equipo.");	
						}
					}
					
					if($amarillasActuales != "-1"){
						$res9 = $mydb->query("UPDATE equipo SET AmarillasActuales = $amarillasActuales WHERE Nombre = '$nombreEquipo'");
						if(!$res9){
							displayError("Tarjetas amarillas","No se pudo actualizar la cantidad de tarjetas amarillas del equipo.");	
						}
					}
					
					if($expulsiones1Actuales != "-1"){
						$res10 = $mydb->query("UPDATE equipo SET Expulsiones1Actuales = $expulsiones1Actuales WHERE Nombre = '$nombreEquipo'");
						if(!$res10){
							displayError("Expulsiones 5\'","No se pudo actualizar la cantidad de expulsiones de 5 minutos del equipo.");	
						}
					}
					
					if($expulsiones2Actuales != "-1"){
						$res11 = $mydb->query("UPDATE equipo SET Expulsiones2Actuales = $expulsiones2Actuales WHERE Nombre = '$nombreEquipo'");
						if(!$res11){
							displayError("Expulsiones","No se pudo actualizar la cantidad de expulsiones del equipo.");	
						}
					}
					
					if($pg != "-1"){
						$res12 = $mydb->query("UPDATE equipo SET PartidosGanados = $pg WHERE Nombre = '$nombreEquipo'");
						if(!$res12){
							displayError("Total de Partidos ganados","No se pudo actualizar la cantidad total de partidos ganados del equipo.");
						}
					}
						
					if($pp != "-1"){
						$res13 = $mydb->query("UPDATE equipo SET PartidosPerdidos = $pp WHERE Nombre = '$nombreEquipo'");
						if(!$res13){
							displayError("Total de Partidos perdidos","No se pudo actualizar la cantidad total de partidos perdidos del equipo.");
						}
					}
						
					if($emp != "-1"){
						$res14 = $mydb->query("UPDATE equipo SET Empates = $emp WHERE Nombre = '$nombreEquipo'");
						if(!$res14){
							displayError("Total de Partidos empatados","No se pudo actualizar la cantidad total de partidos empatados del equipo.");
						}
					}
						
					if($gf != "-1"){
						$res15 = $mydb->query("UPDATE equipo SET GolesConvertidos = $gf WHERE Nombre = '$nombreEquipo'");
						if(!$res15){
							displayError("Total de Goles a favor","No se pudo actualizar la cantidad total de goles a favor del equipo.");
						}
					}
						
					if($gc != "-1"){
						$res16 = $mydb->query("UPDATE equipo SET GolesRecibidos = $gc WHERE Nombre = '$nombreEquipo'");
						if(!$res16){
							displayError("Total de Goles en contra","No se pudo actualizar la cantidad total de goles en contra del equipo.");
						}
					}
						
					if($amarillas != "-1"){
						$res17 = $mydb->query("UPDATE equipo SET Amarillas = $amarillas WHERE Nombre = '$nombreEquipo'");
						if(!$res17){
							displayError("Total de Tarjetas amarillas","No se pudo actualizar la cantidad total de tarjetas amarillas del equipo.");
						}
					}
						
					if($expulsiones1 != "-1"){
						$res18 = $mydb->query("UPDATE equipo SET Expulsiones1 = $expulsiones1 WHERE Nombre = '$nombreEquipo'");
						if(!$res18){
							displayError("Total de Expulsiones 5\'","No se pudo actualizar la cantidad total de expulsiones de 5 minutos del equipo.");
						}
					}
						
					if($expulsiones2 != "-1"){
						$res19 = $mydb->query("UPDATE equipo SET Expulsiones2 = $expulsiones2 WHERE Nombre = '$nombreEquipo'");
						if(!$res19){
							displayError("Total de Expulsiones","No se pudo actualizar la cantidad total de expulsiones del equipo.");
						}
					}
					
					$res20 = $mydb->query('UPDATE equipo SET Historial = "' . $historial .'" WHERE Nombre = "' .$nombreEquipo . '"');
					if(!$res20){
						displayError("Historial del equipo","No se pudo actualizar el historial del equipo.");
					}
					
					$res21 = $mydb->query('UPDATE equipo SET Creacion = "' . $fecha .'" WHERE Nombre = "' .$nombreEquipo . '"');
					if(!$res21){
						displayError("Fecha del equipo","No se pudo actualizar la fecha en la cual se creó el equipo.");
					}
					
					return $res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7 && $res8 && $res9 && $res10 && $res11 && $res12 && $res13 && $res14 && $res15 && $res16 && $res17 && $res18 && $res19 && $res20 && $res21;
				}
				else{
					return false;
				}
			}
		}
	}
}

function borrarJugador($dni,$pass){
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
				$res = $mydb->query("DELETE FROM jugadores WHERE DNI = $dni");
				return $res;
			}
		}
	}
}

function modificarJugador($dni,$pass,$NewDNI,$nombre,$equipo,$goles,$amarillas,$expulsiones1,$expulsiones2,$golesTotal,$amarillasTotal,$expulsiones1Total,$expulsiones2Total){
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
				if($res = $mydb->query("SELECT * FROM jugadores WHERE DNI = $dni")){
					$fila = $res->fetch_row();
					$NewDNI = trim($NewDNI);
					$res1 = $res2 = $res3 = $res4 = $res5 = $res6 = $res7 = true;
					$res8 = $res9 = $res10 = $res11 = $res1;
					if(($NewDNI != $dni) && (strlen($NewDNI) > 0)){
						$res1 = $mydb->query('UPDATE jugadores SET DNI=' . $NewDNI . ' WHERE DNI = ' . $dni);
						$dni = $NewDNI;
						if(!$res1){
							displayError("Nuevo DNI/LU","No se pudo actualizar el DNI/LU del jugador.");
						}
					}
						
					if($nombre != " "){
						$res2 = $mydb->query('UPDATE jugadores SET Nombre="' . $nombre . '" WHERE DNI = ' . $dni);
						if(!$res2){
							displayError("Nuevo nombre","No se pudo actualizar el nombre del jugador.");
						}
					}
						
					if($equipo != " "){
						$res3 = $mydb->query('UPDATE jugadores SET Equipo="' . $equipo . '" WHERE DNI = ' . $dni);
						if(!$res3){
							displayError("Nuevo equipo","No se pudo actualizar el equipo del jugador.");
						}
					}
	
						
					if($goles != "-1"){
						$res4 = $mydb->query("UPDATE jugadores SET Goles = $goles WHERE DNI = $dni");
						if(!$res4){
							displayError("Goles convertidos","No se pudo actualizar la cantidad de goles realizados por el jugador.");
						}
					}
							
					if($amarillas != "-1"){
						$res5 = $mydb->query("UPDATE jugadores SET Amarillas = $amarillas WHERE DNI = $dni");
						if(!$res5){
							displayError("Tarjetas amarillas","No se pudo actualizar la cantidad de tarjetas amarillas del jugador.");
						}
					}
						
					if($expulsiones1 != "-1"){
						$res6 = $mydb->query("UPDATE jugadores SET Expulsiones1 = $expulsiones1 WHERE DNI = $dni");
						if(!$res6){
							displayError("Expulsiones 5\'","No se pudo actualizar la cantidad de expulsiones de 5 minutos del jugador.");
						}
					}
						
					if($expulsiones2 != "-1"){
						$res7 = $mydb->query("UPDATE jugadores SET Expulsiones2 = $expulsiones2 WHERE DNI = $dni");
						if(!$res7){
							displayError("Expulsiones","No se pudo actualizar la cantidad de expulsiones del jugador.");
						}
					}
					
					if($golesTotal != "-1"){
						$res8 = $mydb->query("UPDATE jugadores SET Goles = $golesTotal WHERE DNI = $dni");
						if(!$res8){
							displayError("Total de goles convertidos","No se pudo actualizar la cantidad total de goles realizados por el jugador.");
						}
					}
						
					if($amarillasTotal != "-1"){
						$res9 = $mydb->query("UPDATE jugadores SET Amarillas = $amarillasTotal WHERE DNI = $dni");
						if(!$res9){
							displayError("Total de tarjetas amarillas","No se pudo actualizar la cantidad total de tarjetas amarillas del jugador.");
						}
					}
					
					if($expulsiones1Total != "-1"){
						$res10 = $mydb->query("UPDATE jugadores SET Expulsiones1 = $expulsiones1Total WHERE DNI = $dni");
						if(!$res10){
							displayError("Total de expulsiones 5\'","No se pudo actualizar la cantidad total de expulsiones de 5 minutos del jugador.");
						}
					}
					
					if($expulsiones2Total != "-1"){
						$res11 = $mydb->query("UPDATE jugadores SET Expulsiones2 = $expulsiones2Total WHERE DNI = $dni");
						if(!$res11){
							displayError("Total de expulsiones","No se pudo actualizar la cantidad total de expulsiones del jugador.");
						}
					}
						
						
						
					return $res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7&& $res8 && $res9 && $res10 && $res11;
				}
				else{
					return false;
				}
			}
		}
	}
}

?>