<?php
if (isset($_POST["tipo"]) && isset($_POST["valor"])) {
    $tipo = $_POST["tipo"]; // 'email' o 'usuario'
    $valor = $_POST["valor"];

    $conn = new mysqli("localhost", "root", "", "perfumes_gloria");
    if ($conn->connect_error) {
        echo "error";
        exit;
    }

    $columna = $tipo === "email" ? "email" : "nomusu";

    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE $columna = ?");
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    $stmt->store_result();

    echo $stmt->num_rows > 0 ? "existe" : "disponible";

    $stmt->close();
    $conn->close();
}
?>
