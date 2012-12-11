<?php
	session_start();
	require 'fun.php';


	$nombre = htmlspecialchars($_POST['name']);
	$pass = htmlspecialchars($_POST['password']);
	
	$nombre = stripslashes($nombre);
	$nombre = mysql_real_escape_string($nombre);
	$pass = stripslashes($pass);
	$pass = mysql_real_escape_string($pass);
	
	$mydb = conectar();
	if ($res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre' and Password='$pass'")){
		if($res->num_rows == 1){
			$_SESSION['nombre'] = $nombre;
			$_SESSION['logged'] = true;
			$st = session_status();
			header('location:index.php');
		}
		else{
			$st = session_status();
			if($st == 2){
				header('location:desloguear.php');
			}
			else{
				header('location:index.php?');
			}
		}
	}
	

?>