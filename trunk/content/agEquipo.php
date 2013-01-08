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
	  ele.innerHTML = 'Jugador '+ num +'<span style="padding-left: 30px;"><img name="div' + num +'" onclick="BorrarCampos(this.name)" src="imgs/minus.png" title="Haga click para eliminar el jugador"></span>';
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
			<li><a href="#tabs-1">Agregar Equipo</a></li>		
		</ul>
		<div id="tabs-1">
		
		<?php 
				if(isset($_GET['sent'])){
					if($_GET['sent'] == 1){
						$eNombre = $_POST['nombre'];
						$eCategoria = $_POST['categoria'];
						$eMail = $_POST['mail'];
						if(agregarEquipo($eNombre,$eCategoria,$eMail)){
							displayGreen("","Se agreg� correctamente el equipo");
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
		
			<form action="agEquipo.php?sent=1" method="post">
				<label class="flabel">Nombre</label>
				<input type="text" name="nombre" class="text ui-widget-content ui-corner-all">
				<label class="flabel">Categor�a</label>
				<select name="categoria" class="text ui-widget-content ui-corner-all">
					<option value="A" selected>A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				</select>
				<label class="flabel">Mail</label>
				<input type="text" name="mail" class="text ui-widget-content ui-corner-all">
				<br>
				<br>		
				<br>
				<div id="fiel">
					<h2 class="hEquipo">Agregar jugadores al equipo  <span style="padding-left: 30px;" onclick="agregarCampos(this)" ><img src="imgs/plus.png" title="Haga click para agregar un jugador m�s"></span></h2>
					<br>
					<br>
					<div id="div1">
						<strong class="resaltado">Jugador 1<span style="padding-left: 30px;"><img name="div1" onclick="BorrarCampos(this.name)" src="imgs/minus.png" title="Haga click para eliminar el jugador"></span></strong>
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
		
		</div>
	</div>
	</div>

</body>
<?php 
	include 'footer.php';
?>
</html>