<?php
require "host.php";
session_start();

$err_name = null;
$err_apellido = null;
$err_mail = null;
$err_textarea = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $apellido = trim(htmlspecialchars($_POST['apellido']));
    $email = trim(htmlspecialchars($_POST['mail']));
    $textarea = trim(htmlspecialchars($_POST['textarea']));


    function validate($campo, $reg_expr, &$message, $text_error, $text_error_empty) {
        if (empty($campo)) {
            $message = $text_error_empty;
        } else if (!preg_match($reg_expr, $campo)) {
            $message = $text_error;
        } else {
            $message = '';
        }

    }

    validate($nombre, $reg_just_letters, $err_name, "* The field should contain just letters!", "* The field should not be empty!");
    validate($apellido, $reg_just_letters, $err_apellido, "* The field should contain just letters!", "* The field should not be empty!");
    validate($email, $reg_mail, $err_mail, "* The field should contain e-mail address!", "* The field should not be empty!");

    if (empty($textarea)) {
        $err_textarea = "* The field should not be empty!";
    } else if (strlen($textarea) <= 10) {
        $err_textarea = "* The field should contain at least 10 characters!";
    } else {
        $err_textarea = '';
    }

    if (empty($err_name) && empty($err_apellido) && empty($err_mail) && empty($err_textarea)) {

        //send email 

        $to = "cayoponce@gmail.com";
        $subject = "New contact message from $nombre $apellido";
        $message = "Hola Cayo!\r\n";
        $message .= "Mi tema de asunto es: $textarea \r\n";
        $message .= "Saludos!";

        $headers = "From: $nombre $apellido <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";


            $enviado = mail($to, $subject, $message, $headers);

            if ($enviado) {
                $nombre_limpio = mysqli_real_escape_string($conn, $nombre);
                $apellido_limpio = mysqli_real_escape_string($conn, $apellido);
                $email_limpio = mysqli_real_escape_string($conn, $email);
                $textarea_limpio = mysqli_real_escape_string($conn, $textarea);

                $sql = "INSERT INTO user_photography(name, surname, email, message) "
                        ."VALUES(?, ?, ?, ?);";
                
                $sentencia = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($sentencia,"ssss", $nombre_limpio, $apellido_limpio, $email_limpio, $textarea_limpio);
                $result = mysqli_stmt_execute($sentencia);


                if (!$result) {
                    die("Error in insert data ".mysqli_error($conn));
                }


                echo "<p class='success'>Thank you, the message was sent! <br>We will contact you as fast possible!</p>";
                echo "<style>#form{display:none;}</style>";


                if (!file_exists("users.txt")) {
                    $handle = fopen("users.txt", "a");
                } else {
                    $handle = fopen("users.txt", "a");
                }

                
                if ($handle) {
                    fwrite($handle, "Name: $nombre_limpio\n Surname: $apellido_limpio\n Email: $email_limpio\n Message: $textarea_limpio\n\n");
                }

                fclose($handle);
            }

            if (!$enviado) {
                echo "<p>The error occured in sending message please try again!</p>";
                exit();
            }


    }


}



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
        <div id="main-wrapper">
            <a href="#cover-wrapper" id="flecha">
                <div id="flecha-box">
                    <p>up.</p>
                </div>
            </a>
            <div id="wrapper-gallery">

                <nav id="navigation-gallery">
                    <h1>
                        <a href="home.php">cayo ponce</a>
                        <p id="photograper">photograper</p>
                    </h1>
                    <div id="listas">
                        <p><a href="galeria.php">/ Gallery</a></p>
                        <p id='hide'>/ Projects<br>

                            <a class='hidden style' href='sleepers.php'>/ Sleepers</a>
                            <a class='hidden style' href='town.php'>/ Ghost Town</a>
                            
                        </p>
                        <p><a href="black-white.php">/ B&W street photography</a></p>
                        <p><a href="color-photo.php">/ In color street photography</a></p>
                        <div class="link-home">
                            <p><a href="home.php">Home</a></p>
                            <p><a href="contacto.php">Contact</a></p>
                        </div>
                    </div>


                    

                </nav>
            </div>

            <div id="wrapper-gallery-2">

                <div id="contacto-header">
                    <h2>CONTACT</h2>

                    <div id="box-contact">
                        <p style='margin:5%; text-align:center;'>CONTACT ME FOR MORE INFORMATION, TO REACH OUT, FEEL FREE TO GET IN TOUCH.</p>

                        <form id='form' action='contacto.php' method='POST'>

                            <fieldset>

                            <p>
                                <label for='nombre'>Name:</label>
                                <input type='text' name='nombre' id='nombre' value='<?php echo htmlspecialchars($nombre ?? '')?>'>
                                <?php echo "<p class='error'>$err_name</p>";?>
                            </p>

                            <p>
                                <label for='apellido'>Surname:</label>
                                <input type='text' name='apellido' id='apellido' value='<?php echo htmlspecialchars($apellido ?? '')?>'>
                                <?php echo "<p class='error'>$err_apellido</p>";?>
                            </p>

                            <p>
                                <label for='mail'>E-mail:</label>
                                <input type='email' name='mail' id='mail' value='<?php echo htmlspecialchars($email ?? '')?>'>
                                <?php echo "<p class='error'>$err_mail</p>";?>
                            </p>

                            <div id='area'>
                                <label for='textarea'>Message:</label>
                                <textarea rows='10' cols='40' name='textarea' id='textarea'><?php echo htmlspecialchars($textarea ?? '')?></textarea>
                                <?php echo "<p class='error'>$err_textarea</p>";?>
                            </div>
                            <p id='bott'>
                                <input type='submit' name='send' id='send' value='Send Message'>
                            </p>

                            </fieldset>


                        </form>

                

                         <div class="foto-gallery">
                            <a href="img/jp18.jpg" data-lightbox="gallery">

                                <img src="img/jp18.jpg" class="full-view-image" alt="foto1">

                            </a>
                    
                        </div>
                    </div>

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