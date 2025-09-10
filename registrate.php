<?php
require "host.php";

$err_username = null;
$err_password = null;

$userName = '';
$pass = '';

$reg_for_pass = "/^(?=.*[A-Za-z])(?=.*\d).{8,}$/"; //1 letter and one digit
$reg_for_username = "/^[a-zA-Z0-9]{6,20}$/";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = trim(htmlspecialchars($_POST['username']));
    $pass = trim(htmlspecialchars($_POST['password']));

    function validate($campo, $reg_expr, &$message, $text_error, $text_error_empty) {
        if (empty($campo)) {
            $message = $text_error_empty;
        } else if (!preg_match($reg_expr, $campo)) {
            $message = $text_error;
        } else {
            $message = '';
        }

    }

    validate($userName, $reg_for_username, $err_username, "* The field should contain at least 6 characters!",
         "* The field should not be empty!");

    validate($pass, $reg_for_pass, $err_password, "* The field should contain at least 1 digit and 1 letter!", 
        "* The field should not be empty!");
    }

    if (empty($err_username) && empty($err_password) && !empty($userName) && !empty($pass)) {


        $sql_row = "SELECT username FROM user_login WHERE username=?";

        $result = mysqli_prepare($conn, $sql_row);

        mysqli_stmt_bind_param($result, "s", $userName);



        if(!mysqli_stmt_execute($result)) {
            die("Error to choose users ".mysqli_error($conn));
            exit();
        }
        
        $resultado = mysqli_stmt_get_result($result);

        if (mysqli_num_rows($resultado) > 0) {

            $err_username = "* The user is alredy exist!";

        } else { 


            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO user_login(username, password) "
                        ."VALUES(?,?);";

            $stmt = mysqli_prepare($conn, $sql_insert);

            mysqli_stmt_bind_param($stmt, "ss", $userName, $pass_hash);

            if(mysqli_stmt_execute($stmt)) {
                header("Location:index.php");
            } else {
                die("Isn't possible to execute the sentence! ".mysqli_error($conn));
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


            <form id='forma-login' action='registrate.php' method='POST'>


            <div id='junto'>
                <h1 id='header-form'>Cayo Ponce</h1>

                <div id='p'>
                    <h2>Registrate</h2>

                    <p>
                        <label for='username'>Username:</label>
                        <input type='text' id='username1' name='username' value='<?php echo htmlspecialchars($userName ?? '') ?>'>
                        <?php  echo "<p style='text-align:center;' class='error'>$err_username</p>"; ?>
                    </p>

                    <p>
                        <label for='password'>Password:</label>
                        <input type='password' id='password1' name='password' value='<?php echo htmlspecialchars($pass ?? '')  ?>'>
                        <?php  echo "<p style='text-align:center;' class='error'>$err_password</p>"; ?>
                    </p>

                    <p id='entrada'>
                        <input type='submit' id='enter' value='enter'>
                    </p>

                    
                </div>
            </div>

                <div id='botones'>
                        <h2>Alredy have an account? Please log-in!</h2>
                        <div id='botones-2'>
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