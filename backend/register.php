<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = $_POST['first_name'];
    $last  = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // plain-text

    $course = $_POST['course'];
    $name = $first . ' ' . $last;

    // Custom ID Prefix
    $prefixMap = [
        'bsc_data_analysis' => 'DA',
        'msc_data_science' => 'DS',
        'ba_political_science' => 'PS'
    ];
    $prefix = isset($prefixMap[$course]) ? $prefixMap[$course] : 'UN';
    $year = date('Y');

    // Count existing users in same course
    $stmtCount = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE course = ?");
    $stmtCount->bind_param("s", $course);
    $stmtCount->execute();
    $result = $stmtCount->get_result();
    $count = $result->fetch_assoc()['count'];
    $serial = str_pad($count + 1, 3, '0', STR_PAD_LEFT);

    $student_id = $prefix . $year . $serial;

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, course, student_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $course, $student_id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>
