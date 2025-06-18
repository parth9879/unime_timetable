const courseData = {
            bsc_data_analysis: {
                title: "BSc in Data Analysis",
                room: "A-T-10 (Capacity: 60)",
                subjects: [
                    "Algorithms and Data Structures – G. Fiumara",
                    "Calculus 2 – G. Consolo",
                    "Mathematics for Data Analysis – M. Gorgone",
                    "Physics 2 – M. Cutroneo",
                    "Operating Systems – M. Fazio",
                    "Object Oriented Programming – S. Distefano",
                    "Database – A. Ruggeri",
                    "Device Physics – C. Corsaro",
                    "Data Mining – D. Ravì"
                ]
            },
            msc_data_science: {
                title: "MSc in Data Science",
                room: "SBA-2-2, SBA-2-1, LEONARDO, SCIOPG Dept.",
                subjects: [
                    "Deep Learning – F. De Vita",
                    "Big Data Analytics – A. Celesti",
                    "Blockchain & Privacy – M. Villari",
                    "Statistical Models – P. Mustica",
                    "Digital Management – M.C. Cinici",
                    "Private Law for IT – F. Rende",
                    "Free Speech & Human Rights – A. Morelli",
                    "Bio-inspired AI – L. Carnevale",
                    "Combinatorial Data Analysis – G. Rinaldo",
                    "Geoforensics – D. Giosa",
                    "Emerging Tech in Accounting – C. Vermiglio"
                ]
            },
            ba_political_science: {
                title: "BA in Political Science (International Curriculum)",
                room: "O. Buccisano, V. Tomeo, N.6, G. Falcone",
                subjects: [
                    "Sociology of Globalization – D. Farinella",
                    "Political Science – E. Cusumano",
                    "Political Theory – M. Geniale",
                    "History of Political Thought – F. Tomasello",
                    "History of International Relations – N. De Leo",
                    "Contemporary History – R. Merlino",
                    "Global Administrative Law – L. Pergolizzi",
                    "Foreign Languages (French) – Piraro",
                    "Foreign Languages (German) – Catalano",
                    "Foreign Languages (Spanish) – Aliberti",
                    "Tax Law – P. Accordino",
                    "History of Africa – A. Melfa"
                ]
            }
        };

        function showCourseInfo() {
            const courseSelect = document.getElementById('course');
            const courseInfo = document.getElementById('course-info');
            const courseTitle = document.getElementById('course-title');
            const courseRoom = document.getElementById('course-room');
            const courseSubjectsCount = document.getElementById('course-subjects-count');
            const courseSubjects = document.getElementById('course-subjects');

            const selectedCourse = courseSelect.value;

            if (selectedCourse && courseData[selectedCourse]) {
                const data = courseData[selectedCourse];
                
                courseTitle.textContent = data.title;
                courseRoom.textContent = data.room;
                courseSubjectsCount.textContent = data.subjects.length + ' subjects';
                courseSubjects.innerHTML = '';
                
                data.subjects.forEach(subject => {
                    const div = document.createElement('div');
                    div.className = 'subject-item';
                    div.textContent = subject;
                    courseSubjects.appendChild(div);
                });

                courseInfo.style.display = 'block';
            } else {
                courseInfo.style.display = 'none';
            }
        }

        function handleRegistration(event) {
            event.preventDefault();
            
            // Store selected course in localStorage for demo
            const selectedCourse = document.getElementById('course').value;
            const firstName = document.getElementById('first-name').value;
            const lastName = document.getElementById('last-name').value;
            const email = document.getElementById('email').value;
            
            localStorage.setItem('studentData', JSON.stringify({
                name: firstName + ' ' + lastName,
                email: email,
                course: selectedCourse,
                course_name: courseData[selectedCourse].title
            }));
            
            alert('Registration successful! You can now login.');
            window.location.href = 'index.html';
        }