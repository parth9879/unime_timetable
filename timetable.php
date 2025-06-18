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
    <link rel="stylesheet" href="css/timetable.css">
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
