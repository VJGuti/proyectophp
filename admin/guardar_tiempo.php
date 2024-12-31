<?php
// Conexión a la base de datos
$conex = new mysqli('localhost', 'root', '', 'registro');

// Verificar conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Obtener datos del formulario
$nombre = trim($_POST['nombre']);
$tiempo = trim($_POST['tiempo']);
$deporte = trim($_POST['deporte']);

// Verificar si el atleta está registrado en la tabla 'datos'
$query_atleta = $conex->prepare("SELECT id FROM datos WHERE nombre = ?");
$query_atleta->bind_param('s', $nombre);
$query_atleta->execute();
$resultado_atleta = $query_atleta->get_result();

if ($resultado_atleta->num_rows > 0) {
    // Atleta registrado, obtener su ID
    $id_atleta = $resultado_atleta->fetch_assoc()['id'];

    // Verificar si el deporte está registrado en la tabla 'competencias'
    $query_deporte = $conex->prepare("SELECT id FROM datos WHERE competencia = ?");
    $query_deporte->bind_param('s', $deporte);
    $query_deporte->execute();
    $resultado_deporte = $query_deporte->get_result();

    if ($resultado_deporte->num_rows > 0) {
        // Deporte registrado, obtener su ID
        $id_deporte = $resultado_deporte->fetch_assoc()['id'];

        // Insertar tiempo en la tabla 'tiempos' con el nombre del atleta y el deporte
        $query_tiempo = $conex->prepare("INSERT INTO tiempos ( nombre,deporte, tiempo) VALUES (?, ?, ?)");
        $query_tiempo->bind_param('sss', $nombre,$deporte, $tiempo);

        if ($query_tiempo->execute()) {
            echo "Tiempo registrado correctamente para " . $nombre;
            echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
            echo "<br><a href='results.html'>Ir a Resultados</a>";
        } else {
            echo "Error al registrar el tiempo.";
            echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
            echo "<br><a href='results.html'>Ir a Resultados</a>";
        }
        $query_tiempo->close();
    } else {
        // Deporte no registrado
        echo "El deporte no está registrado.";
        echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
        echo "<br><a href='results.html'>Ir a Resultados</a>";
    }
    $query_deporte->close();
} else {
    // Atleta no registrado
    echo "El atleta no está registrado.";
    echo "<br><a href='registrar_tiempos.html'>Registrar otro tiempo</a>";
    echo "<br><a href='results.html'>Ir a Resultados</a>";
}

$query_atleta->close();
$conex->close();
?>
