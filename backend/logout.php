<?php
session_start();

// Save role before destroying session
$isAdmin = isset($_SESSION['admin']);

session_destroy();

if ($isAdmin) {
    header("Location: ../admin_login.html");
} else {
    header("Location: ../index.php");
}
exit();
