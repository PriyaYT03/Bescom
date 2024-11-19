<?php
header('Content-Type: application/json');
include 'b-d.php';

$sql = "SELECT 
            files.file_id, 
            files.file_name, 
            files.status, 
            files.user_id, 
            files.created_at, 
            files.updated_at, 
            departments.department_name,
            departments.department_id
        FROM 
            files
        JOIN 
            departments ON files.department_id = departments.department_id";
    

$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch data
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($files);