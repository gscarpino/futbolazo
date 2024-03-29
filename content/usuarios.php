<?php
	session_start();
	require 'fun.php';
	logueado();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>El Futbolazo - FCEN - UBA</title>
<link type="text/css" href="css/redmond/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<link type="text/css" href="estilo.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="fun.js"></script>
<script type="text/javascript">

	$(function(){

		$("button").button();

		$("#tabs").tabs();

		
		$("#menu").menu({ position: { my: "left top", at:"right-25 top-20" } });

		$( document ).tooltip({
            position: {
                my: "center bottom-20",
                at: "center top",
                using: function( position, feedback ) {
                    $( this ).css( position );
                    $( "<div>" )
                        .addClass( "arrow" )
                        .addClass( feedback.vertical )
                        .addClass( feedback.horizontal )
                        .appendTo( this );
                }
            }
        });
		
		// set effect from select menu value
		$( "#btnAdmin" )
			.button()
			.click(function() {
				$( "#menuAdm" ).dialog( "open" );
			});

		$( "#btnLogOut" )
		.button();


		$( ".btnPanel" )
		.button();
			
		
		
		var name = $( "#name" ),
        password = $( "#password" ),
        allFields = $( [] ).add( name ).add( password ),
        tips = $( ".validateTips" );

	    function updateTips( t ) {
	        tips
	            .text( t )
	            .addClass( "ui-state-highlight" );
	        setTimeout(function() {
	            tips.removeClass( "ui-state-highlight", 15000 );
	        }, 500 );
	    }
	
	    function checkLength( o, n, min, max ) {
	        if ( o.val().length > max || o.val().length < min ) {
	            o.addClass( "ui-state-error" );
	            updateTips( "Length of " + n + " must be between " +
	                min + " and " + max + "." );
	            return false;
	        } else {
	            return true;
	        }
	    }
	
	    function checkRegexp( o, regexp, n ) {
	        if ( !( regexp.test( o.val() ) ) ) {
	            o.addClass( "ui-state-error" );
	            updateTips( n );
	            return false;
	        } else {
	            return true;
	        }
	    }
		
		
		
		
		$( "#menuAdm" ).dialog({
			autoOpen: false,
			height: 325,
			width: 275,
			modal: true,

			buttons: {
				"Ingresar": function(){
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					bValid = bValid && checkLength( name, "Usuario", 3, 16 );
					bValid = bValid && checkLength( password, "Contrase�a", 5, 16 );
					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						$("#formulario").submit();
						$( this ).dialog( "close" );
					}
				}, 
				"Cancelar": function() {
					$( this ).dialog( "close" );
				}
					
				}
			});
		
	});
	
	
	
	
</script>

</head>

