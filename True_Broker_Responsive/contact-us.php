<?php include "./header.php"; ?>
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TrueBroker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #7b2cbf;
            --secondary-color: #9d4edd;
            --accent-color: #c77dff;
            --text-color: #333;
            --light-text: #777;
            --background-light: #f9f9f9;
            --white: #ffffff;
            --black: #000000;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --button-bg: #7b2cbf;
            --button-hover: #6a27a8;
            --error-color: #e63946;
            --success-color: #2a9d8f;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--white);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .breadcrumb {
            color: var(--light-text);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .breadcrumb a {
            text-decoration: none;
            color: var(--light-text);
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary-color);
        }

        .breadcrumb span {
            color: orange;
        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 40px;
        }

        .contact-illustration {
            flex: 1;
            min-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .contact-form {
            flex: 1;
            min-width: 300px;
            background-color: var(--white);
            padding: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        h1 {
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 15px;
        }

        .form-description {
            color: var(--light-text);
            margin-bottom: 30px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color:black;
        }

        .required-field::after {
            content: "*";
            color: var(--error-color);
            margin-left: 4px;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(123, 44, 191, 0.2);
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .send-button {
            background-color: var(--button-bg);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            min-width: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .send-button:hover {
            background-color: var(--button-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .send-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: var(--white);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            font-family: 'Poppins', sans-serif;
        }
        .contact-info h3{
            font-size:1.5rem;
        }

        .contact-card {
            background-color: var(--white);
            padding: 25px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            flex: 1;
            min-width: 250px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: var(--primary-color);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s ease;
        }

        .contact-card:hover::before {
            transform: scaleX(1);
        }

        .contact-card h3 {
            margin-top: 0;
            color: var(--primary-color);
            transition: var(--transition);
        }

        .contact-card:hover h3 {
            color: var(--secondary-color);
        }

        .contact-card p {
            color: var(--light-text);
            margin-bottom: 0;
            transition: var(--transition);
        }

        .contact-card:hover p {
            color: var(--text-color);
        }

        .contact-icon {
            font-size: 2rem;
            color: var(--primary-color);
            transition: var(--transition);
            display: inline-block;
            margin-bottom: 15px;
        }

        .contact-card:hover .contact-icon {
            color: var(--accent-color);
            transform: scale(1.1);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-icon {
            color: var(--primary-color);
            font-size: 20px;
            transition: var(--transition);
        }

        .social-icon:hover {
            color: var(--accent-color);
            transform: translateY(-3px);
        }

        .error-message {
            color: var(--error-color);
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .form-group.error input,
        .form-group.error textarea,
        .form-group.error select {
            border-color: var(--error-color);
        }

        .form-group.error .error-message {
            display: block;
        }

        .success-message {
            display: none;
            background-color: rgba(42, 157, 143, 0.1);
            color: var(--success-color);
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid var(--success-color);
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
                gap: 20px;
            }
            
            .contact-illustration {
                order: -1;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
            
            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }
            
            .send-button {
                width: 100%;
            }
            
            .contact-info {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- <div class="breadcrumb">
            <a href="index.php">Home</a> > <span>Contact us</span>
        </div> -->
        
        <div class="main-content">
            <div class="contact-illustration">
                <img src="./img/Contact.gif" alt="Contact illustration" loading="lazy">
            </div>
            
            <div class="contact-form mt-5">
                <h1>Get in touch!</h1>
                <p class="form-description">Fill out the form and our team will try to get back to you within 24 hours.</p>
                
                <form id="contactForm" action="process_contact.php" method="POST">
                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle"></i> Thank you! Your message has been sent successfully.
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="required-field">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name" required>
                            <div class="error-message" id="nameError">Please enter your name</div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="required-field">Mobile</label>
                            <input type="tel" id="phone" name="phone" placeholder="Enter your mobile number" required>
                            <div class="error-message" id="phoneError">Please enter a valid 10-digit mobile number</div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email" class="required-field">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            <div class="error-message" id="emailError">Please enter a valid email address</div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject">
                                <option value="">Select a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Property Listing">Property Listing</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="postal" class="required-field">Postal Code</label>
                            <input type="text" id="postal" name="postal" placeholder="Enter postal code" required>
                            <div class="error-message" id="postalError">Please enter a valid postal code</div>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Enter your city">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="required-field">Message</label>
                        <textarea id="message" name="message" placeholder="How can we help you?" required></textarea>
                        <div class="error-message" id="messageError">Please enter your message</div>
                    </div>
                    
                    <div class="form-footer">
                        <button type="submit" class="send-button" id="submitButton">
                            <span class="spinner" id="submitSpinner"></span>
                            <span id="buttonText">Send Message</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="contact-info">
            <div class="contact-card">
                <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                <h3>Drop us a line</h3>
                <p><a href="mailto:truebroker22@gmail.com" style="text-decoration:none;color:inherit;">truebroker22@gmail.com</a></p>
            </div>
            
            <div class="contact-card">
                <span class="contact-icon"><i class="fas fa-mobile-alt"></i></span>
                <h3>Call us any time</h3>
                <p><a href="tel:+9047834783" style="text-decoration:none;color:inherit;">+90 4783 4783</a></p>
            </div>
            
            <div class="contact-card">
                <span class="contact-icon"><i class="fab fa-instagram"></i></span>
                <h3>Follow us</h3>
                <p>@truebroker_india</p>
                <!-- <div class="social-links">
                    <a href="https://facebook.com/truebroker" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/truebroker" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://linkedin.com/company/truebroker" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (validateForm()) {
                // Show loading state
                document.getElementById('submitButton').disabled = true;
                document.getElementById('submitSpinner').style.display = 'block';
                document.getElementById('buttonText').textContent = 'Sending...';
                
                // Create FormData object
                const formData = new FormData(this);
                
                // AJAX submission
                fetch(this.action, {
                    method: this.method,
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading state
                    document.getElementById('submitButton').disabled = false;
                    document.getElementById('submitSpinner').style.display = 'none';
                    document.getElementById('buttonText').textContent = 'Send Message';
                    
                    if (data.success) {
                        // Show success message
                        document.getElementById('successMessage').style.display = 'block';
                        document.getElementById('contactForm').reset();
                        
                        // Hide success message after 5 seconds
                        setTimeout(function() {
                            document.getElementById('successMessage').style.display = 'none';
                        }, 5000);
                    } else {
                        // Show error messages
                        if (data.errors) {
                            Object.keys(data.errors).forEach(field => {
                                const errorElement = document.getElementById(`${field}Error`);
                                errorElement.textContent = data.errors[field];
                                errorElement.parentElement.classList.add('error');
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('submitButton').disabled = false;
                    document.getElementById('submitSpinner').style.display = 'none';
                    document.getElementById('buttonText').textContent = 'Send Message';
                    alert('An error occurred. Please try again.');
                });
            }
        });
        
        function validateForm() {
            let isValid = true;
            const name = document.getElementById('name');
            const phone = document.getElementById('phone');
            const email = document.getElementById('email');
            const postal = document.getElementById('postal');
            const message = document.getElementById('message');
            
            // Reset error states
            document.querySelectorAll('.form-group').forEach(group => {
                group.classList.remove('error');
            });
            
            // Validate name
            if (name.value.trim() === '') {
                document.getElementById('nameError').textContent = 'Please enter your name';
                name.parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate phone
            const phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phone.value.trim())) {
                document.getElementById('phoneError').textContent = 'Please enter a valid 10-digit mobile number';
                phone.parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address';
                email.parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate postal code
            if (postal.value.trim() === '') {
                document.getElementById('postalError').textContent = 'Please enter a postal code';
                postal.parentElement.classList.add('error');
                isValid = false;
            }
            
            // Validate message
            if (message.value.trim() === '') {
                document.getElementById('messageError').textContent = 'Please enter your message';
                message.parentElement.classList.add('error');
                isValid = false;
            }
            
            return isValid;
        }
        
        // Add real-time validation
        document.querySelectorAll('input, textarea').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.parentElement.classList.remove('error');
                }
            });
        });
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>