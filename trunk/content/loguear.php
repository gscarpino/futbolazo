<?php

$nombre = 'auch';
$pass = 'auch';

function main(){
	$nombre = $_POST['name'];
	$pass = htmlspecialchars($_POST['password']);
	
}


main();
echo htmlspecialchars($_POST['name']);

?>