<?php
/*
 * 
 * TFG Víctor Caro Fernández 2025
 *
 * 
 * 
 */
session_start();
if(!isset($_SESSION["rol"])){
	header("Location:iniSes.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<title>Altas de fragancias</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
	<link rel="stylesheet" href="./css/style.css">
	<style>
		header{
			position: static;
		}
	</style>
</head>

<body>
	
	<?php 
	require_once("./plantillas/segundo_header.php");
	?>
		<div class="alta">
	<h1>FORMULARIO DE ALTA DE FRAGANCIAS</h1>
	<form method="post">
	<p>Número de referencia (PXNN)</p>
	<input type="text" name="numref">
	<p>Nombre</p>
	<input type="text" name="nombre">
	<p>Marca</p>
	<input type="text" name="marca">
	<p>Género</p>
	<select name="genero" id="genero">
                <option value="mujer">Mujer</option>
				<option value="hombre">Hombre</option>
				<option value="infantil">Infantil</option>
            </select>
	<input type="submit" value="Dar de alta" name="alta">
	<?php
		if(isset($_POST["alta"])){
			$cbd = new mysqli("localhost", "u250246282_vicmusic02", "Corayvictor2002***", "u250246282_perfumesgloria");
			$miconsulta = $cbd->query("SELECT * FROM fragancias");
			if($miconsulta->num_rows >= 0){
				while($fila = $miconsulta->fetch_assoc()){
					if($fila["numref"] == $_POST["numref"]){
						echo "<p style='color:red'>Ya existe una colonia con este número de referencia</p>";
					}else{
						$miconsulta2 = $cbd->query('INSERT INTO `fragancias`(`numref`, `nombre`, `marca`, `genero`) VALUES ("'.$_POST["numref"].'","'.$_POST["nombre"].'","'.$_POST["marca"].'","'.$_POST["genero"].'")');
						echo "<p style='color:green'>Colonia añadida con éxito</p>";
						exit;
					}
				}
			}
		}
	?>
	</form>
	</div>
	
	<?php 
	require_once("./plantillas/footer.php");
	?>

	
	
	
</body>

</html>

