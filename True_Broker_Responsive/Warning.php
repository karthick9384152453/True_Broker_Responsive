<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scam Warning Banner</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }

        /* Main Banner Container - Increased Width */
        .scam-banner {
            width: 95%;
            height: 250px;
            max-width: 1300px;
            min-width: 800px;
            margin: 20px auto;
            padding: 30px;
            border: 5px solid #251d1c;
            border-radius: 8px;
            background-color: #fcfcfc;
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: auto 1fr;
            grid-template-areas: 
                "alert-img header"
                "alert-img content"
                "alert-img footer";
            gap: 20px;
            opacity: 0;
            transform: translateY(-20px) translateX(-50%);
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 1000;
        }

        /* Animation for understood button */
        @keyframes moveToTop {
            to {
                opacity: 0;
                transform: translateY(-100px) translateX(-50%);
                visibility: hidden;
            }
        }

        .scam-banner.animate-out {
            animation: moveToTop 0.5s ease-out forwards;
        }

        /* Alert Image - Centered and properly spaced */
        .alert_img {
            grid-area: alert-img;
            align-self: center;
            padding-right: 30px;
        }

        .alert_img img {
            width: 146px;
            height: 146px;
            display: block;
            margin-top: -40px;
        }

        /* Header Section */
        .scam-banner h2 {
            grid-area: header;
            color: #234268;
            margin: 0 0 25px 0;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.3;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Content Section */
        .banner-content {
            grid-area: content;
            margin-top: -40px;
        }

        /* Warning Items List */
        .warning-label {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .warning-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px 40px;
            margin-bottom: 30px;
            font-size: 16px;
            line-height: 1.6;
            color: #1E293B;
        }

        .warning-list span {
            display: flex;
            align-items: center;
        }

        .warning-list span::before {
            content: "•";
            margin-right: 10px;
            font-weight: bold;
            color: #e74c3c;
            font-size: 18px;
        }

        /* Footer Section */
        .footer-container {
            grid-area: footer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -20px;
        }

        .warning-footer {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0.3px;
            color: #1E8540;
            text-align: right;
            font-style: italic;
            margin: 0;
            padding-left: 30px;
        }

        /* Buttons */
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #777;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .close-btn:hover,
        .close-btn:focus {
            background-color: #f0f0f0;
            color: #333;
            outline: 2px solid #742B88;
        }

        .understood-btn {
            width: 200px;
            height: 48px;
            border-radius: 6px;
            padding: 0 20px;
            background-color: #742B88;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .understood-btn:hover,
        .understood-btn:focus {
            background-color: #5a216b;
            outline: 2px solid #333;
        }

        /* Responsive Adjustments */
        @media (max-width: 1100px) {
            .scam-banner {
                width: 90%;
                min-width: 700px;
                padding: 25px;
            }
            
            .alert_img img {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 800px) {
            .scam-banner {
                min-width: unset;
                width: 95%;
                height: auto;
                padding: 25px 20px;
                grid-template-columns: 1fr;
                grid-template-areas: 
                    "header"
                    "alert-img"
                    "content"
                    "footer";
            }
            
            .alert_img {
                padding-right: 0;
                padding-bottom: 20px;
                text-align: center;
                margin: 0 auto;
            }
            
            .scam-banner h2 {
                font-size: 24px;
                padding-right: 30px;
                justify-content: center;
                text-align: center;
            }
            
            .warning-list {
                flex-direction: column;
                gap: 12px;
                justify-content: center;
            }
            
            .footer-container {
                flex-direction: column-reverse;
                gap: 20px;
            }
            
            .warning-footer {
                text-align: center;
                padding-left: 0;
            }
            
            .understood-btn {
                width: 100%;
                max-width: 250px;
            }
        }

        @media (max-width: 500px) {
            .scam-banner {
                padding: 20px 15px;
            }
            
            .scam-banner h2 {
                font-size: 22px;
                padding-right: 0;
            }
            
            .warning-label, 
            .warning-list {
                font-size: 15px;
            }
            
            .understood-btn {
                height: 44px;
                font-size: 15px;
            }
            
            .alert_img img {
                width: 100px;
                height: 100px;
                margin-top: 0;
            }
        }

        /* Load Roboto font for the footer */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
    </style>
</head>
<body>
    <div class="scam-banner" id="scamWarning" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="alert_img">
            <!-- Using a placeholder image - replace with your actual image -->
            <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png" alt="Warning icon">
        </div>
        
        <h2>⚠️ Avoid Scams - No Advance Without a Visit!</h2>
        
        <div class="banner-content">
            <p class="warning-label">Fraudsters may ask for:</p>
            
            <div class="warning-list">
                <span>Property Visit Charges</span>
                <span>Booking Or Reservation Fee</span>
                <span>Gate Entry Fee</span>
            </div>
        </div>
        
        <div class="footer-container">
            <button class="understood-btn" id="understoodBtn" aria-label="I understand the warning">OK, Understood</button>
            <p class="warning-footer">Visit First. Verify. Then Decide.</p>
        </div>
        
        <button class="close-btn" id="closeBtn" aria-label="Close warning">×</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeBtn = document.getElementById('closeBtn');
            const understoodBtn = document.getElementById('understoodBtn');
            const scamWarning = document.getElementById('scamWarning');
            
            // Close banner functionality
            function dismissBanner() {
                scamWarning.style.display = 'none';
                localStorage.setItem('scamWarningDismissed', 'true');
            }
            
            closeBtn.addEventListener('click', dismissBanner);
            
            // Understood button functionality
            understoodBtn.addEventListener('click', function() {
                scamWarning.classList.add('animate-out');
                
                setTimeout(() => {
                    dismissBanner();
                    // Only redirect if my_profile.php exists
                    // window.location.href = "my_profile.php";
                }, 500);
            });
            
            // Check if banner was previously dismissed
            if (localStorage.getItem('scamWarningDismissed') === 'true') {
                scamWarning.style.display = 'none';
            }
            
            // Initial animation on load
            setTimeout(() => {
                scamWarning.style.opacity = '1';
                scamWarning.style.transform = 'translateY(0) translateX(-50%)';
            }, 100);
            
            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    dismissBanner();
                }
            });
        });
    </script>
</body>
</html>