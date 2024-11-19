if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id']; // Ensure the user is logged in and ID is set
    $username = $_POST['username']; // New username
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update profile info in the database
    $sql = "UPDATE users SET username = :username, email = :email, phone = :phone WHERE user_id = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        // Update the session with the new username
        $_SESSION['username'] = $username;
        echo json_encode(['success' => 'Profile updated successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to update profile.']);
    }
}
