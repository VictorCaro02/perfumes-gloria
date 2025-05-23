<?php
session_start();
$usuarioOriginal = $_SESSION["usuario"];


if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../index.php");
    exit;
}

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$usuario = $_POST["usuario"];

// Guardar foto si se subió una nueva
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {
    $directorio = "images/perfiles/";
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $nombre_foto = uniqid("perfil_") . "_" . basename($_FILES["foto"]["name"]);
    $ruta_foto = $directorio . $nombre_foto;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto)) {
        $_SESSION["foto"] = $ruta_foto;
    }
    $ruta_foto = $directorio . $nombre_foto;
} else {
    $ruta_foto = $_SESSION["foto"] ?? null; // mantener la actual si no se cambia
}

// Actualizar datos en sesión
$_SESSION["nombre"] = $nombre;
$_SESSION["email"] = $email;
$_SESSION["usuario"] = $usuario;

if(isset($_POST["cambiar"])){
    $cbd = new mysqli("localhost", "root", "", "perfumes_gloria");
    if($cbd->connect_error){
      die("Error de conexión: " . $cbd->connect_error);
    }
  
    $miconsulta = $cbd->query("UPDATE `usuarios` SET `nomusu`='".$_POST["usuario"]."',`email`='".$_POST["email"]."',`nombre`='".$_POST["nombre"]."',`foto`='".$ruta_foto."' WHERE nomusu = '" .$usuarioOriginal."'");
  }

header("Location: perfil.php");
exit;
