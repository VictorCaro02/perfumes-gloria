<?php
session_start();

// Verificar si el usuario está logueado como cliente
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "cliente") {
    header("Location: ../index.php");
    exit;
}

// Preparar datos
$nombre = $_SESSION["nombre"];
$email = $_SESSION["email"];
$usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" href="./images/colonia.ico">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacta con nosotros</title>
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
    .contacto-container {
      max-width: 600px;
      margin: 60px auto;
      padding: 30px;
      background: #fffdf9;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      font-family: 'Poppins', sans-serif;
    }

    .contacto-container h2 {
      text-align: center;
      color: #003b7a;
      margin-bottom: 25px;
    }

    textarea {
      width: 80%;
      padding: 15px;
      font-size: 1rem;
      font-family: 'Poppins', sans-serif;
      border-radius: 10px;
      border: 1px solid #ccc;
      background-color: #fffdf9;
      resize: vertical;
      min-height: 150px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      transition: all 0.3s ease-in-out;
    }

    textarea:focus {
      outline: none;
      border-color: #003b7a;
      box-shadow: 0 0 8px rgba(0, 59, 122, 0.3);
      background-color: #ffffff;
    }

    button {
      background-color: black;
      color: white;
      padding: 10px 20px;
      border: none;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #333;
    }

    .exito {
      background-color: #eaffea;
      color: green;
      text-align: center;
      padding: 20px;
      border-radius: 8px;
      border: 2px solid green;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<?php require_once("./plantillas/segundo_header.php"); ?>

<div class="contacto-container">
  <h2>¿Quieres enviarnos un mensaje?</h2>
  <form id="form-contacto">
    <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>
    <button type="submit">Enviar mensaje</button>
  </form>

  <div id="exito" class="exito" style="display:none;">
    <p>✅ Tu mensaje ha sido enviado con éxito.</p>
    <p>Nos pondremos en contacto contigo lo antes posible.</p>

    <form id="form-descarga" action="descargar_justificante.php" method="POST" style="margin-top:20px;">
      <input type="hidden" name="nombre" id="nombre-pdf">
      <input type="hidden" name="usuario" id="usuario-pdf">
      <input type="hidden" name="email" id="email-pdf">
      <input type="hidden" name="mensaje" id="mensaje-pdf">
      <input type="hidden" name="fecha" id="fecha-pdf">
      <button type="submit">📄 Descargar justificante</button>
    </form>
  </div>
</div>

<!-- EmailJS -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script>
  emailjs.init("amuTJmaIHPIdCapqH");

  document.getElementById("form-contacto").addEventListener("submit", function(e) {
    e.preventDefault();

    const mensaje = document.getElementById("mensaje").value;
    const fecha = new Date().toLocaleString("es-ES", { dateStyle: "full", timeStyle: "short" });

    const datos = {
      nombre: "<?php echo $nombre; ?>",
      usuario: "<?php echo $usuario; ?>",
      email: "<?php echo $email; ?>",
      mensaje: mensaje,
      fecha: fecha
    };

    emailjs.send("service_ld0ymgj", "template_v9r08ea", datos)
      .then(() => {
        return emailjs.send("service_ld0ymgj", "template_aw5iu47", datos);
      })
      .then(() => {
        document.getElementById("form-contacto").style.display = "none";
        document.getElementById("exito").style.display = "block";

        // Rellenar PDF
        document.getElementById("nombre-pdf").value = datos.nombre;
        document.getElementById("usuario-pdf").value = datos.usuario;
        document.getElementById("email-pdf").value = datos.email;
        document.getElementById("mensaje-pdf").value = datos.mensaje;
        document.getElementById("fecha-pdf").value = datos.fecha;
      })
      .catch((error) => {
        alert("Ocurrió un error al enviar tu mensaje. Intenta más tarde.");
        console.error("Error al enviar:", error);
      });
  });
</script>

<?php require_once("./plantillas/footer.php"); ?>
</body>
</html>
