<?php
session_start();
include 'b-d.php'; 

$error_message = ''; 

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);

    $password = $_POST['password'];

    try {
        
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
          
        
        if ($user) {
            
            if (password_verify($password, $user['password'])) {
            
                $_SESSION['username'] = $user['username'];
                header("Location: dashboard.html");
                exit();
            } else {
                
                $error_message = "Invalid password.";
            }
        } else {
            
            $error_message = "No user found with that username.";
        }
    } catch (PDOException $e) {
        
        $error_message = "Database error: " . $e->getMessage();
    }
}
include 'login.html';
?> 