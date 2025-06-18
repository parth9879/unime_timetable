<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../admin_login.html");
    exit();
}

$admin_id = $_SESSION['admin']['id'];

$sql = "SELECT * FROM timetable WHERE admin_id = $admin_id";
$result = $conn->query($sql);
$timetable = [];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$timeSlots = ['09:00-11:00', '11:00-13:00', '14:00-16:00', '16:00-18:00'];
while ($row = $result->fetch_assoc()) {
    $timetable[$row['time_slot']][$row['day']] = [
        'subject' => $row['subject'],
        'location' => $row['location']
        
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Università degli Studi di Messina</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <div class="university-logo"></div>
                <div class="header-title">
                    <h1>Admin Panel</h1>
                    <p>Università degli Studi di Messina</p>
                </div>
            </div>
            <a href="logout.php" class="logout-btn">
  <i class="fas fa-sign-out-alt"></i>
  Logout
</a>

        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Weekly Timetable Section -->
            <h2 class="section-title">
                <i class="fas fa-calendar-week"></i>
                Weekly Timetable Overview
            </h2>
            
            <div class="timetable-container">
                <table class="timetable">
    <thead>
        <tr>
            <th>Time</th>
            <?php foreach ($days as $day): ?>
                <th><?= $day ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
<?php foreach ($timeSlots as $timeSlot): ?>
<tr>
    <td class="time-slot"><?= $timeSlot; ?></td>
    <?php foreach ($days as $day): ?>
    <td class="class-cell">
        <?php if (isset($timetable[$timeSlot][$day])): ?>
        <div class="class-info">
            <div class="class-subject"><?= htmlspecialchars($timetable[$timeSlot][$day]['subject']) ?></div>
            <?php if (isset($timetable[$timeSlot][$day]['location'])): ?>
                <div class="class-room">Room: <?= htmlspecialchars($timetable[$timeSlot][$day]['location']) ?></div>
            <?php else: ?>
                <div class="class-room">Room: –</div>
            <?php endif; ?>
        </div>
        <?php else: ?>
            <span class="empty-cell">–</span>
        <?php endif; ?>
    </td>
    <?php endforeach; ?>
</tr>
<?php endforeach; ?>
</tbody>

                </table>
            </div>

            <!-- Notification Form Section -->
            <h2 class="section-title">
                <i class="fas fa-bullhorn"></i>
                Post Notification
            </h2>
            
            <div class="notification-form">
                <form action="../backend/post_notifications.php" method="POST">
                    <div class="form-group">
                        <label for="course">Select Course</label>
                        <select name="course" id="course" required>
                            <option value="">Choose a course...</option>
                            <option value="bsc-data-analysis">BSc Data Analysis</option>
                            <option value="msc-data-science">MSc Data Science</option>
                            <option value="ba-political-science">BA Political Science</option>
                            
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="notification">Notification Message</label>
                        <textarea name="notification" id="notification" placeholder="Enter your notification message here... (e.g., Class canceled, Important update, Schedule change)" required></textarea>
                    </div>
                    
                    <div class="button-group">
  <button type="submit" class="submit-notification-btn">
    <i class="fas fa-bullhorn"></i> Post Notification
  </button>

  <a href="../notifications.php" class="submit-notification-btn">
    <i class="fas fa-bell"></i> View Notifications
  </a>
</div>

                    
                    </form>
    
                    </a>
                    </div>

                
            </div>
        </div>
    </div>
</body>
</html>