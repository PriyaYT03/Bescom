<?php
// router.php
if (php_sapi_name() == 'cli-server' && isset($_SERVER['REQUEST_URI'])) {
    $url = $_SERVER['REQUEST_URI'];
    if (strpos($url, '.html') !== false ||strpos($url, '.php') !== false||strpos($url, '.css') !== false || strpos($url, '.js') !== false || strpos($url, '.png') !== false || strpos($url, '.jpg') !== false || strpos($url, '.jpeg') !== false || strpos($url, '.gif') !== false) {
        return false; // Let PHP handle the static file request
    }
    if ($url == '/' ) {
        $_SERVER['SCRIPT_NAME'] = '/login.html';
        include 'login.html'; // or any other file
    }
}