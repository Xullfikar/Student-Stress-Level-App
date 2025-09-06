// Motivational quotes
const quotes = [
    {
        text: "The future belongs to those who believe in the beauty of their dreams.",
        author: "Eleanor Roosevelt"
    },
    {
        text: "Success is not final, failure is not fatal: it is the courage to continue that counts.",
        author: "Winston Churchill"
    },
    {
        text: "Education is the most powerful weapon which you can use to change the world.",
        author: "Nelson Mandela"
    },
    {
        text: "The only way to do great work is to love what you do.",
        author: "Steve Jobs"
    },
    {
        text: "Your limitation—it's only your imagination.",
        author: "Anonymous"
    },
    {
        text: "Dream big and dare to fail.",
        author: "Norman Vaughan"
    }
];

// Application state
let hasScheduleData = false;

// Initialize app
document.addEventListener('DOMContentLoaded', function() {
    displayRandomQuote();
    checkExistingData();
    setupEventListeners();
});

// Display random quote
function displayRandomQuote() {
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
    document.getElementById('quoteText').textContent = `"${randomQuote.text}"`;
    document.getElementById('quoteAuthor').textContent = `— ${randomQuote.author}`;
}

// Navigation
function showPage(pageId) {
    // Hide all pages
    document.querySelectorAll('.page-content').forEach(page => {
        page.classList.remove('active');
    });
    
    // Show selected page
    document.getElementById(pageId).classList.add('active');
    
    // Update navigation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    event.target.classList.add('active');

    // Refresh quote when returning to home
    if (pageId === 'home') {
        displayRandomQuote();
    }
}

// Check if user already has schedule data
function checkExistingData() {
    const savedData = localStorage.getItem('studentSchedule');
    if (savedData) {
        const data = JSON.parse(savedData);
        populateForm(data);
        hasScheduleData = true;
        updateFormMode('edit');
        showScheduleSummary(data);
    }
}

// Populate form with existing data
function populateForm(data) {
    // document.getElementById('studentName').value = data.name;
    document.getElementById('studentClass').value = data.class;
    document.getElementById('studentGPA').value = data.gpa;
    document.getElementById('studyHours').value = data.studyHours;
    document.getElementById('sleepHours').value = data.sleepHours;
    document.getElementById('extracurricularHours').value = data.extracurricularHours;
    document.getElementById('physicalHours').value = data.physicalHours;
    document.getElementById('socialHours').value = data.socialHours;
}

// Update form mode (add/edit)
function updateFormMode(mode) {
    const title = document.getElementById('dataFormTitle');
    const submitBtn = document.getElementById('submitBtn');
    const editBtn = document.getElementById('editBtn');
    const formInputs = document.querySelectorAll('#scheduleForm input');

    if (mode === 'edit') {
        title.innerHTML = '<i class="fas fa-edit me-2"></i>Your Schedule Data';
        submitBtn.style.display = 'none';
        editBtn.style.display = 'inline-block';
        
        // Disable form inputs
        formInputs.forEach(input => input.disabled = true);
    } else if (mode === 'editing') {
        title.innerHTML = '<i class="fas fa-edit me-2"></i>Edit Your Schedule Data';
        submitBtn.style.display = 'inline-block';
        submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Update Schedule';
        editBtn.style.display = 'none';
        
        // Enable form inputs
        formInputs.forEach(input => input.disabled = false);
    }
}

// Enable edit mode
function enableEdit() {
    updateFormMode('editing');
}

