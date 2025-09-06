let currentDeleteId = null;

function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.remove('active');
    });
    
    // Show selected section
    document.getElementById(sectionId).classList.add('active');
    
    // Update navigation
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.classList.remove('active');
    });
    
    event.target.classList.add('active');
}

function searchAccount() {
    const searchTerm = document.getElementById('searchAccount').value;
    // Simulate search and populate update form
    if (searchTerm) {
        // This would typically make an API call
        alert(`Searching for: ${searchTerm}`);
    }
}

function deleteAccount(id) {
    currentDeleteId = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function confirmDelete() {
    if (currentDeleteId) {
        // This would typically make an API call to delete the account
        alert(`Account ${currentDeleteId} deleted successfully`);
        // Remove the row from the table
        const row = document.querySelector(`tr[data-id="${currentDeleteId}"]`);
        if (row) row.remove();
        
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
        modal.hide();
        currentDeleteId = null;
    }
}

function filterByClass() {
    const selectedClass = document.getElementById('classFilter').value;
    const table = document.getElementById('studentTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const classData = row.getAttribute('data-class');
        
        if (selectedClass === '' || classData === selectedClass) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

function searchStudent() {
    const searchTerm = document.getElementById('studentSearch').value.toLowerCase();
    const table = document.getElementById('studentTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const name = row.cells[0].textContent.toLowerCase();
        const email = row.cells[2].textContent.toLowerCase();
        
        if (name.includes(searchTerm) || email.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const inputs = form.querySelectorAll('input[required], select[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (isValid) {
                alert('Form submitted successfully!');
                form.reset();
            }
        });
    });
});

// Auto-hide success messages
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        if (alert.classList.contains('alert-success')) {
            alert.style.display = 'none';
        }
    });
}, 5000);