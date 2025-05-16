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
        <img src="./images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="../index.php">INICIO</a></li>
                <li><a href="lista.php">FRAGANCIAS</a></li>
                <li><a href="contacto.php">HAZ TU RESERVA</a></li>
                <li><a href="perfil.php">PERFIL</a></li>
            </ul>
        </nav>
    </header>';
    }else{
        echo '<header>
        <img src="./images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu" id="admin">
                <li><a href="../index.php">INICIO</a></li>
                <li><a href="alta.php">DAR DE ALTA</a></li>
                <li><a href="cambiar-dispo.php">CAMBIAR DISPONIBILIDAD</a></li>
                <li><a href="baja.php">BORRAR FRAGANCIA</a></li>
                <li><a href="modificar.php">MODIFICAR DATOS</a></li>
                <li><a href="lista.php">FRAGANCIAS</a></li>
                <li><a href="perfil.php">PERFIL</a></li>
            </ul>
        </nav>
    </header>'; 
    }
}else{
    echo '<header>
        <img src="./images/colonia.png" alt="" id="colonia">
        <nav id="centrado">
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="../index.php">INICIO</a></li>
                 <li><a href="lista.php">FRAGANCIAS</a></li>
                 <li><a href="iniSes.php">HAZ TU RESERVA</a></li>
                <li><a href="iniSes.php">INICIAR SESIÓN</a></li>
            </ul>
        </nav>
    </header>'; 
}