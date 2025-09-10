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
    <link href="css/venobox.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    
    <title>cayo ponce</title>
    <link rel="icon" type="image/x-icon" href="../img/cp-6-11-2024.png">
</head>
<body>
    <div id="body">
        <h1>CP</h1>
    </div>

    <div id="cover-wrapper">
    <div id="main-wrapper">
        <a href="#main-wrapper" id="flecha">
            <div id="flecha-box">
                <p>up.</p>
            </div>
        </a>
    <div id="wrapper">
    
        <header id="header">
            <nav id="navigation">
                <h1>
                    <a href="home.php">Cayo<br> Ponce</a>
                    <p>photograper</p>
                </h1>
            </nav>
        </header>
    </div>
    <div id="wrapper-2">


        <div id="header-block">
            <p><a href="home.php">Home</a></p>
            <p><a href="#about">About</a></p>
            <p><a href="galeria.php">Gallery</a></p>
            <p><a href="contacto.php">Contact</a></p>
            <p><a href='logout.php'>Log-out</a></p>
        </div>

    

        <section id="section-1">
            <h1>CAYO PONCE</h1>
            <article>
                <h2>descripcion</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt necessitatibus similique, aut suscipit minus
                    quibusdam eos pariatur officia. Provident reiciendis quaerat beatae doloremque asperiores nulla quia eos 
                    a totam quos.
                </p>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt necessitatibus similique, aut suscipit minus
                    quibusdam eos pariatur officia. Provident reiciendis quaerat beatae doloremque asperiores nulla quia eos 
                    a totam quos.
                </p>

            </article>
        </section>


        <section id="section-header">
            <h1>
                <a href="home.html">Cayo Ponce</a>
                <p>photographer</p>
            </h1>
        </section>


        <section id="about">
            <div id="section-about">
                <h1>About me</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem rem facere provident nisi deserunt
                     hic ab tenetur natus asperiores placeat vero eos ipsam quo, veniam, laudantium iusto temporibus quae optio?</p>
            </div>
        </section>

        <section id="fotos">

            <div class="box-bord">
                <div class="junto">
                    <h2>Header I</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum cumque nesciunt harum adipisci dolore 
                        libero fugit ducimus veritatis. Rerum natus, in earum tempora alias excepturi aliquam corporis minus eum at?</p>
                </div>

                <div class="box">
                    <a class="a" href="img/bcn.jpg" data-lightbox="gallery">
                        <img id="foto1" src="img/bcn.jpg">
                    </a>
                </div>
            </div>

            <div class="box-bord bord-dos">
                <div class="junto junto-2">
                    <h2>Header II</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum cumque nesciunt harum adipisci dolore 
                        libero fugit ducimus veritatis. Rerum natus, in earum tempora alias excepturi aliquam corporis minus eum at?</p>
                </div>

                <div class="box box-2">
                    <a class="a" href="img/53877329245_39a1923d77_o.jpg" data-lightbox="gallery">
                        <img id="foto2" src="img/53877329245_39a1923d77_o.jpg">
                    </a>
                </div>
            </div>

            <div class="box-bord bord-tres">
                <div class="junto junto-3">
                    <h2>Header III</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum cumque nesciunt harum adipisci dolore 
                        libero fugit ducimus veritatis. Rerum natus, in earum tempora alias excepturi aliquam corporis minus eum at?</p>
                </div>

                <div class="box box-3">
                    <a class="a" href="img/foto3.jpg" data-lightbox="gallery">
                        <img id="foto3" src="img/foto3.jpg">
                    </a>
                </div>
            </div>


        </section>
        <div id="contact-bar">
            <p><a href="contacto.php">/ CONTACT ME</a></p>
        </div>

        <div id="footer">
            <?php
            require "footer.php";
            ?>
        </div>
    </div>
    </div>
    </div>


    <script src="js/query.js"></script>
    <script src="js/main.js"></script>
    <script src="js/venobox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    
</body>
</html>