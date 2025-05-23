<?php
session_start();
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../index.php");
    exit;
}

$actual = $_POST["actual"];
$nueva = $_POST["nueva"];
$repetir = $_POST["repetir"];
$usuario = $_SESSION["usuario"];
$contrasena = $_SESSION["contrasenia"];

$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
if (!preg_match($regex, $nueva)) {
    echo "<script>alert('La nueva contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.'); window.location.href='perfil.php';</script>";
    exit;
}

if ($nueva !== $repetir) {
    echo "<script>alert('Las nuevas contraseñas no coinciden.'); window.location.href='perfil.php';</script>";
    exit;
}

$cbd = new mysqli("localhost", "root", "", "perfumes_gloria");


// Verificar contraseña actual
if ($actual !== $contrasena) {
    echo "<script>alert('La contraseña actual no es correcta.'); window.location.href='perfil.php';</script>";
    exit;
}

// Actualizar contraseña
$update = $cbd->query("UPDATE usuarios SET `password` = '$nueva' WHERE nomusu = '$usuario'");

echo "<script>alert('Contraseña actualizada correctamente'); window.location.href='perfil.php';</script>";
?>
