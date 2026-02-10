<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- 
========================================
LOGIN POPUP ADDON CODE WITH LOGOUT & PROFILE
========================================
Copy this entire code and paste it at the END of your index.php file, 
just before the closing </body> tag
========================================
-->

<!-- Login Popup HTML -->
<div class="login-overlay" id="loginOverlay">
    <div class="login-popup">
        <button class="close-btn-popup" onclick="closeLoginPopup()">&times;</button>
        
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please login to continue</p>
        </div>

        <div class="login-tabs">
            <button class="tab-btn-popup active" onclick="switchTabPopup('login')">Login</button>
            <button class="tab-btn-popup" onclick="switchTabPopup('signup')">Sign Up</button>
        </div>

        <!-- Login Form -->
        <div class="tab-content-popup active" id="loginTabPopup">
            <form onsubmit="handleLoginSubmit(event)" id="loginFormPopup">
                <div class="form-group-popup">
                    <label>Email or Phone</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-user"></i>
                        <input type="text" id="loginEmail" placeholder="Enter email or phone" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Password</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="loginPasswordPopup" placeholder="Enter password" required>
                        <i class="fas fa-eye password-toggle-popup" onclick="togglePasswordPopup('loginPasswordPopup')"></i>
                    </div>
                </div>

                <div class="forgot-password-popup">
                    <a href="#" onclick="alert('Password reset feature coming soon!'); return false;">Forgot Password?</a>
                </div>

                <button type="submit" class="submit-btn-popup">Login</button>
            </form>

            <div class="social-login-popup">
                <p>Or continue with</p>
                <div class="social-buttons-popup">
                    <button class="social-btn-popup" onclick="handleSocialLoginPopup('google')">
                        <i class="fab fa-google google"></i> Google
                    </button>
                    <button class="social-btn-popup" onclick="handleSocialLoginPopup('facebook')">
                        <i class="fab fa-facebook facebook"></i> Facebook
                    </button>
                </div>
            </div>
        </div>

        <!-- Signup Form -->
        <div class="tab-content-popup" id="signupTabPopup">
            <form onsubmit="handleSignupSubmit(event)" id="signupFormPopup">
                <div class="form-group-popup">
                    <label>Full Name</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-user"></i>
                        <input type="text" id="signupName" placeholder="Enter your name" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Email</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="signupEmail" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Phone Number</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="signupPhone" placeholder="Enter phone number" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Password</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="signupPasswordPopup" placeholder="Create password" required>
                        <i class="fas fa-eye password-toggle-popup" onclick="togglePasswordPopup('signupPasswordPopup')"></i>
                    </div>
                </div>

                <button type="submit" class="submit-btn-popup">Sign Up</button>
            </form>

            <div class="social-login-popup">
                <p>Or sign up with</p>
                <div class="social-buttons-popup">
                    <button class="social-btn-popup" onclick="handleSocialLoginPopup('google')">
                        <i class="fab fa-google google"></i> Google
                    </button>
                    <button class="social-btn-popup" onclick="handleSocialLoginPopup('facebook')">
                        <i class="fab fa-facebook facebook"></i> Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Profile Dropdown (Add this to your header) -->
