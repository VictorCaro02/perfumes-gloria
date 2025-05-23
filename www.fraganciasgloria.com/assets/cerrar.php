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
<!DOCTYPE html>
<html lang="es">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<link rel="icon" href="./images/colonia.ico">
	<title>Cerrado de sesión</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
</head>

<body>
	
	<?php 
	session_destroy();
	header("Location:../index.php");
	die();
	?>

</body>

</html>

