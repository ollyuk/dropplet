<?php
$servername = "localhost";
$username = "root";
$password = "L3@ves";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("MySQl Connection failed: " . $conn->connect_error);
} 
echo "MySQL Connected successfully";
?>