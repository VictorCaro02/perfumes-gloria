<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado de fragancias</title>
	<link rel="stylesheet" href="./css/style.css">
	<style>
		html { height: 100vh; }
		header { position: static; }

	</style>
</head>
<body>

<?php 
require_once("./plantillas/segundo_header.php");
echo "<br><br>";

$cbd = new mysqli("localhost", "root", "", "perfumes_gloria");

$registros_por_pagina = 10;
$pagina = isset($_GET["pagina"]) ? intval($_GET["pagina"]) : 1;
$inicio = ($pagina - 1) * $registros_por_pagina;

// Consultas separadas por género (solo fragancias no agotadas)
$consultaFem = "SELECT * FROM fragancias WHERE genero = 'mujer' AND agotada = 0 LIMIT $inicio, $registros_por_pagina";
$consultaMasc = "SELECT * FROM fragancias WHERE genero = 'hombre' AND agotada = 0 LIMIT $inicio, $registros_por_pagina";

$resultFem = $cbd->query($consultaFem);
$resultMasc = $cbd->query($consultaMasc);

// Totales solo de fragancias no agotadas
$totalFem = $cbd->query("SELECT COUNT(*) AS total FROM fragancias WHERE genero = 'mujer' AND agotada = 0")->fetch_assoc()["total"];
$totalMasc = $cbd->query("SELECT COUNT(*) AS total FROM fragancias WHERE genero = 'hombre' AND agotada = 0")->fetch_assoc()["total"];

$total_paginas = ceil(max($totalFem, $totalMasc) / $registros_por_pagina);


// Armar columnas
$femenino = "";
$masculino = "";

if ($resultFem->num_rows > 0) {
	while ($fila = $resultFem->fetch_assoc()) {
		$femenino .= "<div class='fragancia'><span class='ref'>{$fila['numref']}</span> - <span class='nombre'>{$fila['nombre']}</span> - <span class='marca'>{$fila['marca']}</span></div>";
	}
}

if ($resultMasc->num_rows > 0) {
	while ($fila = $resultMasc->fetch_assoc()) {
		$masculino .= "<div class='fragancia'><span class='ref'>{$fila['numref']}</span> - <span class='nombre'>{$fila['nombre']}</span> - <span class='marca'>{$fila['marca']}</span></div>";
	}
}
?>

<div class="alta paginacion">
	<div class="listado-fragancias">
		<div class="columna femenino">
			<div class="titulo-genero">FEMENINO</div>
			<?= $femenino ?>
		</div>
		<div class="columna masculino">
			<div class="titulo-genero">CABALLERO</div>
			<?= $masculino ?>
		</div>
	</div>

	<div class="paginacion-botones">
		<?php if($pagina > 1): ?>
			<a class="boton-pagina" href="listado.php?pagina=<?= $pagina - 1 ?>">&laquo; Anterior</a>
		<?php endif; ?>

		<?php for($i = 1; $i <= $total_paginas; $i++): ?>
			<?php if($i == $pagina): ?>
				<span class="pagina-actual"><?= $i ?></span>
			<?php else: ?>
				<a class="boton-pagina" href="listado.php?pagina=<?= $i ?>"><?= $i ?></a>
			<?php endif; ?>
		<?php endfor; ?>

		<?php if($pagina < $total_paginas): ?>
			<a class="boton-pagina" href="listado.php?pagina=<?= $pagina + 1 ?>">Siguiente &raquo;</a>
		<?php endif; ?>
	</div>
</div>

<?php require_once("./plantillas/footer.php"); ?>
</body>
</html>
