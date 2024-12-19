<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "torneos_competencias";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn -> connect_errno) {
  die("Connection failed" . $conn -> connect_errno());
} else {
echo "Connected successfully";
}
?>