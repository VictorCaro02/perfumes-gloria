<?php
/*
 * 
 * TFG Víctor Caro Fernández 2025
 *
 * 
 * 
 */
if(isset($_SESSION["rol"])){
    if($_SESSION["rol"] == "cliente"){
        echo '<header>
        <img src="./assets/images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="index.html">INICIO</a></li>
                <li><a href="./assets/lista.php">FRAGANCIAS</a></li>
                <li><a href="./assets/contacto.php">HAZ TU RESERVA</a></li>
                <li><a href="./assets/perfil.php">PERFIL</a></li>
                 <li><button id="modo-noche-btn">🌙 Noche</button></li>
                <li><button id="modo-dia-btn">☀️ Día</button></li>
            </ul>
        </nav>
    </header>';
    }else{
        echo '<header>
        <img src="./assets/images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu" id="admin">
                <li><a href="index.html">INICIO</a></li>
                <li><a href="./assets/alta.php">DAR DE ALTA</a></li>
                <li><a href="./assets/cambiar-dispo.php">CAMBIAR DISPONIBILIDAD</a></li>
                <li><a href="./assets/baja.php">BORRAR FRAGANCIA</a></li>
                <li><a href="./assets/modificar.php">MODIFICAR DATOS</a></li>
                <li><a href="./assets/lista.php">FRAGANCIAS</a></li>
                <li><a href="./assets/perfil.php">PERFIL</a></li>
                 <li><button id="modo-noche-btn">🌙 Noche</button></li>
                <li><button id="modo-dia-btn">☀️ Día</button></li>
            </ul>
        </nav>
    </header>'; 
    }
}else{
    echo '<header>
        <img src="./assets/images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="index.html">INICIO</a></li>
                 <li><a href="./assets/lista.php">FRAGANCIAS</a></li>
                 <li><a href="./assets/iniSes.php">HAZ TU RESERVA</a></li>
                <li><a href="./assets/iniSes.php">INICIAR SESIÓN</a></li>
                 <li><button id="modo-noche-btn">🌙 Noche</button></li>
                <li><button id="modo-dia-btn">☀️ Día</button></li>
            </ul>
        </nav>
    </header>'; 
}
echo '
<script>
document.addEventListener("DOMContentLoaded", () => {
    const nocheBtn = document.getElementById("modo-noche-btn");
    const diaBtn = document.getElementById("modo-dia-btn");

    const elementos = [
        document.querySelector("body"),
        document.querySelector("header"),
        ...document.querySelectorAll(".menu"),
        ...document.querySelectorAll(".footer"),
        ...document.querySelectorAll(".btn-primary"),
        ...document.querySelectorAll(".boton-pagina"),
        ...document.querySelectorAll(".titulo-genero"),
        ...document.querySelectorAll(".pagina-actual")
    ];

    nocheBtn?.addEventListener("click", () => {
        elementos.forEach(el => el?.classList.add("modo-noche"));
        localStorage.setItem("modo", "noche");
    });

    diaBtn?.addEventListener("click", () => {
        elementos.forEach(el => el?.classList.remove("modo-noche"));
        localStorage.setItem("modo", "dia");
    });

    if (localStorage.getItem("modo") === "noche") {
        elementos.forEach(el => el?.classList.add("modo-noche"));
    }
});
</script>';
