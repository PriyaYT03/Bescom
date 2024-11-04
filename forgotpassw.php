<?php
session_start();
require 'b-d.php'; 

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST")  {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    if ($email) {
        $otp = random_int(100000, 999999);
        $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));
             $stmt = $pdo->prepare("INSERT INTO otp_codes (email, otp, expires_at) VALUES (:email, :otp, :expiry) 
                               ON DUPLICATE KEY UPDATE otp = :otp, expires_at = :expiry");
         $stmt->execute(['email' => $email, 'otp' => $otp, 'expiry' => $expiry]);
        
         
         $subject = "Your OTP Code";
         $message = "Your OTP code is: $otp. It is valid for 5 minutes.";
         $headers = "From: no-reply@yourdomain.com";
         
         if (mail($email, $subject, $message, $headers)) {
             $_SESSION['otp_email'] = $email;  
             header("Location: enter_otp.php"); 
             exit();
         } else {
             echo "Failed to send OTP. Please try again.";
         }
     } else {
         echo "Invalid email address. Please go back and try again.";
     }
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <form action="verify_otp.php" method="POST">
        <label for="otp">OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>

<?php
session_start();
require 'b-d.php'; 

if (isset($_SESSION['otp_email'])&& $_SERVER["REQUEST_METHOD"] === "POST") 
    {$email = $_SESSION['otp_email'];
    $otp = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_NUMBER_INT);
    
    
    $stmt = $pdo->prepare("SELECT otp, expires_at FROM otp_codes WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['otp'] == $otp && strtotime($result['expires_at']) > time()) {
        unset($_SESSION['otp_email']); 
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Invalid or expired OTP. Please go back and try again.";
    }}

 else {
    echo "Session expired or invalid request. Please start again.";}
 
?>