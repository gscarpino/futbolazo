<?php

function conectar(){
	$mysql = new mysqli("localhost","admin","123456","futbolazo");
	
	if ($mysql->connect_error) {
		die('Error de Conexión (' . $mysql->connect_errno . ') '
				. $mysql->connect_error);
	}

	return $mysql;
	
}

?>