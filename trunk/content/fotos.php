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
			<li><a href="#tabs-1">Fotos</a></li>
		</ul>
		<div id="tabs-1">
		<br>
			<center>
			<table>
				 <tr>
				<?php
				header('Content-type: text/html;');
				# Galería de imágenes
				# (CC) Alfonso Saavedra "Son Link"
				# Bajo GPLv3
				 
				$path = 'fotos'; # Directorio donde están las imágenes
				$limit = 12; # Cuantas imágenes se mostraran por pagina
				$limit_file = 4; # Imágenes a mostrar por linea en la tabla
				$n = 0;
				$desde;
				$hasta;
				$list = array();
				unset($list[0]);
				# Comprobamos si es un directorio y si lo es nos movemos a el
				if (is_dir($path)){
				 $dir = opendir($path);
				 # Recorremos los ficheros que hay en el directorio y cogemos solamente aquellos cuya extensión
				 # sea jpg, gif y png y la guardamos en una lista
				 while (false !== ($file = readdir($dir))) {
				  if (preg_match("#([a-zA-Z0-9_\-\s]+)\.(gif|GIF|jpg|JPG|png|PNG)#is",$file)){
				   $list[] = $file;
				  }
				 }
				 # Cerramos el directorio
				 closedir($dir);
				 # Ordenamos la lista
				 if (count($list) > 0){
				 	sort ($list);
				 }
				 # Contamos el total de elementos en la lista
				 $total = count($list);
				 $paginas = ceil($total/$limit);
				 if (!isset($_GET['pg'])){
				  $desde = 0;
				  $hasta = $desde + $limit;
				 }else if((int)$_GET['pg'] > ($paginas-1)){
				  # Si pg es mayor que el total de paginas se muestra un error
				  echo "<b>No existe esta pagina en la galería</b>
				<a href='galeria.php'>Volver a la galería</a>";
				  die();
				 }else{
				  $desde = (int)$_GET['pg'];
				 }
				 # Y generamos los enlaces con los thumbnails
				 for ($i=($desde*$limit);($i!=$total) && ($i<($desde*$limit)+$limit);$i++){
				  # Comprobamos si existe en la lista una llave con el valor actual de $i para evitar errores
				  if(array_key_exists($i, $list)){
				   echo "<td><a href='$path/$list[$i]'><img src='thumb.php?img=$path/$list[$i]' /></a>
				</td>\n";
				   $n++;
				   if ($n == $limit_file){
				    echo "</tr>\n<tr>\n";
				    $n = 0;
				   }
				  }
				 }
				}else{
				 echo "$path no es un directorio";
				}
				?>
				 </tr>
				</table>
				
				<br>
				<p id="paginas">
				<?php
				# Generamos un listado de las paginas de la galería
				for ($p = 0; $p<$paginas; $p++){
				 $pg = $p+1;
				 if ($p == $desde){
				  echo "$pg ";
				 }else{
				  echo "<a href ='?pg=$p'>$pg</a> ";
				 } 
				}?>
				</p>
				<?php echo "<br>Hay un total de $total imagen(es) en $paginas paginas(s)" ?>
				</center>
		</div>
	</div>
	</div>
</body>
<?php 
	include 'footer.php';
?>
</html>