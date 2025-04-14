document.addEventListener('DOMContentLoaded', function() {
    // Show login form by default
    document.querySelector('.login-form').classList.add('active');

    // Form switching functionality
    const switchForms = document.querySelectorAll('.switch-form');
    switchForms.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const formToShow = this.dataset.form;
            
            // Hide all forms
            document.querySelectorAll('.form-container').forEach(form => {
                form.classList.remove('active');
            });

            // Show selected form
            document.querySelector(`.${formToShow}-form`).classList.add('active');
        });
    });

    // Handle Registration Form
    const registrationForm = document.getElementById('registrationForm');
    registrationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('regUsername').value;
        const email = document.getElementById('regEmail').value;
        const password = document.getElementById('regPassword').value;

        // Here you would typically send this data to your server
        console.log('Registration:', { username, email, password });
        
        // Clear form
        this.reset();
        
        // Show success message (you can customize this)
        alert('Registration successful!');
        
        // Switch to login form
        document.querySelector('.login-form').classList.add('active');
        document.querySelector('.registration-form').classList.remove('active');
    });

    // Handle Login Form
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = document.getElementById('loginUsername').value;
        const password = document.getElementById('loginPassword').value;

        // Here you would typically send this data to your server
        console.log('Login:', { username, password });
        
        // Clear form
        this.reset();
        
        // Show success message (you can customize this)
        alert('Login successful!');
    });

    // Handle Forgot Password
    const forgotPassword = document.querySelector('.forgot-password');
    forgotPassword.addEventListener('click', function(e) {
        e.preventDefault();
        const username = document.getElementById('loginUsername').value;
        if (username) {
            alert(`Password reset link would be sent to the email associated with username: ${username}`);
        } else {
            alert('Please enter your username first');
        }
    });

    // Handle Social Login
    const socialIcons = document.querySelectorAll('.social-icon');
    socialIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.querySelector('i').classList[1].split('-')[1];
            alert(`${platform} login would be initiated here`);
        });
    });
}); 