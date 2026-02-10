<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create an account to start your real estate journey with TrueBroker">
    <title>Register | TrueBroker</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Register.css">
</head>
<style>
            :root {
            --primary: #8d2ba8;
            --primary-light: #9d3ab8;
            --secondary: #1E8540;
            --secondary-light: #27a552;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --danger: #dc3545;
            --google-red: #DB4437;
            --apple-black: #000000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f7ff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            line-height: 1.6;
            color: var(--dark);
        }

        /* Auth form styles */
        .auth-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
            width: 100%;
        }
         
        .auth-image {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .auth-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.3);
        }
        
        .auth-image-overlay img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }
        
        .auth-image-overlay h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .auth-image-overlay p {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 500px;
            margin: 0 auto;
            opacity: 0.9;
        }
        
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: white;
        }
        
        .auth-form-container {
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .auth-header {
            margin-bottom: 30px;
            text-align: center;
        }
        
        .auth-header img {
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
        }
        
        .auth-header h1 {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .auth-header p {
            color: var(--gray);
            font-size: 14px; 
        }
        
        .auth-header a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .auth-header a:hover {
            text-decoration: underline;
            opacity: 0.9;
        }
        
        .auth-form .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--dark);
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--light-gray);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(141, 43, 168, 0.1);
        }
        
        .form-control.invalid {
            border-color: var(--danger);
        }
        
        .error-message {
            color: var(--danger);
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }
        
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
        }
        
        .checkbox-group input {
            margin-right: 10px;
            margin-top: 3px;
            min-width: 16px;
        }
        
        .checkbox-group label {
            font-size: 14px;
            color: var(--dark);
            text-align: left;
        }
        
        .checkbox-group a {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .checkbox-group a:hover {
            text-decoration: underline;
            opacity: 0.9;
        }
        
        .btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(116, 43, 136, 0.1);
            font-family: inherit;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(116, 43, 136, 0.2);
            opacity: 0.95;
        }
        
        .btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(116, 43, 136, 0.1);
        }
        
        .auth-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--gray);
            font-size: 14px;
        }
        
        .auth-divider::before,
        .auth-divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .auth-divider::before {
            margin-right: 15px;
        }
        
        .auth-divider::after {
            margin-left: 15px;
        }
        
        .social-auth {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-auth-btn {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            border: 2px solid var(--light-gray);
            background: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: inherit;
        }
        
        .social-auth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        }
        
        .social-auth-btn:active {
            transform: translateY(0);
        }
        
        .social-auth-btn.google {
            color: var(--google-red);
        }
        
        .social-auth-btn.google:hover {
            border-color: var(--google-red);
            background-color: rgba(219, 68, 55, 0.05);
        }
        
        .social-auth-btn.apple {
            color: var(--apple-black);
        }
        
        .social-auth-btn.apple:hover {
            border-color: var(--apple-black);
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        /* Login section styles (hidden by default) */
        .login-section {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .login-section.active {
            display: block;
            opacity: 1;
        }
        
        .register-section {
            transition: opacity 0.5s ease;
        }
        
        .register-section.hidden {
            display: none;
            opacity: 0;
        }
        
        @media (max-width: 992px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }
            
            .auth-image {
                display: none;
            }
            
            .auth-container {
                padding: 30px 20px;
            }
        }
        
        @media (max-width: 480px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .social-auth {
                flex-direction: column;
            }
            
            .auth-container {
                padding: 20px 15px;
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Success message styles */
        .success-message {
            text-align: center;
            padding: 20px;
            background-color: rgba(30, 133, 64, 0.1);
            border-radius: 12px;
            margin-bottom: 20px;
            display: none;
        }
        
        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .success-message h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }
        
        .success-message p {
            color: var(--dark);
            margin-bottom: 15px;
        }

</style>
<body>
    <div class="auth-grid">
        <div class="auth-image">
            <div class="auth-image-overlay">
                <img src="img/home.png" alt="True Broker" loading="lazy">
                <h2>Start Your Real Estate Journey</h2>
                <p>Create your account and start your real estate journey with us today. Get access to exclusive listings, market insights, and professional tools.</p>
            </div>
        </div>
        
        <div class="auth-container">
            <div class="auth-form-container">
                <!-- Success message (hidden by default) -->
                <div class="success-message" id="successMessage">
                    <h3>Registration Successful!</h3>
                    <p>Your account has been created successfully.</p>
                    <button class="btn" id="goToLoginBtn">Continue to Login</button>
                </div>
                
                <!-- Register Section -->
                <div class="register-section" id="registerSection">
                    <div class="auth-header">
                        <img src="./img/icon1.png" alt="TrueBroker" loading="lazy">
                        <h1>Create an Account</h1>
                        <p>Already have an account? <a href="login.php" id="switchToLoginLink">Login</a></p>
                    </div>
                    
                    <form id="signupForm" class="auth-form" novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="signup-firstname">First Name</label>
                                <input type="text" id="signup-firstname" class="form-control" placeholder="First Name" required>
                                <div class="error-message" id="firstname-error">Please enter your first name</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="signup-lastname">Last Name</label>
                                <input type="text" id="signup-lastname" class="form-control" placeholder="Last Name" required>
                                <div class="error-message" id="lastname-error">Please enter your last name</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="signup-email">Email</label>
                            <input type="email" id="signup-email" class="form-control" placeholder="Enter email" required>
                            <div class="error-message" id="email-error">Please enter a valid email address</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="signup-password">Password</label>
                            <input type="password" id="signup-password" class="form-control" placeholder="Enter Password (min 8 characters)" minlength="8" required>
                            <div class="error-message" id="password-error">Password must be at least 8 characters</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="signup-confirm-password">Confirm Password</label>
                            <input type="password" id="signup-confirm-password" class="form-control" placeholder="Confirm Password" minlength="8" required>
                            <div class="error-message" id="confirm-password-error">Passwords do not match</div>
                        </div>
                        
                        <div class="checkbox-group">
                            <input type="checkbox" id="agree-terms" required>
                            <label for="agree-terms">I agree to the <a href="terms.html" target="_blank">Terms & Conditions</a> and <a href="privacy.html" target="_blank">Privacy Policy</a></label>
                        </div>
                        <div class="error-message" id="terms-error">You must agree to the terms and conditions</div>
                        
                        <button type="submit" class="btn">Create Account</button>
                    </form>
                    
                    <div class="auth-divider">
                        <span>or sign up with</span>
                    </div>
                    
                    <div class="social-auth">
                        <button type="button" class="social-auth-btn google" aria-label="Sign up with Google">
                            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="currentColor"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="currentColor"/>
                            </svg>
                            Google
                        </button>
                        <button type="button" class="social-auth-btn apple" aria-label="Sign up with Apple">
                            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" fill="currentColor"/>
                            </svg>
                            Apple
                        </button>
                    </div>
                </div>
                
                <!-- Login Section (hidden by default) -->
                <div class="login-section" id="loginSection">
                    <div class="auth-header">
                        <img src="./img/icon1.png" alt="TrueBroker" loading="lazy">
                        <h1>Welcome Back!</h1>
                        <p>Don't have an account? <a href="#" id="switchToRegisterLink">Register</a></p>
                    </div>
                    
                    <form id="loginForm" class="auth-form" action="my_profile.php" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="login-email">Email</label>
                            <input type="email" id="login-email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="login-password">Password</label>
                            <input type="password" id="login-password" name="password" class="form-control" placeholder="Enter Password" required>
                            <div class="auth-header" style="text-align: right; margin-top: 5px;">
                                <a href="#" style="font-size: 12px;">Forgot Password?</a>
                            </div>
                        </div>
                        
                        <a href="Index.php" class="btn" style="display:inline-block; text-align:center; text-decoration: none;">
    Login
</a>

                       <!-- <a href="./Index.php"><button type="submit" class="btn">Login</button></a>  -->
                    </form>
                    
                    <div class="auth-divider">
                        <span>or login with</span>
                    </div>
                    
                    <div class="social-auth">
                        <button type="button" class="social-auth-btn google" aria-label="Login with Google">
                            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="currentColor"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="currentColor"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="currentColor"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="currentColor"/>
                            </svg>
                            Google
                        </button>
                        <button type="button" class="social-auth-btn apple" aria-label="Login with Apple">
                            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" fill="currentColor"/>
                            </svg>
                            Apple
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signupForm = document.getElementById('signupForm');
            const loginForm = document.getElementById('loginForm');
            const registerSection = document.getElementById('registerSection');
            const loginSection = document.getElementById('loginSection');
            const successMessage = document.getElementById('successMessage');
            const switchToLoginLink = document.getElementById('switchToLoginLink');
            const switchToRegisterLink = document.getElementById('switchToRegisterLink');
            const goToLoginBtn = document.getElementById('goToLoginBtn');
            
            // Switch between register and login forms
            switchToLoginLink.addEventListener('click', function(e) {
                e.preventDefault();
                registerSection.classList.add('hidden');
                setTimeout(() => {
                    loginSection.classList.add('active');
                }, 300);
            });
            
            switchToRegisterLink.addEventListener('click', function(e) {
                e.preventDefault();
                loginSection.classList.remove('active');
                setTimeout(() => {
                    registerSection.classList.remove('hidden');
                }, 300);
            });
            
            // Handle successful registration
            signupForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Reset error states
                resetErrors();
                
                // Validate form
                if (validateSignupForm()) {
                    // Show success message
                    registerSection.classList.add('hidden');
                    successMessage.classList.add('show');
                    
                    // In a real app, you would submit the form data to your server here
                    // For demo purposes, we're just showing the success message
                }
            });
            
            // Handle "Continue to Login" button click
            goToLoginBtn.addEventListener('click', function() {
                successMessage.classList.remove('show');
                loginSection.classList.add('active');
            });
            
            // Form validation functions
            function validateSignupForm() {
                let isValid = true;
                
                // Validate first name
                const firstName = document.getElementById('signup-firstname').value.trim();
                if (!firstName) {
                    showError('firstname-error', 'Please enter your first name');
                    isValid = false;
                }
                
                // Validate last name
                const lastName = document.getElementById('signup-lastname').value.trim();
                if (!lastName) {
                    showError('lastname-error', 'Please enter your last name');
                    isValid = false;
                }
                
                // Validate email
                const email = document.getElementById('signup-email').value.trim();
                if (!email) {
                    showError('email-error', 'Please enter your email');
                    isValid = false;
                } else if (!isValidEmail(email)) {
                    showError('email-error', 'Please enter a valid email address');
                    isValid = false;
                }
                
                // Validate password
                const password = document.getElementById('signup-password').value;
                if (!password) {
                    showError('password-error', 'Please enter a password');
                    isValid = false;
                } else if (password.length < 8) {
                    showError('password-error', 'Password must be at least 8 characters');
                    isValid = false;
                }
                
                // Validate confirm password
                const confirmPassword = document.getElementById('signup-confirm-password').value;
                if (!confirmPassword) {
                    showError('confirm-password-error', 'Please confirm your password');
                    isValid = false;
                } else if (password !== confirmPassword) {
                    showError('confirm-password-error', 'Passwords do not match');
                    isValid = false;
                }
                
                // Validate terms checkbox
                const termsChecked = document.getElementById('agree-terms').checked;
                if (!termsChecked) {
                    showError('terms-error', 'You must agree to the terms and conditions');
                    isValid = false;
                }
                
                return isValid;
            }
            
            function showError(id, message) {
                const errorElement = document.getElementById(id);
                const inputId = id.replace('-error', '');
                const inputElement = document.getElementById(inputId);
                
                if (errorElement && inputElement) {
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';
                    inputElement.classList.add('invalid');
                }
            }
            
            function resetErrors() {
                const errorMessages = document.querySelectorAll('.error-message');
                const invalidInputs = document.querySelectorAll('.form-control.invalid');
                
                errorMessages.forEach(el => {
                    el.style.display = 'none';
                });
                
                invalidInputs.forEach(el => {
                    el.classList.remove('invalid');
                });
            }
            
            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            
            // Add real-time validation for password match
            document.getElementById('signup-confirm-password').addEventListener('input', function() {
                const password = document.getElementById('signup-password').value;
                const confirmPassword = this.value;
                const errorElement = document.getElementById('confirm-password-error');
                
                if (password && confirmPassword && password !== confirmPassword) {
                    errorElement.textContent = 'Passwords do not match';
                    errorElement.style.display = 'block';
                    this.classList.add('invalid');
                } else {
                    errorElement.style.display = 'none';
                    this.classList.remove('invalid');
                }
            });
        });
    </script>
</body>
</html>