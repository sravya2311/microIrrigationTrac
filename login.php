<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer";

// Create connection
$conn = new mysqli($servername, $username, $password,    $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_POST["username"];
$password = $_POST["password"];

// Query the database for the user
$result = $conn->query("SELECT * FROM login_details WHERE username='$username' AND password='$password'");

// If the user exists, redirect to the protected page
if ($result->num_rows > 0) {
    header("Location:info.html");
} else {
    // If the user does not exist, show an error message
    echo "Incorrect login information";
}

$conn->close();
?>