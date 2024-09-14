<?php
$servername = "localhost";
$username = "root";
$password = "Sravya@2002";
$dbname = "farmer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
}
else{
    echo "logged in";
}

?>