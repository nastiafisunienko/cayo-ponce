<?php
require "host.php";
session_start();

$err_password = null;
$err_username = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));



    $sql_usuarios = "SELECT * FROM user_login WHERE username=?";

    $sentencia = mysqli_prepare($conn, $sql_usuarios);

    mysqli_stmt_bind_param($sentencia, "s", $username);

    mysqli_stmt_execute($sentencia);

    $res = mysqli_stmt_get_result($sentencia);

    if (empty($username)) {
        $err_username = "* The field should not be empty!";
    }

    if (empty($password)) {
        $err_password = "* The field should not be empty!";
    }

    if (empty($err_username) && empty($err_password)) {

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);

            if (password_verify($password, $row['password'])) {
                $_SESSION['usuario'] =  true;
                header("location:home.php");
            } else {
                $err_password = "Invalid password!";
            }
        } else {
            $err_username = "User didn't exist! Please registrate!";
        }

    }
    mysqli_close($conn);

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
    <link href="css/venobox.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    
    <title>cayo ponce</title>
    <link rel="icon" type="image/x-icon" href="../img/cp-6-11-2024.png">
</head>
<body>
    <div id="body">
        <h1>CP</h1>
    </div>

<div id='cover-wrapper'>


    <div id='cover-wrapper-fixed'>
        <h1 id='header-form-2'>Welcome to my photography page.<br> Dive into unique place of inspiration.</h1>

        <div id='form-login'>
            <form id='forma-login' action='index.php' method='POST'>

            <div id='junto'>
                <h1 id='header-form'>Cayo Ponce</h1>



                <div id='p'>
                    <h2>Log-in</h2>

                    <p>
                    <label for='username'>Username:</label>
                    <input type='text' id='username' name='username' value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                    <?php  echo "<p style='text-align:center;' class='error'>$err_username</p>"; ?>
                    </p>

                    <p>
                    <label for='password'>Password:</label>
                    <input type='password' id='password' name='password' value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
                    <?php  echo "<p style='text-align:center;' class='error'>$err_password</p>"; ?>
                    </p>

                    <p id='entrada'>
                        <input type='submit' id='enter' value='enter'>
                    </p>

                    

                </div>
            </div>
                <div id='botones'>
                        <h2>Still don't have an account? Make a registration!</h2>
                        <div id='botones-2'>
                            <a href='registrate.php'>Registrate</a>
                            <a href='index.php'>Log-in</a>
                        </div>
                    </div>

            </form>

        </div>
        

        <div id="footer">
                    <?php
                    require "footer.php";
                    ?>
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