<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Theo's Guestbook</h1>
    <form action="skript.php" method="post">
        Name:
        <input type="text" name="name" required>
        <br>
        <br>
        Email:
        <input type="email" name="email" required>
        <br>
        <br>
        Homepage:
        <input type="text" name="homepage" required>
        <br>
        <br>
        Tel:
        <input type="text" name="tel" required>
        <br>
        <br>
        Comment:
        <input type="text" name="comment" required>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>

    <div>
        <h1>Previous Comments</h1>
        <br>

    </div>

</body>

</html>

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


$sql = "SELECT * FROM comments order by time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="resultDiv">
        Posts:
        <br>
        <br>
        Time: ' . $row["time"] .
            "<br>From: " . $row["name"] .
            "<br>Email: " . $row["email"] .
            "<br>Tel: " . $row["tel"] .
            "<br>Comment: " . $row["comment"] .
            "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
