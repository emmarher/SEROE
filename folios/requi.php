<?php
// Nombre de host: 127.0.0.1, nombre de usuario: tu_usuario, contraseña: tu_contraseña, bd: sakila
$mysqli = new mysqli('127.0.0.1', 'root', 'SaronRose93', 'folio');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($mysqli->connect_errno) {
    // La conexión falló. ¿Que vamos a hacer?
    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
    // No se debe revelar información delicada

    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
        // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";

        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
        exit;
    }
    // sumamos 1 al folio
    $sumfo ="UPDATE folios SET requi = requi + 1;";
    $resultsumfo = $mysqli->query($sumfo);
   // Realizar una consulta SQL
    $sql = "SELECT requi FROM folios;";
    if (!$resultado = $mysqli->query($sql)) {
        // ¡Oh, no! La consulta falló.
        echo "Lo sentimos, este sitio web está experimentando problemas.";

        // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
        // cómo obtener información del error
        echo "Error: La ejecución de la consulta falló debido a: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

$resultado = $mysqli->query($sql);
$fila =$resultado->fetch_assoc();

?>
<!DOCTYPE html>
<html>
  <body class="panel panel-body">
    <?php include("plantilla/header.php");

    ?>
    <br>
    <p class="text-center">Su folio de Requisicion es: <?php echo $fila['requi']; ?></p>
    <br>

    <p class="text-center"><a class="btn btn-danger" href="index.php">Regresar</a></p>


      <br><br><br><br><br><br><br>
<?php include("plantilla/footer.php"); ?>
  </body>
</html>
