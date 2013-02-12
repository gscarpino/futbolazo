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
			resizable: false,
			autoOpen: false,
			title: "Admins",
			height: 325,
			width: 275,
			draggable: false,
			modal: true,
			
			buttons: {
				"Ingresar": function(){
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					bValid = bValid && checkLength( name, "Usuario", 3, 16 );
					bValid = bValid && checkLength( password, "Contrase�a", 5, 16 );
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
		<img src="imgs/titulo.png">
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
				<li><a href="#">Categor�a A</a>
					<ul>
						<li><a href="posiciones.php?cat=a"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=a"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=a"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=a"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a B</a>
					<ul>
						<li><a href="posiciones.php?cat=b"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=b"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=b"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=b"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a C</a>
					<ul>
						<li><a href="posiciones.php?cat=c"><span class="ui-icon ui-icon-grip-dotted-vertical"></span>Posiciones</a>
						<li><a href="resultados.php?cat=c"><span class="ui-icon ui-icon-clipboard"></span>Resultados</a>
						<li><a href="goleadores.php?cat=c"><span class="ui-icon ui-icon-person"></span>Goleadores</a>
						<li><a href="listanegra.php?cat=c"><span class="ui-icon ui-icon-alert"></span>Lista Negra</a>
					</ul></li>
				<li><a href="#">Categor�a D</a>
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
			<li><a href="#tabs-1">Historia</a></li>
		</ul>
		<div id="tabs-1">
			
			<h2 class="hEquipo">Un poco de historia</h2>
		
			<br>"Hurgando en los recuerdos aparecen nombres de equipos que siempre est�n ah� pero que ya no juegan m�s. Esos equipos que participaban del torneo cuando ten�a una categor�a �nica. No hab�a ascensos ni descensospero una pasi�n incomparable." (Randazzo,"Mencho" S.; 2002).<br><br> 

			El torneo empez� a jugarse 1983. <br>
			Yate - Q- Leo fue el primer Equipo en jugar desde 1985 hasta 1996 interumpido. <br>
			No podemos Olvidar a Jose "Pepe" Galante Quien organizo el 1� torneo de Exactas. <br><br>
			
			En el a�o 1995 se puso en disputa la copa Challenger, copa que denota superioridad, ya que se la adjudica aquel equipo que logra ser Campe�n de la categor�a "A" en 4 oportunidades. <br><br>
			
			La primera se la llev� "Amigovios" en 1996, despu�s de ganar los campeonatos en forma consecutiva. La segunda y Tercera se la llev� "Kurep�" en 2002 imitando al primer campe�n. <br>
			
			<br><br><h2 class="hEquipo">Equipos con historia en el Futbolazo</h2>
			 
			<br>Este cuatrimestre Las Bolas de Riemann cumple 20 a�os de participaci�n ininterrumpida en este prestigioso torneo.<br><br> 
			No Gala...Gala cumple 18 a�os, Chinga tu Madre 17 a�os, Acido un Gol 13 a�os , Blues 15 a�os y La Maquina 15 a�os ininterrumpidos de participaci�n en el torneo interno. <br><br>
			
			<br><br><h2 class="hEquipo">Los equipos que dejaron sus huellas por el Futbolazo</h2>
			<br>Cotonete, Tril Metil- Alhilo, Yate- Q-Leo, Los Constipados, Mafalda, Cachufletas, La Morsa Kadener, Guevo y Goles, Expermineitors, Comando Antibostero, Colgados del Travesa�o, Faltan Todos, Comominimo, Sp3, La vida x el fobal, Diego es inocente, Ponele Betun, La Morgue, Guada�a, El agugerito, Sexo Neutro, media Docena, Thermus acuaticus, Ataud de Corcho, Turbo, Funebreros, Las Mujeres del 1, Palito de la Selva, Alzheimer, Chin Chin Sutte, Las 4 G, Pamela Chu, Insubribles, Paro Indeterminado, Murguistas, Paren de hacerno� Gole�, Deportivo Ludo, Embolea, 5 de Promedio.<br><br> 
			A estos equipos queremos felicitarlos y agradecerles todos los momentos compartidos y la buena onda con la que siempre vinieron a jugar. <br>
		
			
		</div>
	</div>
	</div>
</body>
<?php 
	include 'footer.php';
?>
</html>