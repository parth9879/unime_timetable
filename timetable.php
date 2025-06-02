<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

include 'backend/db.php';

$course = $_SESSION['user']['course'];

$stmt = $conn->prepare("SELECT * FROM timetable WHERE course = ?");
$stmt->bind_param("s", $course);
$stmt->execute();
$result = $stmt->get_result();

// BUILD $timetable[time][day] structure
$timetable = [];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
$timeSlots = ['09:00-11:00', '11:00-13:00', '14:00-16:00', '16:00-18:00'];

while ($row = $result->fetch_assoc()) {
    $time = $row['time_slot'];
    $day = $row['day'];
    $timetable[$time][$day] = [
        'subject' => $row['subject'],
        'professor' => $row['professor'],
        'room' => $row['location']
    ];
}

$timeSlots = ['09:00-11:00', '11:00-13:00', '14:00-16:00', '16:00-18:00'];
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Timetable - Università degli Studi di Messina</title>
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
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202022-09-13%20at%2015.07.39-ZmD1gf4md6y8X9dUDt9vBHPUFs7RbL.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 0.2;
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(25, 118, 210, 0.7) 0%, rgba(33, 150, 243, 0.7) 100%);
            z-index: -1;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .university-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/RESTYLING%202020%20LOGO%20UNIME_2_COLOR_0-5jlrnNzyeKqL2kff9fzSieCjJjE6ho.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .course-info {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        .course-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .course-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .timetable-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .section-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .section-title .title-logo {
            width: 40px;
            height: 40px;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/RESTYLING%202020%20LOGO%20UNIME_2_COLOR_0-5jlrnNzyeKqL2kff9fzSieCjJjE6ho.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .timetable-container {
            overflow-x: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .timetable {
            width: 100%;
            border-collapse: collapse;
            background: white;
            min-width: 800px;
        }

        .timetable th {
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            padding: 20px 15px;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
        }

        .timetable th:first-child {
            border-top-left-radius: 15px;
        }

        .timetable th:last-child {
            border-top-right-radius: 15px;
        }

        .timetable td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
            transition: all 0.3s ease;
        }

        .timetable tr:hover td {
            background: #f8f9fa;
        }

        .time-slot {
            background: #f8f9fa !important;
            font-weight: 600;
            color: #333;
            border-right: 2px solid #e9ecef;
        }

        .class-cell {
            position: relative;
            min-height: 80px;
            padding: 10px;
        }

        .class-info {
            background: linear-gradient(135deg, rgba(25, 118, 210, 0.1) 0%, rgba(33, 150, 243, 0.1) 100%);
            border-left: 4px solid #1976D2;
            padding: 15px;
            border-radius: 8px;
            margin: 2px;
            text-align: left;
            transition: all 0.3s ease;
        }

        .class-info:hover {
            background: linear-gradient(135deg, rgba(25, 118, 210, 0.15) 0%, rgba(33, 150, 243, 0.15) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.2);
        }

        .class-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .class-professor {
            color: #1976D2;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .class-room {
            color: #666;
            font-size: 0.8rem;
        }

        .empty-cell {
            color: #ccc;
            font-style: italic;
            font-size: 0.9rem;
        }

        .navigation {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 768px) {
            body::before {
                background-attachment: scroll;
            }

            .header h1 {
                font-size: 2rem;
            }

            .university-logo {
                width: 60px;
                height: 60px;
            }

            .timetable-section {
                padding: 20px;
            }

            .timetable th,
            .timetable td {
                padding: 10px 8px;
                font-size: 0.85rem;
            }

            .class-name {
                font-size: 0.9rem;
            }

            .class-professor,
            .class-room {
                font-size: 0.75rem;
            }

            .section-title .title-logo {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="university-logo"></div>
            <h1><i class="fas fa-calendar-week"></i> My Weekly Timetable</h1>
            <p>Your personalized class schedule</p>
        </div>

        <div class="course-info">
            <?php
$courseLabels = [
    'bsc_data_analysis' => 'BSc in Data Analysis',
    'msc_data_science' => 'MSc in Data Science',
    'ba_political_science' => 'BA in Political Science'
];
$courseName = $courseLabels[$_SESSION['user']['course']] ?? $_SESSION['user']['course'];
?>

<h2 class="course-title"><?php echo htmlspecialchars($courseName); ?></h2>
<p class="course-subtitle">Academic Year 2024/2025 • Student: <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>

        </div>

        <div class="timetable-section">
            <div class="section-header">
                <h2 class="section-title">
                    <div class="title-logo"></div>
                    Weekly Schedule
                </h2>
            </div>
            
            <div class="timetable-container">
                <table class="timetable">
    <thead>
        <tr>
            <th>Time</th>
            <?php foreach ($days as $day): ?>
                <th><?php echo $day; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach ($timeSlots as $timeSlot): ?>
        <tr>
            <td class="time-slot"><?php echo $timeSlot; ?></td>
            <?php foreach ($days as $day): ?>
            <td class="class-cell">
                <?php if (isset($timetable[$timeSlot][$day])): ?>
                <div class="class-info">
                    <div class="class-name"><?php echo htmlspecialchars($timetable[$timeSlot][$day]['subject']); ?></div>
                    <div class="class-professor">Prof. <?php echo htmlspecialchars($timetable[$timeSlot][$day]['professor']); ?></div>
                    <div class="class-room">Room: <?php echo htmlspecialchars($timetable[$timeSlot][$day]['room']); ?></div>
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
        </div>

        <div class="navigation">
            <a href="profile.php" class="nav-link">
                <i class="fas fa-user"></i> Back to Profile
            </a>
        </div>
    </div>
</body>
</html>
