<?php 
	session_start();
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
		<li><a href="reglamento.php"><span class="ui-icon ui-icon-note"></span>Reglamento</a></li>
		<li><a href="fotos.php"><span class="ui-icon ui-icon-image"></span>Fotos</a></li>
		<li><a href="historia.php"><span class="ui-icon ui-icon-script"></span>Historia</a></li>
		<li><a href="anteriores.php"><span class="ui-icon ui-icon-folder-open"></span>Torneos anteriores</a></li>
		<li><a href="contacto.php"><span class="ui-icon ui-icon-mail-closed"></span>Contacto</a></li>
	</ul>
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Reglamento</a></li>		
		</ul>
		<div id="tabs-1">
			<h2 class="hEquipo">Indice</h2>
			<ul class="indice">
				<a href="#req"><li>Requisitos</li></a>
				<a href="#san"><li>Sanciones</li></a>
				<a href="#sisJ"><li>Sistema de Juego</li></a>
				<a href="#sisD"><li>Sistema de Desempate</li></a>
			</ul>
		
			<br>
			<br>
			
			<h2 class="hEquipo" id="req">Requisitos</h2>
			<ol>
				<li><span>Ser alumno, docente, graduado o no docente de la Facultad de Ciencias Exactas y Naturales.</span></li>
				<li><span>No se pueden inscribir mas de 10 jugadores por equipo.</span></li>
				<li><span>Un mismo jugador no podrá jugar en 2 o más equipos por torneo, independientemente de la categoría del equipo.</span></li>
			</ol>
			
			<br>
			<br>
			
			<h2 class="hEquipo" id="san">Sanciones</h2>
			
			Los castigos, acorde a interpretación del arbitro, durante el partido seran:
			<br>
			<ol>
				<li><span>Amarilla.</span></li>
				<li><span>5 minutos fuera del campo de juego.</span></li>
				<li><span>Expulsión del partido fuera del campo de juego.El equipo del jugador sancionado no puede reemplazarlo, por ende, jugará con 4 o 3 jugadores acorde a la cantidad de jugadores presentes en el campo al momento de la sanción. Si hubiera 3 jugadores y se efectuará una sanción de 5´ o de todo el partido, el equipo sancionado perdería el partido.</span></li>
			</ol>
			
			<br>
			Las sanciones del tribunal son las siguientes:
			Una acumulación de 3 amarillas, sanción de un partido.
			Doble acumulación de 5 minutos, sanción de un partido.
			Expulsión del partido, sanción de un partido.
			
			
			<br>
			<br>
			<br>
			
			<h2 class="hEquipo" id="sisJ">Sistema de Juego</h2>
			<ol>
				<li><span>Se juegan dos tiempos de 20 minutos cada uno, con un descanso de 5 minutos entre ellos.
				El tiempo de tolerancia para el comienzo de los partidos es de 15 minutos, pasado ese tiempo, queda a disposición del arbitro la suspensión del partido.</span></li>
				<li><span>El arquero no pueda agarrar la pelota con sus manos tras pase de un compañero. Esta regla es independiente del lugar de la cancha en donde se realice el pase. Tampoco el arquero puede jugar la pelota con sus manos tras saque de lateral de un compañero. Como el arquero no puede jugar la pelota con sus manos, tras saque de lateral de un compañero, se puede jugar la pelota al area propia. Sigue siendo infracción jugar la pelota al area contraria tras saque lateral.</span></li>
				<li><span>El gol se considerará valido si la pelota es impactada por última vez en la zona delimitada por la linea de puntos y la linea de fondo rival. Gol en contra o de cabeza vale desde cualquier lugar de la cancha.</span></li>
			</ol>
			
			<br>
			<br>
			
			<h2 class="hEquipo" id="sisD">Sistema de Desempate</h2>
			<ol>
				<li><span>Resultados de los partidos jugados entre ellos.</span></li>
				<li><span>Diferencia de gol de los partidos jugados entre ellos.</span></li>
				<li><span>Mayor cantidad de goles a favor de los partidos jugados entre ellos.</span></li>
				<li><span>Menor cantidad de goles en contra de los partidos jugados entre ellos.</span></li>
				<li><span>Diferencia de gol general (de todos los partidos jugados).</span></li>
				<li><span>Mayor cantidad de goles a favor general (de todos los partidos jugados).</span></li>
				<li><span>Menor cantidad de goles en contra general (de todos los partidos jugados).</span></li>
				<li><span>Sorteo.</li>
			</ol>
			
			<br>
			
			<strong style="color:red;">Aclaración:</strong> Si un equipo no se presenta a jugar algún partido, no podrá ser favorecido por el sistema de desempate!!!
			Si un equipo no se presenta a jugar dos partidos, desciende de categoría.
		</div>
	</div>
	</div>
</body>
<?php 
	include 'footer.php';
?>
</html>