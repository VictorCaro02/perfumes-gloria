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
            </ul>
        </nav>
    </header>'; 
}