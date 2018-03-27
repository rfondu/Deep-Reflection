<?php
$servername = "db730399245.db.1and1.com";
$username = "dbo730399245";
$password = "SuperL33t!";
$dbname = "db730399245";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$hi = "Test";

// Check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . $conn->connect_error);
} 

?>