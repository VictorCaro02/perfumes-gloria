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
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar disponibilidad</title>
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
		header{
			position: static;
		}
		.alta{
			margin-top: 10rem;
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
		    $cbd = new mysqli("localhost", "root", "", "perfumes_gloria");
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

