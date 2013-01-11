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
		$( ".btnNormal" )
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
			<li><a href="#tabs-1">Buscar Equipo</a></li>		
		</ul>
		<div id="tabs-1">
		
			<form action="busqEquipo.php?busq=1" method="get">
				<label class="flabel">Equipo</label>
				<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all">
				<datalist id="equipos">
				  <?php 
				  	listaEquipos();
				  ?>
				</datalist>
				<br>
				<br>
					<input class="btnPanel" type="submit" value="Buscar">

				<input type="text" name="busq" value="1" hidden>
				
			</form>
			<br>
			
				<div style="margin-left: auto;margin-right: auto;text-align: center;display:block;">
					<a class="btnPanel" href="busqEquipo.php?busq=2">Todos</a>
				</div>
			<br>
			<?php 
				if(isset($_GET['busq'])){
					$mydb = conectar();

					if($_GET['busq'] == 1){
						$nombre = $_GET['equipo'];
						$q = "SELECT * FROM equipo WHERE Nombre = '$nombre'";
					}
					else{
						$q = "SELECT * FROM equipo";
					}
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","Categoría","Mail","<span title='Partidos Ganados'>PG</span>","<span title='Partidos Perdidos'>PP","<span title='Partidos Empatados'>E","<span title='Goles a favor'>GF","<span title='Goles en contra'>GC","Amarillas","Expulsiones 5'","Expulsiones");
						genEncabezado($encabezados);
						
						while ($fila = $res->fetch_row()){
							genFilaLink($fila,"busqEquipo.php?nombreEquipo=$fila[0]#vista");
						}
					    finalizarTabla("3");
					    $res->close();
					}
					else{
						$_GET = array();
						header('location:busqEquipo.php?error=1');
					}
				}
				
				if(isset($_GET['error'])){
					if($_GET['error'] == 1){
						displayError("Error","No se pudo encontrar el equipo.");
					}
				}
				
				if(isset($_GET['nombreEquipo'])){
					$nombre = $_GET['nombreEquipo'];
					echo '<br><h2 class="hEquipo" id="vista">Datos de <strong class="resaltado">' . $nombre  . '</strong></h2>';
					$mydb = conectar();
					$q = "SELECT * FROM equipo WHERE Nombre = '$nombre'";
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Categoría","Mail","<span title='Partidos Ganados'>PG</span>","<span title='Partidos Perdidos'>PP","<span title='Partidos Empatados'>E","<span title='Goles a favor'>GF","<span title='Goles en contra'>GC","Amarillas","Expulsiones 5'","Expulsiones","","");
						genEncabezado($encabezados);
						while ($fila = $res->fetch_row()){
							unset($fila[0]);
							$fila[] = '<a href="busqEquipo.php?accion=delEquipo#Mod"><img src="imgs/del_team.png" title="Borrar equipo"></a>';
							$fila[] = '<a href="busqEquipo.php?accion=modEquipo#Mod"><img src="imgs/mod_team.png" title="Modificar equipo"></a>';
							genFila($fila);
						}
						finalizarTabla("3");
						$res->close();
					}
						
				
					echo '<br><h2 class="hEquipo">Jugadores de <strong class="resaltado">' . $nombre  . '</strong></h2>';
					$mydb = conectar();
					$q = "SELECT * FROM jugadores WHERE Equipo = '$nombre' ORDER BY Nombre ASC";
					if($res = $mydb->query($q)){
						empezarTabla();
						$encabezados = array("Nombre","DNI/LU","Goles","Amarillas","Expulsiones 5'","Expulsiones");
						genEncabezado($encabezados);
						while ($fila = $res->fetch_row()){
							unset($fila[2]);
							genFilaLink($fila,"busqJugador.php?busq=1&nombre=$fila[0]&criterio=Y&dni=$fila[1]");
						}
						finalizarTabla("3");
						$res->close();
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