<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Università degli Studi di Messina - Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>     
         .custom-outline-btn {
        display: inline-block;
        padding: 12px 28px;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #1e90ff;
        background-color: white;
        border: 2px solid #1e90ff;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.3s ease;
}

.custom-outline-btn:hover {
  background-color: #1e90ff;
  color: white;
}

.custom-outline-btn:hover {
  background-color: #1e90ff;
  color: white;
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
            display: flex;
            align-items: center;
            justify-content: center;
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

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 600px;
            display: flex;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .welcome-section {
            background: linear-gradient(135deg, rgba(25, 118, 210, 0.9) 0%, rgba(33, 150, 243, 0.9) 100%);
            color: white;
            padding: 60px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .university-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background-image: url('logo.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
        }

        .welcome-section h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .welcome-section .subtitle {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 20px;
            opacity: 0.95;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .welcome-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            flex: 1;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .form-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-title p {
            color: #666;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(233, 236, 239, 0.8);
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
        }

        .form-group input:focus {
            outline: none;
            border-color: #1976D2;
            box-shadow: 0 0 0 3px rgba(25, 118, 210, 0.15);
            background: rgba(255, 255, 255, 0.95);
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(25, 118, 210, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(25, 118, 210, 0.5);
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
        }

        .register-link a {
            color: #1976D2;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 30px;
            border: 2px solid #1976D2;
            border-radius: 50px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .register-link a:hover {
            background: #1976D2;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(25, 118, 210, 0.3);
        }

        @media (max-width: 768px) {
            body::before {
                background-attachment: scroll;
            }

            .container {
                flex-direction: column;
                max-width: 400px;
            }

            .welcome-section {
                padding: 40px 30px;
            }

            .university-logo {
                width: 80px;
                height: 80px;
                margin-bottom: 20px;
            }

            .welcome-section h1 {
                font-size: 1.8rem;
            }

            .welcome-section .subtitle {
                font-size: 1.2rem;
            }

            .form-section {
                padding: 40px 30px;
            }  
        }
     
    </style>
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
