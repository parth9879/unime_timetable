<?php
// Sample student data - in real implementation, this would come from database/session
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$student = $_SESSION['user']; // ← this is the actual user from login


$courseSubjects = [
    'bsc_data_analysis' => [
        ['name' => 'Algorithms and Data Structures', 'professor' => 'G. Fiumara', 'room' => 'A-T-10'],
        ['name' => 'Calculus 2', 'professor' => 'G. Consolo', 'room' => 'A-T-10'],
        ['name' => 'Mathematics for Data Analysis', 'professor' => 'M. Gorgone', 'room' => 'A-T-10'],
        ['name' => 'Physics 2', 'professor' => 'M. Cutroneo', 'room' => 'A-T-10'],
        ['name' => 'Operating Systems', 'professor' => 'M. Fazio', 'room' => 'A-T-10'],
        ['name' => 'Object Oriented Programming', 'professor' => 'S. Distefano', 'room' => 'A-T-10'],
        ['name' => 'Database', 'professor' => 'A. Ruggeri', 'room' => 'A-T-10'],
        ['name' => 'Device Physics', 'professor' => 'C. Corsaro', 'room' => 'A-T-10'],
        ['name' => 'Data Mining', 'professor' => 'D. Ravì', 'room' => 'A-T-10']
    ],
    'msc_data_science' => [
        ['name' => 'Deep Learning', 'professor' => 'F. De Vita', 'room' => 'SBA-2-2'],
        ['name' => 'Big Data Analytics', 'professor' => 'A. Celesti', 'room' => 'SBA-2-1'],
        ['name' => 'Blockchain & Privacy', 'professor' => 'M. Villari', 'room' => 'LEONARDO'],
        ['name' => 'Statistical Models', 'professor' => 'P. Mustica', 'room' => 'SCIOPG Dept.'],
        ['name' => 'Digital Management', 'professor' => 'M.C. Cinici', 'room' => 'SBA-2-2'],
        ['name' => 'Private Law for IT', 'professor' => 'F. Rende', 'room' => 'SBA-2-1'],
        ['name' => 'Free Speech & Human Rights', 'professor' => 'A. Morelli', 'room' => 'LEONARDO'],
        ['name' => 'Bio-inspired AI', 'professor' => 'L. Carnevale', 'room' => 'SCIOPG Dept.'],
        ['name' => 'Combinatorial Data Analysis', 'professor' => 'G. Rinaldo', 'room' => 'SBA-2-2'],
        ['name' => 'Geoforensics', 'professor' => 'D. Giosa', 'room' => 'SBA-2-1'],
        ['name' => 'Emerging Tech in Accounting', 'professor' => 'C. Vermiglio', 'room' => 'LEONARDO']
    ],
    'ba_political_science' => [
        ['name' => 'Sociology of Globalization', 'professor' => 'D. Farinella', 'room' => 'O. Buccisano'],
        ['name' => 'Political Science', 'professor' => 'E. Cusumano', 'room' => 'V. Tomeo'],
        ['name' => 'Political Theory', 'professor' => 'M. Geniale', 'room' => 'N.6'],
        ['name' => 'History of Political Thought', 'professor' => 'F. Tomasello', 'room' => 'G. Falcone'],
        ['name' => 'History of International Relations', 'professor' => 'N. De Leo', 'room' => 'O. Buccisano'],
        ['name' => 'Contemporary History', 'professor' => 'R. Merlino', 'room' => 'V. Tomeo'],
        ['name' => 'Global Administrative Law', 'professor' => 'L. Pergolizzi', 'room' => 'N.6'],
        ['name' => 'Foreign Languages (French)', 'professor' => 'Piraro', 'room' => 'G. Falcone'],
        ['name' => 'Foreign Languages (German)', 'professor' => 'Catalano', 'room' => 'O. Buccisano'],
        ['name' => 'Foreign Languages (Spanish)', 'professor' => 'Aliberti', 'room' => 'V. Tomeo'],
        ['name' => 'Tax Law', 'professor' => 'P. Accordino', 'room' => 'N.6'],
        ['name' => 'History of Africa', 'professor' => 'A. Melfa', 'room' => 'G. Falcone']
    ]
];

$subjects = $courseSubjects[$student['course']] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - Università degli Studi di Messina</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <div class="university-logo"></div>
            <h1 class="profile-title">Student Profile</h1>
            <p class="profile-subtitle">Università degli Studi di Messina</p>

            <div class="user-info">
                <div class="user-details">
                    <div class="user-detail-item">
                        <strong>Full Name</strong>
                        <span><?php echo htmlspecialchars($student['name']); ?></span>
                    </div>
                    <div class="user-detail-item">
                        <strong>Email Address</strong>
                        <span><?php echo htmlspecialchars($student['email']); ?></span>
                    </div>
                    <div class="user-detail-item">
                        <strong>Enrolled Course</strong>
                        <span><?php echo htmlspecialchars($student['course']); ?></span>
                    </div>
                    <div class="user-detail-item">
                        <strong>Student ID</strong>
                        <span><?php echo htmlspecialchars($student['student_id']); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="course-subjects">
            <h2 class="section-title">
                <div class="title-logo"></div>
                Your Course Subjects
            </h2>

            <div class="subjects-grid">
                <?php foreach ($subjects as $subject): ?>
                <div class="subject-card">
                    <div class="subject-name"><?php echo htmlspecialchars($subject['name']); ?></div>
                    <div class="subject-professor">Professor: <?php echo htmlspecialchars($subject['professor']); ?></div>
                    <div class="subject-room">Room: <?php echo htmlspecialchars($subject['room']); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="quick-actions">
            <h2 class="section-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h2>
                        <div class="action-grid">
    <a href="timetable.php" class="action-card">
        <i class="fas fa-calendar-alt"></i>
        <h3>View My Timetable</h3>
        <p>Check your weekly class schedule for your enrolled course</p>
    </a>

    <a href="contacts.php" class="action-card">
        <i class="fas fa-envelope"></i>
        <h3>Contact Professors</h3>
        <p>Get in touch with your course instructors</p>
    </a>

    <a href="notifications.php" class="action-card">
        <i class="fas fa-bell"></i>
        <h3>Notifications</h3>
        <p>View important announcements and course updates</p>
    </a>
</div>

            

               
            </div>
        </div>

        <div class="logout-section">
            <a href="backend/logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</body>
</html>
