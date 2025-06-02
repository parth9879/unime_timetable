
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Professors - UniMe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
        display: flex;
        justify-content: flex-end; 
        gap: 20px;
        flex-wrap: wrap; 
        }
            .action-card a {
    text-decoration: none;
    color: inherit;
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
            <h1 class="profile-title">Contact Professors</h1>
            <p class="profile-subtitle">Università degli Studi di Messina</p>
        </div>
        <div class="course-subjects">
<h2 class="section-title">Bachelor in Data Analysis</h2><div class="subjects-grid">
        <div class="subject-card">
            <div class="subject-name">Algorithms and Data Structures</div>
            <div class="subject-professor">Professor: G. Fiumara</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:g.fiumara@unime.it">g.fiumara@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Physics 2</div>
            <div class="subject-professor">Professor: M. Cutroneo</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:m.cutroneo@unime.it">m.cutroneo@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Calculus 2</div>
            <div class="subject-professor">Professor: G. Consolo</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:g.consolo@unime.it">g.consolo@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Mathematics for Data Analysis</div>
            <div class="subject-professor">Professor: M. Gorgone</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:m.gorgone@unime.it">m.gorgone@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Operating Systems</div>
            <div class="subject-professor">Professor: M. Fazio</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:m.fazio@unime.it">m.fazio@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Object Oriented Programming</div>
            <div class="subject-professor">Professor: S. Distefano</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:s.distefano@unime.it">s.distefano@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Database</div>
            <div class="subject-professor">Professor: A. Ruggeri</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:a.ruggeri@unime.it">a.ruggeri@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Device Physics</div>
            <div class="subject-professor">Professor: C. Corsaro</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:c.corsaro@unime.it">c.corsaro@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Data Mining</div>
            <div class="subject-professor">Professor: D. Ravì</div>
            <div class="subject-room">Room: A-T-10</div>
            <div class="subject-room">Email: <a href="mailto:d.ravì@unime.it">d.ravì@unime.it</a></div>
        </div>
        </div><h2 class="section-title">Master in Data Science</h2><div class="subjects-grid">
        <div class="subject-card">
            <div class="subject-name">Deep Learning</div>
            <div class="subject-professor">Professor: F. De Vita</div>
            <div class="subject-room">Room: SBA-2-2</div>
            <div class="subject-room">Email: <a href="mailto:f.vita@unime.it">f.vita@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Big Data Analytics</div>
            <div class="subject-professor">Professor: A. Celesti</div>
            <div class="subject-room">Room: SBA-2-1</div>
            <div class="subject-room">Email: <a href="mailto:a.celesti@unime.it">a.celesti@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Blockchain & Privacy</div>
            <div class="subject-professor">Professor: M. Villari</div>
            <div class="subject-room">Room: LEONARDO</div>
            <div class="subject-room">Email: <a href="mailto:m.villari@unime.it">m.villari@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Statistical Models</div>
            <div class="subject-professor">Professor: P. Mustica</div>
            <div class="subject-room">Room: SCIOPG Dept.</div>
            <div class="subject-room">Email: <a href="mailto:p.mustica@unime.it">p.mustica@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Digital Management</div>
            <div class="subject-professor">Professor: M.C. Cinici</div>
            <div class="subject-room">Room: SBA-2-2</div>
            <div class="subject-room">Email: <a href="mailto:m.cinici@unime.it">m.cinici@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Private Law for IT</div>
            <div class="subject-professor">Professor: F. Rende</div>
            <div class="subject-room">Room: SBA-2-1</div>
            <div class="subject-room">Email: <a href="mailto:f.rende@unime.it">f.rende@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Free Speech & Human Rights</div>
            <div class="subject-professor">Professor: A. Morelli</div>
            <div class="subject-room">Room: LEONARDO</div>
            <div class="subject-room">Email: <a href="mailto:a.morelli@unime.it">a.morelli@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Bio-inspired AI</div>
            <div class="subject-professor">Professor: L. Carnevale</div>
            <div class="subject-room">Room: SCIOPG Dept.</div>
            <div class="subject-room">Email: <a href="mailto:l.carnevale@unime.it">l.carnevale@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Combinatorial Data Analysis</div>
            <div class="subject-professor">Professor: G. Rinaldo</div>
            <div class="subject-room">Room: SBA-2-2</div>
            <div class="subject-room">Email: <a href="mailto:g.rinaldo@unime.it">g.rinaldo@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Geoforensics</div>
            <div class="subject-professor">Professor: D. Giosa</div>
            <div class="subject-room">Room: SBA-2-1</div>
            <div class="subject-room">Email: <a href="mailto:d.giosa@unime.it">d.giosa@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Emerging Tech in Accounting</div>
            <div class="subject-professor">Professor: C. Vermiglio</div>
            <div class="subject-room">Room: LEONARDO</div>
            <div class="subject-room">Email: <a href="mailto:c.vermiglio@unime.it">c.vermiglio@unime.it</a></div>
        </div>
        </div><h2 class="section-title">BA in Political Science</h2><div class="subjects-grid">
        <div class="subject-card">
            <div class="subject-name">Sociology of Globalization</div>
            <div class="subject-professor">Professor: D. Farinella</div>
            <div class="subject-room">Room: O. Buccisano</div>
            <div class="subject-room">Email: <a href="mailto:d.farinella@unime.it">d.farinella@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Political Science</div>
            <div class="subject-professor">Professor: E. Cusumano</div>
            <div class="subject-room">Room: V. Tomeo</div>
            <div class="subject-room">Email: <a href="mailto:e.cusumano@unime.it">e.cusumano@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Political Theory</div>
            <div class="subject-professor">Professor: M. Geniale</div>
            <div class="subject-room">Room: N.6</div>
            <div class="subject-room">Email: <a href="mailto:m.geniale@unime.it">m.geniale@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">History of Political Thought</div>
            <div class="subject-professor">Professor: F. Tomasello</div>
            <div class="subject-room">Room: G. Falcone</div>
            <div class="subject-room">Email: <a href="mailto:f.tomasello@unime.it">f.tomasello@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">History of International Relations</div>
            <div class="subject-professor">Professor: N. De Leo</div>
            <div class="subject-room">Room: O. Buccisano</div>
            <div class="subject-room">Email: <a href="mailto:n.leo@unime.it">n.leo@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Contemporary History</div>
            <div class="subject-professor">Professor: R. Merlino</div>
            <div class="subject-room">Room: V. Tomeo</div>
            <div class="subject-room">Email: <a href="mailto:r.merlino@unime.it">r.merlino@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Global Administrative Law</div>
            <div class="subject-professor">Professor: L. Pergolizzi</div>
            <div class="subject-room">Room: N.6</div>
            <div class="subject-room">Email: <a href="mailto:l.pergolizzi@unime.it">l.pergolizzi@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Foreign Languages (French)</div>
            <div class="subject-professor">Professor: Piraro</div>
            <div class="subject-room">Room: G. Falcone</div>
            <div class="subject-room">Email: <a href="mailto:p.piraro@unime.it">p.piraro@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Foreign Languages (German)</div>
            <div class="subject-professor">Professor: Catalano</div>
            <div class="subject-room">Room: O. Buccisano</div>
            <div class="subject-room">Email: <a href="mailto:c.catalano@unime.it">c.catalano@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Foreign Languages (Spanish)</div>
            <div class="subject-professor">Professor: Aliberti</div>
            <div class="subject-room">Room: V. Tomeo</div>
            <div class="subject-room">Email: <a href="mailto:a.aliberti@unime.it">a.aliberti@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">Tax Law</div>
            <div class="subject-professor">Professor: P. Accordino</div>
            <div class="subject-room">Room: N.6</div>
            <div class="subject-room">Email: <a href="mailto:p.accordino@unime.it">p.accordino@unime.it</a></div>
        </div>
        
        <div class="subject-card">
            <div class="subject-name">History of Africa</div>
            <div class="subject-professor">Professor: A. Melfa</div>
            <div class="subject-room">Room: G. Falcone</div>
            <div class="subject-room">Email: <a href="mailto:a.melfa@unime.it">a.melfa@unime.it</a></div>
        </div>
        </div>
        </div>
        <div class="logout-section">
            <a href="profile.php" class="logout-btn"><i class="fas fa-arrow-left"></i> Back to Profile</a>
        </div>
    </div>
</body>
</html>
