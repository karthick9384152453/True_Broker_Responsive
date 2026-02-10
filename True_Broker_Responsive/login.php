


<?php
session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔴 TEMP login check (DB இல்லாத வரை)
    if ($email === "test@gmail.com" && $password === "12345678") {

        $_SESSION['user_id'] = $email;

        // ✅ LOGIN SUCCESS → HOME PAGE
        header("Location: index.php");
        exit;

    } else {
        $login_error = "Invalid email or password";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>True Broker - Login</title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./Login.css">
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
        }

        .background-design {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
            overflow: hidden;
        }

        .design-element {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(116,43,136,0.1) 0%, transparent 70%);
            filter: blur(20px);
        }

        .design-element:nth-child(1) {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
        }

        .design-element:nth-child(2) {
            width: 500px;
            height: 500px;
            bottom: -200px;
            right: -200px;
            background: radial-gradient(circle, rgba(30,133,64,0.1) 0%, transparent 70%);
        }

        .design-element:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 30%;
            right: 10%;
            background: radial-gradient(circle, rgba(116,43,136,0.15) 0%, transparent 70%);
        }

        .login-container {
            background: white;
            border-radius: 24px;
            padding: 50px 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin: 20px;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.15);
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
            height: auto;
        }

        .brand-name {
            font-size: 32px;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .brand-name::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .tagline {
            color: var(--gray);
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .user-type-selector {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            background: var(--light-gray);
            padding: 6px;
            border-radius: 12px;
        }

        .user-type-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: transparent;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .user-type-btn.active {
            background: white;
            color: var(--primary);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .user-type-btn:hover {
            color: var(--primary);
        }

        .user-type-btn svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--dark);
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.5px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid var(--light-gray);
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
            color: var(--dark);
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(116, 43, 136, 0.1);
        }

        .form-group input:valid {
            border-color: var(--secondary);
        }

        .form-group input.error {
            border-color: var(--danger);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            width: 20px;
            height: 20px;
            transition: all 0.3s ease;
        }

        .input-icon svg {
            width: 100%;
            height: 100%;
            fill: currentColor;
        }

        .form-group input:focus ~ .input-icon {
            color: var(--primary);
        }

        .form-group input:valid ~ .input-icon {
            color: var(--secondary);
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            width: 20px;
            height: 20px;
            transition: all 0.3s ease;
            background: none;
            border: none;
            padding: 0;
        }

        .password-toggle svg {
            width: 100%;
            height: 100%;
            fill: currentColor;
        }

        .password-toggle:hover {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember-me label {
            cursor: pointer;
            color: var(--dark);
            font-weight: 500;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .forgot-password:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            box-shadow: 0 10px 20px rgba(116, 43, 136, 0.3);
            z-index: 1;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(116, 43, 136, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .login-btn:hover::before {
            opacity: 1;
        }

        .divider {
            margin: 30px 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--light-gray), transparent);
        }

        .divider span {
            background: white;
            padding: 0 20px;
            color: var(--gray);
            font-size: 14px;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .social-btn {
            flex: 1;
            padding: 14px;
            border: 2px solid var(--light-gray);
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .google-btn:hover {
            border-color: #ea4335;
            color: #ea4335;
        }

        .facebook-btn:hover {
            border-color: #1877f2;
            color: #1877f2;
        }

        .social-icon {
            width: 20px;
            height: 20px;
        }

        .social-icon svg {
            width: 100%;
            height: 100%;
            fill: currentColor;
        }

        .signup-link {
            text-align: center;
            margin-top: 25px;
            color: var(--gray);
            font-size: 15px;
        }

        .signup-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .signup-link a:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        .error-message {
            color: var(--danger);
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        /* Spinner animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
            vertical-align: middle;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 40px 30px;
                margin: 20px;
                border-radius: 20px;
            }
            
            .brand-name {
                font-size: 28px;
            }
            
            .user-type-selector {
                flex-direction: column;
                gap: 8px;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .form-group input {
                padding: 14px 16px 14px 45px;
            }
        }

        /* Auth form styles */
        .auth-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }
         
        .auth-image {
            /* background: linear-gradient(135deg, var(--primary), var(--primary-light)); */
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
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
        }
        
        .auth-image-overlay img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        
        .auth-image-overlay h2 {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .auth-image-overlay p {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 500px;
            margin: 0 auto;
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
        }
        
        .auth-header p {
            color: var(--gray);
            font-size: 14px; 
        }
        
        .auth-header a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .auth-header a:hover {
            text-decoration: underline;
        }
        
        .auth-form .form-group {
            margin-bottom: 20px;
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
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(116, 43, 136, 0.1);
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .checkbox-group input {
            margin-right: 10px;
        }
        
        .checkbox-group label {
            font-size: 14px;
            color: var(--dark);
        }
        
        .checkbox-group a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .checkbox-group a:hover {
            text-decoration: underline;
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
            box-shadow: 0 10px 20px rgba(116, 43, 136, 0.3);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(116, 43, 136, 0.4);
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
        }
        
        .social-auth-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        
        .social-auth-btn.google {
            color: #DB4437;
        }
        
        .social-auth-btn.google:hover {
            border-color: #DB4437;
        }
        
        .social-auth-btn.apple {
            color: var(--dark);
        }
        
        .social-auth-btn.apple:hover {
            border-color: var(--dark);
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
        }
</style>
<body>
    <div class="background-design">
        <div class="design-element floating" style="animation-delay: 0s;"></div>
        <div class="design-element floating" style="animation-delay: 1s;"></div>
        <div class="design-element floating" style="animation-delay: 2s;"></div>
    </div>

    <div class="login-container">
        <div class="logo-section">
            <div class="logo">
                <img src="./img/icon1.png" alt="True Broker Logo">
            </div>
            <p class="tagline">Your premium real estate platform</p>
        </div>

        <form id="loginForm">
            <div class="user-type-selector">
                <button type="button" class="user-type-btn active" onclick="selectUserType(event, 'buyer')">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    Buyer
                </button>
                <button type="button" class="user-type-btn" onclick="selectUserType(event, 'seller')">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 3v8h8V3H3zm6 6H5V5h4v4zm-6 4v8h8v-8H3zm6 6H5v-4h4v4zm4-16v8h8V3h-8zm6 6h-4V5h4v4zm-6 4v8h8v-8h-8zm6 6h-4v-4h4v4z"/>
                    </svg>
                    Seller
                </button>
                <button type="button" class="user-type-btn" onclick="selectUserType(event, 'agent')">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    Agent
                </button>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </span>
                </div>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required placeholder="Enter your password" minlength="8">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                        </svg>
                    </span>
                    <button type="button" class="password-toggle" onclick="togglePassword()" aria-label="Toggle password visibility">
                        <svg viewBox="0 0 24 24" id="eye-icon">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        <svg viewBox="0 0 24 24" id="eye-off-icon" style="display: none;">
                            <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>
                        </svg>
                    </button>
                </div>
                <div class="error-message" id="password-error"></div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password" onclick="showForgotPassword(event)">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn"><span>Sign In</span></button>
        </form>

        <div class="divider">
          <span>or continue with</span>
           
        </div>

        <div class="social-login">
            <button type="button" class="social-btn google-btn" onclick="socialLogin('google')">
                <span class="social-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                </span>
                <span>Google</span>
            </button>
            <button type="button" class="social-btn facebook-btn" onclick="socialLogin('facebook')">
                <span class="social-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" fill="#1877F2"/>
                    </svg>
                </span>
                <span>Facebook</span> 
            </button>
        </div>

        <div class="signup-link">
            New to True Broker? <a href="#" onclick="switchToSignup(event)">Create an account</a>
        </div>
    </div>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Configure SweetAlert to match our color scheme
        const swalWithPrimaryButton = Swal.mixin({
            customClass: {
                confirmButton: 'swal-confirm-btn',
                cancelButton: 'swal-cancel-btn'
            },
            buttonsStyling: false
        });

        // Add CSS for SweetAlert buttons
        const swalStyles = document.createElement('style');
        swalStyles.textContent = `
            .swal-confirm-btn {
                background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
                color: white !important;
                border: none !important;
                padding: 12px 24px !important;
                border-radius: 12px !important;
                font-weight: 600 !important;
                font-size: 16px !important;
                box-shadow: 0 4px 12px rgba(116, 43, 136, 0.2) !important;
                transition: all 0.3s ease !important;
            }
            
            .swal-confirm-btn:hover {
                transform: translateY(-2px) !important;
                box-shadow: 0 8px 20px rgba(116, 43, 136, 0.3) !important;
            }
            
            .swal-cancel-btn {
                background: var(--light-gray) !important;
                color: var(--gray) !important;
                border: none !important;
                padding: 12px 24px !important;
                border-radius: 12px !important;
                font-weight: 600 !important;
                font-size: 16px !important;
                margin-right: 10px !important;
                transition: all 0.3s ease !important;
            }
            
            .swal-cancel-btn:hover {
                background: #e2e6ea !important;
            }
            
            .swal2-popup {
                border-radius: 20px !important;
                padding: 0 !important;
                overflow: hidden !important;
                border: 1px solid rgba(0, 0, 0, 0.05) !important;
            }
            
            .swal2-title {
                color: var(--dark) !important;
                font-weight: 700 !important;
                font-size: 24px !important;
            }
            
            .swal2-html-container {
                color: var(--gray) !important;
                font-size: 16px !important;
            }
            
            .swal2-content {
                padding: 0 !important;
            }
        `;
        document.head.appendChild(swalStyles);

        let currentUserType = 'buyer';

        function selectUserType(event, type) {
            currentUserType = type;
            const buttons = document.querySelectorAll('.user-type-btn');
            
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });
            
            event.target.classList.add('active');
            
            // Update tagline based on user type
            const tagline = document.querySelector('.tagline');
            switch(type) {
                case 'buyer':
                    tagline.textContent = 'Find your dream property today';
                    break;
                case 'seller':
                    tagline.textContent = 'Sell your property with ease';
                    break;
                case 'agent':
                    tagline.textContent = 'Manage your listings efficiently';
                    break;
            }
            
            // Add animation
            event.target.style.transform = 'translateY(-5px)';
            setTimeout(() => {
                event.target.style.transform = 'translateY(-2px)';
            }, 300);
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.style.display = 'none';
                eyeOffIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeIcon.style.display = 'block';
                eyeOffIcon.style.display = 'none';
            }
            
            // Add animation
            const toggle = event.currentTarget;
            toggle.style.transform = 'scale(1.2)';
            setTimeout(() => {
                toggle.style.transform = 'scale(1)';
            }, 200);
        }

        function showForgotPassword(event) {
            event.preventDefault();
            swalWithPrimaryButton.fire({
                title: 'Reset Password',
                html: `
                    <div style="text-align: left;">
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="swal-email" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--dark);">Email Address</label>
                            <input type="email" id="swal-email" class="swal2-input" placeholder="Your email address" style="width: 100%; padding: 12px 15px; border: 2px solid var(--light-gray); border-radius: 12px; font-size: 16px; transition: all 0.3s ease;">
                        </div>
                        <p style="color: var(--gray); font-size: 14px; margin-top: 10px;">We'll send you a link to reset your password</p>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Send Reset Link',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                preConfirm: () => {
                    const email = document.getElementById('swal-email').value;
                    if (!email) {
                        Swal.showValidationMessage('Please enter your email');
                        return false;
                    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                        Swal.showValidationMessage('Please enter a valid email address');
                        return false;
                    }
                    return email;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate sending reset link
                    const loginBtn = document.querySelector('.login-btn');
                    loginBtn.innerHTML = '<span class="spinner"></span> Sending...';
                    loginBtn.disabled = true;
                    
                    setTimeout(() => {
                        swalWithPrimaryButton.fire(
                            'Email Sent!',
                            'We\'ve sent a password reset link to your email address. Please check your inbox.',
                            'success'
                        ).then(() => {
                            loginBtn.innerHTML = 'Sign In';
                            loginBtn.disabled = false;
                        });
                    }, 1500);
                }
            });
        }

        function socialLogin(provider) {
            console.log(`Signing in with ${provider} as ${currentUserType}`);
            
            // Add animation
            const btn = event.target.closest('button');
            btn.style.transform = 'translateY(-5px)';
            btn.style.boxShadow = '0 12px 25px rgba(0,0,0,0.1)';
            
            setTimeout(() => {
                btn.style.transform = 'translateY(-3px)';
                btn.style.boxShadow = '0 8px 20px rgba(0,0,0,0.08)';
            }, 300);
            
            // Show SweetAlert notification
            swalWithPrimaryButton.fire({
                title: `${provider.charAt(0).toUpperCase() + provider.slice(1)} Login`,
                text: `You'll be redirected to ${provider} to sign in as a ${currentUserType}`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                background: 'white',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise((resolve) => {
                        setTimeout(() => {
                            resolve();
                        }, 1500);
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    // Simulate successful login
                    swalWithPrimaryButton.fire(
                        'Login Successful',
                        `You're now logged in via ${provider} as a ${currentUserType}`,
                        'success'
                    )
                    // .then(() => {
                    //     // Redirect to profile page
                    //     window.location.href = 'my_profile.php';
                    // });
                }
            });
        }

        function switchToSignup(event) {
            event.preventDefault();
            
            // Close any existing alerts
            Swal.close();
            
            // Show signup form
            swalWithPrimaryButton.fire({
                title: 'Create an Account',
                html: `
                    <div class="auth-grid">
                        <div class="auth-image">
                            <div class="auth-image-overlay">
                                <img src="img/home.png" alt="True Broker">
                                <p>Create your account and start your real estate journey with us today.</p>
                            </div>
                        </div>
                        
                        <div class="auth-container">
                            <div class="auth-form-container">
                                <div class="auth-header">
                                    <img src="./img/icon1.png" alt="TrueBroker">
                                    <h1>Create an Account</h1>
                                    <p>Already have an account? <a href="#" onclick="switchToLogin(event)">Login</a></p>
                                </div>
                                
                                <form id="signupForm" class="auth-form">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label" for="signup-firstname">First Name</label>
                                            <input type="text" id="signup-firstname" class="form-control" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="signup-lastname">Last Name</label>
                                            <input type="text" id="signup-lastname" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="signup-email">Email</label>
                                        <input type="email" id="signup-email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="signup-password">Password</label>
                                        <input type="password" id="signup-password" class="form-control" placeholder="Enter Password (min 8 characters)" minlength="8" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="signup-confirm-password">Confirm Password</label>
                                        <input type="password" id="signup-confirm-password" class="form-control" placeholder="Confirm Password" minlength="8" required>
                                    </div>
                                    
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="agree-terms" required>
                                        <label for="agree-terms">I agree to the <a href="#">Terms & Conditions</a></label>
                                    </div>
                                    
                                    <button type="submit" class="btn">Create Account</button>
                                </form>
                                
                                <div class="auth-divider">
                                    <span>or sign up with</span>
                                </div>
                                
                                <div class="social-auth">
                                    <button type="button" class="social-auth-btn google" onclick="socialLogin('google')">
                                        <svg viewBox="0 0 24 24" width="20" height="20">
                                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                        </svg>
                                        Google
                                    </button>
                                    <button type="button" class="social-auth-btn apple" onclick="socialLogin('apple')">
                                        <svg viewBox="0 0 24 24" width="20" height="20">
                                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" fill="#000"/>
                                        </svg>
                                        Apple
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `,
                width: '90%',
                padding: '0',
                showConfirmButton: false,
                showCancelButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    // Add form validation
                    const signupForm = document.getElementById('signupForm');
                    if (signupForm) {
                        signupForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            
                            // Validate form
                            const password = document.getElementById('signup-password').value;
                            const confirmPassword = document.getElementById('signup-confirm-password').value;
                            
                            if (password !== confirmPassword) {
                                swalWithPrimaryButton.fire(
                                    'Error',
                                    'Passwords do not match',
                                    'error'
                                );
                                return;
                            }
                            
                            // Simulate form submission
                            const submitBtn = signupForm.querySelector('button[type="submit"]');
                            submitBtn.innerHTML = '<span class="spinner"></span> Creating Account...';
                            submitBtn.disabled = true;
                            
                            setTimeout(() => {
                                swalWithPrimaryButton.fire(
                                    'Account Created!',
                                    'Your account has been successfully created. Welcome to True Broker!',
                                    'success'
                                ).then(() => {
                                    // Redirect to profile page
                                    window.location.href = 'my_profile.php';
                                });
                            }, 2000);
                        });
                    }
                }
            });
        }

        function switchToLogin(event) {
            event.preventDefault();
            Swal.close();
            
            // Add animation
            const loginContainer = document.querySelector('.login-container');
            loginContainer.style.opacity = '0';
            loginContainer.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                loginContainer.style.opacity = '1';
                loginContainer.style.transform = 'translateY(0)';
            }, 300);
        }

        // Form validation for login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Reset error messages
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
            });
            document.querySelectorAll('.form-group input').forEach(input => {
                input.classList.remove('error');
            });
            
            // Validate email
            if (!email) {
                document.getElementById('email-error').textContent = 'Email is required';
                document.getElementById('email-error').style.display = 'block';
                document.getElementById('email').classList.add('error');
                return;
            } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                document.getElementById('email-error').textContent = 'Please enter a valid email address';
                document.getElementById('email-error').style.display = 'block';
                document.getElementById('email').classList.add('error');
                return;
            }
            
            // Validate password
            if (!password) {
                document.getElementById('password-error').textContent = 'Password is required';
                document.getElementById('password-error').style.display = 'block';
                document.getElementById('password').classList.add('error');
                return;
            } else if (password.length < 8) {
                document.getElementById('password-error').textContent = 'Password must be at least 8 characters';
                document.getElementById('password-error').style.display = 'block';
                document.getElementById('password').classList.add('error');
                return;
            }
            
            // Simulate login
            const loginBtn = document.querySelector('.login-btn');
            loginBtn.innerHTML = '<span class="spinner"></span> Signing in...';
            loginBtn.disabled = true;
            
            setTimeout(() => {
                swalWithPrimaryButton.fire({
                    title: 'Welcome Back!',
                    text: `You're now logged in as a ${currentUserType}`,
                    icon: 'success',
                    confirmButtonText: 'Continue'
                }).then(() => {
                    // Reset button state
                    loginBtn.innerHTML = 'Sign In';
                    loginBtn.disabled = false;
                    
                    // Add success animation
                    loginBtn.style.background = 'linear-gradient(135deg, var(--secondary), var(--secondary-light))';
                    setTimeout(() => {
                        loginBtn.style.background = 'linear-gradient(135deg, var(--primary), var(--primary-light))';
                    }, 1000);
                    
                    // Redirect after the success message
                    window.location.href = 'my_profile.php';
                });
            }, 2000);
        });

        // Add floating animation to input fields on focus
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-3px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Initialize user type selector
        document.querySelector('.user-type-btn').click();
    </script>
</body>
</html>