<style>
    /* User Profile in Header */
    .user-profile-container {
        position: relative;
        display: none;
        align-items: center;
        margin-left: 20px;
    }

    .user-profile-container.show {
        display: flex !important;
    }

    .user-profile-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #742B88, #9B59B6);
        color: white;
        padding: 8px 15px;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .user-profile-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(116, 43, 136, 0.3);
    }

    .user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: white;
        color: #742B88;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
    }

    .user-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 10px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        min-width: 200px;
        display: none;
        z-index: 1000;
        overflow: hidden;
    }

    .user-dropdown.show {
        display: block;
        animation: dropdownSlide 0.3s ease;
    }

    .user-dropdown-header {
        padding: 15px;
        background: linear-gradient(135deg, #742B88, #9B59B6);
        color: white;
        text-align: center;
    }

    .user-dropdown-header h4 {
        margin: 0;
        font-size: 16px;
    }

    .user-dropdown-header p {
        margin: 5px 0 0 0;
        font-size: 12px;
        opacity: 0.9;
    }

    .user-dropdown-menu {
        padding: 10px 0;
    }

    .user-dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px;
        color: #333;
        text-decoration: none;
        transition: background 0.2s;
        cursor: pointer;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        font-size: 14px;
    }

    .user-dropdown-item:hover {
        background: #f5f5f5;
    }

    .user-dropdown-item i {
        width: 20px;
        color: #742B88;
    }

    .logout-btn-dropdown {
        border-top: 1px solid #eee;
        color: #d32f2f;
    }

    .logout-btn-dropdown:hover {
        background: #ffebee;
    }

    .logout-btn-dropdown i {
        color: #d32f2f;
    }

    @keyframes dropdownSlide {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Login/Signup buttons in header (show when logged out) */
    .header-auth-buttons {
        display: flex;
        gap: 10px;
        margin-left: 20px;
    }

    .header-auth-buttons.hide {
        display: none !important;
    }

    .header-login-btn, .header-signup-btn {
        padding: 8px 20px;
        border-radius: 20px;
        border: 2px solid #742B88;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .header-login-btn {
        background: transparent;
        color: #742B88;
    }

    .header-login-btn:hover {
        background: #742B88;
        color: white;
    }

    .header-signup-btn {
        background: linear-gradient(135deg, #742B88, #9B59B6);
        color: white;
        border: none;
    }

    .header-signup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(116, 43, 136, 0.3);
    }

    @media (max-width: 768px) {
        .user-profile-container,
        .header-auth-buttons {
            margin-left: 10px;
        }

        .user-profile-btn {
            padding: 6px 12px;
            font-size: 13px;
        }

        .user-avatar {
            width: 28px;
            height: 28px;
            font-size: 12px;
        }

        .header-login-btn, .header-signup-btn {
            padding: 6px 15px;
            font-size: 13px;
        }
    }
</style>

<!-- Login Popup Styles -->
<style>
    /* Login Popup Styles */
    .login-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        animation: fadeInPopup 0.3s ease;
    }

    .login-overlay.active {
        display: flex !important;
    }

    .login-popup {
        background: white;
        border-radius: 20px;
        padding: 40px;
        width: 90%;
        max-width: 450px;
        position: relative;
        animation: slideUpPopup 0.4s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-height: 90vh;
        overflow-y: auto;
    }

    .close-btn-popup {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        color: #666;
        background: none;
        border: none;
        transition: color 0.3s;
        z-index: 10;
    }

    .close-btn-popup:hover {
        color: #000;
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h2 {
        color: #742B88;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .login-header p {
        color: #666;
        font-size: 14px;
    }

    .login-tabs {
        display: flex;
        margin-bottom: 30px;
        border-bottom: 2px solid #eee;
    }

    .tab-btn-popup {
        flex: 1;
        padding: 12px;
        background: none;
        border: none;
        font-size: 16px;
        font-weight: 600;
        color: #999;
        cursor: pointer;
        position: relative;
        transition: color 0.3s;
    }

    .tab-btn-popup.active {
        color: #742B88;
    }

    .tab-btn-popup.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background: #742B88;
    }

    .form-group-popup {
        margin-bottom: 20px;
    }

    .form-group-popup label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 14px;
    }

    .input-wrapper-popup {
        position: relative;
    }

    .input-wrapper-popup i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }

    .form-group-popup input {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    .form-group-popup input:focus {
        outline: none;
        border-color: #742B88;
    }

    .password-toggle-popup {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
    }

    .forgot-password-popup {
        text-align: right;
        margin-bottom: 20px;
    }

    .forgot-password-popup a {
        color: #742B88;
        text-decoration: none;
        font-size: 14px;
    }

    .submit-btn-popup {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #742B88, #9B59B6);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .submit-btn-popup:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(116, 43, 136, 0.4);
    }

    .social-login-popup {
        margin-top: 25px;
        text-align: center;
    }

    .social-login-popup p {
        color: #666;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .social-buttons-popup {
        display: flex;
        gap: 10px;
    }

    .social-btn-popup {
        flex: 1;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        background: white;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 14px;
        font-weight: 500;
    }

    .social-btn-popup:hover {
        border-color: #742B88;
        transform: translateY(-2px);
    }

    .social-btn-popup i {
        margin-right: 5px;
    }

    .google { color: #DB4437; }
    .facebook { color: #4267B2; }

    .tab-content-popup {
        display: none;
    }

    .tab-content-popup.active {
        display: block;
    }

    @keyframes fadeInPopup {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUpPopup {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login-popup {
            padding: 30px 20px;
            margin: 20px;
        }

        .social-buttons-popup {
            flex-direction: column;
        }

        .login-header h2 {
            font-size: 24px;
        }
    }
</style>

<!-- Login Popup JavaScript -->
<script>
    // User data storage
    let currentUser = JSON.parse(localStorage.getItem('currentUser'));
    let userLoggedIn = currentUser !== null;

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initializeAuth();
        addLoginProtection();
        setupEventListeners();
    });

    // Initialize authentication state
    function initializeAuth() {
        if (userLoggedIn && currentUser) {
            showUserProfile();
        } else {
            showAuthButtons();
        }
    }

    // Show user profile in header
    function showUserProfile() {
        // Remove auth buttons if they exist
        const authButtons = document.querySelector('.header-auth-buttons');
        if (authButtons) {
            authButtons.classList.add('hide');
        }

        // Check if profile container already exists
        let profileContainer = document.querySelector('.user-profile-container');
        
        if (!profileContainer) {
            // Create profile container
            profileContainer = document.createElement('div');
            profileContainer.className = 'user-profile-container';
            profileContainer.innerHTML = `
                <button class="user-profile-btn" onclick="toggleUserDropdown()">
                    <div class="user-avatar">${getInitials(currentUser.name)}</div>
                    <span class="user-name-display">${currentUser.name}</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="user-dropdown" id="userDropdown">
                    <div class="user-dropdown-header">
                        <h4>${currentUser.name}</h4>
                        <p>${currentUser.email}</p>
                    </div>
                    <div class="user-dropdown-menu">
                        <a href="#" class="user-dropdown-item" onclick="return false;">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="#" class="user-dropdown-item" onclick="return false;">
                            <i class="fas fa-heart"></i>
                            <span>Favorites</span>
                        </a>
                        <a href="#" class="user-dropdown-item" onclick="return false;">
                            <i class="fas fa-building"></i>
                            <span>My Properties</span>
                        </a>
                        <a href="#" class="user-dropdown-item" onclick="return false;">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <button class="user-dropdown-item logout-btn-dropdown" onclick="handleLogout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to header (you may need to adjust the selector based on your header structure)
            const header = document.querySelector('header') || document.querySelector('nav') || document.querySelector('.header');
            if (header) {
                header.appendChild(profileContainer);
            }
        }
        
        profileContainer.classList.add('show');
    }

    // Show login/signup buttons in header
    function showAuthButtons() {
        // Hide profile if exists
        const profileContainer = document.querySelector('.user-profile-container');
        if (profileContainer) {
            profileContainer.classList.remove('show');
        }

        // Check if auth buttons already exist
        let authButtons = document.querySelector('.header-auth-buttons');
        
        if (!authButtons) {
            authButtons = document.createElement('div');
            authButtons.className = 'header-auth-buttons';
            authButtons.innerHTML = `
                <button class="header-login-btn" onclick="openLoginTab()">Login</button>
                <button class="header-signup-btn" onclick="openSignupTab()">Sign Up</button>
            `;
            
            const header = document.querySelector('header') || document.querySelector('nav') || document.querySelector('.header');
            if (header) {
                header.appendChild(authButtons);
            }
        }
        
        authButtons.classList.remove('hide');
    }

    // Get user initials for avatar
    function getInitials(name) {
        if (!name) return 'U';
        const parts = name.split(' ');
        if (parts.length >= 2) {
            return (parts[0][0] + parts[1][0]).toUpperCase();
        }
        return name.substring(0, 2).toUpperCase();
    }

    // Toggle user dropdown
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('show');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const profileBtn = document.querySelector('.user-profile-btn');
        
        if (dropdown && !event.target.closest('.user-profile-container')) {
            dropdown.classList.remove('show');
        }
    });

    // Open login tab
    function openLoginTab() {
        showLoginPopup();
        switchTabPopup('login');
    }

    // Open signup tab
    function openSignupTab() {
        showLoginPopup();
        switchTabPopup('signup');
    }

    // Show login popup function
    function showLoginPopup() {
        if (!userLoggedIn) {
            document.getElementById('loginOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
            return false;
        }
        return true;
    }

    // Close login popup
    function closeLoginPopup() {
        document.getElementById('loginOverlay').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Switch between login and signup tabs
    function switchTabPopup(tab) {
        const tabButtons = document.querySelectorAll('.tab-btn-popup');
        const tabContents = document.querySelectorAll('.tab-content-popup');
        
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        
        if (tab === 'login') {
            tabButtons[0].classList.add('active');
            document.getElementById('loginTabPopup').classList.add('active');
        } else {
            tabButtons[1].classList.add('active');
            document.getElementById('signupTabPopup').classList.add('active');
        }
    }

    // Toggle password visibility
    function togglePasswordPopup(inputId) {
        const input = document.getElementById(inputId);
        const icon = input.nextElementSibling;
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Handle login submit
    function handleLoginSubmit(event) {
        event.preventDefault();
        
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPasswordPopup').value;
        
        // Extract name from email (before @)
        const name = email.split('@')[0].replace(/[^a-zA-Z]/g, ' ').trim() || 'User';
        
        // Save user data
        currentUser = {
            name: name.charAt(0).toUpperCase() + name.slice(1),
            email: email,
            loginTime: new Date().toISOString()
        };
        
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        userLoggedIn = true;
        
        // Show success message
        alert('Login successful! Welcome back, ' + currentUser.name + '!');
        
        // Update UI
        showUserProfile();
        closeLoginPopup();
        
        // Reset form
        document.getElementById('loginFormPopup').reset();
    }

    // Handle signup submit
    function handleSignupSubmit(event) {
        event.preventDefault();
        
        const name = document.getElementById('signupName').value;
        const email = document.getElementById('signupEmail').value;
        const phone = document.getElementById('signupPhone').value;
        
        // Save user data
        currentUser = {
            name: name,
            email: email,
            phone: phone,
            loginTime: new Date().toISOString()
        };
        
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        userLoggedIn = true;
        
        // Show success message
        alert('Signup successful! Welcome to TrueBroker, ' + currentUser.name + '!');
        
        // Update UI
        showUserProfile();
        closeLoginPopup();
        
        // Reset form
        document.getElementById('signupFormPopup').reset();
    }

    // Handle social login
    function handleSocialLoginPopup(provider) {
        // Simulate social login
        currentUser = {
            name: provider === 'google' ? 'Google User' : 'Facebook User',
            email: provider + '.user@example.com',
            provider: provider,
            loginTime: new Date().toISOString()
        };
        
        localStorage.setItem('currentUser', JSON.stringify(currentUser));
        userLoggedIn = true;
        
        alert(`Login with ${provider} successful! Welcome, ${currentUser.name}!`);
        
        showUserProfile();
        closeLoginPopup();
    }

    // Handle logout
    function handleLogout() {
        if (confirm('Are you sure you want to logout?')) {
            // Clear user data
            localStorage.removeItem('currentUser');
            currentUser = null;
            userLoggedIn = false;
            
            // Update UI
            showAuthButtons();
            
            // Hide dropdown
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) {
                dropdown.classList.remove('show');
            }
            
            alert('Logged out successfully!');
            
            // Optionally reload the page
            // location.reload();
        }
    }

    // Setup event listeners
    function setupEventListeners() {
        // Close popup on overlay click
        document.getElementById('loginOverlay').addEventListener('click', function(event) {
            if (event.target === this) {
                closeLoginPopup();
            }
        });

        // Close popup on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLoginPopup();
            }
        });
    }

    // Add login protection to elements
    function addLoginProtection() {
        // Property type buttons
        const propertyTypeBtns = document.querySelectorAll('.property-type-btn');
        propertyTypeBtns.forEach(btn => {
            const originalOnClick = btn.getAttribute('onclick');
            if (originalOnClick) {
                btn.setAttribute('data-original-click', originalOnClick);
                btn.onclick = function(e) {
                    e.preventDefault();
                    if (showLoginPopup()) {
                        eval(this.getAttribute('data-original-click'));
                    }
                };
            }
        });

        // Property tabs
        const propertyTabs = document.querySelectorAll('.tab[data-filter]');
        propertyTabs.forEach(tab => {
            const originalOnClick = tab.getAttribute('onclick');
            if (originalOnClick) {
                tab.setAttribute('data-original-click', originalOnClick);
                tab.onclick = function(e) {
                    e.preventDefault();
                    if (showLoginPopup()) {
                        eval(this.getAttribute('data-original-click'));
                    }
                };
            }
        });

        // Property cards
        const propertyCards = document.querySelectorAll('.property-card');
        propertyCards.forEach(card => {
            card.style.cursor = 'pointer';
            const links = card.querySelectorAll('a');
            links.forEach(link => {
                link.onclick = function(e) {
                    e.preventDefault();
                    if (showLoginPopup()) {
                        window.location.href = this.href;
                    }
                };
            });
        });

        // Search button
        const searchButton = document.getElementById('searchButton');
        if (searchButton) {
            const originalOnClick = searchButton.onclick;
            searchButton.onclick = function(e) {
                if (!showLoginPopup()) {
                    e.preventDefault();
                } else if (originalOnClick) {
                    originalOnClick.call(this, e);
                }
            };
        }

        // Voice search
        const voiceSearch = document.getElementById('voiceSearch');
        if (voiceSearch) {
            const originalOnClick = voiceSearch.onclick;
            voiceSearch.onclick = function(e) {
                if (!showLoginPopup()) {
                    e.preventDefault();
                } else if (originalOnClick) {
                    originalOnClick.call(this, e);
                }
            };
        }

        // Protect "Add Property" links/buttons (add class or id to your add property button)
        const addPropertyBtns = document.querySelectorAll('[href*="add-property"], [href*="add_property"], .add-property-btn');
        addPropertyBtns.forEach(btn => {
            btn.onclick = function(e) {
                e.preventDefault();
                if (showLoginPopup()) {
                    window.location.href = this.href || '#add-property';
                }
            };
        });
    }
</script>
    
</body>
</html>