<body>
	<?php 
		include 'login.php';
	?>
	<div class="titulo">
		<img src="imgs/titulo.png"><br>
	</div>
	
	<ul id="menu">
		<?php 
			if(isset($_SESSION['logged'])){
				echo '<li><a href="panel.php"><span class="ui-icon ui-icon-gear"></span>Panel</a></li>';
			}
		?>
		<li><a href="index.php"><span class="ui-icon ui-icon-home"></span>Inicio</a></li>
		<li><a href="novedades.php"><span class="ui-icon ui-icon-info"></span>Novedades</a></li>
		<li><a href="fixture.php"><span class="ui-icon ui-icon-calendar"></span>Fixture</a></li>
		<li><a href="#"><span class="ui-icon ui-icon-battery-0"></span>Categorias</a>
			<ul>
				<li><a href="#">Categor�a A</a>
					<ul>
						<li><a href="posiciones.php?cat=a"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=a"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=a"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=a"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a B</a>
					<ul>
						<li><a href="posiciones.php?cat=b"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=b"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=b"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=b"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a C</a>
					<ul>
						<li><a href="posiciones.php?cat=c"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=c"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=c"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=c"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a D</a>
					<ul>
						<li><a href="posiciones.php?cat=d"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=d"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=d"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=d"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
			</ul>
		</li>
		<li><a href="tribunal.php"><span class="ui-icon ui-icon-notice"></span>Tribunal de Disciplina</a></li>
		<li><a href="reglamento.php"><span class="ui-icon ui-icon-note"></span>Reglamento</a></li>
		<li><a href="fotos.php"><span class="ui-icon ui-icon-image"></span>Fotos</a></li>
		<li><a href="historia.php"><span class="ui-icon ui-icon-script"></span>Historia</a></li>
		<li><a href="anteriores.php"><span class="ui-icon ui-icon-folder-open"></span>Torneos anteriores</a></li>
		<li><a href="contacto.php"><span class="ui-icon ui-icon-mail-closed"></span>Contacto</a></li>
	</ul>
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Admins</a></li>		
		</ul>
		<div id="tabs-1">
		
		<h2 class="hEquipo">Actuales</h2>
		<br>
		<?php 
			$mydb = conectar();
			if ($res = $mydb->query("SELECT Nombre,Mail FROM usuarios")){
				empezarTabla();
				$encabezados = array("Nombre"," "," "," ");
				genEncabezado($encabezados);
				while($fila = $res->fetch_row()){
					$fila[] = '<a href="mailto:' . $fila[1] . '"><img src="imgs/mail.png" title="Enviar e-mail"></a>';
					$fila[] = '<a href="usuarios.php?accion=mod&who=' . $fila[0] . '#Mod"><img src="imgs/lapiz.png" title="Modificar admin"></a>';
					$fila[] = '<a href="usuarios.php?accion=del&who=' . $fila[0] . '#Del"><img src="imgs/basura.png" title="Borrar admin"></a>';
					echo '<tr><td>' . $fila[0] . '</td><td>' . $fila[2] . '</td><td>' . $fila[3] . '</td><td>' . $fila[4] . '</td></tr>';
				}
			    finalizarTabla("0","");
			    $res->close();
			}
		?>
		<br>
		<br>

		<h2 class="hEquipo">Agregar nuevo</h2>
		<form action="usuarios.php?accion=ag" method="post">
			<label class="flabel">Nombre</label>
			<input type="text" name="nombre" class="text ui-widget-content ui-corner-all" required>
			<label class="flabel">Password</label>
			<input type="password" name="pass" class="text ui-widget-content ui-corner-all" required>
			<label class="flabel">Mail</label>
			<input type="email" name="email" class="text ui-widget-content ui-corner-all" required>
			<br>
			<br>
			<input class="btnPanel" type="submit">
		</form>
		
		<?php 
			if(isset($_GET['accion'])){
				$accion = $_GET['accion'];
				if($accion == "ag"){
					$nombre = $_POST['nombre'];
					$pass = $_POST['pass'];
					$mail = $_POST['email'];
					if(agregarUsuario($nombre,$pass,$mail)){
						displayGreen("","Se agreg� correctamente el usuario");
						$tiempo = 4; # segundos
						$pagina = "usuarios.php"; #URL;
						echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
					}
					else{
						displayError("Error","No se pudo agregar el usuario. Compruebe que no existe antes de agregarlo.");
					}
				}
				else if($accion == "mod"){
					if(isset($_GET['who'])){
						$nombre = $_GET['who'];
						echo '<br>
						<br>
						
						<h2 class="hEquipo" id="Mod">Modificar usuario:  <strong class="resaltado">' . $nombre . '</strong></h2>
						<form action="usuarios.php?accion=mod2&nombre=' . $nombre . '" method="post">
						<label class="flabel">Anterior password</label>
						<input type="password" name="passOld" class="text ui-widget-content ui-corner-all" required>
						<label class="flabel">Nueva password</label>
						<input type="password" name="passNew" class="text ui-widget-content ui-corner-all" title="Dejar vac�o para no modificar">
						<label class="flabel">Mail</label>
						<input type="email" name="email" class="text ui-widget-content ui-corner-all" title="Dejar vac�o para no modificar">
						<br>
						<br>
						<input class="btnPanel" type="submit">
						</form>';
					}
					else{
						displayError("Error","Acci�n incompleta");
					}
				}
				else if($accion == "mod2"){
					$nombre = $_GET['nombre'];
					$passOld = $_POST['passOld'];
					$passNew = $_POST['passNew'];
					$mail = $_POST['email'];
					if(modificarUsuario($nombre,$passOld,$passNew,$mail)){
						displayGreen("","Se modific� correctamente el usuario");
						$tiempo = 4; # segundos
						$pagina = "usuarios.php"; #URL;
						echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
					}
					else{
						displayError("Error","No se pudo modificar el usuario.<br> Contrase�a err�nea.");
					}
				}
				else if($accion == "del"){
					if(isset($_GET['who'])){
						$nombre = $_GET['who'];
						echo '<br>
						<br>

						<h2 class="hEquipo" id="Del">�Est� seguro de borrar a  <strong class="resaltado">' . $nombre . '</strong> ?</h2>
						<form action="usuarios.php?accion=del2&nombre=' . $nombre . '" method="post">
						<input type="radio" name="rta" value="si"> S�
						<input type="radio" name="rta" value="no" checked> No
						<br>
						<br>
						<label class="flabel">Password (Falta implementar distintos grados para administradores)</label>
						<input type="text" name="passNew" class="text ui-widget-content ui-corner-all" disabled value="No completar, falta implementar">
						<br>
						<br>
						<input class="btnPanel" type="submit">
						</form>';
					}
					else{
						displayError("Error","Acci�n incompleta");
					}
				}
				else if($accion == "del2"){
					$rta = $_POST['rta'];
					if($rta == "si"){
						$nombre = $_GET['nombre'];
						if(borrarUsuario($nombre)){
							displayGreen("","Se borr� el usuario $nombre");
							$tiempo = 2; # segundos
							$pagina = "usuarios.php"; #URL;
							echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
						}
						else{
							displayError("Error","No se pudo borrar el usuario.");
						}
					}
					else if($rta == "no"){
						header("location:usuarios.php");
					}
				}
				else{
					displayError("Error","Acci�n no reconocida.");
				}
			}
		?>
		
		</div>
	</div>
	</div>

</body>
<?php 
	include 'footer.php';
?>
</html>