<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    die("❌ Not logged in");
}

$admin_id = $_SESSION['admin']['id'];
$course = $_POST['course'];
$year = $_POST['year'] ?? null;
$title = "University Notification";
$message = $_POST['notification'];
$icon = "bullhorn"; // You can later make this dynamic
$created = date("Y-m-d H:i:s");

$sql = "INSERT INTO notifications (course, year, title, message, icon_type, admin_id, created_at, posted_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssiss", $course, $year, $title, $message, $icon, $admin_id, $created, $created);

if ($stmt->execute()) {
    header("Location: ../notifications.php");
    exit();
} else {
    echo "❌ Error: " . $stmt->error;
}

?>
