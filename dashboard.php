<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}


include 'b-d.php';
include 'dashboard.html';

?>


