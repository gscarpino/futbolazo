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
					bValid = bValid && checkLength( password, "Contraseña", 5, 16 );
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
	<h1 class="titulo"><b>El Futbolazo</b></h1>
	
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
				<li><a href="#">Categoría A</a>
					<ul>
						<li><a href="posiciones.php?cat=a"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=a"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=a"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=a"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoría B</a>
					<ul>
						<li><a href="posiciones.php?cat=b"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=b"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=b"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=b"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoría C</a>
					<ul>
						<li><a href="posiciones.php?cat=c"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=c"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=c"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=c"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoría D</a>
					<ul>
						<li><a href="posiciones.php?cat=d"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=d"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=d"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=d"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
			</ul>
		</li>
		<li><a href="tribunal.php"><span class="ui-icon ui-icon-notice"></span>Tribunal de Disciplina</a></li>
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
				$encabezados = array("Nombre","Acción");
				genEncabezado($encabezados);
				while($fila = $res->fetch_row()){
					$acciones = '<a href="mailto:' . $fila[1] . '"><img src="imgs/mail.png" title="Enviar e-mail"></a> | <a href="usuarios.php?accion=mod&who=' . $fila[0] . '#Mod"><img src="imgs/lapiz.png" title="Modificar usuario"></a> | <a href="usuarios.php?accion=del&who=' . $fila[0] . '"><img src="imgs/basura.png" title="Borrar usuario"></a>';
					$fila[] = $acciones;
					echo '<tr><td>' . $fila[0] . '</td><td>' . $fila[2] . '</td></tr>';
				}
			    finalizarTabla("2");
			    $res->close();
			}
		?>
		<br>
		<br>

		<h2 class="hEquipo">Agregar nuevo</h2>
		<form action="usuarios.php?accion=ag" method="post">
			<label class="flabel">Nombre</label>
			<input type="text" name="nombre" class="text ui-widget-content ui-corner-all">
			<label class="flabel">Password</label>
			<input type="password" name="pass" class="text ui-widget-content ui-corner-all" style="width:100%">
			<label class="flabel">Mail</label>
			<input type="email" name="email" class="text ui-widget-content ui-corner-all" style="width:100%">
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
						displayGreen("","Se agregó correctamente el usuario");
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
						
						<h2 class="hEquipo" id="Mod">Modificar usuario:  ' . $nombre . '</h2>
						<form action="usuarios.php?accion=mod2&nombre=' . $nombre . '" method="post">
						<label class="flabel">Anterior password</label>
						<input type="password" name="passOld" class="text ui-widget-content ui-corner-all" style="width:100%">
						<label class="flabel">Nueva password</label>
						<input type="password" name="passNew" class="text ui-widget-content ui-corner-all" style="width:100%" title="Dejar vacío para no modificar">
						<label class="flabel">Mail</label>
						<input type="email" name="email" class="text ui-widget-content ui-corner-all" style="width:100%" title="Dejar vacío para no modificar">
						<br>
						<br>
						<input class="btnPanel" type="submit">
						</form>';
					}
				}
				else if($accion == "mod2"){
					$nombre = $_GET['nombre'];
					$passOld = $_POST['passOld'];
					$passNew = $_POST['passNew'];
					$mail = $_POST['email'];
					if(modificarrUsuario($nombre,$passOld,$passNew,$mail)){
						displayGreen("","Se modificó correctamente el usuario");
					}
					else{
						displayError("Error","No se pudo modificar el usuario.<br> Contraseña errónea.");
					}
				}
				else if($accion == "del"){
					
				}
				else{
					displayError("Error","Acción no reconocida.");
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