<!DOCTYPE html>
<html lang="es">

<?php
/*
 * 
 * TFG Víctor Caro Fernández 2025
 *
 * 
 * 
 */
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragancias Gloria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/fontawesome/css/all.min.css">
    <script src="./assets/js/jquery.js"></script>
</head>
<body>

    <?php
    include("./assets/plantillas/header.php");
    ?>
    
    <main>
        <section class="principal">
            
           <div id="texto-central">
                <h1>FRAGANCIAS GLORIA</h1>
                <p>Siempre pensando en ti</p>
            </div>
        
            <section class="texto-abajo">
                <p>Aromas que enamoran a precios que sorprenden. Inspirados en la alta gamma, pero con el sello de nuestra elaboración</p>
                <a href="#" class="btn-primary">VER FRAGANCIAS</a>
            </section>
        </section>

        <section id="cara">
            <div class="textoCara">
                <h4>Características Destacadas de Nuestras Fragancias</h4>
                <h1>La esencia de la calidad</h1>
                <p>Nuestras fragancias están elaboradas con ingredientes de la más alta calidad, garantizando una experiencia olfativa inigualable</p>
                
                <div id="slideshow">
                    <img src="./assets/images/ss1.jpg" alt="Slide 1">
                    <img src="./assets/images/ss2.jpg" alt="Slide 2">
                    <img src="./assets/images/ss3.jpg" alt="Slide 3">
                </div>
            </div>
        </section>

        <section class="cara2">
            <div>
                <i class="fa-solid fa-leaf"></i>  <strong>Cuidamos el medioambiente</strong>
                <p>Utilizamos frascos de cristal personalizados para entregar nuestro producto. Si traen el frasco vacío, les hacemos un descuento</p>
            </div>

            <div>
                <i class="fa-solid fa-clock"></i>  <strong>Duración prolongada</strong>
                <p>Disfruta de un aroma que perdura en las prendas durante días</p>
            </div>

            <div>
                <i class="fa-solid fa-bottle-droplet"></i>  <strong>Diseños Elegantes</strong>
                <p>Nuestros frascos son tan elegantes como las fragancias que contienen</p>
            </div>

        </section>

        <section class="lugares">
            <h1>¿Dónde nos situamos?</h1>
            <div class="alicante">
                <a href="https://maps.app.goo.gl/ZFJvgKoFraKdwGbv7">Mercadillo de Alicante</a>
            </div>
            <div class="torrevieja">
                <a href="https://g.co/kgs/mmVsfjM">Mercadillo de Torrevieja</a>
            </div>

            <div class="lamurada">
                <a href="https://maps.app.goo.gl/1ibaGb5QAyWBqV7g9">Mercadillo de La Murada</a>
            </div>
        </section>
    </main>
    
    
    
    <?php
    include("./assets/plantillas/footer.php");
    ?>
    
    <script>
        $(document).ready(function () {
            const $slides = $("#slideshow img"); // Selecciona todas las imágenes del slideshow
            let currentSlide = 0;

            // Función para mostrar el slide actual
            function showSlide(index) {
                $slides.removeClass("active"); // Oculta todas las imágenes
                $slides.eq(index).addClass("active"); // Muestra la imagen actual
            }

            // Función para cambiar al siguiente slide
            function nextSlide() {
                currentSlide = (currentSlide + 1) % $slides.length; // Calcula el índice del siguiente slide
                showSlide(currentSlide); // Muestra el siguiente slide
            }

            // Cambia de slide cada 5 segundos
            setInterval(nextSlide, 5000);

            // Muestra el primer slide al cargar la página
            showSlide(currentSlide);
        });
    </script>
</body>
</html>