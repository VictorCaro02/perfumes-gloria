<?php
/*
 * 
 * TFG Víctor Caro Fernández 2025
 *
 * 
 * 
 */
    session_start();
    if(isset($_SESSION["rol"])){
        header("Location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php 
	require_once("./plantillas/segundo_header.php");
	?>
    <div class="alta">
    <form method="post">
        <p>Usuario</p>
        <input type="text" name="usuario">
        <p>Contraseña</p>
        <input type="password" name="contraseña"><br>

        <input type="submit" value="Iniciar sesión" name="iniSes">

        <?php
            if(isset($_POST["iniSes"])){
                $cbd = new mysqli("localhost", "root", "", "perfumes_gloria");
                $miconsulta = $cbd->query("SELECT * FROM usuarios");
                if($miconsulta->num_rows > 0){
                    while($fila = $miconsulta->fetch_assoc()){
                        if($fila["nomusu"] == $_POST["usuario"] && $fila["password"] == $_POST["contraseña"]){
                            $_SESSION["nombre"] = $fila["nombre"];
                            $_SESSION["rol"] = $fila["rol"];
                            header("Location:../index.php");
                            $miconsulta->free();
                            $cbd->close();
                            exit;
                        }
                    }
                }
                echo "<p style='color:red'>El usuario y/o la contraseña no son válidos</p>";
            }
        ?>
    </form>
    </div>

    <?php 
	require_once("./plantillas/footer.php");
	?>
</body>
</html>