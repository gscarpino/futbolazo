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
			<li><a href="#tabs-1">Fixture</a></li>		
		</ul>
		<div id="tabs-1">
		
		<br>
		<h2 class="hEquipo">Agregar fecha</h2>	
		<br>
		<form action="fixture.php?accion=agFecha" method="post">
				<label class="flabel" style="display:inline;">Categoria</label>
				<select name="categoria" id ="categoria" onchange="actualizarEquip()">
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
				<select name="equipo1">
					<?php 
						listaEquiposSelect($categoria);
					?>
				</select>
				<label class="flabel">Equipo 2</label>
				<select name="equipo2">
					<?php 
						listaEquiposSelect($categoria);
					?>
				</select>
				<label class="flabel">Fecha estimada</label>
				<input type="date" name="fecha" value="<?php date_default_timezone_set('America/Argentina/Buenos_Aires');echo date('Y-m-d'); ?>">
				<label class="flabel">Hora estimada</label>
				<input type="time" name="hora" value="00:00:00" required>
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
								$tiempo = 3; # segundos
								$pagina = "fixture.php";
								echo '<meta http-equiv="refresh" content="' . $tiempo . '; url=' . $pagina . '">';
							}
							else{
								displayError("Error!","No se pudo agendar el partido.");
							}
						}
					}
				}
								
			?>
		
		<br>
		<h2 class="hEquipo">Partidos programados</h2>	
		<br>
		
		<?php 
			$mydb = conectar();
			$q = 'SELECT Numero,Equipo1,Equipo2,Fecha,Hora FROM partido WHERE Estado = "Programado"';
			if($res = $mydb->query($q)){
				empezarTabla();
				$encabezados = array("Equipo 1","Equipo 2","Fecha","Hora");
				genEncabezado($encabezados);
				while($fila = $res->fetch_row()){
					$num = $fila[0];
					unset($fila[0]);
					genFila($fila);
				}
				finalizarTabla("3");
				$res->close();
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