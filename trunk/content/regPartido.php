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
			
		
		// set effect from select menu value
		$( "#btnAdmin" )
			.button()
			.click(function() {
				$( "#menuAdm" ).dialog( "open" );
			});

		$( "#btnLogOut" )
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
			title: "Admins",
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
			<li><a href="#tabs-1">Registrar Partido</a></li>		
		</ul>
		<div id="tabs-1" style="margin-left:auto;margin-right:auto;">
			<?php 
				if(!isset($_GET['etapa'])){
					displayError("Ingreso incorrecto!","Regrese al panel.");
				}
				else{
					$etapa = $_GET['etapa'];
					if($etapa == 0){
						echo '<h1 class="titulo">Datos generales</h1><form action="regPartido.php?etapa=1" method="post">
						<label class="flabel">Equipo 1</label>
						<input type="text" list="equipos" name="equip1" class="text ui-widget-content ui-corner-all">
						
						<label class="flabel">Equipo 2</label>
						<input type="text" list="equipos" name="equip2" class="text ui-widget-content ui-corner-all">

						<label class="flabel">Fecha</label>
						<input type="date" name="fecha" class="text ui-widget-content ui-corner-all">
						
						<label class="flabel">Número de Partido</label>
						<input type="number" name="numero" class="text ui-widget-content ui-corner-all">
						
						<label class="flabel">Comentario</label>
						<textarea name="comentario" class="text ui-widget-content ui-corner-all" rows="4" style="width:100%;"></textarea>
										
						
						';
						echo '<datalist id="equipos">';
						listaEquipos();
						echo '</datalist><br><br><input class="fsubmit" type="submit"></form>';
					}
					else if($etapa == 1){
						if(isset($_POST['equip1']) && isset($_POST['equip2'])){
							$equip1 = $_POST['equip1'];
							$equip2 = $_POST['equip2'];
							$fecha = $_POST['fecha'];
							$numero = $_POST['numero'];
							$comentario = $_POST['comentario'];
							echo '<h1 class="titulo">Goles y faltas</h1><br>';
							echo '<form action="regPartido.php?etapa=2&equip1=' . $equip1 . '&equip2=' . $equip2 . '&fecha=' . $fecha . '&numero=' . $numero . '" method="post">';
							echo '<h2 class="hEquipo">' . $equip1 . '</h2>';
							$mydb = conectar();
							if ($res = $mydb->query("SELECT Nombre,DNI FROM jugadores WHERE Equipo = '$equip1'")){
								empezarTabla();
								$encabezados = array("Nombre","DNI","Goles","Amarilla","Expulsion 5'","Expulsion");
								genEncabezado($encabezados);
								while($fila = $res->fetch_row()){
									$fila[] = '<input type="number" min="0" value="0" name="'. $fila[1] .'_Goles" style="width:40px;">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Amarilla">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Expulsion1">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Expulsion2">';
									genFila($fila);
								}
								finalizarTabla();
								$res->close();
							}
							echo '<br><h2 class="hEquipo">' . $equip2 . '</h2>';
							if ($res = $mydb->query("SELECT Nombre,DNI FROM jugadores WHERE Equipo = '$equip2'")){
								empezarTabla();
								$encabezados = array("Nombre","DNI","Goles","Amarilla","Expulsion 5'","Expulsion");
								genEncabezado($encabezados);
								while($fila = $res->fetch_row()){
									$fila[] = '<input type="number" min="0" value="0" name="'. $fila[1] .'_Goles" style="width:40px;">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Amarilla">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Expulsion1">';
									$fila[] = '<input type="checkbox" name="'. $fila[1] .'_Expulsion2">';
									genFila($fila);
								}
								finalizarTabla();
								$res->close();
							}
							echo '<textarea name="comentario" class="text ui-widget-content ui-corner-all" rows="4" style="width:100%;visibility:hidden;">' . $comentario . '</textarea>';
							echo '<br><br><input class="fsubmit" type="submit"></form>';
						}
						else{
							header("location:regPartido.php");
						}
					}
					else if($etapa == 2){
						echo 'POST:<br>';
						var_dump($_POST);
						echo '<br>GET:';
						var_dump($_GET);
					}
					else{
						echo 'error';
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