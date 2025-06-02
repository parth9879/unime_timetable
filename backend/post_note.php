<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    die("❌ Access denied.");
}

$professor = $_SESSION['user']['name'];
$course = $_POST['course'];
$message = $_POST['message'];
$year = '1'; // default for now

$stmt = $conn->prepare("INSERT INTO notifications (course, year, message, professor) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $course, $year, $message, $professor);
$stmt->execute();

header("Location: ../admin_panel.php?success=1");
exit();
