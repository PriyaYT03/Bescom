<?php
$servername = "localhost"; 
$username = "root";         
$password = "spoorthi@27";             
$dbname = "file_track";  
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} 
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>




