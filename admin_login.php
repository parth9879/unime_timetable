<?php
session_start();
include 'backend/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if ($password === $admin['password']) {
            $_SESSION['admin'] = $admin;
            header("Location: backend/admin_panel.php");
            exit();
        } else {
            header("Location: admin_login.html?error=incorrect");
            exit();
        }
    } else {
        header("Location: admin_login.html?error=notfound");
        exit();
    }
} else {
    // fallback redirect if accessed directly
    header("Location: admin_login.html");
    exit();
}
