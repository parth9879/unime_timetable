<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Università degli Studi di Messina - Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="welcome-section">
            <div class="university-logo"></div>
            <h1>Università degli Studi di Messina</h1>
            <p class="subtitle">University of Messina</p>
            <p>Welcome to your academic portal. Access your timetables and stay connected with your university life.</p>
        </div>

        <div class="form-section">
            <div class="form-title">
                <h2>Student Login</h2>
                <p>Enter your credentials to access your profile</p>
            </div>

            <form action="backend/login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your university email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-sign-in-alt"></i> Login to Portal
                </button>
                <div style="display: flex; justify-content: center; margin-top: 20px;">
  <a href="admin_login.html" class="custom-outline-btn"> Admin Login</a>
</div>

            </form>

            <div class="register-link">
                <a href="register.html">
                
                    <i class="fas fa-user-plus"></i> New Student? Register Here
                </a>
            </div>
        </div>
    </div>
</body>
</html>
