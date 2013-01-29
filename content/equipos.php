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

	num=1;
	function agregarCampos(obj) {
	  num++;
	  fi = document.getElementById('fiel');

	  contenedor = document.createElement('div');
	  contenedor.id = 'div'+num; 
	  contenedor.innerHTML = '<br>';
	  fi.appendChild(contenedor);

	  ele = document.createElement('strong');
	  ele.className = 'resaltado';
	  ele.style.fontSize='100%';
	  ele.innerHTML = 'Jugador '+ num +'<span style="padding-left: 15px;padding-right: 15px;"><img name="div' + num +'" onclick="BorrarCampos(this.name)" src="imgs/minus.png"  width="16" height="16" title="Haga click para eliminar el jugador"></span>';
	  contenedor.appendChild(ele);
	  
	  ele = document.createElement('label');
	  ele.className = 'flabel';
	  ele.innerHTML = 'Nombre';
	  contenedor.appendChild(ele);

	  ele = document.createElement('input');
	  ele.type = 'text';
	  ele.name = 'nombre'+num;
	  ele.className = 'text ui-widget-content ui-corner-all';
	  contenedor.appendChild(ele);

	  ele = document.createElement('label');
	  ele.className = 'flabel';
	  ele.innerHTML = 'DNI/LU';
	  contenedor.appendChild(ele);

	  ele = document.createElement('input');
	  ele.type = 'text';
	  ele.name = 'dni'+num;
	  ele.className = 'text ui-widget-content ui-corner-all';
	  contenedor.appendChild(ele);

	}
	
	function BorrarCampos(obj) {
	  fi = document.getElementById('fiel');
	  fi.removeChild(document.getElementById(obj));
	}
	
	
	
	
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
			<li><a href="#tabs-1">Equipos</a></li>		
		</ul>
		<div id="tabs-1">
		
		<br>
		<br>
		<fieldset>
		<h2 class="hEquipo">Buscar equipos</h2>	
		
		<form action="equipos.php?busq=1" method="get">
				<div >
				<label class="flabel" style="display: inline;">Equipo</label>
				<input type="checkbox" name="exacto" value="false" title="búsqueda exacta" class="text ui-widget-content ui-corner-all">
				</div>
				<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all">
				<datalist id="equipos">
				  <?php 
				  	listaEquipos();
				  ?>
				</datalist>
				<br>
				<br>
					<input class="btnPanel" type="submit" value="Buscar">

				<input type="text" name="busq" value="1" hidden="true">
				
			</form>
			<br>
			
				<div style="margin-left: auto;margin-right: auto;text-align: center;display:block;">
					<a class="btnPanel" href="equipos.php?busq=2">Todos</a>
				</div>
			<br><br>
			<?php 
				if(isset($_GET['busq'])){
					$mydb = conectar();

					if($_GET['busq'] == 1){
						$nombre = $_GET['equipo'];
						$nombre = strtoupper($nombre);
						$nombre = strip_tags($nombre);
						$nombre = trim ($nombre);
						if(isset($_GET['exacto'])){
							$exacto = $_GET['exacto'];
						}
						else{
							$exacto = false;
						}
						if($exacto){
							$q = "SELECT Nombre,Categoria,Mail FROM equipo WHERE Nombre = '$nombre' and Nombre != '[SIN EQUIPO]'";
						}
						else{
							$q = "SELECT Nombre,Categoria,Mail FROM equipo WHERE Nombre LIKE '%$nombre%' and Nombre != '[SIN EQUIPO]'";
						}
					}
					else{
						$q = "SELECT Nombre,Categoria,Mail FROM equipo WHERE Nombre != '[SIN EQUIPO]'";
					}
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","Categoría","Mail");
						genEncabezado($encabezados);
						while ($fila = $res->fetch_row()){
							genFilaLink($fila,"equipos.php?nombreEquipo=$fila[0]#vista");
						}
					    finalizarTabla("0","");
					    $res->close();
					}
					else{
						$_GET = array();
						header('location:equipos.php?error=1');
					}
				}
				
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						displayError("Error","No se pudo encontrar el equipo.");
					}
				}
				
				if(isset($_GET['nombreEquipo'])){
					$nombreEquipo = $_GET['nombreEquipo'];
					echo '<br><h2 class="hEquipo" id="vista">Datos del equipo</h2><br>';
					$mydb = conectar();
					$q = "SELECT * FROM equipo WHERE Nombre = '$nombreEquipo'";
					if($res = $mydb->query($q)){

						$fila = $res->fetch_row();
						$mailEquipo = $fila[2];
						$catEquipo = $fila[1];
						$fechaEquipo = $fila[20];
						$historialEquipo = $fila[19];
						$estadoEquipo = $fila[21];
						if ($estadoEquipo == "Inactivo"){
							echo '<span class="resaltado2">Nombre: </span><strong class="resaltado" style="color:#2E6E9E;">' . $nombreEquipo . '</strong> (Inactivo)<br><br>';
						}
						else{
							echo '<span class="resaltado2">Nombre: </span><strong class="resaltado" style="color:#2E6E9E;">' . $nombreEquipo . '</strong><br><br>';
						}
						echo '<span class="resaltado2">Categoría: </span>' . $catEquipo . '<br><br>';
						echo '<span class="resaltado2">Fecha creación: </span>' . $fechaEquipo . '<br><br>';
						echo '<span class="resaltado2">E-Mail: </span>' . $mailEquipo . '<br><br><br>';
						empezarTabla();
						$encabezados = array("<span title='Partidos Ganados'>PG</span>","<span title='Partidos Perdidos'>PP</span>","<span title='Partidos Empatados'>E</span>","<span title='Goles a favor'>GF</span>","<span title='Goles en contra'>GC</span>","Amarillas","<span title='Expulsiones de 5 min.'>Exp. 5'</span>","<span title='Expulsiones'>Exp.</span>","<span title='Partidos Ganados Total'>PGT</span>","<span title='Partidos Perdidos Total'>PPT</span>","<span title='Partidos Empatados Total'>ET</span>","<span title='Goles a favor Total'>GFT</span>","<span title='Goles en contra Total'>GCT</span>","Amarillas Total","<span title='Total de expulsiones de 5 min.'>Exp. 5' Total</span>","<span title='Total de expulsiones'>Exp. Total</span>","","");
						genEncabezado($encabezados);
						unset($fila[0]);
						unset($fila[1]);
						unset($fila[2]);
						unset($fila[19]);
						unset($fila[20]);
						unset($fila[21]);
						$fila[] = '<a href="equipos.php?nombreEquipo=' . $nombreEquipo .'&accion=modEquipo#Mod"><img src="imgs/mod_team.png" title="Modificar equipo"></a>';
						$fila[] = '<a href="equipos.php?nombreEquipo=' . $nombreEquipo .'&accion=delEquipo#Del"><img src="imgs/del_team.png" title="Borrar equipo"></a>';
						genFila($fila);

						finalizarTabla("18","Los datos pueden no ser correctos.");
						$res->close();
					}
						
				
					echo '<br><h2 class="hEquipo">Jugadores de <strong class="resaltado">' . $nombreEquipo  . '</strong></h2><br><br>';
					$mydb = conectar();
					$q = "SELECT Nombre,DNI FROM jugadores WHERE Equipo = '$nombreEquipo' ORDER BY Nombre ASC";
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","DNI/LU");
						genEncabezado($encabezados);
						while ($fila = $res->fetch_row()){
							$fila[] = '<a href="equipos.php?nombreEquipo=' . $nombreEquipo . '&accion=sacar&nombre=' . $fila[0] . '&who=' . $fila[1] . '#Sacar"><img src="imgs/throw_player.png" title="Remover jugador del equipo"></a>';
							genFilaLink($fila,"jugadores.php?jug=$fila[1]#vista");
						}
						finalizarTabla("0","");
						$res->close();
					}
					
					echo '<br><h2 class="hEquipo">Historial del equipo</h2>';
					if(strlen($historialEquipo) > 0){
						$acontecimientos = explode(";",$historialEquipo);
						
						echo '<ul>';
						foreach($acontecimientos as $a){
							echo '<li>' . $a . '</li><br>';
						}
						echo '</ul>';
					}
					else{
						echo 'Historial vacío.';
					}
				}
				
				
				if(isset($_GET['accion'])){
					$accion = $_GET['accion'];
					if($accion == "sacar"){
						if(isset($_GET['who'])){
							$who = $_GET['who'];
							$nombre = $_GET['nombre'];
							$nombreEquipo = $_GET['nombreEquipo'];
							echo '<br><h2 class="hEquipo" id="Sacar">¿Está seguro de sacar del equipo a  <strong class="resaltado">' . $nombre . '</strong> ?</h2>
							<form action="equipos.php?nombreEquipo=' . $nombreEquipo . '&accion=sacar2#vista" method="post">
							<input type="radio" name="rta" value="si"> Sí
							<input type="radio" name="rta" value="no" checked> No
							<br>
							<br>
							<label class="flabel">Password</label>
							<input type="password" name="pass" class="text ui-widget-content ui-corner-all" style="width:100%">
							<br>
							<br>
							<input type="text" name="who" value="' . $who .'" hidden>
							<input type="text" name="nombre" value="' . $nombre .'" hidden>
							<input class="btnPanel" type="submit">
							</form>';
						}
						else{
							displayError("Error","Acción incompleta");
						}
					}
					if($accion == "sacar2"){
						$rta = $_POST['rta'];
						$nombreEquipo = $_GET['nombreEquipo'];
						if($rta == "si"){
							$who = $_POST['who'];
							$nombre = $_POST['nombre'];
							$pass = $_POST['pass'];
							if(sacarJugadorDeEquipo($who,$pass)){
								displayGreen("","Se quito el jugador $nombre del equipo");
								$tiempo = 3; # segundos
								$pagina = "equipos.php?nombreEquipo=" . $nombreEquipo . "#vista"; #URL;
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error","No se pudo quitar al jugador del equipo.<br> Contraseña errónea.");
							}
						}
						else if($rta == "no"){
							header("location:equipos.php?nombreEquipo=" . $nombreEquipo . "#vista");
						}
					}
					if($accion == "delEquipo"){
						$nombreEquipo = $_GET['nombreEquipo'];
						echo '<br><h2 class="hEquipo" id="Del"><span class="resaltado">¿Está seguro de borrar permanentemente al equipo?</span></h2>
						<br><span class="resaltado">Ten en cuenta que los jugadores pertenecientes al equipo no se borrarán pero no pertenecerán a ningún equipo.</span>
						<form action="equipos.php?nombreEquipo=' . $nombreEquipo . '&accion=delEquipo2#vista" method="post">
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
						$nombreEquipo = $_GET['nombreEquipo'];
						$rta = $_POST['rta'];
						if($rta == "si"){
							$pass = $_POST['pass'];
							if(borrarEquipo($nombreEquipo,$pass)){
								displayGreen("","Se borró permanentemente el equipo $nombreEquipo");
								$tiempo = 3; # segundos
								$pagina = "equipos.php"; #URL;
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error","No se pudo borrar al equipo.<br> Contraseña errónea.");
							}
						}
						else if($rta == "no"){
							header("location:equipos.php?nombreEquipo=" . $nombreEquipo . "#vista");
						}
					}
					if($accion == "modEquipo"){
						$nombreEquipo = $_GET['nombreEquipo'];
						$mydb = conectar();
						$q = "SELECT * FROM equipo WHERE Nombre = '$nombreEquipo'";
						if($res = $mydb->query($q)){
							$info = $res->fetch_row();
							$historial = $info[19];
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
							<br>
							<table style="width:100%;text-align: center;border-collapse:collapse;">
							<tr>
							<td colspan="8" style="text-align: left"><br>Actuales</td>
							</tr>
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
							<input type="number" name="pgActuales" value="' . $info[3] .'" min="0" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="ppActuales" min="0" value="' . $info[4] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="empActuales" min="0" style="width:40px;" value="' . $info[5] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gfActuales" min="0" value="' . $info[6] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gcActuales" min="0" value="' . $info[7] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="amarillasActuales" min="0" value="' . $info[8] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones1Actuales" min="0" value="' . $info[9] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones2Actuales" min="0" value="' . $info[10] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							</tr>
							<tr>
							<td colspan="8" style="text-align: left"><br>Totales</td>
							</tr>
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
							<input type="number" name="pg" value="' . $info[11] .'" min="0" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="pp" min="0" value="' . $info[12] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="emp" min="0" style="width:40px;" value="' . $info[13] .'" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gf" min="0" value="' . $info[14] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="gc" min="0" value="' . $info[15] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="amarillas" min="0" value="' . $info[16] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones1" min="0" value="' . $info[17] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							<td>
							<input type="number" name="expulsiones2" min="0" value="' . $info[18] .'" style="width:40px;" class="text ui-widget-content ui-corner-all" style="width:100%">
							</td>
							</tr>
							</table>
							<br><br>
							<div>
							<label class="flabel" style="display:inline;">Historial</label><img src="imgs/doubt.png" width="16" height="16" title="Formato: Se separa los hechos por \'\';\'\' <br>Ej: HECHO A;HECHO B;HECHO C" style="padding-left:4px;">
							</div>
							<textarea name="historial" class="text ui-widget-content ui-corner-all" rows="5" style="width:100%;">' . $historial . '</textarea>
							<label class="flabel">Fecha de creación</label>
							<input type="date" name="fecha" value="' . $info[20] .'" class="text ui-widget-content ui-corner-all">
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
						if(isset($_POST['historial'])){
							$historial = $_POST['historial'];
						}
						else{
							$historial = "";
						}
						if(isset($_POST['fecha'])){
							$fecha = $_POST['fecha'];
						}
						else{
							date_default_timezone_set('America/Argentina/Buenos_Aires');
							$fecha = date('Y-m-d');;
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
						if(isset($_POST['pgActuales'])){
							$pgActuales = $_POST['pgActuales'];
						}
						else{
							$pgActuales = -1;
						}
						if(isset($_POST['ppActuales'])){
							$ppActuales = $_POST['ppActuales'];
						}
						else{
							$ppActuales = -1;
						}
						if(isset($_POST['empActuales'])){
							$empActuales = $_POST['empActuales'];
						}
						else{
							$empActuales = -1;
						}
						if(isset($_POST['gfActuales'])){
							$gfActuales = $_POST['gfActuales'];
						}
						else{
							$gfActuales = -1;
						}
						if(isset($_POST['gcActuales'])){
							$gcActuales = $_POST['gcActuales'];
						}
						else{
							$gcActuales = -1;
						}
						if(isset($_POST['amarillasActuales'])){
							$amarillasActuales = $_POST['amarillasActuales'];
						}
						else{
							$amarillasActuales = -1;
						}
						if(isset($_POST['expulsiones1Actuales'])){
							$expulsiones1Actuales = $_POST['expulsiones1Actuales'];
						}
						else{
							$expulsiones1Actuales = -1;
						}
						if(isset($_POST['expulsiones2Actuales'])){
							$expulsiones2Actuales = $_POST['expulsiones2Actuales'];
						}
						else{
							$expulsiones2Actuales = -1;
						}
						if(isset($_POST['pass'])){
							$pass = $_POST['pass'];
							if(modificarEquipo($nombreEquipo,$pass,$nombre,$categoria,$mail,$pgActuales,$ppActuales,$empActuales,$gfActuales,$gcActuales,$amarillasActuales,$expulsiones1Actuales,$expulsiones2Actuales,$pg,$pp,$emp,$gf,$gc,$amarillas,$expulsiones1,$expulsiones2,$fecha,$historial)){
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
			<br><br>
			</fieldset>
					<br>
		<br>
			
		<fieldset>

		<?php 
			if(isset($_GET['sent'])){
				if($_GET['sent'] == 1){
					$eNombre = $_POST['nombre'];
					$eCategoria = $_POST['categoria'];
					$eMail = $_POST['mail'];
					if(agregarEquipo($eNombre,$eCategoria,$eMail)){
						displayGreen("","Se agregó correctamente el equipo");
					}
					else{
						displayError("Error","El equipo ya existe.");
					}
				}
			}
			
			if(isset($_GET['error'])){
				if($_GET['error'] == 1){
					displayError("Error","No se pudo agregar el equipo.");
				}
			}
		?>
		<h2 class="hEquipo">Agregar equipo</h2>

		
			<form action="equipos.php?sent=1" method="post">
				<label class="flabel">Nombre</label>
				<input type="text" name="nombre" class="text ui-widget-content ui-corner-all">
				<label class="flabel">Categoría</label>
				<select name="categoria" class="text ui-widget-content ui-corner-all">
					<option value="A" selected>A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				</select>
				<label class="flabel">Mail</label>
				<input type="email" name="mail" class="text ui-widget-content ui-corner-all">
				<br>
				<br>		
				<br>
				<div id="fiel">
					<h2 class="hEquipo" style="font-size: 120%;">Agregar jugadores nuevos al equipo  <span style="padding-left: 10px;" onclick="agregarCampos(this)" ><img src="imgs/plus.png"  width="16" height="16" title="Haga click para agregar un jugador más"></span></h2>
					<br>
					<br>
					<div id="div1">
						<strong class="resaltado" style="font-size: 100%;">Jugador 1<span style="padding-left: 15px;padding-right: 15px;"><img name="div1" onclick="BorrarCampos(this.name)" src="imgs/minus.png" width="16" height="16" title="Haga click para eliminar el jugador"></span></strong>
						<label class="flabel">Nombre</label>
						<input type="text" name="nombre1" class="text ui-widget-content ui-corner-all">
						<label class="flabel">DNI/LU</label>
						<input type="text" name="dni1" class="text ui-widget-content ui-corner-all">
					</div>
				</div>
				<br>
				<br>
				<input class="btnPanel" type="submit">
			</form>
		</fieldset>
		
		
		</div>
	</div>
	</div>

</body>
<?php 
	include 'footer.php';
?>
</html>