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
    <style>
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
           background-image: url('background.png');

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
            background-blend-mode: overlay;
            z-index: -1;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 20px 30px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .university-logo {
            width: 60px;
            height: 60px;
             background-image: url('../logo.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .header-title {
            color: #333;
        }

        .header-title h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header-title p {
            color: #666;
            font-size: 0.9rem;
        }

        .logout-btn {
            padding: 10px 20px;
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

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.4);
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .timetable-container {
            overflow-x: auto;
            margin-bottom: 40px;
        }

        .timetable {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .timetable th {
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .timetable td {
            padding: 12px 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            vertical-align: top;
            min-height: 80px;
            position: relative;
        }

        .time-slot {
            background: rgba(25, 118, 210, 0.1);
            font-weight: 600;
            color: #1976D2;
            text-align: center;
        }

        .class-cell {
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .class-cell:hover {
            background: rgba(33, 150, 243, 0.1);
            transform: scale(1.02);
        }

        .class-info {
            font-size: 0.8rem;
            line-height: 1.3;
        }

        .class-subject {
            font-weight: 600;
            color: #1976D2;
            margin-bottom: 4px;
        }

        .class-professor {
            color: #333;
            margin-bottom: 2px;
        }

        .class-course {
            color: #666;
            font-size: 0.75rem;
            margin-bottom: 2px;
        }

        .class-room {
            color: #888;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .notification-form {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid rgba(233, 236, 239, 0.8);
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1976D2;
            box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.15);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .submit-notification-btn {
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .submit-notification-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(25, 118, 210, 0.4);
        }
                   .button-group {
    display: flex;
    gap: 12px;
    margin-top: 20px;
}

.button-group .submit-notification-btn {
    flex: 1; /* or use width: fit-content; if you don't want equal width */
    text-decoration: none;
    justify-content: center;
}
     
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .main-content {
                padding: 20px;
            }

            .timetable th,
            .timetable td {
                padding: 8px 4px;
                font-size: 0.8rem;
            }

            .class-info {
                font-size: 0.7rem;
            }

            .section-title {
                font-size: 1.3rem;
            }

            .university-logo {
                width: 50px;
                height: 50px;
            }

            .header-title h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .timetable th,
            .timetable td {
                padding: 6px 2px;
                font-size: 0.7rem;
            }

            .class-info {
                font-size: 0.65rem;
            }
        }
    </style>
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