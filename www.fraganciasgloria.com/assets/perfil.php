<?php
session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: ../index.php");
    exit;
}

$nombre = $_SESSION["nombre"];
$email = $_SESSION["email"];
$usuario = $_SESSION["usuario"];
$foto = $_SESSION["foto"] ?? "images/perfiles/default.png";

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php echo $_SESSION["nombre"]?></title>
    <link rel="icon" href="./images/colonia.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontawesome/css/all.min.css">
    <script src="./js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .perfil-container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fffdf9;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      font-family: 'Poppins', sans-serif;
    }

    .perfil-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #003b7a;
    }

    .perfil-container img {
      display: block;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 20px;
      border: 2px solid #003b7a;
    }

    .perfil-container input, .perfil-container button {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .perfil-container button {
      background-color: black;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .perfil-container button:hover {
      background-color: #333;
    }

    .cerrar {
      text-align: center;
      margin-top: 20px;
    }

    .cerrar a {
      color: #003b7a;
      text-decoration: underline;
    }

    #foto{
      width: 13rem;
    }
  </style>
</head>
<body>

<?php require_once("./plantillas/segundo_header.php"); ?>

<div class="perfil-container">
  <h2>Mi perfil</h2>

  <img src="<?php echo htmlspecialchars($foto); ?>" alt="Foto de perfil">

  <form action="procesar_perfil.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" required>
    <label for="foto">Cambiar foto de perfil:</label>
    <input type="file" name="foto" id="foto" accept="image/*">
    <button type="submit" name="cambiar">Guardar cambios</button>
  </form>

  <h3 style="margin-top: 40px; text-align:center;">Cambiar contraseña</h3>
<form action="cambiar_password.php" method="POST" onsubmit="return validarPassword()">
  <input type="password" name="actual" placeholder="Contraseña actual" required>
  <input type="password" name="nueva" id="nueva" placeholder="Nueva contraseña" required>
  <input type="password" name="repetir" id="repetir" placeholder="Repite nueva contraseña" required>
  <button type="submit">Actualizar contraseña</button>
</form>

<script>
function validarPassword() {
  const nueva = document.getElementById("nueva").value;
  const repetir = document.getElementById("repetir").value;

  const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
  if (!regex.test(nueva)) {
    alert("La nueva contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.");
    return false;
  }

  if (nueva !== repetir) {
    alert("Las contraseñas no coinciden.");
    return false;
  }
  
  return true;

}
</script>


  <div class="cerrar">
    <a href="cerrar.php">Cerrar sesión</a>
  </div>
</div>

<?php require_once("./plantillas/footer.php"); ?>
</body>
</html>
