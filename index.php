<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        body {
            position: relative;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Botón de inicio de sesión */
        .login-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:hover {
            background-color: #a0522d;
        }

        /* Sección de presentación */
        .intro-section {
            text-align: center;
            padding: 20px;
        }

        /* Contenedor para el carrusel */
        .carousel-container {
            position: relative;
            max-width: 1200px; /* Aumentamos el ancho máximo del carrusel */
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Esto asegura que solo se vea una imagen */
        }

        /* Carrusel */
        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 300%; /* Ajustamos el tamaño total para 3 imágenes */
        }

        .carousel-image {
            width: 500%; /* Cada imagen ocupará el 100% del contenedor */
            height: 630px; /* Aumentamos la altura para hacer las imágenes aún más grandes */
            object-fit: cover; /* Mantiene la imagen recortada para que cubra todo el espacio */
        }

        .carousel-caption {
            margin-top: 10px;
            font-size: 18px;
            font-style: italic;
            color: #555;
        }

        /* Estilo de los botones del carrusel */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 5px;
            padding: 8px 16px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .button-container button:hover {
            background-color: #a0522d;
        }

        .button-container .location-button {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Sección de reseñas */
        .reviews-section {
            background-color: #000; /* Fondo negro */
            color: white;
            padding: 90px 60px;
            text-align: left; /* Alinea el texto a la izquierda */
        }

        .reviews-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .review {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: 60px;
            margin-right: auto;
        }

        .review p {
            font-size: 16px;
            color: black;
        }

        .review .reviewer-name {
            font-weight: bold;
            color: #d2691e;
        }

        /* Estilos para las estrellas */
        .stars {
            font-size: 18px;
            color: #d2691e;
        }

        .star {
            color: #ccc;
        }

        .star.filled {
            color: #ffcc00;
        }
    </style>
</head>

<body>
    <!-- Botón de inicio de sesión -->
    <button class="login-button" onclick="window.location.href='./php/inicio_sesion.php'">Iniciar sesión</button>

    
    <!-- Sección de presentación de la cafetería -->
    <section class="intro-section">
        <h1>Bienvenidos a nuestra cafetería</h1>
        <p> 
            Disfruta de un ambiente cálido y acogedor, perfecto para compartir con amigos o disfrutar de un tiempo a solas. ¡Te esperamos!
        </p>

        <!-- Contenedor para el carrusel -->
        <div class="carousel-container">
            <!-- Carrusel de imágenes -->
            <div class="carousel-images" id="carouselImages">
                <img src="./imgs/evento1.jpeg" alt="Café recién hecho" class="carousel-image">
                <img src="./imgs/evento2.jpeg" alt="Café recién hecho" class="carousel-image">
                <img src="./imgs/evento4.jpeg" alt="Café recién hecho" class="carousel-image">
            </div>
        </div>

        <p class="carousel-caption" id="carouselCaption">"Donde los mejores recuerdos comienzan."</p>

        <!-- Cuadro para los botones adicionales sin fondo blanco -->
        <div class="button-container">
            <button onclick="window.location.href='./php/Menu2.php'">Menú</button>
            <button class="location-button" onclick="window.location.href='./php/Ubicacion.php'">
                &#128205; Ubicación
            </button>
        </div>
    </section>

    <!-- Sección de reseñas -->
    <section class="reviews-section">
        <h2>Lo que dicen nuestros clientes</h2>

        <div class="review">
            <p>"Un lugar increíble para pasar la tarde. El ambiente es acogedor y el café está delicioso. ¡Definitivamente volveré!"</p>
            <p class="reviewer-name">- Laura G.</p>
            <div class="stars">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star">★</span>
            </div>
        </div>

        <div class="review">
            <p>"Me encanta la decoración de la cafetería y el personal es muy amable. El mejor lugar para disfrutar de un buen libro y un café."</p>
            <p class="reviewer-name">- Carlos M.</p>
            <div class="stars">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
            </div>
        </div>

        <div class="review">
            <p>"Siempre vengo a esta cafetería cuando quiero relajarme. La música, el ambiente y el café son perfectos para una tarde tranquila."</p>
            <p class="reviewer-name">- Marta L.</p>
            <div class="stars">
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
                <span class="star filled">★</span>
            </div>
        </div>
    </section>

    <script>
        const images = [
            {
                src: "./imgs/evento1.jpeg",
                caption: "Donde los mejores recuerdos comienzan."
            },
            {
                src: "./imgs/evento2.jpeg",
                caption: "Celebra tu día especial con nosotros."
            },
            {
                src: "./imgs/evento4.jpeg",
                caption: "Disfruta un momento agradable junto a tu familia."
            }
        ];

        let currentIndex = 0;
        const carouselImages = document.getElementById("carouselImages");
        const carouselCaption = document.getElementById("carouselCaption");

        function changeImage(direction) {
            currentIndex = (currentIndex + direction + images.length) % images.length;
            carouselImages.style.transform = `translateX(-${currentIndex * 100}%)`;
            carouselCaption.textContent = images[currentIndex].caption;
        }

        // Cambio de imagen usando las teclas de dirección
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                changeImage(-1); // Flecha izquierda cambia la imagen hacia atrás
            } else if (event.key === 'ArrowRight') {
                changeImage(1); // Flecha derecha cambia la imagen hacia adelante
            }
        });
    </script>

    <footer>
        <p>&copy; 2024 Cafetería. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
