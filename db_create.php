<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "DB";

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
    die("Connection failed: " . mysqli_error($conn));
}

$sql = "CREATE DATABASE IF NOT EXISTS DB";

if (!mysqli_query($conn, $sql)) {
    die("Error on database creation: " . mysqli_error($conn));
}

mysqli_close($conn);

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "
    CREATE TABLE IF NOT EXISTS Users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        password_plain_text VARCHAR(255) NOT NULL,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        birth_month VARCHAR(20) NOT NULL
    )
";

if (!mysqli_query($conn, $sql)) {
    die("Error on table creation: " . mysqli_error($conn));
}


mysqli_close($conn);




?>