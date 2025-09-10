<?php

$reg_just_letters = "/^[A-Za-z' ]+$/";
$reg_mail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";


$host = "localhost";
$user = "root";
$pass = '';
$dbb = 'users';

$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
    die("Error al connectarse con el servidor ".mysqli_error($conn));
}

if (!mysqli_select_db($conn, $dbb)) {

    $dataBase = mysqli_query($conn, "CREATE DATABASE ". $dbb);
    if (!$dataBase) {
        die("Error in create database ".mysqli_error($conn));
    }

} else {
    mysqli_select_db($conn, $dbb);
}
if (mysqli_select_db($conn, $dbb)) {

    $sql = "CREATE TABLE IF NOT EXISTS user_photography ( "
            ."id INT AUTO_INCREMENT PRIMARY KEY, "
            ."name VARCHAR(50) NOT NULL, "
            ."surname VARCHAR(50) NOT NULL, "
            ."email VARCHAR(100) NOT NULL , "
            ."message VARCHAR(200) NOT NULL, "
            ."created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP "
            .");";

    $res = mysqli_query($conn, $sql);
    if (!$res) {
        die("Couldn't create the table ".mysqli_error($conn));
        exit();
    }


    $sql_login = "CREATE TABLE IF NOT EXISTS user_login ( "
            ."id INT AUTO_INCREMENT PRIMARY KEY, "
            ."username VARCHAR(50) NOT NULL UNIQUE, "
            ."password VARCHAR(255) NOT NULL, "
            ."created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP "
            .");";

    $res_login = mysqli_query($conn, $sql_login);

    if (!$res_login) {
        die("Couldn't create the table ".mysqli_error($conn));
        exit();
    }

    

} else {
    die("Error in connection with database ".mysqli_error($conn));
    exit();
}


?>