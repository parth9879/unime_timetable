<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // ✅ Check password
        if ($password === $user['password']) {
            session_regenerate_id(); // Prevent session fixation
            $_SESSION['user'] = $user;
            header("Location: ../profile.php");
            exit();
        } else {
            // ❌ Incorrect password
            header("Location: ../index.php?error=incorrect");
            exit();
        }
    } else {
        // ❌ Email not found
        header("Location: ../index.php?error=nouser");
        exit();
    }
} else {
    // Not a POST request
    header("Location: ../index.php");
    exit();
}
?>
