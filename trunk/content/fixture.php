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

	function actualizarEquip(){
		document.location.href = 'fixture.php?categoria=' + document.getElementById('categoria').value;
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
				<li><a href="#">Categoria A</a>
					<ul>
						<li><a href="posiciones.php?cat=a"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=a"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=a"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=a"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoria B</a>
					<ul>
						<li><a href="posiciones.php?cat=b"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=b"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=b"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=b"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoria C</a>
					<ul>
						<li><a href="posiciones.php?cat=c"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=c"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=c"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=c"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categoria D</a>
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
			<li><a href="#tabs-1">Fixture</a></li>		
		</ul>
		<div id="tabs-1">
		
		<br>
		<h2 class="hEquipo">Agregar fecha</h2>	
		<br>
		<form action="fixture.php?accion=agFecha" method="post">
				<label class="flabel" style="display:inline;">Categoria</label>
				<select name="categoria" class="text ui-widget-content ui-corner-all" id ="categoria" onchange="actualizarEquip()">
				<?php
					if(isset($_GET['categoria'])){
						$categoria = $_GET['categoria'];
						if($categoria == "A"){
							echo '<option value="A" selected>A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>';
						}
						else if($categoria == "B"){
							echo '<option value="A">A</option>
							<option value="B" selected>B</option>
							<option value="C">C</option>
							<option value="D">D</option>';
						}
						else if($categoria == "C"){
							echo '<option value="A" selected>A</option>
							<option value="A" >A</option>
							<option value="B">B</option>
							<option value="C" selected>C</option>
							<option value="D">D</option>';
						}
						else if($categoria == "D"){
							echo '<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D" selected>D</option>';
						}
						else{
							echo '<option value="A" selected>A</option>
							<option value="A" >A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>';
							$categoria = "A";
						}
					}
					else{
						echo '<option value="A" selected>A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>';
						$categoria = "A";
					}

				?>
				</select>
				<label class="flabel">Equipo 1</label>
				<select name="equipo1" class="text ui-widget-content ui-corner-all">
					<?php 
						listaEquiposSelect($categoria);
					?>
				</select>
				<label class="flabel">Equipo 2</label>
				<select name="equipo2" class="text ui-widget-content ui-corner-all">
					<?php 
						listaEquiposSelect($categoria);
					?>
				</select>
				<label class="flabel">Fecha estimada</label>
				<input type="date" name="fecha" class="text ui-widget-content ui-corner-all" value="<?php date_default_timezone_set('America/Argentina/Buenos_Aires');echo date('Y-m-d'); ?>">
				<label class="flabel">Hora estimada</label>
				<input type="time" name="hora" value="00:00:00" required class="text ui-widget-content ui-corner-all">
				<label class="flabel">Comentario (Opcional)</label>
				<textarea name="comentario" class="text ui-widget-content ui-corner-all" rows="5" style="width:100%;"></textarea>
				
				<br>
				<br>
				<input class="btnPanel" type="submit" value="Cargar">
				
			</form>
			<br><br>
			<?php 
				if(isset($_GET['accion'])){
					$accion = $_GET['accion'];
					if($accion == "agFecha"){
						$equipo1 = $_POST['equipo1'];
						$equipo2 = $_POST['equipo2'];
						if($equipo1 == $equipo2){
							displayError("Error!","El equipo 1 tiene que ser distinto al equipo 2.");
						}
						else{
							$fecha = $_POST['fecha'];
							$hora = $_POST['hora'];
							if(agregarPartido($equipo1,$equipo2,$fecha,$hora)){
								displayGreen("","Partido agregado con exito");
							}
							else{
								displayError("Error!","No se pudo agendar el partido.");
							}
						}
					}
					if(isset($_GET['num'])){
						$num = $_GET['num'];
						if($accion == "suspenderPartido"){
							echo '<h2 class="hEquipo" id="Susp">Suspender partido</h2>
							<form action="fixture.php?accion=suspenderPartido2&num=' . $num . '" method="post">
							<label class="flabel" style="display:inline;">Seguro que desea suspender el partido?</label>
							<input type="radio" name="rta" value="si"> Si
							<input type="radio" name="rta" value="no" checked> No
							<br>
							<br>
							<label class="flabel" style="display:inline;">Comentario (Opcional)</label>
							<textarea name="comentario" class="text ui-widget-content ui-corner-all" rows="5" style="width:100%;"></textarea>
							<br>
							<input class="btnPanel" type="submit" value="Suspender">
							</form>';
						}

						if($accion == "suspenderPartido2"){
							if(isset($_POST['rta'])){
								$rta = $_POST['rta'];
							}
							else{
								$rta = "no";
							}
							if(isset($_POST['comentario'])){
								$comentario = $_POST['comentario'];
							}
							else{
								$comentario = " ";
							}
							if(suspenderPartido($num,$rta,$comentario)){
								displayGreen("","Se suspendio el partido.");
							}
							else{
								displayError("Error","No se pudo suspender el partido!");
							}
						}						
						if($accion == "reanudarPartido"){
							reanudarPartido($num);
						}
						if($accion == "cancelarPartido"){
							echo '<h2 class="hEquipo" id="Canc">Cancelar partido</h2>
							<form action="fixture.php?accion=cancelarPartido2&num=' . $num . '" method="post">
							<label class="flabel" style="display:inline;">Seguro que desea cancelar el partido?</label>
							<input type="radio" name="rta" value="si"> Si
							<input type="radio" name="rta" value="no" checked> No
							<br>
							<br>
							<label class="flabel" style="display:inline;">Comentario (Opcional)</label>
							<textarea name="comentario" class="text ui-widget-content ui-corner-all" rows="5" style="width:100%;"></textarea>
							<br>
							<input class="btnPanel" type="submit" value="Cancelar">
							</form>';
						}
						
						if($accion == "cancelarPartido2"){
							if(isset($_POST['rta'])){
								$rta = $_POST['rta'];
							}
							else{
								$rta = "no";
							}
							if(isset($_POST['comentario'])){
								$comentario = $_POST['comentario'];
							}
							else{
								$comentario = " ";
							}
							if(cancelarPartido($num,$rta,$comentario)){
								displayGreen("","Se canceló el partido.");
							}
							else{
								displayError("Error","No se pudo cancelar el partido!");
							}
						}
						if($accion == "borrarPartido"){
							borrarPartido($num);
						}
					}
				}
								
			?>
		
		<br>
		<h2 class="hEquipo" id="vista">Partidos no finalizados</h2>	
		<br>
		
		<?php 
			$mydb = conectar();
			$q = 'SELECT Numero,Equipo1,Equipo2,Fecha,Hora,Estado FROM partido WHERE Estado <> "Finalizado" ORDER BY Fecha Asc';
			if($res = $mydb->query($q)){
				empezarTabla();
				$encabezados = array("Equipo 1","Equipo 2","Fecha","Hora","Estado","","","","");
				genEncabezado($encabezados);
				while($fila = $res->fetch_row()){
					$num = $fila[0];
					unset($fila[0]);
					$estadoEquipo = $fila[5];
					if($estadoEquipo == "Programado"){
						$fila[] = '<a href="fixture.php?accion=suspenderPartido&num='. $num . '#Susp"><img src="imgs/partido_suspender.png" title="Suspender partido"></a>';
					}
					if($estadoEquipo == "Suspendido"){
						$fila[] = '<a href="fixture.php?accion=reanudarPartido&num='. $num . '"><img src="imgs/partido_reanudar.png" title="Reanudar partido"></a>';
					}
					if($estadoEquipo == "Cancelado"){
						$fila[] = "";
						$fila[] = "";
					}
					else{
						$fila[] = '<a href="fixture.php?accion=cancelarPartido&num='. $num . '"><img src="imgs/partido_cancelar.png" title="Cancelar partido"></a>';
					}
					$fila[] = '<a href="fixture.php?accion=borrarPartido&num='. $num . '"><img src="imgs/partido_borrar.png" title="Eliminar partido"></a>';
					$fila[] = '<a href="fixture.php?verPartido='. $num . '&fecha=' . $fila[3] . '&hora=' . $fila[4] . '#vista"><img src="imgs/lupa.png" title="Ver info"></a>';
					
					genFila($fila);
				}
				finalizarTabla("0","");
				$res->close();
			}
			
			if(isset($_GET['verPartido'])){
				$num = $_GET['verPartido'];
				if(isset($_GET['fecha']) && isset($_GET['hora'])){
					echo '<br><br><h2 class="hEquipo" id="vista">Info adicional del partido del ' . $_GET['fecha'] . ' a las ' . $_GET['hora'] . '</h2>';
				}
				else{
					echo '<br><br><h2 class="hEquipo" id="vista">Info adicional</h2>';
				}
				if($res = $mydb->query("SELECT Comentario FROM partido WHERE Numero = $num")){
					$info = $res->fetch_row();
					echo '<br><span class="resaltado2">Comentario: </span><br>' .$info[0];	
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