// Show schedule summary
function showScheduleSummary(data) {
    const summaryCard = document.getElementById('summaryCard');
    const preview = document.getElementById('schedulePreview');
    const progress = document.getElementById('scheduleProgress');
    const progressText = document.getElementById('progressText');

    const totalHours = parseInt(data.studyHours) + parseInt(data.sleepHours) + 
                        parseInt(data.extracurricularHours) + parseInt(data.physicalHours) + 
                        parseInt(data.socialHours);

    preview.innerHTML = `
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-book fa-2x mb-2" style="color: var(--accent-purple);"></i>
                <h6>Study</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${data.studyHours}h</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-bed fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                <h6>Sleep</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${data.sleepHours}h</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-users fa-2x mb-2" style="color: var(--accent-purple);"></i>
                <h6>Extracurricular</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${data.extracurricularHours}h</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-running fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                <h6>Physical</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${data.physicalHours}h</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-comments fa-2x mb-2" style="color: var(--accent-purple);"></i>
                <h6>Social</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${data.socialHours}h</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="text-center">
                <i class="fas fa-clock fa-2x mb-2" style="color: var(--accent-cyan);"></i>
                <h6>Total</h6>
                <span class="stats-number" style="font-size: 1.5rem;">${totalHours}h</span>
            </div>
        </div>
    `;

    const percentage = (totalHours / 24) * 100;
    progress.style.width = `${Math.min(percentage, 100)}%`;
    progressText.textContent = `${totalHours}/24 hours`;

    if (totalHours > 24) {
        progress.style.background = 'linear-gradient(135deg, #dc3545, #c82333)';
        progressText.textContent += ' (Overbooked!)';
    }

    summaryCard.style.display = 'block';
}

// Setup event listeners
function setupEventListeners() {
    // Schedule form submission
    document.getElementById('scheduleForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = {
            // name: document.getElementById('studentName').value,
            class: document.getElementById('studentClass').value,
            gpa: document.getElementById('studentGPA').value,
            studyHours: document.getElementById('studyHours').value,
            sleepHours: document.getElementById('sleepHours').value,
            extracurricularHours: document.getElementById('extracurricularHours').value,
            physicalHours: document.getElementById('physicalHours').value,
            socialHours: document.getElementById('socialHours').value
        };

        const apiDataToSend = {
            "data": [
                parseFloat(formData.studyHours),
                parseFloat(formData.extracurricularHours),
                parseFloat(formData.sleepHours),
                parseFloat(formData.physicalHours),
                parseFloat(formData.socialHours),
                parseFloat(formData.gpa),
            ]
        };

        // Validate total hours
        const totalHours = parseInt(formData.studyHours) + parseInt(formData.sleepHours) + 
                            parseInt(formData.extracurricularHours) + parseInt(formData.physicalHours) + 
                            parseInt(formData.socialHours);

        if (totalHours > 24) {
            alert('Warning: Your total hours exceed 24 hours per day. Please adjust your schedule.');
        }

        // Save data
        // localStorage.setItem('studentSchedule', JSON.stringify(formData));
        // hasScheduleData = true;
        // updateFormMode('edit');
        // showScheduleSummary(formData);

        // alert('Schedule saved successfully!');
        try {
            const response = await fetch('http://127.0.0.1:5000/predict', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(apiDataToSend)
            });

            if (!response.ok) {
                throw new Error('Failed to make prediction from API');
            }

            const apiResponseData = await response.json();

            // MODIFIKASI: Validasi dan pengambilan data dari respons yang berisi objek tunggal
            if (!apiResponseData || !apiResponseData.predict) {
                throw new Error("Invalid API response format. Property 'predict' not found.");
            }

            const predictValue = apiResponseData.predict; // Mengakses langsung properti 'predict'
            
            const fullFormData = {
                ...formData,
                predict: predictValue
            };

            localStorage.setItem('studentSchedule', JSON.stringify(fullFormData));
            hasScheduleData = true;
            updateFormMode('edit');
            showScheduleSummary(fullFormData);

            alert('Schedule saved successfully!');

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while saving the schedule. Please try again.');
        }
    });

// Profile picture change using the new function name
function changeProfileImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
            // Save to localStorage for persistence
            localStorage.setItem('profileImageData', e.target.result);
        };
        reader.readAsDataURL(file);
    }
}

// Update profile function
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

    // Load saved profile image
    const savedImage = localStorage.getItem('profileImageData');
    if (savedImage) {
        document.getElementById('profileImage').src = savedImage;
    }
}

// Add click handlers for navigation
document.addEventListener('click', function(e) {
    if (e.target.matches('.nav-link')) {
        e.preventDefault();
    }
});