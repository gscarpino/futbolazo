<?php 
	session_start();
	require 'fun.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>El Futbolazo - FCEN - UBA</title>
<link type="text/css" href="css/redmond/jquery-ui-1.9.2.custom.css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="fun.js"></script>

<link type="text/css" href="estilo.css" rel="stylesheet" />
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
					bValid = bValid && checkLength( password, "ContraseÃ±a", 5, 16 );
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


		
		    	      var events = [ 
		    	                    { Title: "Five K for charity", Date: new Date("25/02/2013") }, 
		    	                    { Title: "Dinner", Date: new Date("23/02/2013") }, 
		    	                    { Title: "Meeting with manager", Date: new Date("03/01/2013") }
		    	                ];

		    	                $("#datepicker").datepicker({
		    			    	      numberOfMonths: 2,
		    			    	      showButtonPanel: false,
		    	                    beforeShowDay: function(date) {
		    	                        var result = [true, '', null];
		    	                        var matching = $.grep(events, function(event) {
		    	                            return event.Date.valueOf() === date.valueOf();
		    	                        });
		    	                        
		    	                        if (matching.length) {
		    	                            result = [true, 'highlight', null];
		    	                        }
		    	                        return result;
		    	                    },
		    	                    onSelect: function(dateText) {
		    	                        var date,
		    	                            selectedDate = new Date(dateText),
		    	                            i = 0,
		    	                            event = null;
		    	                        
		    	                        while (i < events.length && !event) {
		    	                            date = events[i].Date;

		    	                            if (selectedDate.valueOf() === date.valueOf()) {
		    	                                event = events[i];
		    	                            }
		    	                            i++;
		    	                        }
		    	                        if (event) {
		    	                            alert(event.Title);
		    	                        }
		    	                    }
		    	                });

		

		
	});

	function actualizarEquip(){
		document.location.href = 'fixtureAdm.php?categoria=' + document.getElementById('categoria').value;
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
		
		<h2 class="hEquipo">En desarrollo...</h2>	
		<br>
		<br>
		<h2 class="hEquipo">Buscar equipo</h2>	
		<br>
		<form action="fixture.php?busq=1" method="post">
				<div >
				<label class="flabel" style="display: inline;">Equipo</label>
				<input type="checkbox" name="exacto" value="false" title="búsqueda exacta" class="text ui-widget-content ui-corner-all">
				</div>
				<input list="equipos" name="equipo" type="text" class="text ui-widget-content ui-corner-all" required>
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
		
		<?php 
				  	if(isset($_POST['busq'])){
						if(isset($_POST['equipo'])){
				  			$nombreEquipo = $_POST['equipo'];
				  			if($nombreEquipo != "[SIN EQUIPO]"){
					  			if(isset($_POST['exacto'])){
					  				$exacto = $_POST['exacto'];
					  			}
					  			else{
					  				$exacto = false;
					  			}
					  			if($exacto){
					  				$q = "SELECT Equipo1,Equipo2,Fecha,Hora,Estado,Comentario FROM partido WHERE Equipo1 = '$nombreEquipo' or Equipo2 = '$nombreEquipo'";
					  			}
					  			else{
					  				$q = "SELECT Equipo1,Equipo2,Fecha,Hora,Estado,Comentario FROM partido WHERE Equipo1 LIKE '%$nombreEquipo%' or Equipo2 LIKE '%$nombreEquipo%'";
					  			}
					  			$mydb = conectar();
					  			if($res = $mydb->query($q)){
									echo '<br><br>';
					  				empezarTabla();
					  				$encabezados = array("Equipo 1","Equipo 2","Fecha","Hora","Estado"," ");
					  				genEncabezado($encabezados);
					  				while ($fila = $res->fetch_row()){
										$comentario = $fila[5];
										$fila[5] = '<img src="imgs/info.png" title="' . $comentario . '">';
					  					genFila($fila);
					  				}
					  				finalizarTabla("0","");
					  				$res->close();
					  			}
					  			
				  			}
				  		}
				  	}
				  ?>
	
		
		<br>
		<h2 class="hEquipo">Partidos programados</h2>	
		<br>
		<br>

		<center><iframe src="https://www.google.com/calendar/embed?title=El%20Futbolazo&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23e3e9ff&amp;src=0umbfli6n8knqh6ael929u0jt8%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=America%2FArgentina%2FBuenos_Aires" style=" border-width:0 " width="90%" height="600px" frameborder="0" scrolling="no"></iframe>
		</center>
		<br>
		<br>
		
		</div>
		</div>
		</div>

</body>
<?php 
	include 'footer.php';
?>
</html>