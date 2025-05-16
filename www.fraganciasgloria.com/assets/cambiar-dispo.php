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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <link rel="stylesheet" href="./css/style.css">

<head>
	<title>Cambiar disponibilidad</title>
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
	<form method="post">
		<p>Indica el número de referencia de la fragancia que deseas cambiar su disponibilidad</p>
		<input type="text" name="numref">
		<input type="submit" value="Cambiar disponibilidad" name="cambiar">
        <?php 
	

	    if(isset($_POST["cambiar"])){
		    $cbd = new mysqli("localhost", "u250246282_vicmusic02", "Corayvictor2002***", "u250246282_perfumesgloria");
		    $miconsulta = $cbd->query("SELECT * FROM fragancias WHERE numref = '" .$_POST["numref"]."';");
		    if($miconsulta->num_rows > 0){
			    while($fila = $miconsulta->fetch_assoc()){
				    if($fila["numref"] == $_POST["numref"]){
						$numref = $cbd->real_escape_string($_POST["numref"]); // para mayor seguridad
						if ($fila["agotada"] == 0) {
							$miconsulta2 = $cbd->query("UPDATE `fragancias` SET `agotada`='1' WHERE `numref` = '$numref'");
							echo "<p style='color:green'>Disponibilidad cambiada con éxito</p>";
							exit;
						} else {
							$miconsulta2 = $cbd->query("UPDATE `fragancias` SET `agotada`='0' WHERE `numref` = '$numref'");
							echo "<p style='color:green'>Disponibilidad cambiada con éxito</p>";
						exit;
						}
						
				    }
			    }
		    }else{
                echo "<p style='color:red'>No se ha encontrado ninguna fragancia con ese número de referencia</p>";
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

