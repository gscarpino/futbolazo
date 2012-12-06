<?php
require 'fun.php';

$cat = $_GET["cat"];

$mydb = conectar();


if ($res = $mydb->query("SELECT * FROM goleadores WHERE Categoria = '$cat'")){
    /* obtener el array de objetos */
    while ($fila = $res->fetch_row()){
        echo $fila[1] . ": " . $fila[2];
  		echo "<br />";
    }

    /* liberar el conjunto de resultados */
    $res->close();
}

/* cerrar la conexión */
$mydb->close();

?>