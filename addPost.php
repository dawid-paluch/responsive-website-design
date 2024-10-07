<?php
$servername = "127.0.0.1";;
$username = "root";
$dbpassword = "";
$dbname = "dawidportfolio"; 

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = date("y-m-d");
    $time = date("H:i:s");
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO POSTS (postDate, postTime, title, body)
    VALUES ('$date', '$time', '$title', '$content')";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    header("Location: blog.php");
}
else {
    session_start();

    $date = date("y-m-d");
    $time = date("H:i:s");
    $title = $_SESSION["postTitle"];
    $content = $_SESSION["postContent"];

    $sql = "INSERT INTO POSTS (postDate, postTime, title, body)
    VALUES ('$date', '$time', '$title', '$content')";
    if ($conn->query($sql) === TRUE) {
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    header("Location: blog.php");
}
?>