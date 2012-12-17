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

function finalizarTabla(){
	echo '</tbody>';
	echo '<tfoot>';
	echo '<tr><td colspan="3">Los datos pueden llegar a ser incorrectos</td></tr>';
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
		echo '<td>' . $f . '</td>';
	}
	echo '</tr>';
}

function logueado(){
	if(!isset($_SESSION['logged'])){
		header('location:index.php');
	}
}

function agregarEquipo($nombre,$cat,$mail){
	return false;
}

?>