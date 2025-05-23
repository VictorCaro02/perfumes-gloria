<?php
session_start();
if (isset($_SESSION["rol"])) {
    header("Location:../index.php");
    exit;
}

$mostrarRegistro = false;
$registroExitoso = null;

if(isset($_POST["iniSes"])){
    $cbd = new mysqli("localhost", "root", "", "perfumes_gloria");
    if ($cbd->connect_error) {
        die("Error de conexión: " . $cbd->connect_error);
    }
    $nomusu = $_POST["usuario"];
    $contrasena = $_POST["contrasenia"];

    $query = $cbd->query("SELECT * FROM usuarios");
    if($query->num_rows > 0){
        while($fila = $query->fetch_assoc()){
            if($nomusu == $fila["nomusu"] && $contrasena == $fila["password"]){
                $_SESSION["nombre"] = $fila["nombre"];
                $_SESSION["rol"] = $fila["rol"];
                $_SESSION["email"] = $fila["email"];
                $_SESSION["usuario"] = $fila["nomusu"];
                $_SESSION["foto"] = $fila["foto"];
                $_SESSION["contrasenia"] = $fila["password"];
                header("Location: perfil.php");
                exit;
            } else {
                $errorLogin = "Usuario o contraseña incorrectos.";
            }
        }
    }
}

