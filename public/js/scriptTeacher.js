// console.log("jlaan");

// Sample student data
// const studentsData = [
//     {
//         name: "Alice Johnson",
//         class: "10A",
//         studyHours: 8,
//         sleepHours: 6,
//         extraHours: 2,
//         physicalHours: 1,
//         socialHours: 3,
//         stressLevel: "high"
//     },
//     {
//         name: "Bob Smith",
//         class: "10B",
//         studyHours: 6,
//         sleepHours: 8,
//         extraHours: 1,
//         physicalHours: 2,
//         socialHours: 4,
//         stressLevel: "low"
//     },
//     {
//         name: "Carol Davis",
//         class: "11A",
//         studyHours: 7,
//         sleepHours: 7,
//         extraHours: 1.5,
//         physicalHours: 1.5,
//         socialHours: 3.5,
//         stressLevel: "moderate"
//     },
//     {
//         name: "David Wilson",
//         class: "11B",
//         studyHours: 9,
//         sleepHours: 5,
//         extraHours: 2.5,
//         physicalHours: 0.5,
//         socialHours: 2,
//         stressLevel: "high"
//     },
//     {
//         name: "Emma Brown",
//         class: "12A",
//         studyHours: 5,
//         sleepHours: 8,
//         extraHours: 1,
//         physicalHours: 3,
//         socialHours: 5,
//         stressLevel: "low"
//     },
//     {
//         name: "Frank Miller",
//         class: "10A",
//         studyHours: 7,
//         sleepHours: 6.5,
//         extraHours: 2,
//         physicalHours: 2,
//         socialHours: 3,
//         stressLevel: "moderate"
//     }
// ];

const studentSchedule = localStorage.getItem('studentSchedule');
let studentsData = JSON.parse(studentSchedule);
let currentStudents = [studentsData];
// console.log(currentStudents)

function showDashboard() {
    document.getElementById('dashboard-page').style.display = 'block';
    document.getElementById('detail-page').style.display = 'none';
    document.getElementById('profile-page').style.display = 'none';
    updateActiveNav(0);
    generateStudentsGrid();
}

function showDetail() {
    document.getElementById('dashboard-page').style.display = 'none';
    document.getElementById('detail-page').style.display = 'block';
    document.getElementById('profile-page').style.display = 'none';
    updateActiveNav(1);
    generateStudentsTable();
}

function showProfile() {
    document.getElementById('dashboard-page').style.display = 'none';
    document.getElementById('detail-page').style.display = 'none';
    document.getElementById('profile-page').style.display = 'block';
    updateActiveNav(2);
}

function updateActiveNav(activeIndex) {
    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    navLinks.forEach((link, index) => {
        if (index === activeIndex) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

function generateStudentsGrid() {
    const grid = document.getElementById('students-grid');
    grid.innerHTML = '';
    
    studentsData.forEach(student => {
        const stressClass = `stress-${student.stressLevel}`;
        const card = document.createElement('div');
        card.className = 'col-md-6 col-lg-4 mb-3';
        card.innerHTML = `
            <div class="card student-card" onclick="showStudentDetail('${student.name}')">
                <div class="card-body">
                    <h5 class="card-title">${student.name}</h5>
                    <p class="card-text">
                        <strong>Class:</strong> ${student.class}<br>
                        <strong>Stress Level:</strong> <span class="${stressClass}">${student.stressLevel.toUpperCase()}</span>
                    </p>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-info-circle me-1"></i>View Details
                    </button>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });
}

// function generateStudentsTable() {
//     const tableBody = document.getElementById('students-table');
//     tableBody.innerHTML = '';
    
//     currentStudents.forEach(student => {
//         const stressClass = `stress-${student.predict}`;
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td>Steven Jayadi</td>
//             <td>${student.class}</td>
//             <td>${student.studyHours}h</td>
//             <td>${student.sleepHours}h</td>
//             <td>${student.extracurricularHours}h</td>
//             <td>${student.physicalHours}h</td>
//             <td>${student.socialHours}h</td>
//             <td><span class="${stressClass}">${student.predict.toUpperCase()}</span></td>
//         `;
//         tableBody.appendChild(row);
//     });
// }
//<td>${student.name}</td>
//<td><span class="${stressClass}">${student.stressLevel.toUpperCase()}</span></td>

function filterStudents() {
    const classFilter = document.getElementById('classFilter').value;
    const stressFilter = document.getElementById('stressFilter').value;
    
    currentStudents = studentsData.filter(student => {
        const matchClass = !classFilter || student.class === classFilter;
        const matchStress = !stressFilter || student.stressLevel === stressFilter;
        return matchClass && matchStress;
    });
    
    generateStudentsTable();
}

function showStudentDetail(studentName) {
    showDetail();
}

function changeProfileImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function updateProfile(event) {
    event.preventDefault();
    
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (!currentPassword) {
        alert('Please enter your current password');
        return;
    }
    
    if (newPassword !== confirmPassword) {
        alert('New passwords do not match');
        return;
    }
    
    if (newPassword.length < 6) {
        alert('New password must be at least 6 characters long');
        return;
    }
    
    alert('Profile updated successfully!');
    
    // Clear password fields
    document.getElementById('currentPassword').value = '';
    document.getElementById('newPassword').value = '';
    document.getElementById('confirmPassword').value = '';
}

// Initialize dashboard on page load
document.addEventListener('DOMContentLoaded', function() {
    showDashboard();
});