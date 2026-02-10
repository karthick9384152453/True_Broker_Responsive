<?php
session_start();
include 'header.php';

// Initialize token balance if not set
if (!isset($_SESSION['token_balance'])) {
    $_SESSION['token_balance'] = 1250;
}
?>
<br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Token Packages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./PurchaseCoin.css">
</head>
<style>:root {
            --primary: #7D2699;
            --secondary: #1E8540;
            --accent: #f59e0b;
            --dark: #1f2937;
            --light: #f3f4f6;
            --success: #10b981;
            --text: #374151;
            --text-light: #6b7280;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: var(--text);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .badge {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), #5a1a6e);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        h1 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            font-weight: 800;
        }
        
        .subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        @media (min-width: 992px) {
            .content {
                flex-direction: row;
            }
            
            .balance-card {
                position: sticky;
                top: 2rem;
                align-self: flex-start;
            }
        }
        
        .balance-card {
            background: linear-gradient(135deg, var(--primary), #5a1a6e);
            color: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            height: fit-content;
            transition: all 0.3s ease;
            animation: slideInLeft 0.5s ease-out;
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .balance-title {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
        }
        
        .balance-amount {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            width: 100%;
            border: none;
        }
        
        .btn-primary {
            background-color: white;
            color: var(--primary);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
        }
        
        .plans-section {
            flex: 1;
        }
        
        .section-title {
            font-size: 1.5rem;
            color: var(--dark);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        
        .plans-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        .plan-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            position: relative;
        }
        
        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .plan-card.popular {
            border: 2px solid var(--accent);
        }
        
        .popular-badge {
            position: absolute;
            top: -0.75rem;
            right: 1.5rem;
            background: linear-gradient(135deg, var(--accent), #e67e22);
            color: white;
            padding: 0.25rem 1rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .plan-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .plan-price {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .token-amount {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.1rem;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .plan-features {
            list-style: none;
            margin-bottom: 2rem;
        }
        
        .plan-features li {
            padding: 0.5rem 0;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .feature-icon {
            color: var(--success);
            font-size: 0.9rem;
        }
        
        .btn-plan {
            background: linear-gradient(135deg, var(--primary), #5a1a6e);
            color: white;
        }
        
        .btn-plan:hover {
            background: linear-gradient(135deg, #5a1a6e, var(--primary));
        }
        
        .btn-popular {
            background: linear-gradient(135deg, var(--secondary), #156b32);
        }
        
        .btn-popular:hover {
            background: linear-gradient(135deg, #156b32, var(--secondary));
        }
        
        .info-text {
            text-align: center;
            margin-top: 3rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .loading .spinner {
            display: inline-block;
        }
        
        .loading .btn-text {
            display: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .plans-grid {
                grid-template-columns: 1fr;
            }
        }</style>
<body>
    <div class="container">
        <header>
            <div class="badge">
                <i class="fas fa-crown"></i> PREMIUM TOKENS
            </div>
            <h1>Boost Your Experience</h1>
            <p class="subtitle">Choose the perfect token package to unlock premium features and exclusive content</p>
        </header>
        
        <div class="content">
            <div class="balance-card">
                <div class="balance-title">YOUR TOKEN BALANCE</div>
                <div class="balance-amount"><?php echo number_format($_SESSION['token_balance']); ?></div>
                <a href="my_profile.php" class="btn btn-primary">
                    <i class="fas fa-user-circle"></i> View Profile
                </a>
            </div>
            
            <div class="plans-section">
                <h2 class="section-title">Available Packages</h2>
                
                <div class="plans-grid">
                    <!-- Starter Pack -->
                    <div class="plan-card">
                        <h3 class="plan-name">Starter Pack</h3>
                        <div class="plan-price">₹1,000</div>
                        <div class="token-amount">
                            <i class="fas fa-coins"></i>
                            <span>500 Tokens</span>
                        </div>
                        <ul class="plan-features">
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Perfect for beginners</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Tokens never expire</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Basic support</span>
                            </li>
                        </ul>
                        <button class="btn btn-plan purchase-btn" data-plan="starter" data-tokens="500" data-price="1000">
                            <span class="btn-text">Select Package</span>
                            <div class="spinner"></div>
                        </button>
                    </div>
                    
                    <!-- Pro Pack (Most Popular) -->
                    <div class="plan-card popular">
                        <div class="popular-badge">MOST POPULAR</div>
                        <h3 class="plan-name">Pro Pack</h3>
                        <div class="plan-price">₹2,000</div>
                        <div class="token-amount">
                            <i class="fas fa-coins"></i>
                            <span>1,500 Tokens</span>
                        </div>
                        <ul class="plan-features">
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Best value for money</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>50% bonus Tokens</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Priority support</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Exclusive content access</span>
                            </li>
                        </ul>
                        <button class="btn btn-plan btn-popular purchase-btn" data-plan="pro" data-tokens="1500" data-price="2000">
                            <span class="btn-text">Select Package</span>
                            <div class="spinner"></div>
                        </button>
                    </div>
                    
                    <!-- Elite Pack -->
                    <div class="plan-card">
                        <h3 class="plan-name">Elite Pack</h3>
                        <div class="plan-price">₹3,000</div>
                        <div class="token-amount">
                            <i class="fas fa-coins"></i>
                            <span>3,000 Tokens</span>
                        </div>
                        <ul class="plan-features">
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Maximum value package</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>100% bonus Tokens</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>VIP support</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>All exclusive content</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle feature-icon"></i>
                                <span>Early access to new features</span>
                            </li>
                        </ul>
                        <button class="btn btn-plan purchase-btn" data-plan="elite" data-tokens="3000" data-price="3000">
                            <span class="btn-text">Select Package</span>
                            <div class="spinner"></div>
                        </button>
                    </div>
                </div>
                
                <p class="info-text">
                    Tokens never expire. <a href="faq.html">Learn how to use your Tokens</a> or 
                    <a href="contact.html">contact our support team</a> for assistance.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const purchaseButtons = document.querySelectorAll('.purchase-btn');
            
            purchaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const plan = this.getAttribute('data-plan');
                    const tokens = this.getAttribute('data-tokens');
                    const price = this.getAttribute('data-price');
                    
                    this.classList.add('loading');
                    
                    // Redirect to payment page with package details
                    window.location.href = `payment.php?package=${plan}&tokens=${tokens}&price=${price}`;
                });
            }); 
        });
    </script>
</body>
</html>