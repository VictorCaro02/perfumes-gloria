<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Fragancias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fontawesome/css/all.min.css">
    <script src="./assets/js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<style>
		html { height: 100vh; }
		header { position: fixed; }
		.listado-fragancias {
			display: flex;
            z-index: 1;
			justify-content: center;
			align-items: flex-start;
			flex-wrap: wrap;
			width: 95%;
		}
		.columna {
			width: 60%;
            height: 30rem;
			border: 2px solid black;
			padding: 15px;
			border-radius: 10px;
			background-color: #fefefe;
			min-height: 200px;
			box-shadow: 0 0 10px rgba(0,0,0,0.08);
			transition: all 0.3s ease;
			font-size: 0.92rem;
			line-height: 1.4;
		}
		.femenino { border-top: 8px solid #d05db1; }
		.masculino { border-top: 8px solid #00aaff; }
		.titulo-genero {
			background-color: #d05db1;
			color: white;
			text-align: center;
			font-weight: bold;
			padding: 8px;
			font-size: 1.1rem;
			border-radius: 5px;
			margin-bottom: 10px;
		}
		.masculino .titulo-genero {
			background-color: #00aaff;
		}
		.fragancia {
			margin-bottom: 6px;
			font-family: "Poppins", sans-serif;
			font-size: 0.9rem;
		}
		.ref { font-weight: 600; }

		.filtros {
			width: 20rem;
			margin: 40px auto;
            margin-top: 9rem;
			background: #f9f9f9;
			border: 2px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 8px rgba(0,0,0,0.1);
			animation: fadeIn 0.6s ease-out both;
            z-index: 3;
		}
		.filtros label, .filtros input, .filtros select {
			display: block;
			margin-bottom: 12px;
			width: 100%;
		}
		.filtros input[type="text"], .filtros select {
			padding: 8px;
			border: 1px solid #bbb;
			border-radius: 6px;
			font-size: 1rem;
		}
		.filtros button {
			background-color: #007bff;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 6px;
			cursor: pointer;
			font-weight: bold;
		}
		.filtros button:hover {
			background-color: #0056b3;
		}
		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(-10px); }
			to { opacity: 1; transform: translateY(0); }
		}
        
		@media only screen and (min-width: 768px) {
			.columna { width: 28%; height: 26rem;}

		}
	</style>
</head>
<body>

<?php 
require_once("./plantillas/segundo_header.php");
echo "<br><br>";

$cbd = new mysqli("localhost", "u250246282_vicmusic02", "Corayvictor2002***", "u250246282_perfumesgloria");

$registros_por_pagina = 10;
$pagina = isset($_GET["pagina"]) ? intval($_GET["pagina"]) : 1;
$inicio = ($pagina - 1) * $registros_por_pagina;

$filtro_genero = $_GET['genero'] ?? '';
$busqueda = trim($_GET['buscar'] ?? '');

$where = "agotada = 0";
if (!empty($busqueda)) {
    $where .= ' AND (nombre LIKE "%'.$busqueda.'%" OR marca LIKE "%'.$busqueda.'%")';
}

$femenino = "";
$masculino = "";

$total_registros = 0;

if ($filtro_genero === 'mujer' || $filtro_genero === '') {
    $resFem = $cbd->query("SELECT * FROM fragancias WHERE genero = 'mujer' AND $where LIMIT $inicio, $registros_por_pagina");
    while ($fila = $resFem->fetch_assoc()) {
        $femenino .= "<div class='fragancia'><span class='ref'>" . htmlspecialchars($fila['numref']) . "</span> - <span class='nombre'>" . htmlspecialchars($fila['nombre']) . "</span> - <span class='marca'>" . htmlspecialchars($fila['marca']) . "</span></div>";
    }
    $totalFem = $cbd->query("SELECT COUNT(*) AS total FROM fragancias WHERE genero = 'mujer' AND $where")->fetch_assoc()['total'];
    $total_registros = max($total_registros, $totalFem);
}

if ($filtro_genero === 'hombre' || $filtro_genero === '') {
    $resMasc = $cbd->query("SELECT * FROM fragancias WHERE genero = 'hombre' AND $where LIMIT $inicio, $registros_por_pagina");
    while ($fila = $resMasc->fetch_assoc()) {
        $masculino .= "<div class='fragancia'><span class='ref'>" . htmlspecialchars($fila['numref']) . "</span> - <span class='nombre'>" . htmlspecialchars($fila['nombre']) . "</span> - <span class='marca'>" . htmlspecialchars($fila['marca']) . "</span></div>";
    }
    $totalMasc = $cbd->query("SELECT COUNT(*) AS total FROM fragancias WHERE genero = 'hombre' AND $where")->fetch_assoc()['total'];
    $total_registros = max($total_registros, $totalMasc);
}

