<?php
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
			$_SESSION['pass'] = $pass;
			header("location:panel.php");
		}
		else{
			header("location:index.html");
		}
	}
	

?>