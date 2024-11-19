<?php
header('Content-Type: application/json');
include 'b-d.php';

$sql = "SELECT file_id, file_name, status, user_id FROM files";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch data
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($files);
