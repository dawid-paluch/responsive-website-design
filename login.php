<?php

$servername = "127.0.0.1";;
$username = "root";
$dbpassword = "";
$dbname = "dawidportfolio"; 

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT email, password FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();

    $_SESSION["UserID"] = $email;
}

if(isset($_SESSION["UserID"])){
    header("Location: addpost.html");
}
else {
    header("Location: login.html");
}

$conn->close();
?>