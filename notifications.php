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
    <style>
    input[type="text"], input[type="password"] {
        display: none !important;
        width: 0;
        height: 0;
        border: none;
        background: transparent;
        } 

    input {
        all: unset;
        display: none !important;
         }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            min-height: 100vh;
            position: relative;
            padding: 20px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202022-09-13%20at%2015.07.39-vnkFJYtfWYjyNwl6VvZ7OpEMss7m1j.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0.3;
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(25, 118, 210, 0.8) 0%, rgba(33, 150, 243, 0.8) 100%);
            z-index: -1;
        }

        .notifications-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 25px 35px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .university-logo {
            width: 70px;
            height: 70px;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/RESTYLING%202020%20LOGO%20UNIME_2_COLOR_0-s8ntjVtitkQl2U6p0k8xNRTCD9Yu27.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .header-title {
            color: #333;
        }

        .header-title h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-title p {
            color: #666;
            font-size: 1rem;
        }

        .back-btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            border: none;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.4);
        }

        .notifications-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .notifications-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .notifications-header h2 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .notifications-header p {
            color: #666;
            font-size: 1rem;
        }

        .notifications-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .notification-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(233, 236, 239, 0.8);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .notification-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            border-color: rgba(25, 118, 210, 0.3);
        }

        .notification-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
        }

        .notification-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .notification-meta {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
        }

        .notification-icon.info {
            background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
        }

        .notification-icon.warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
        }

        .notification-icon.important {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
        }

        .notification-icon.announcement {
            background: linear-gradient(135deg, #6f42c1 0%, #6610f2 100%);
        }

        .notification-date {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .course-badge {
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .course-badge.all-courses {
            background: linear-gradient(135deg, #6f42c1 0%, #6610f2 100%);
        }

        .course-badge.bsc {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }

        .course-badge.msc {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
        }

        .course-badge.ba {
            background: linear-gradient(135deg, #e83e8c 0%, #dc3545 100%);
        }

        .notification-content {
            color: #333;
            line-height: 1.6;
            font-size: 1rem;
        }

        .notification-content h3 {
            font-weight: 600;
            margin-bottom: 8px;
            color: #1976D2;
        }

        .no-notifications {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-notifications i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .no-notifications h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #999;
        }

        .filter-section {
            margin-bottom: 25px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 2px solid #1976D2;
            background: transparent;
            color: #1976D2;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #1976D2;
            color: white;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
                padding: 20px;
            }

            .logo-section {
                flex-direction: column;
                gap: 15px;
            }

            .university-logo {
                width: 60px;
                height: 60px;
            }

            .header-title h1 {
                font-size: 1.6rem;
            }

            .notifications-content {
                padding: 25px;
            }

            .notification-card {
                padding: 20px;
            }

            .notification-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .notification-meta {
                width: 100%;
                justify-content: space-between;
            }

            .filter-section {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .notifications-content {
                padding: 20px;
            }

            .notification-card {
                padding: 15px;
            }

            .header-title h1 {
                font-size: 1.4rem;
            }

            .filter-btn {
                font-size: 0.8rem;
                padding: 6px 12px;
            }
        }
    </style>
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

    <script>
        // Simple filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const notificationCards = document.querySelectorAll('.notification-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    const filterText = this.textContent.toLowerCase();

                    notificationCards.forEach(card => {
                        const courseBadge = card.querySelector('.course-badge');
                        const courseBadgeText = courseBadge.textContent.toLowerCase();

                        if (filterText === 'all' || 
                            (filterText === 'bsc courses' && courseBadgeText.includes('bsc')) ||
                            (filterText === 'msc courses' && courseBadgeText.includes('msc')) ||
                            (filterText === 'ba courses' && courseBadgeText.includes('ba')) ||
                            (filterText === 'important' && (courseBadgeText.includes('all courses') || card.querySelector('.notification-icon.important')))) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>