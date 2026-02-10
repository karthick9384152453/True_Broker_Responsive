<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>True Broker - Real Estate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: rgb(131, 84, 241);
            --secondary-color: #10b981;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }

        .top-header.scrolled {
            top: 2px;
            left: 0px;
            right: 0px;
            border-radius: 30px;
            padding: 10px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .top-header.scrolled .logo-container img {
            height: 25px;
        }

        .header-container {
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .top-header {
            position: fixed;
            top: 30px;
            left: 200px;
            right: 200px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 60px;
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            transition: all 0.3s ease;
            border: 1px solid rgb(131, 84, 241);
        }

        .navbar-brand {
            display: flex;
            text-decoration: none;
        }

        .logo-container {
            display: flex;
            background: white;
            padding: 8px 20px;
            border-radius: 25px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f5f9;
        }

        .logo-container img {
            height: 35px;
            width: auto;
            object-fit: contain;
        }

         .logo-container1 img {
                width: 210px;
            }

        .logo-icon {
            width: 32px;
            height: 32px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .nav-link:hover {
            color: #334155;
        }

        .nav-link.active {
            color: var(--primary-color);
        }

        .dropdown-arrow {
            font-size: 12px;
            transition: transform 0.2s ease;
        }

        .nav-item:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .phone-number {
            display: flex;
            align-items: center;
            color: #64748b;
            font-weight: 500;
            font-size: 15px;
            gap: 8px;
        }

        .phone-icon {
            color: var(--secondary-color);
            font-size: 14px;
        }

        .user-profile {
            width: 36px;
            height: 36px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            overflow: hidden;
        }

        .user-profile:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        .user-profile i {
            color: #64748b;
            font-size: 14px;
        }

        .user-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-add-property {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-right: 0;
            position: relative;
            overflow: hidden;
        }

        .btn-add-property span.free-badge {
            background-color: #10b981;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            margin-left: 4px;
            display: inline-block;
            position: relative;
            animation: pulse 2s infinite;
            transform-origin: center;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 5px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .btn-add-property:hover {
            background: #7c3aed;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
            color: white;
        }

        .btn-add-property:hover span.free-badge {
            background-color: #0ea371;
            animation: pulse-fast 1s infinite;
        }

        @keyframes pulse-fast {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 0 4px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: #64748b;
            cursor: pointer;
            padding: 5px;
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 40px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Right Content */
        .right-content {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        /* SweetAlert Dropdown Styles */
        .swal-style-dropdown {
            border-radius: 12px !important;
            padding: 0 !important;
            width: 90% !important;
            max-width: 1000px !important;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
            border: none !important;
        }

        .swal-title {
            font-size: 1.5rem !important;
            color: #8d2ba8ff !important;
            padding: 1.5rem 1.5rem 0.5rem !important;
            margin-bottom: 0 !important;
            text-align: center !important;
        }

        .categories-container {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 1.5rem;
            max-height: 60vh;
            overflow-y: auto;
        }

        .category-item {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px 15px;
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1px solid #e9ecef;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 12px;
        }

        .category-item:hover {
            background: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-color);
        }

        .category-item:active {
            transform: translateY(0);
        }

        .category-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
            padding: 4px;
        }

        .category-text {
            width: 100%;
            font-size: 0.95rem;
            font-weight: 500;
            color: #2c3e50;
        }

        .swal-footer {
            padding: 1rem 1.5rem !important;
            border-top: 1px solid #eee !important;
            display: flex;
            justify-content: flex-end;
        }

        .swal-button {
            border-radius: 8px !important;
            padding: 8px 20px !important;
            background-color: var(--primary-color) !important;
        }

        /* User dropdown menu */
        .user-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 200px;
            z-index: 1000;
            display: none;
            overflow: hidden;
        }

        .user-dropdown.active {
            display: block;
        }

        .user-dropdown a {
            display: block;
            padding: 12px 16px;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
            border-bottom: 1px solid #f1f5f9;
        }

        .user-dropdown a:hover {
            background: #f8fafc;
            color: var(--primary-color);
        }

        .user-dropdown a:last-child {
            border-bottom: none;
        }

        .user-profile-container {
            position: relative;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .top-header {
                left: 50px;
                right: 50px;
            }
        }

        @media (max-width: 992px) {
            .top-header {
                left: 30px;
                right: 30px;
            }
            
            .right-content {
                gap: 20px;
            }
            
            .nav-menu {
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .top-header {
                left: 15px;
                right: 15px;
                top: 15px;
                padding: 10px 15px;
                border-radius: 30px;
            }
            
            .logo-container1 img {
                width: 160px;
            }
            
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                gap: 0;
                padding: 15px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                border-radius: 0 0 15px 15px;
                z-index: 1000;
                margin-top: 10px;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .nav-item {
                width: 100%;
                padding: 12px 0;
                border-bottom: 1px solid #f1f5f9;
            }
            
            .nav-item:last-child {
                border-bottom: none;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .header-actions {
                gap: 15px;
            }
            
            .phone-number {
                display: none;
            }
            
            .right-content {
                gap: 10px;
                width: auto;
            }
            
            .categories-container {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 15px;
                padding: 1rem;
            }

            .user-dropdown {
                right: -50px;
            }
        }

        @media (max-width: 576px) {
            .top-header {
                left: 10px;
                right: 10px;
            }
            
            .btn-add-property span.free-badge {
                display: none;
            }
            
            .logo-container1 img {
                width: 140px;
            }
            
            .btn-add-property {
                padding: 8px 12px;
                font-size: 12px;
            }
            
            .user-profile {
                width: 32px;
                height: 32px;
            }
        }

        @media (max-width: 400px) {
            .btn-add-property {
                display: none;
            }
            
            .logo-container1 img {
                width: 120px;
            }
            
            .top-header {
                padding: 8px 10px;
            }
        }

        @media (max-width: 320px) {
            .top-header {
                left: 8px;
                right: 75px;
                padding: 8px;
            }
            
            .logo-container1 img {
                width: 110px;
            }
            
            .user-profile {
                width: 30px;
                height: 30px;
            }
            
            .mobile-toggle {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="top-header">
        <div class="header-container">
            <!-- Left: Logo Only -->
            <div class="logo-container1">
                <a class="navbar-brand" href="index.php">
                    <img src="./img/icon1.png" alt="True Broker">
                </a>
            </div>

            <!-- Right: Menu + Contact + Button -->
            <div class="right-content">
                <nav>
                    <ul class="nav-menu" id="navMenu">
                        <li class="nav-item"><a href="Index.php" class="nav-link active">Home</a></li>
                        <li class="nav-item dropdown-container">
                            <a href="#" class="nav-link" id="categoriesBtn">Categories <span class="dropdown-arrow">▼</span></a>
                        </li>
                        <li class="nav-item"><a href="Wish_List.php" class="nav-link">Wish List</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <div class="phone-number">
                        <i class="fas fa-phone phone-icon"></i>
                        <span>90 4783 4783</span>
                    </div>
                    
                    <!-- Updated User Profile Section -->
                    <div class="user-profile-container">
                        <div class="user-profile" id="userProfile">
                            <!-- Default icon (shown when not logged in) -->
                            <i class="fas fa-user" id="userIcon"></i>
                            <!-- User image (shown when logged in, initially hidden) -->
                            <img src="" alt="User" id="userImage" style="display: none;">
                        </div>
                        <!-- User dropdown menu -->
                        <div class="user-dropdown" id="userDropdown">
                            <!-- Content will be dynamically populated by JavaScript -->
                        </div>
                    </div>
                    
                    <a href="./Add_property.php" class="btn-add-property">Add Property <span class="free-badge">Free</span></a>
                    <button class="mobile-toggle" id="mobileToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Check login status from localStorage (simulated for demo)
        function checkLoginStatus() {
            return localStorage.getItem('isLoggedIn') === 'true';
        }

        // Update user profile display
        function updateUserProfile() {
            const isLoggedIn = checkLoginStatus();
            const userIcon = document.getElementById('userIcon');
            const userImage = document.getElementById('userImage');
            const userDropdown = document.getElementById('userDropdown');

            if (isLoggedIn) {
                // User is logged in
                userIcon.style.display = 'none';
                userImage.style.display = 'block';
                userImage.src = 'https://randomuser.me/api/portraits/men/' + Math.floor(Math.random() * 100) + '.jpg';
                
                userDropdown.innerHTML = `
                    <a href="./profile.php"><i class="fas fa-user-circle"></i> My Profile</a>
                    <a href="./Wish_List.php"><i class="fas fa-home"></i> My Properties</a>
                    <a href="./settings.php"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" id="logoutLink"><i class="fas fa-sign-out-alt"></i> Logout</a>
                `;
                
                // Add logout event listener
                document.getElementById('logoutLink').addEventListener('click', function(e) {
                    e.preventDefault();
                    localStorage.setItem('isLoggedIn', 'false');
                    window.location.href = './Logoutpage.php';
                });
            } else {
                // User is not logged in
                userIcon.style.display = 'block';
                userImage.style.display = 'none';
                
                userDropdown.innerHTML = `
                    <a href="./login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a href="./register.php"><i class="fas fa-user-plus"></i> Register</a>
                `;
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateUserProfile();
            
            // Toggle user dropdown
            document.getElementById('userProfile').addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('userDropdown').classList.toggle('active');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                document.getElementById('userDropdown').classList.remove('active');
            });
            
            // Prevent dropdown from closing when clicking inside it
            document.getElementById('userDropdown').addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Mobile Menu Toggle
            const mobileToggle = document.getElementById('mobileToggle');
            const navMenu = document.getElementById('navMenu');
            
            function toggleMobileMenu() {
                const toggleIcon = mobileToggle.querySelector('i');
                navMenu.classList.toggle('active');
                
                if (navMenu.classList.contains('active')) {
                    toggleIcon.classList.remove('fa-bars');
                    toggleIcon.classList.add('fa-times');
                    document.addEventListener('click', handleClickOutside);
                } else {
                    toggleIcon.classList.remove('fa-times');
                    toggleIcon.classList.add('fa-bars');
                    document.removeEventListener('click', handleClickOutside);
                }
            }

            function handleClickOutside(event) {
                if (!navMenu.contains(event.target) && !mobileToggle.contains(event.target)) {
                    const toggleIcon = mobileToggle.querySelector('i');
                    navMenu.classList.remove('active');
                    toggleIcon.classList.remove('fa-times');
                    toggleIcon.classList.add('fa-bars');
                    document.removeEventListener('click', handleClickOutside);
                }
            }

            mobileToggle.addEventListener('click', toggleMobileMenu);

            // Close mobile menu when clicking on a link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        navMenu.classList.remove('active');
                        const toggleIcon = mobileToggle.querySelector('i');
                        toggleIcon.classList.remove('fa-times');
                        toggleIcon.classList.add('fa-bars');
                    }
                });
            });

            // Active navigation highlight
            const currentLocation = location.pathname;
            document.querySelectorAll('.nav-link').forEach(item => {
                if(item.getAttribute('href') === currentLocation){
                    item.classList.add('active');
                }
            });

            // Scroll effect for header
            window.addEventListener('scroll', function () {
                const header = document.querySelector('.top-header');
                if (window.scrollY > 30) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Categories dropdown functionality
            document.getElementById('categoriesBtn').addEventListener('click', function(e) {
                e.preventDefault();
                this.closest('.dropdown-container').classList.toggle('active');
                
                const categoriesHTML = `
                    <div class="categories-container">
                        <div class="category-item">
                            <img src="https://truebroker.in/web_new/uploads/business/641961-photo.png" alt="House" class="category-icon">
                            <span class="category-text">Residential House</span>
                        </div>
                        <!-- Other category items... -->
                    </div>
                `;
                
                Swal.fire({
                    title: 'Select a Category',
                    html: categoriesHTML,
                    width: '90%',
                    showConfirmButton: false,
                    showCloseButton: true,
                    customClass: {
                        popup: 'swal-style-dropdown',
                        closeButton: 'swal-close-button'
                    },
                    didOpen: () => {
                        document.querySelectorAll('.category-item').forEach(item => {
                            item.addEventListener('click', function() {
                                const categoryName = this.querySelector('.category-text').textContent;
                                Swal.fire({
                                    title: 'Category Selected',
                                    text: `You selected: ${categoryName}`,
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: 'var(--primary-color)'
                                });
                            });
                        });
                    },
                    willClose: () => {
                        document.querySelector('.dropdown-container').classList.remove('active');
                    }
                });
            });

            // Handle login link click (for demo purposes)
            document.addEventListener('click', function(e) {
                if (e.target.closest('a[href="./login.php"]')) {
                    e.preventDefault();
                    localStorage.setItem('isLoggedIn', 'true');
                    window.location.href = './login.php';
                }
            });
        });
    </script>
</body>
</html>