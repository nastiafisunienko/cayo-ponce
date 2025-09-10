<?php
require "host.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <title>cayo ponce</title>
    <link rel="icon" type="image/x-icon" href="../img/cp-6-11-2024.png">
</head>
<body>
    <div id="body">
        <h1>CP</h1>
    </div>
    <div id="cover-wrapper">
        <div  id="main-wrapper">
            <a href="#cover-wrapper" id="flecha">
                <div id="flecha-box">
                    <p>up.</p>
                </div>
            </a>
            <div id="wrapper-gallery">

                <nav id="navigation-gallery">
                    <h1>
                        <a style="color:#6d6a6a;" href="home.php">cayo ponce</a>
                        <p style="color:#6d6a6a;" id="photograper">photograper</p>
                    </h1>
                    <div id="listas">
                        <p><a style="color:#6d6a6a;" href="galeria.php">/ Gallery</a></p>
                        <p style="color:#6d6a6a;" id='hide'>/ Projects<br>

                            <a style="color:#6d6a6a;" class='hidden style' href='sleepers.php'>/ Sleepers</a>
                            <a style="color:#6d6a6a;" class='hidden style' href='town.php'>/ Ghost Town</a>
                            
                        </p>
                        <p><a style="color:#6d6a6a;" href="black-white.php">/ B&W street photography</a></p>
                        <p><a style="color:#6d6a6a;" href="color-photo.php">/ In color street photography</a></p>
                        <div class="link-home">
                            <p><a href="home.php">Home</a></p>
                            <p><a href="contacto.php">Contact</a></p>
                        </div>
                    </div>


                    

                </nav>
            </div>

            <div id="wrapper-gallery-2">

                <div class="foto-gallery">
                    <a href="img/image00014.jpeg" data-lightbox="gallery">

                        <img src="img/image00014.jpeg" class="full-view-image" alt="foto1">

                    </a>
                    
                </div>

                <div class="foto-gallery">

                    <a href="img/image00015.jpeg" data-lightbox="gallery">
       
                        <img src="img/image00015.jpeg" class="full-view-image" alt="foto1">
                     </a>
                    
                </div>

                <div class="foto-gallery">

                    <a href="img/image00016.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00016.jpeg" class="full-view-image" alt="foto1">
                    </a>
                   
                </div>

                <div class="foto-gallery">

                    <a href="img/image00017.jpeg" data-lightbox="gallery">
                    
                    <img src="img/image00017.jpeg" class="full-view-image" alt="foto1">

                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00018.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00018.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00019.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00019.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00020.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00020.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00021.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00021.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00022.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00022.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

                <div class="foto-gallery">

                    <a href="img/image00023.jpeg" data-lightbox="gallery">
                    
                        <img src="img/image00023.jpeg" class="full-view-image" alt="foto1">
                    </a>
               
                </div>

            </div>

        </div>

        <div id="add">
            <div id="caja-box">
                <h3>Header of something</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat incidunt ex nesciunt
                 laudantium sunt aspernatur eaque voluptatem necessitatibus et, ratione, cum vero ab inventore libero 
                 aperiam vitae consequatur, reprehenderit atque?
                </p>
                <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae aut nostrum nihil aliquam blanditiis porro quod vero,
                 libero voluptatum voluptatem officia quos temporibus fugit ipsum reprehenderit a! Pariatur, magnam rem!
                </p>
            </div>
        </div>

        <div id="contact-bar">
            <p><a href="contacto.php">/ CONTACT ME</a></p>
        </div>

        <div id="footer">

        <?php
            require "footer.php";
        ?>
        </div>
    </div>
    <script src="js/query.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    
</body>
</html>