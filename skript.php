<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "databas";
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$name = $_POST["name"];
$email = $_POST["email"];
$homepage = $_POST["homepage"];
$tel = $_POST["tel"];
$comment = $_POST["comment"];

$sql = "INSERT INTO comments (name, email, homepage, tel, comment, time) 
        VALUES ('$name', '$email', '$homepage', '$tel', '$comment', NOW())";
$conn->query($sql);

$conn->close();

header('Location: index.php');
exit;
