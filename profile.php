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
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        .university-logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/RESTYLING%202020%20LOGO%20UNIME_2_COLOR_0-5jlrnNzyeKqL2kff9fzSieCjJjE6ho.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .profile-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
        }

        .user-info {
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .user-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .user-detail-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .user-detail-item strong {
            color: #1976D2;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .user-detail-item span {
            color: #333;
            font-size: 1.1rem;
        }

        .course-subjects {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
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

        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
        }

        .subject-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 4px solid #1976D2;
        }

        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(25, 118, 210, 0.2);
        }

        .subject-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .subject-professor {
            color: #1976D2;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .subject-room {
            color: #666;
            font-size: 0.9rem;
        }

        .quick-actions {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        justify-items: center;
        align-items: stretch;
        }
        .action-card a {
        text-decoration: none;
        color: inherit;
        height: 100%;
        min-height: 200px;
        }



      .action-card {
        width: 250px;                 
        background: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
        text-decoration: none;
        color: inherit;


        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: #1976D2;
            box-shadow: 0 15px 40px rgba(25, 118, 210, 0.2);
        }

        .action-card i {
            font-size: 2.5rem;
            color: #1976D2;
            margin-bottom: 15px;
        }

        .action-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
        }

        .action-card p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .logout-section {
            text-align: center;
            margin-top: 30px;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .logout-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
            
        }
        
            
        @media (max-width: 768px) {
            
            body::before {
                background-attachment: scroll;
            }

            .container {
                margin: 10px;
            }

            .profile-header {
                padding: 30px 20px;
            }

            .university-logo {
                width: 80px;
                height: 80px;
            }

            .profile-title {
                font-size: 2rem;
            }

            .course-subjects,
            .quick-actions {
                padding: 30px 20px;
            }

            .user-details {
                grid-template-columns: 1fr;
            }

            .subjects-grid,
            .action-grid {
                grid-template-columns: 1fr;
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
