<?php
	session_start();
	require 'fun.php';


	$nombre = htmlspecialchars($_POST['name']);
	$pass = htmlspecialchars($_POST['password']);
	
	$nombre = stripslashes($nombre);
// 	$nombre = mysql_real_escape_string($nombre);
	$pass = stripslashes($pass);
// 	$pass = mysql_real_escape_string($pass);
	$pass = crypt($pass,'$6$rounds=5000$a1b2c3d4e5f6g7h8$');
	$mydb = conectar();
	if ($res = $mydb->query("SELECT * FROM usuarios WHERE Nombre = '$nombre' and Password='$pass'")){
		if($res->num_rows == 1){
			$_SESSION['nombre'] = $nombre;
			$_SESSION['logged'] = true;
// 			$st = session_status();
			header('location:panel.php');
		}
		else{
// 			$st = session_status();
// 			if($st == 2){
// 				header('location:desloguear.php');
// 			}
// 			else{
// 				header('location:index.php');
// 			}
			header('location:index.php?error=1');
		}
	}
	

?>