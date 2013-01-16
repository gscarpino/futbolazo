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
				<input type="text" name="palabras"  class="text ui-widget-content ui-corner-all">
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
					    finalizarTabla("2");
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
					$dni = $_GET['jug'];
					echo '<br><h2 class="hEquipo" id="vista">Datos de DNI/LU  <strong class="resaltado">' . $dni  . '</strong></h2><br><br>';
					$mydb = conectar();
					$q = "SELECT * FROM jugadores WHERE DNI = $dni";
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","Equipo","Goles","Amarillas","Expulsion 5'","Expulsiones","","");
						genEncabezado($encabezados);
						
						$fila = $res->fetch_row();
						unset($fila[1]);
						$nombreEquipo = $fila[2];
						$fila[2] = '<a href="equipos.php?nombreEquipo=' . $nombreEquipo . '#vista" title="Ver equipo">'. $fila[2]. '</a>';
						$fila[] = '<a href="jugadores.php?jug=' . $dni .'&accion=modJug#Mod"><img src="imgs/mod_player.png" title="Modificar jugador"></a>';
						$fila[] = '<a href="jugadores.php?jug=' . $dni .'&accion=delJug#Del"><img src="imgs/del_player.png" title="Borrar jugador"></a>';
						genFila($fila);
						finalizarTabla("3");
						$res->close();
					}
				}
				
				
				if(isset($_GET['accion'])){
					$accion = $_GET['accion'];
					
					if($accion == "delJug"){
						$dni = $_GET['jug'];
						echo '<br><h2 class="hEquipo" id="Del"><span class="resaltado">¿Está seguro de borrar permanentemente al jugador?</span></h2>
						<form action="jugadores.php?jug=' . $dni . '&accion=delEquipo2#vista" method="post">
						<input type="radio" name="rta" value="si"> Sí
						<input type="radio" name="rta" value="no" checked> No
						<br>
						<br>
						<label class="flabel">Password</label>
						<input type="password" name="pass" class="text ui-widget-content ui-corner-all" style="width:100%">
						<br>
						<br>
						<input class="btnPanel" type="submit">
						</form>';
					}

					if($accion == "delEquipo2"){
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
					
					if($accion == "modEquipo"){
						$nombreEquipo = $_GET['nombreEquipo'];
						$mydb = conectar();
						$q = "SELECT * FROM equipo WHERE Nombre = '$nombreEquipo'";
						if($res = $mydb->query($q)){
							$info = $res->fetch_row();
							
							echo '<br><h2 class="hEquipo" id="Mod"> Edición del equipo <span class="resaltado">' . $nombreEquipo . '</span></h2>
							<form action="equipos.php?nombreEquipo=' . $nombreEquipo . '&accion=modEquipo2#vista" method="post">
							<label class="flabel">Nombre</label>
							<input type="text" value="' . $info[0] .'" name="nombre" class="text ui-widget-content ui-corner-all" style="width:100%">						
							<label class="flabel">Categoría</label>
							<select name="categoria" class="text ui-widget-content ui-corner-all">';
							if($info[1] == "A"){
								echo '<option value="A" selected>A</option>';
							}
							else{
								echo '<option value="A">A</option>';
							}
							if($info[1] == "B"){
								echo '<option value="B" selected>B</option>';
							}
							else{
								echo '<option value="B">B</option>';
							}
							if($info[1] == "C"){
								echo '<option value="C" selected>C</option>';
							}
							else{
								echo '<option value="C">C</option>';
							}
							if($info[1] == "D"){
								echo '<option value="D" selected>D</option>';
							}
							else{
								echo '<option value="D">D</option>';
							}
							
							echo '</select><label class="flabel">Mail</label>
							<input type="email" name="mail" value="' . $info[2] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							<table style="width:100%;text-align: center;border-collapse:collapse;">
							<tr>
							<td>
								<label class="flabel">Partidos Ganados</label>
							</td>
							<td>
								<label class="flabel">Partidos Perdidos</label>
							</td>
							<td>
								<label class="flabel">Empates</label>
							</td>
							<td>
							<label class="flabel">Goles a favor</label>
							</td>
							<td>
							<label class="flabel">Goles en contra</label>
							</td>
							<td>
							<label class="flabel">Amarillas</label>
							</td>
							<td>
							<label class="flabel">Expulsiones 5\'</label>
							</td>
							<td>
							<label class="flabel">Expulsiones</label>
							</td>
							</tr>
							
							<tr>
							<td>
							<input type="number" name="pg" value="' . $info[3] .'" min="0" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="pp" min="0" value="' . $info[4] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="emp" min="0" style="width:40px;" value="' . $info[5] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gf" min="0" value="' . $info[6] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gc" min="0" value="' . $info[7] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="amarillas" min="0" value="' . $info[8] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones1" min="0" value="' . $info[9] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones2" min="0" value="' . $info[10] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							</tr>
							</table>
							<label class="flabel">Password</label>
							<input type="password" name="pass" class="text ui-widget-content ui-corner-all" style="width:100%">
							<br>
							<br>
							<input class="btnPanel" type="submit">
							</form>';
						}
					}
					
					if($accion == "modEquipo2"){
						$nombreEquipo = $_GET['nombreEquipo'];
						if(isset($_POST['nombre'])){
							$nombre = $_POST['nombre'];
						}
						else{
							$nombre = $nombreEquipo;
						}

						if(isset($_POST['categoria'])){
							$categoria = $_POST['categoria'];
						}
						else{
							$categoria = "0";
						}
						if(isset($_POST['mail'])){
							$mail = $_POST['mail'];
						}
						else{
							$mail = " ";
						}
						if(isset($_POST['pg'])){
							$pg = $_POST['pg'];
						}
						else{
							$pg = -1;
						}
						if(isset($_POST['pp'])){
							$pp = $_POST['pp'];
						}
						else{
							$pp = -1;
						}
						if(isset($_POST['emp'])){
							$emp = $_POST['emp'];
						}
						else{
							$emp = -1;
						}
						if(isset($_POST['gf'])){
							$gf = $_POST['gf'];
						}
						else{
							$gf = -1;
						}
						if(isset($_POST['gc'])){
							$gc = $_POST['gc'];
						}
						else{
							$gc = -1;
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
						if(isset($_POST['pass'])){
							$pass = $_POST['pass'];
							if(modificarEquipo($nombreEquipo,$pass,$nombre,$categoria,$mail,$pg,$pp,$emp,$gf,$gc,$amarillas,$expulsiones1,$expulsiones2)){
								displayGreen("","Se modificó correctamente el equipo");
								$tiempo = 3; # segundos
								$nombre = trim($nombre);
								if(($nombre != $nombreEquipo) && (strlen($nombre) > 0)){
									$pagina = "equipos.php?nombreEquipo=" . $nombre . "#vista"; #URL;
								}
								else{
									$pagina = "equipos.php?nombreEquipo=" . $nombreEquipo . "#vista"; #URL;
								}
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error","No se pudo modificar al equipo correctamente.<br> Compruebe introducir la contraseña correcta.<br> Pudo haberse producido un error al tratar de actualizar alguno de los campos.
								<br><br><a href='equipos.php?busq=2'>Volver</a>");
							}
						}
						else{
							header("location:equipos.php?nombreEquipo=" . $nombreEquipo . "#vista");
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