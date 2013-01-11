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
		<li><a href="reglamento.php"><span class="ui-icon ui-icon-note"></span>Reglamento</a></li>
		<li><a href="fotos.php"><span class="ui-icon ui-icon-image"></span>Fotos</a></li>
		<li><a href="historia.php"><span class="ui-icon ui-icon-script"></span>Historia</a></li>
		<li><a href="anteriores.php"><span class="ui-icon ui-icon-folder-open"></span>Torneos anteriores</a></li>
		<li><a href="contacto.php"><span class="ui-icon ui-icon-mail-closed"></span>Contacto</a></li>
	</ul>
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Jugadores</a></li>		
		</ul>
		<div id="tabs-1">
		
		<fieldset>
			<h2 class="hEquipo">Buscar jugadores</h2>
			<form action="busqJugador.php" method="get">
				<label class="flabel">Nombre</label>
				<input list="equipos" name="nombre" type="text" class="text ui-widget-content ui-corner-all">
				<br>
				<br>
				<input type="radio" value="Y" name="criterio" checked> Y <input type="radio" value="O" name="criterio"> O
				
				<label class="flabel">DNI/LU</label>
				<input list="equipos" name="dni" type="text" class="text ui-widget-content ui-corner-all">
				<br>
				<br>
				
				<input type="text" name="busq" value="1" hidden>
				
				<input class="btnPanel" type="submit" value="Buscar">
			</form>
			<br>
			<div style="margin-left: auto;margin-right: auto;text-align: center;display:block;">
				<a class="btnPanel" href="jugadores.php?busq=2">Todos</a>
			</div>
			<br>
			<?php
				if(isset($_GET['busq'])){
					if($_GET['busq'] == 1){
						$nombre = $_GET['nombre'];
						$dni = $_GET['dni'];
						$criterio = $_GET['criterio'];
						$mydb = conectar();
						
						if($criterio == "Y"){
							$q = "SELECT * FROM jugadores WHERE Nombre = '$nombre' and DNI = '$dni'";
						}
						else{
							$q = "SELECT * FROM jugadores WHERE Nombre = '$nombre' or DNI = '$dni'";
						}

						if ($res = $mydb->query($q)){
							empezarTabla();
							$encabezados = array("Nombre","DNI/LU","Equipo","Goles","Faltas");
							genEncabezado($encabezados);
							if($res->num_rows > 0){
								$fila = $res->fetch_row();
								genFila($fila);
							}
						    finalizarTabla("3");
						    $res->close();
						}
						else{
							$_GET = array();
							header('location:busqJugador.php?error=1');
						}
					}
					if($_GET['busq'] == 2){
						$mydb = conectar();
						if ($res = $mydb->query("SELECT * FROM jugadores")){
							empezarTabla();
							$encabezados = array("Nombre","DNI/LU","Equipo","Goles","Faltas");
							genEncabezado($encabezados);
							while ($fila = $res->fetch_row()){
								genFila($fila);
							}
							finalizarTabla("3");
							$res->close();
						}
						else{
							$_GET = array();
							header('location:agJugador.php?error=1');
						}
					}
				}
				
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						displayError("Error","No se pudo encontrar el jugador.");
					}
				}
				
			?>
			<br>
			<br>
			</fieldset>
				
			<br>	
			<fieldset>
			<h2 class="hEquipo">Agregar jugador</h2>
			<br>
			<form action="agJugador.php?sent=1" method="post">
				<label class="flabel">Nombre</label>
				<input type="text" name="nombre" class="text ui-widget-content ui-corner-all">
				<label class="flabel">DNI/LU</label>
				<input type="text" name="dni" class="text ui-widget-content ui-corner-all">
				<label class="flabel">Equipo</label>
				<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all">
				<datalist id="equipos">
				<?php 
					listaEquipos();
				?>
				</datalist>
				<br>
				<br>
				<input class="btnPanel" type="submit">
			</form>
			<?php 
				if(isset($_GET['sent'])){
					if($_GET['sent'] == 1){
						$jNombre = $_POST['nombre'];
						$jDni = $_POST['dni'];
						$jEquip = $_POST['equipo'];
						if(agregarJugador($jNombre,$jDni,$jEquip)){
							displayGreen("","Se agregó correctamente el jugador");
						}
						else{
							$_GET = array();
							header('location:agJugador.php?error=1');
						}
					}
				}
				
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						displayError("Error","No se pudo agregar el jugador.");
					}
				}
				
			?>
			
			<br>
			</fieldset>
		</div>
	</div>
	</div>

</body>
<?php 
	include 'footer.php';
?>
</html>