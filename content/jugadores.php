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
			<form action="jugadores.php?busq=1" method="post">
				
				<label class="flabel">Buscar por</label>
				<select name="campo" class="text ui-widget-content ui-corner-all">
					<option value="nombre">Nombre</option>
					<option value="dni">DNI</option>
					<option value="equipo">Equipo</option>
				</select>
				<br>
				<br>
				<div>
				<label class="flabel" style="display: inline;">Buscar</label>
				<input type="checkbox" name="exacto" value="false" title="búsqueda exacta" class="text ui-widget-content ui-corner-all">
				</div>
				<input type="text" name="palabras"  class="text ui-widget-content ui-corner-all" required>
				<br>
				<br>		
				<input class="btnPanel" type="submit" value="Buscar">
			</form>
			<br>
			<div style="margin-left: auto;margin-right: auto;text-align: center;display:block;">
				<a class="btnPanel" href="jugadores.php?busq=2">Todos</a>
			</div>
			<br>
			
			<?php
				if(isset($_GET['busq'])){
					$mydb = conectar();

					if($_GET['busq'] == 1){
						if (isset($_POST['campo'])){
							$campo = $_POST['campo'];
						}

						if (isset($_POST['palabras'])){
							$palabras = $_POST['palabras'];
						}
						else{
							$palabras = "";
						}
						
						if (isset($_POST['exacto'])){
							$exacto = $_POST['exacto'];
						}
						else{
							$exacto = false;
						}
						
						$palabras = strtoupper($palabras);
						$palabras = strip_tags($palabras);
						$palabras = trim ($palabras);
						
						if($exacto){
							$q = "SELECT Nombre,DNI FROM jugadores WHERE $campo = '$palabras'";
						}
						else{
							$q = "SELECT Nombre,DNI FROM jugadores WHERE $campo LIKE '%$palabras%'";
						}
					}
					else{
						$q = "SELECT Nombre,DNI FROM jugadores";
					}
					
					if ($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","DNI/LU");
						genEncabezado($encabezados);
						while($fila = $res->fetch_row()){
							genFilaLink($fila,"jugadores.php?jug=$fila[1]#vista");
						}
					    finalizarTabla("0","");
					    $res->close();
					}
					else{
						$_GET = array();
						header('location:jugadores.php?error=1');
					}
				}
				
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						displayError("Error","No se pudo encontrar al jugador.");
					}
				}

				
				
				if(isset($_GET['jug'])){
					$mydb = conectar();

					$dni = $_GET['jug'];
					$q = "SELECT * FROM jugadores WHERE DNI = $dni";
					if($res = $mydb->query($q)){
						echo '<br><h2 class="hEquipo" id="vista">Datos del jugador </h2><br>';
						$fila = $res->fetch_row();
						$nombre = $fila[0];
						$nombreEquipo = $fila[2];
						echo '<span class="resaltado2">Nombre: </span> <strong class="resaltado" style="color:#2E6E9E;">' . $nombre . '</strong><br><br>';
						echo '<span class="resaltado2">DNI: </span>' . $dni . '<br><br>';
						if ($nombreEquipo == "[SIN EQUIPO]"){
							echo '<span class="resaltado2">Equipo: </span>Ninguno<br><br><br>';
						}
						else{
							echo '<span class="resaltado2">Equipo: </span>' . $nombreEquipo . '<br><br><br>';
						}
						empezarTabla();
						$encabezados = array("Goles","Amarillas","Expulsion 5'","Expulsiones","Total Goles","Total Amarillas","Total Expulsion 5'","Total Expulsiones","","");
						genEncabezado($encabezados);
						
						unset($fila[0]);
						unset($fila[1]);
						unset($fila[2]);
						$fila[] = '<a href="jugadores.php?jug=' . $dni .'&accion=modJug#Mod"><img src="imgs/mod_player.png" title="Modificar jugador"></a>';
						$fila[] = '<a href="jugadores.php?jug=' . $dni .'&accion=delJug#Del"><img src="imgs/del_player.png" title="Borrar jugador"></a>';
						genFila($fila);
						finalizarTabla("10","Los datos pueden no ser correctos.");
						$res->close();
					}
				}
				
				
				if(isset($_GET['accion'])){
					$accion = $_GET['accion'];
					
					if($accion == "delJug"){
						$dni = $_GET['jug'];
						echo '<br><h2 class="hEquipo" id="Del"><span class="resaltado">¿Está seguro de borrar permanentemente al jugador?</span></h2>
						<form action="jugadores.php?jug=' . $dni . '&accion=delJug2#vista" method="post">
						<input type="radio" name="rta" value="si"> Sí
						<input type="radio" name="rta" value="no" checked> No
						<br>
						<br>
						<label class="flabel">Password</label>
						<input type="password" name="pass" class="text ui-widget-content ui-corner-all"  required>
						<br>
						<br>
						<input class="btnPanel" type="submit">
						</form>';
					}

					if($accion == "delJug2"){
						$dni = $_GET['jug'];
						$rta = $_POST['rta'];
						if($rta == "si"){
							$pass = $_POST['pass'];
							if(borrarJugador($dni,$pass)){
								displayGreen("","Se borró permanentemente al jugador con DNI/LU $dni");
								$tiempo = 3; # segundos
								$pagina = "jugadores.php"; #URL;
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error","No se pudo borrar al jugador.<br> Contraseña errónea.");
							}
						}
						else if($rta == "no"){
							header("location:jugadores.php?jug=" . $dni . "#vista");
						}
					}
					
					if($accion == "modJug"){
						$dni = $_GET['jug'];
						$mydb = conectar();
						$q = "SELECT * FROM jugadores WHERE DNI = $dni";
						if($res = $mydb->query($q)){
							$info = $res->fetch_row();
							echo '<br><h2 class="hEquipo" id="Mod"> Edición del jugador con DNI/LU <span class="resaltado">' . $dni . '</span></h2>
							<form action="jugadores.php?jug=' . $dni . '&accion=modJug2#vista" method="post">
							<label class="flabel">Nombre</label>
							<input type="text" value="' . $info[0] .'" name="nombre" class="text ui-widget-content ui-corner-all" required>						
							<label class="flabel">DNI/LU</label>
							<input type="text" value="' . $info[1] .'" name="NewDNI" class="text ui-widget-content ui-corner-all" required>';
							
							echo '<label class="flabel">Equipo</label>
							<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all" value="' . $info[2] .'"  required>
							<datalist id="equipos">';
							listaEquipos();
							echo '</datalist>
							<table style="width:100%;text-align: center;border-collapse:collapse;">
							<tr>
							<td>
							<label class="flabel">Goles Actuales</label>
							</td>
							<td>
							<label class="flabel">Amarillas Actuales</label>
							</td>
							<td>
							<label class="flabel">Expulsiones 5\' Actuales</label>
							</td>
							<td>
							<label class="flabel">Expulsiones Actuales</label>
							</td>
							<td>
							<label class="flabel">Goles Totales</label>
							</td>
							<td>
							<label class="flabel">Amarillas Totales</label>
							</td>
							<td>
							<label class="flabel">Expulsiones 5\' Totales</label>
							</td>
							<td>
							<label class="flabel">Expulsiones Totales</label>
							</td>
							</tr>
							
							<tr>
							<td>
							<input type="number" name="goles" value="' . $info[3] .'" min="0" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="amarillas" min="0" value="' . $info[4] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones1" min="0" style="width:40px;" value="' . $info[5] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones2" min="0" value="' . $info[6] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="golesTotal" value="' . $info[7] .'" min="0" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="amarillasTotal" min="0" value="' . $info[8] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones1Total" min="0" style="width:40px;" value="' . $info[9] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones2Total" min="0" value="' . $info[10] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							</tr>
							</table>
							<label class="flabel">Password</label>
							<input type="password" name="pass" class="text ui-widget-content ui-corner-all"  required>
							<br>
							<br>
							<input class="btnPanel" type="submit">
							</form>';
						}
					}
					
					if($accion == "modJug2"){
						$dni = $_GET['jug'];
						if(isset($_POST['nombre'])){
							$nombre = $_POST['nombre'];
						}
						else{
							$nombre = " ";
						}

						if(isset($_POST['NewDNI'])){
							$NewDNI = $_POST['NewDNI'];
						}
						else{
							$NewDNI = $dni;
						}
						if(isset($_POST['equipo'])){
							$equipo = $_POST['equipo'];
						}
						else{
							$equipo = " ";
						}
						if(isset($_POST['goles'])){
							$goles = $_POST['goles'];
						}
						else{
							$goles = -1;
						}
						
						if(isset($_POST['amarillas'])){
							$amarillas = $_POST['amarillas'];
						}
						else{
							$amarillas = -1;
						}
						if(isset($_POST['expulsiones1'])){
							$expulsiones1 = $_POST['expulsiones1'];
						}
						else{
							$expulsiones1 = -1;
						}
						if(isset($_POST['expulsiones2'])){
							$expulsiones2 = $_POST['expulsiones2'];
						}
						else{
							$expulsiones2 = -1;
						}
						if(isset($_POST['golesTotal'])){
							$golesTotal = $_POST['golesTotal'];
						}
						else{
							$golesTotalTotal = -1;
						}
						
						if(isset($_POST['amarillasTotal'])){
							$amarillasTotal = $_POST['amarillasTotal'];
						}
						else{
							$amarillasTotal = -1;
						}
						if(isset($_POST['expulsiones1Total'])){
							$expulsiones1Total = $_POST['expulsiones1Total'];
						}
						else{
							$expulsiones1Total = -1;
						}
						if(isset($_POST['expulsiones2Total'])){
							$expulsiones2Total = $_POST['expulsiones2Total'];
						}
						else{
							$expulsiones2Total = -1;
						}
						if(isset($_POST['pass'])){
							$pass = $_POST['pass'];
							if(modificarJugador($dni,$pass,$NewDNI,$nombre,$equipo,$goles,$amarillas,$expulsiones1,$expulsiones2,$golesTotal,$amarillasTotal,$expulsiones1Total,$expulsiones2Total)){
								displayGreen("","Se modificó correctamente el jugador");
								$tiempo = 3; # segundos
								$nombre = trim($nombre);
								if(($NewDNI != $dni) && (strlen($NewDNI) > 0)){
									$pagina = "jugadores.php?jug=" . $NewDNI . "#vista"; #URL;
								}
								else{
									$pagina = "jugadores.php?jug=" . $dni . "#vista"; #URL;
								}
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error","No se pudo modificar al jugador correctamente.<br> Compruebe introducir la contraseña correcta.<br> Pudo haberse producido un error al tratar de actualizar alguno de los campos.
								<br><br><a href='jugadores.php?busq=2'>Volver</a>");
							}
						}
						else{
							header("location:jugadores.php?jug=" . $dni . "#vista");
						}
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
			<form action="jugadores.php?sent=1" method="post">
				<label class="flabel">Nombre</label>
				<input type="text" name="nombre" class="text ui-widget-content ui-corner-all" required>
				<label class="flabel">DNI/LU</label>
				<input type="text" name="dni" class="text ui-widget-content ui-corner-all" required>
				<label class="flabel">Equipo</label>
				<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all" required>
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
							header('location:jugadores.php?error=1');
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