if (isset($_POST["crearUsu"])) {
    $mostrarRegistro = true;

    $usuario = $_POST["nuevo_usuario"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["nueva_contrasena"];
    $foto = $_FILES['foto'];

    $cbd = new mysqli("localhost", "root", "", "perfumes_gloria");
    if ($cbd->connect_error) {
        die("Error de conexión: " . $cbd->connect_error);
    }

    $usuario = $cbd->real_escape_string($usuario);
    $email = $cbd->real_escape_string($email);
    $nombre = $cbd->real_escape_string($nombre);

    $existe = $cbd->query("SELECT * FROM usuarios WHERE nomusu = '$usuario'");
    $existe2 = $cbd->query("SELECT * FROM usuarios WHERE email = '$email'");

    if ($existe->num_rows > 0) {
        $errorRegistro = "El nombre de usuario ya existe.";
    } elseif ($existe2->num_rows > 0) {
        $errorRegistro = "El correo introducido ya tiene una cuenta vinculada.";
    } else {
        // Subir imagen de perfil
        $ruta_foto = null;
        if ($foto['name']) {
            $directorio = "./images/perfiles/";
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            $nombre_archivo = uniqid() . "_" . basename($foto['name']);
            $ruta_destino = $directorio . $nombre_archivo;

            if (move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
                $ruta_foto = $ruta_destino;
            }
        }

        // Insertar usuario
        $stmt = $cbd->prepare("INSERT INTO usuarios (nomusu, password, email, rol, nombre, foto) VALUES (?, ?, ?, 'cliente', ?, ?)");
        $stmt->bind_param("sssss", $usuario, $contrasena, $email, $nombre, $ruta_foto);
        $stmt->execute();

        $_SESSION["nombre"] = $nombre;
        $_SESSION["rol"] = "cliente";
        $_SESSION["email"] = $email;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["foto"] = $ruta_foto;
        $_SESSION["contrasenia"] = $contrasena;

        $registroExitoso = true;
    }

    $cbd->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" href="./images/colonia.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
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
        .alta{
            height: 60rem;
        }
        .formulario { display: none; }
        .formulario.activo { display: block; }
        .correcto {
            display: none;
            background-color: #eaffea;
            border: 2px solid green;
            padding: 20px;
            border-radius: 8px;
            color: green;
            margin: 30px auto;
            max-width: 500px;
            text-align: center;
        }
        .correcto a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: green;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .correcto a:hover { background-color: #006400; }
        small.error {
            color: red;
            font-size: 0.9em;
            display: block;
            margin-top: 4px;
        }
        input.valido {
            border: 2px solid green;
        }
        input.invalido {
            border: 2px solid red;
        }

        #form-login{
                margin-top: 8rem;
        }

        #form-registro{
                margin-top: 4rem;
        }
    </style>
</head>
<body>
<?php require_once("./plantillas/segundo_header.php"); ?>

<div class="alta">
    <form method="post" id="form-login" class="formulario <?php echo !$mostrarRegistro ? 'activo' : ''; ?>">
        <p>Usuario</p>
        <input type="text" name="usuario">
        <p>Contraseña</p>
        <input type="password" name="contrasenia"><br>
        <input type="submit" value="Iniciar sesión" name="iniSes">
        <button type="button" onclick="mostrarFormulario('registro')">Crear usuario</button>
    </form>

    <form method="post" enctype="multipart/form-data" id="form-registro" class="formulario <?php echo $mostrarRegistro ? 'activo' : ''; ?>">
        <p>Nombre</p>
        <input type="text" name="nombre" required>

        <label>Foto de perfil:</label>
        <input type="file" name="foto"><br>

        <p>Nombre de usuario</p>
        <input type="text" name="nuevo_usuario" id="nuevo_usuario" required>
        <small class="error" id="errorUsuario"></small>

        <p>Email</p>
        <input type="email" name="email" id="email" required>
        <small class="error" id="errorEmail"></small>

        <p>Repite tu email</p>
        <input type="email" id="email2" required>
        <small class="error" id="errorEmail2"></small>

        <p>Contraseña</p>
        <input type="password" name="nueva_contrasena" id="contrasena" required>
        <small class="error" id="errorPass"></small>

        <p>Repite tu contraseña</p>
        <input type="password" id="contrasena2" required>
        <small class="error" id="errorPass2"></small>

        <p><input type="checkbox" id="acepto" required> Acepto los términos</p>
        <input type="submit" value="Crear cuenta" name="crearUsu">
        <button type="button" onclick="mostrarFormulario('login')">Iniciar sesión</button>

        <?php
        if (isset($errorRegistro)) {
            echo "<p style='color:red'>$errorRegistro</p>";
        }
        ?>
    </form>

    <div class="correcto" id="mensaje-exito">
        <p><strong>✔️ Usuario creado correctamente.</strong></p>
        <p>Bienvenido, <?php echo $_SESSION["nombre"] ?? ''; ?>. Tu cuenta ya está lista.</p>
        <a href="../index.php">Volver al inicio</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">
    emailjs.init("amuTJmaIHPIdCapqH");

    <?php if (isset($registroExitoso)): ?>
    window.addEventListener("DOMContentLoaded", () => {
        document.getElementById("form-registro").style.display = "none";
        document.getElementById("mensaje-exito").style.display = "block";

        emailjs.send("service_ld0ymgj", "template_3n8mae8", {
            nombre: "<?php echo $_SESSION['nombre']; ?>",
            email: "<?php echo $_SESSION['email']; ?>"
        }).then(res => {
            console.log("Correo enviado", res);
        }).catch(err => {
            console.error("Error al enviar correo", err);
        });
    });
    <?php endif; ?>

    function mostrarFormulario(tipo) {
        document.getElementById("form-login").classList.remove("activo");
        document.getElementById("form-registro").classList.remove("activo");

        if (tipo === "login") {
            document.getElementById("form-login").classList.add("activo");
        } else {
            document.getElementById("form-registro").classList.add("activo");
        }
    }
</script>
<script>
// Validaciones visuales en tiempo real
function validarCampo(input, errorId, tipo) {
    let mensaje = "";
    let valido = true;
    const value = input.value.trim();

    if (tipo === "email") {
        valido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
        mensaje = "El email no es válido.";
    } else if (tipo === "email2") {
        valido = value === document.getElementById("email").value;
        mensaje = "Los emails no coinciden.";
    } else if (tipo === "pass") {
        valido = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(value);
        mensaje = "Mínimo 8 caracteres, 1 mayúscula, 1 minúscula y 1 número.";
    } else if (tipo === "pass2") {
        valido = value === document.getElementById("contrasena").value;
        mensaje = "Las contraseñas no coinciden.";
    }

    const errorElem = document.getElementById(errorId);
    if (valido) {
        input.classList.add("valido");
        input.classList.remove("invalido");
        errorElem.textContent = "";
    } else {
        input.classList.remove("valido");
        input.classList.add("invalido");
        errorElem.textContent = mensaje;
    }
}

const campos = [
    { id: "email", tipo: "email", error: "errorEmail" },
    { id: "email2", tipo: "email2", error: "errorEmail2" },
    { id: "contrasena", tipo: "pass", error: "errorPass" },
    { id: "contrasena2", tipo: "pass2", error: "errorPass2" },
];

campos.forEach(campo => {
    const input = document.getElementById(campo.id);
    input.addEventListener("input", () => validarCampo(input, campo.error, campo.tipo));
    input.addEventListener("blur", () => validarCampo(input, campo.error, campo.tipo));
});
</script>

<?php require_once("./plantillas/footer.php"); ?>
</body>
</html>