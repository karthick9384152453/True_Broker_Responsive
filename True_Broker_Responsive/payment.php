<?php
ob_start();
session_start();

// Initialize token balance if not set
if (!isset($_SESSION['token_balance'])) {
    $_SESSION['token_balance'] = 1250;
}

// Get package details from URL
$package = isset($_GET['package']) ? $_GET['package'] : '';
$tokens = isset($_GET['tokens']) ? intval($_GET['tokens']) : 0;
$price = isset($_GET['price']) ? intval($_GET['price']) : 0;

// Package names mapping
$packageNames = [
    'starter' => 'Starter Pack',
    'pro' => 'Pro Pack',
    'elite' => 'Elite Pack'
];

// If no valid package, redirect back
if (!array_key_exists($package, $packageNames)) {
    header("Location: PurchaseCoin.php");
    exit();
}

// Now include header.php which can output HTML
include 'header.php';
?>
<br><br><br><br><br><br>
<!DOCTYPE html>
<html>
<!-- Rest of your HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Token Purchase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./Payment.css" >
</head>
<style>
     :root {
            --primary: #742B88;
            --primary-light: #f2e8f7;
            --secondary: #1E8540;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --gray: #95a5a6;
            --danger: #e74c3c;
        }
        
        body {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .payment-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .payment-header h1 {
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .payment-summary {
            background: var(--primary-light);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 1px solid rgba(116, 43, 136, 0.1);
        }
        
        .payment-summary h3 {
            color: var(--primary);
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .payment-summary p {
            margin: 8px 0;
        }
        
        .payment-summary strong {
            color: var(--dark);
        }
        
        .payment-methods {
            margin-top: 30px;
        }
        
        .payment-methods h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--dark);
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-method:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        
        .payment-method i {
            font-size: 28px;
            margin-right: 20px;
            color: var(--primary);
            width: 40px;
            text-align: center;
        }
        
        .payment-method h4 {
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .payment-method p {
            color: var(--gray);
            font-size: 14px;
            margin: 0;
        }
        
        .payment-method.active {
            border-color: var(--primary);
            background: var(--primary-light);
            box-shadow: 0 0 0 2px rgba(116, 43, 136, 0.2);
        }
        
        .btn-pay {
            width: 100%;
            padding: 15px;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 30px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-pay:hover {
            background: #197a36;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-pay i {
            margin-right: 10px;
        }
        
        .spinner {
            display: none;
            width: 24px;
            height: 24px;
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
        
        @media (max-width: 768px) {
            .payment-container {
                padding: 20px;
                margin: 30px auto;
            }
            
            .payment-method {
                padding: 15px;
            }
            
            .payment-method i {
                font-size: 24px;
                margin-right: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .payment-container {
                padding: 15px;
                margin: 20px auto;
            }
            
            .payment-header h1 {
                font-size: 24px;
            }
            
            .payment-method {
                flex-direction: column;
                text-align: center;
            }
            
            .payment-method i {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
</style>
<body>
    <div class="container">
        <div class="payment-container">
            <div class="payment-header">
                <h1>Complete Your Purchase</h1>
                <p>Choose your payment method to complete the transaction</p>
            </div>
            
            <div class="payment-summary">
                <h3>Order Summary</h3>
                <div id="package-details">
                    <p><strong>Package:</strong> <span id="package-name"><?php echo $packageNames[$package]; ?></span></p>
                    <p><strong>Tokens:</strong> <span id="package-tokens"><?php echo number_format($tokens); ?></span></p>
                    <p><strong>Amount:</strong> ₹<span id="package-price"><?php echo number_format($price); ?></span></p>
                    <p><strong>Current Balance:</strong> <?php echo number_format($_SESSION['token_balance']); ?> tokens</p>
                    <p><strong>New Balance After Purchase:</strong> <span id="new-balance"><?php echo number_format($_SESSION['token_balance'] + $tokens); ?></span> tokens</p>
                </div>
            </div>
            
            <div class="payment-methods">
                <h3>Select Payment Method</h3>
                
                <div class="payment-method active" data-method="card">
                    <i class="fas fa-credit-card"></i>
                    <div>
                        <h4>Credit/Debit Card</h4>
                        <p>Pay using Visa, Mastercard, Rupay, or other cards</p>
                    </div>
                </div>
                
                <div class="payment-method" data-method="netbanking">
                    <i class="fas fa-university"></i>
                    <div>
                        <h4>Net Banking</h4>
                        <p>Pay directly from your bank account</p>
                    </div>
                </div>
                
                <div class="payment-method" data-method="upi">
                    <i class="fas fa-mobile-alt"></i>
                    <div>
                        <h4>UPI</h4>
                        <p>Pay using UPI apps like Google Pay, PhonePe, etc.</p>
                    </div>
                </div>
                
                <div class="payment-method" data-method="wallet">
                    <i class="fas fa-wallet"></i>
                    <div>
                        <h4>Wallet</h4>
                        <p>Pay using Paytm, Amazon Pay, or other wallets</p>
                    </div>
                </div>
            </div>
            
            <button class="btn-pay" id="proceed-to-pay">
                <div class="spinner"></div>
                <span class="btn-text"><i class="fas fa-lock"></i> Proceed to Pay ₹<span id="payment-amount"><?php echo number_format($price); ?></span></span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Payment method selection
            document.querySelectorAll('.payment-method').forEach(method => {
                method.addEventListener('click', function() {
                    document.querySelectorAll('.payment-method').forEach(m => {
                        m.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });
            
            // Proceed to payment
            document.getElementById('proceed-to-pay').addEventListener('click', function() {
                const selectedMethod = document.querySelector('.payment-method.active').getAttribute('data-method');
                const btn = this;
                
                btn.classList.add('loading');
                
                // Show processing modal
                Swal.fire({
                    title: 'Processing Payment',
                    html: 'Please wait while we process your payment...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                        
                        // Simulate payment processing (2 seconds)
                        setTimeout(() => {
                            // Send AJAX request to process payment
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', 'process_payment.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onload = function() {
                                btn.classList.remove('loading');
                                
                                if (this.status === 200) {
                                    const response = JSON.parse(this.responseText);
                                    
                                    if (response.success) {
                                        // Show success message
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Payment Successful!',
                                            html: `
                                                <div style="text-align: center;">
                                                    <i class="fas fa-check-circle" style="font-size: 48px; color: #1E8540; margin-bottom: 15px;"></i>
                                                    <p>You have successfully purchased <strong>${response.tokens.toLocaleString()} tokens</strong>.</p>
                                                    <p>Your new token balance is <strong>${response.new_balance.toLocaleString()}</strong>.</p>
                                                </div>
                                            `,
                                            confirmButtonColor: '#742B88',
                                            confirmButtonText: 'Back to Profile'
                                        }).then(() => {
                                            window.location.href = 'myprofile.php';
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Payment Failed',
                                            text: response.message || 'Payment could not be processed',
                                            confirmButtonColor: '#742B88'
                                        });
                                    }
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'An error occurred while processing your payment',
                                        confirmButtonColor: '#742B88'
                                    });
                                }
                            };
                            
                            xhr.send(`package=<?php echo $package; ?>&tokens=<?php echo $tokens; ?>&price=<?php echo $price; ?>&method=${selectedMethod}`);
                        }, 2000);
                    }
                });
            });
        });
    </script>
</body>
</html>