$total_paginas = ceil($total_registros / $registros_por_pagina);
?>

<div class="filtros">
    <form method="get">
        <label for="buscar">Buscar por nombre o marca:</label>
        <input type="text" id="buscar" name="buscar" value="<?= htmlspecialchars($busqueda) ?>">

        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <option value="" <?= $filtro_genero === '' ? 'selected' : '' ?>>Todos</option>
            <option value="mujer" <?= $filtro_genero === 'mujer' ? 'selected' : '' ?>>Femenino</option>
            <option value="hombre" <?= $filtro_genero === 'hombre' ? 'selected' : '' ?>>Masculino</option>
        </select>

        <button type="submit">Aplicar filtros</button>
    </form>
</div>

<div class="alta paginacion">
    <div class="listado-fragancias">
        <?php if ($filtro_genero !== 'hombre'): ?>
            <div class="columna femenino">
                <div class="titulo-genero">FEMENINO</div>
                <?= $femenino ?: "<p>No hay resultados.</p>" ?>
            </div>
        <?php endif; ?>
        <?php if ($filtro_genero !== 'mujer'): ?>
            <div class="columna masculino">
                <div class="titulo-genero">CABALLERO</div>
                <?= $masculino ?: "<p>No hay resultados.</p>" ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="paginacion-botones">
        <?php for($i = 1; $i <= $total_paginas; $i++): ?>
            <?php if($i == $pagina): ?>
                <span class="pagina-actual"><?= $i ?></span>
            <?php else: ?>
                <a class="boton-pagina" href="?pagina=<?= $i ?>&buscar=<?= urlencode($busqueda) ?>&genero=<?= $filtro_genero ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
       
    </div>
    <div class="botones-ant-sig">
        <?php if($pagina > 1): ?>
            <a class="boton-pagina" href="?pagina=<?= $pagina - 1 ?>&buscar=<?= urlencode($busqueda) ?>&genero=<?= $filtro_genero ?>">&laquo; Anterior</a>
        <?php endif; ?>
         <?php if($pagina < $total_paginas): ?>
            <a class="boton-pagina" href="?pagina=<?= $pagina + 1 ?>&buscar=<?= urlencode($busqueda) ?>&genero=<?= $filtro_genero ?>">Siguiente &raquo;</a>
        <?php endif; ?>
    </div>
    
</div>

<?php require_once("./plantillas/footer.php"); ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const buscarInput = document.getElementById("buscar");
    const suggestionBox = document.createElement("div");
    suggestionBox.style.position = "absolute";
    suggestionBox.style.border = "1px solid #ccc";
    suggestionBox.style.background = "#fff";
    suggestionBox.style.zIndex = "1000";
    suggestionBox.style.maxHeight = "150px";
    suggestionBox.style.overflowY = "auto";
    suggestionBox.style.width = buscarInput.offsetWidth + "px";
    suggestionBox.style.display = "none";
    buscarInput.parentNode.appendChild(suggestionBox);

    buscarInput.addEventListener("input", function () {
        const query = this.value.trim();
        if (query.length < 2) {
            suggestionBox.style.display = "none";
            return;
        }

        fetch("buscar_sugerencias.php?term=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                suggestionBox.innerHTML = "";
                if (data.length === 0) {
                    suggestionBox.style.display = "none";
                    return;
                }

                data.forEach(item => {
                    const div = document.createElement("div");
                    div.textContent = item;
                    div.style.padding = "5px";
                    div.style.cursor = "pointer";
                    div.addEventListener("click", function () {
                        buscarInput.value = item;
                        suggestionBox.style.display = "none";
                    });
                    suggestionBox.appendChild(div);
                });

                const rect = buscarInput.getBoundingClientRect();
                suggestionBox.style.top = (buscarInput.offsetTop + buscarInput.offsetHeight) + "px";
                suggestionBox.style.left = buscarInput.offsetLeft + "px";
                suggestionBox.style.display = "block";
            });
    });

    document.addEventListener("click", function (e) {
        if (!suggestionBox.contains(e.target) && e.target !== buscarInput) {
            suggestionBox.style.display = "none";
        }
    });
});
</script>

</body>
</html>
