<?php
// Conexión a la base de datos
$conex = new mysqli('localhost', 'root', '', 'registro');

// Verificar conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Obtener el deporte seleccionado desde la URL
$deporte = isset($_GET['deporte']) ? $_GET['deporte'] : '';

// Verificar si el deporte no está vacío
if ($deporte) {
    // Consulta para obtener los atletas, deporte y tiempo
    $query = $conex->prepare("SELECT nombre, deporte, tiempo FROM tiempos WHERE deporte = ? ORDER BY tiempo ASC");
    $query->bind_param('s', $deporte);
    $query->execute();
    $resultado = $query->get_result();

    // Crear un array para almacenar los resultados
    $resultados = [];
    while ($row = $resultado->fetch_assoc()) {
        $resultados[] = $row;
    }

    // Devolver los resultados en formato JSON
    echo json_encode($resultados);
} else {
    echo json_encode([]);
} 

// Cerrar la conexión
$conex->close();
?>
