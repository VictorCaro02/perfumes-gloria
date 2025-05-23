<?php
header("Content-Type: application/json");

$mysqli = new mysqli("localhost", "root", "", "perfumes_gloria");
$term = trim($_GET['term'] ?? '');
$sugerencias = [];

if (!empty($term)) {
    $stmt = $mysqli->prepare("
        SELECT nombre FROM fragancias WHERE nombre LIKE CONCAT('%', ?, '%')
        UNION
        SELECT marca FROM fragancias WHERE marca LIKE CONCAT('%', ?, '%')
        LIMIT 10
    ");
    $stmt->bind_param("ss", $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($fila = $result->fetch_assoc()) {
        $sugerencias[] = $fila['nombre'] ?? $fila['marca'];
    }

    $stmt->close();
}

echo json_encode($sugerencias);
?>
