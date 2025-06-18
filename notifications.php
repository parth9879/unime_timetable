<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'backend/db.php';
$filter = isset($_GET['course']) ? $_GET['course'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Notifications - UniMe Portal</title>
  <link rel="stylesheet" href="styles/notifications.css"> <!-- your existing CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications — Università degli Studi di Messina</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/notifications.css">
</head>
<body>
    <div class="notifications-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <div class="university-logo"></div>
                <div class="header-title">
                    <h1>
                        <i class="fas fa-bell"></i>
                        Notifications
                    </h1>
                    <p>Università degli Studi di Messina</p>
                </div>
            </div>
            <?php
        $backUrl = 'index.html'; // fallback default
                if (isset($_SESSION['admin'])) {
                     $backUrl = 'backend/admin_panel.php';
                } elseif (isset($_SESSION['user'])) {
                     $backUrl = 'profile.php';
                }
                ?>
        <a href="<?= $backUrl ?>" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Portal
        </a>
        </div>

        <!-- Main Content -->
        <div class="notifications-content">
            <div class="notifications-header">
                <h2>University Notifications</h2>
                <p>Stay updated with the latest announcements and important information</p>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <span style="color: #666; font-weight: 500; margin-right: 10px;">Filter by:</span>
                <button class="filter-btn active">All</button>
                <button class="filter-btn">BSc Courses</button>
                <button class="filter-btn">MSc Courses</button>
                <button class="filter-btn">BA Courses</button>
                <button class="filter-btn">Important</button>
            </div>

            <!-- Notifications List -->
            <div class="notifications-list">
            <?php
$sql = "SELECT notifications.*, admins.name AS professor 
        FROM notifications 
        JOIN admins ON notifications.admin_id = admins.id";

if ($filter) {
    $sql .= " WHERE course = '$filter'";
}
$sql .= " ORDER BY created_at DESC";

$result = $conn->query($sql);
if (!$result) {
    die("❌ SQL Error: " . $conn->error);
}

while ($row = $result->fetch_assoc()):
    $badgeClass = strtolower(str_replace(' ', '-', $row['course']));
    $icon = $row['icon_type'] ?: 'bullhorn';
    $date = date("F j, Y", strtotime($row['created_at']));
?>
  <div class="notification-card">
    <div class="notification-header">
      <div class="notification-meta">
        <div class="notification-icon <?= htmlspecialchars($row['icon_type']) ?>">
          <i class="fas fa-<?= htmlspecialchars($icon) ?>"></i>
        </div>
        <div class="notification-date"><?= $date ?></div>
      </div>
      <div class="course-badge <?= $badgeClass ?>"><?= htmlspecialchars($row['course']) ?></div>
    </div>
    <div class="notification-content">
      <p style="font-weight: bold; color: #555;">
    Posted by: Prof. <?= htmlspecialchars($row['professor']) ?>
</p>

      <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>
    </div>
  </div>
<?php endwhile; ?>

    </div>

    <script src="js/notifications.js"></script>
</body>
</html>