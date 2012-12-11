
<?php
echo '<div id="admins">';
if(isset($_SESSION['logged'])){
	echo '<a id="btnLogOut" href="desloguear.php"> Desloguear</a><span class="user">Usuario: ' . $_SESSION['nombre'] . '</h3>';
}
else{
	echo '<button id="btnAdmin">admins</button>';
}
?>
	</div>
	<div id="central">
	<div id="menuAdm">
		<p class="validateTips">All form fields are required.</p>
		<form id="formulario" action="loguear.php" method="post">
		<fieldset>
			<label for="name">Usuario</label><br>
			<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all"/><br>
			<label for="password">Contraseña</label><br>
			<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
		</fieldset>
		<br>
		</form>
	</div>