 
 <style>
    .amt{
        font-size: 20px !important;
        font-family: sans-serif;
        color: orangered;
        font-weight: 700;
    }
    .smm{
        font-size: 15px !important;
        font-weight: 600;
    }
      .paragraph-text{
          text-align: justify !important;
     }
    /* @media (max-width:750px) and (min-width:320px){
        .how-content{
            position: relative;
            right: 330px !important;
            top: 350px !important;

        }
    }  */
        .how-it-works {
    display: flex;
    gap: 2rem;
    align-items: center;
    padding: 2rem;
}

.left-image {
    flex: 1;
}

.left-image img {
    width: 100%;
    height: auto;
    display: block;
}

.how-content {
    flex: 1;
}

.step {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    align-items: flex-start;
}

.step img {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .how-it-works {
        flex-direction: column;
    }
    
    .step {
        gap: 0.8rem;
    }
    
    .step img {
        width: 50px;
        height: 50px;
    }
}
.our{
    text-align: center !important;
    font-family: sans-serif;
      color:  #742B88;
          font-weight: bold;
    margin-bottom: 10px;
    margin-top: 40px;
}


.close-popup {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 22px;
    cursor: pointer;
}

  </style>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="./index.css">
    <!-- <link rel="stylesheet" href="./Header/header.css" > -->
</head>
<body>
    <?php include "./header.php";?>


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
            <form onsubmit="handleLoginSubmit(event)">
                <div class="form-group-popup">
                    <label>Email or Phone</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter email or phone" required>
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
                    <a href="#" onclick="alert('Password reset feature coming soon!')">Forgot Password?</a>
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
            <form onsubmit="handleSignupSubmit(event)">
                <div class="form-group-popup">
                    <label>Full Name</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter your name" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Email</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group-popup">
                    <label>Phone Number</label>
                    <div class="input-wrapper-popup">
                        <i class="fas fa-phone"></i>
                        <input type="tel" placeholder="Enter phone number" required>
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






   <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <p class="hero-subtitle">Let us guide your home</p>
                <h1 class="hero-title">Believe in finding it</h1>
                <p class="hero-description">
                    Search properties for sale and to rent in Tamilnadu
                </p>
                
                <div class="search_Container">
                    <!-- Flex Search Box -->
                    <div class="search-box">
                        <!-- Budget Dropdown -->
                        <div class="search-field">
                            <i class="fas fa-wallet search-icon"></i>
                            <div class="select-wrapper">
                                <select class="search-select" id="budget">
                                    <option value="">Budget</option>
                                    <option value="0-10000">Under ₹10k</option>
                                    <option value="10000-30000">₹10k - ₹30k</option>
                                    <option value="30000-50000">₹30k - ₹50k</option>
                                    <option value="50000-100000">₹50k - ₹1L</option>
                                    <option value="100000+">Above ₹1L</option>
                                </select>
                                <i class="fas fa-chevron-down select-arrow"></i>
                            </div>
                        </div>
                        
                        <!-- Location Input -->
                        <!-- <div class="search-field">
                            <i class="fas fa-map-marker-alt search-icon"></i>
                            <input type="text" class="search-input" id="location" placeholder="Location">
                            <div class="search-actions">
                                <button class="action-btn" id="detectLocation" title="Use current location">
                                    <i class="fas fa-location-arrow"></i>
                                </button>
                            </div>
                        </div>
                         -->

                         <div class="search-field">
    <i class="fas fa-map-marker-alt search-icon"></i>
    <input type="text" class="search-input" id="location" placeholder="Location" readonly>
    <div class="search-actions">
        <button class="action-btn" id="detectLocation" title="Use current location">
            <i class="fas fa-location-arrow"></i>
        </button>
    </div>
</div>
                       <!-- Keyword Search -->
                        <div class="search-field">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" id="keywords" placeholder="Enter keywords">
                        <div class="search-actions">
                            <button class="action-btn" id="detectLocation" title="Use current location">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </div>

                        <!-- Voice Search Button -->
                        <button id="voiceSearch" title="Voice search">
                            <i class="fas fa-microphone"></i>
                        </button>

                        <!-- Main Search Button -->
                        <button class="search-btn" id="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Property Type Selector -->
                <div class="mt-4">
                    <p class="text-white mb-3 fw-bold">What are you looking for?</p>
                    <div class="property-types">
                        <button type="button" class="property-type-btn active" data-type="buy" onclick="window.location.href='property_listing.php'">
                            <i class="fas fa-shopping-cart"></i>
                            Buy
                        </button>
                        <button type="button" class="property-type-btn" data-type="sell" onclick="window.location.href='property_listing.php'">
                            <i class="fas fa-tag"></i>
                            Sell
                        </button>
                        <button type="button" class="property-type-btn" data-type="rent" onclick="window.location.href='property_listing.php'">
                            <i class="fas fa-home"></i>
                            Rent
                        </button>
                        <button type="button" class="property-type-btn" data-type="lease" onclick="window.location.href='property_listing.php'">
                            <i class="fas fa-handshake"></i>
                            Lease
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    


<!-- property section -->
<section class="property-section">
    <div class="property-row">
        <div class="text-block center-text">
            <h2 class="heading-text">Easy way to find a perfect property</h2>
            <p class="paragraph-text">
                Welcome to Truebroker, your ultimate destination for all things real estate. We specialize in the production, acquisition, and sale of prime properties, encompassing land, buildings, and the valuable air and underground rights associated with them.
            </p>
        </div>
        <div class="image-block">
            <img src="img/co-1.jpg" alt="Modern Villa" loading="lazy"/>
        </div>
    </div>

    <div class="property-row reverse">
        <div class="text-block center-text mt-5">
            <h2 class="heading-text">Truebroker - Real Estate</h2>
            <p class="paragraph-text">
                Real estate refers to physical property, including land, buildings, and the associated air and underground rights. It encompasses the business activities of producing, purchasing, and selling these properties. Real estate plays a significant role in both residential and commercial sectors, providing homes, offices, retail spaces, and more. It is a dynamic industry that offers investment opportunities, wealth creation, and economic growth.
            </p>
        </div>
        <div class="image-block">
            <img src="img/co-2.webp" alt="Mobile Real Estate" loading="lazy"/>
        </div>
    </div>
    </section>
<!-- why work section -->
<section class="why-work-section">
        <h2 class="main-heading">Why You Should Work With Us</h2>
        <p class="sub-heading">100000+ Real Properties and Happy Customers</p>

        <div class="features-row">
            <div class="feature-box">
                <img src="img/Vector.png" alt="Properties Icon" class="feature-icon" loading="lazy"/>
                <h4>Wide Range of Properties</h4>
                <p>We offer expert legal help for all related property items in Dubai.</p>
            </div>
            <div class="feature-box">
                <img src="img/Vector (2).png" alt="Buy Rent Icon" class="feature-icon" loading="lazy"/>
                <h4>Buy, Rent, lease or sale Homes</h4>
                <p>We sell your home at the best market price and very quickly as well.</p>
            </div>
            <div class="feature-box">
                <img src="img/Vector (3).png" alt="Trust Icon" class="feature-icon" loading="lazy"/>
                <h4>Trusted by Thousands</h4>
                <p>We offer you free consultancy to get a loan for your new home.</p>
            </div>
        </div>
    </section>
    <!-- featured Property -->
    <section class="featured-section">
        <h2 class="main-heading">Featured Properties</h2>
        <p class="sub-heading">Available Properties</p>

        <div class="property-tabs-container">
            <div class="property-tabs">
                <button type="button" class="tab active" data-filter="all" onclick="window.location.href='property_listing.php'">All Properties</button>
                <button type="button" class="tab" data-filter="sale" onclick="window.location.href='property_listing.php'">For Sale</button>
                <button type="button" class="tab" data-filter="rent" onclick="window.location.href='property_listing.php'">For Rent</button>
                <button type="button" class="tab" data-filter="lease" onclick="window.location.href='property_listing.php'">For Lease</button>
                <button type="button" class="tab" data-filter="stay" onclick="window.location.href='property_listing.php'">For Stay</button>
            </div>
        </div>

        <!-- Property cards would go here -->
        <div class="property-cards">
            <!-- Example property cards would be dynamically inserted here -->
        </div>
    </section>
    <section class="property-grid-section">
    <div class="property-grid">
        <!-- Card 1 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link">
            <img src="img/property1.jpg" 
            alt="Luxury Family Home with 4 bedrooms and pool"
            class="property-img"
            loading="lazy"
            width="400"
            height="300">
            </a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>Luxury Family Home</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1800-1818 79th St</p>
                <!-- <div class="price">₹395,000</div> -->
                 <div class="prr">
                    <h5 class="amt">₹395,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 1</span>
                    <span><i class="fa fa-expand"></i> 400</span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property2.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <!-- <div class="price">₹280,000</div> -->
                  <div class="prr">
                    <h5 class="amt">₹280,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="property-card">
           <a href="property.php?id=1" class="property-link"> <img src="img/property3.jpg" alt="North Dillard Street" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR RENT</span>
            </div>
            <div class="property-details">
                <h3>North Dillard Street</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 4330 Bell Shoals Rd</p>
                <!-- <div class="price">₹250 <small>/month</small></div> -->
                  <div class="prr">
                    <h5 class="amt">₹250/<small class="smm">month</small></h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 400</span>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property4.jpg" alt="Eaton Garth Penthouse" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>Eaton Garth Penthouse</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 7722 18th Ave, Brooklyn</p>
                <!-- <div class="price">₹180,000</div> -->
                  <div class="prr">
                    <h5 class="amt">₹180,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property5.jpg" alt="New Apartment Nice View" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR RENT</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>New Apartment Nice View</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 42 Avenue O, Brooklyn</p>
                <!-- <div class="price">₹850 <small>/month</small></div> -->
                  <div class="prr">
                    <h5 class="amt">₹850/<small class="smm">month</small></h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 1</span>
                    <span><i class="fa fa-expand"></i> 460</span>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property6.jpg" alt="Diamond Manor Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>Diamond Manor Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 7802 20th Ave, Brooklyn</p>
                <!-- <div class="price">₹259,000</div> -->
                  <div class="prr">
                    <h5 class="amt">₹259,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 500</span>
                </div>
            </div>
        </div>
         <!-- Card 7 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property2.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <!-- <div class="price">₹280,000</div> -->
                  <div class="prr">
                    <h5 class="amt">₹280,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>
        <!-- Card 8 -->
        <div class="property-card">
            <a href="property.php?id=1" class="property-link"><img src="img/property5.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <!-- <div class="price">₹280,000</div> -->
                  <div class="prr">
                    <h5 class="amt">₹179,000</h5>
                 </div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>

    </div>
    
    <div class="see-all">
        <a href="property_listing.php">See All Listing <i class="fa fa-arrow-right"></i></a>
    </div>
</section>

<section class="city-carousel">
    <h2>Find Properties in These Cities</h2>
    <p class="subtitle">Available Properties in These Cities</p>

    <div class="carousel-container">
        <div class="carousel-track" id="carouselTrack">
            <!-- City Cards -->
            <div class="city-card" style="background-image: url('img/property1.jpg');">
                <div class="city-info">
                    <h4>Chennai</h4>
                    <p>2 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property2.jpg');">
                <div class="city-info">
                    <h4>Madurai</h4>
                    <p>1 Property</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property3.jpg');">
                <div class="city-info">
                    <h4>Salem</h4>
                    <p>2 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property4.jpg');">
                <div class="city-info">
                    <h4>Coimbatore</h4>
                    <p>3 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property5.jpg');">
                <div class="city-info">
                    <h4>Ooty</h4>
                    <p>8 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property6.jpg');">
                <div class="city-info">
                    <h4>Chennai</h4>
                    <p>2 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property1.jpg');">
                <div class="city-info">
                    <h4>Madurai</h4>
                    <p>1 Property</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property2.jpg');">
                <div class="city-info">
                    <h4>Salem</h4>
                    <p>2 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property3.jpg');">
                <div class="city-info">
                    <h4>Coimbatore</h4>
                    <p>3 Properties</p>
                </div>
            </div>

            <div class="city-card" style="background-image: url('img/property4.jpg');">
                <div class="city-info">
                    <h4>Ooty</h4>
                    <p>8 Properties</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section>
    <div class="container d-flex">
        <div >
            <img src="./img/combined-img.png" width="500px" class="c-im" alt="">
        </div>

        <div>
                   <h2>How It works?<br><span>Find a perfect home</span></h2>
                    <p class="subtext">Pellentesque egestas elementum egestas faucibus sem. <br> Velit nunc egestas ut morbi. Leo diam diam.</p>


        </div>
    </div>
</section> -->

 <section class="how-it-works">
    <div class="left-image">
        <img src="img/combined-img.png" alt="Home Visual" loading="lazy"/>
    </div>

    <div class="how-content">
        <h2>How It works?<br><span>Find a perfect home</span></h2>
        <p class="subtext">Pellentesque egestas elementum egestas faucibus sem. Velit nunc egestas ut morbi. Leo diam diam.</p>

        <div class="step">
            <img src="img/icon01.png" alt="Search Icon" loading="lazy"/>
            <div>
                <h4>Find Real Estate</h4>
                <p>Sumo petentium ut per, at his wisim utinam adipiscing. Est ei graeco</p>
            </div>
        </div>

        <div class="step">
            <img src="img/icon02.png" alt="Agent Icon" loading="lazy"/>
            <div>
                <h4>Meet Realtor</h4>
                <p>Sumo petentium ut per, at his wisim utinam adipiscing. Est ei graeco</p>
            </div>
        </div>

        <div class="step">
            <img src="img/icon03.png" alt="Key Icon" loading="lazy"/>
            <div>
                <h4>Take The Keys</h4>
                <p>Sumo petentium ut per, at his wisim utinam adipiscing. Est ei graeco</p>
            </div>
        </div>
    </div>
</section> 

<!-- <div class="testimonial-section">
    <div class="testimonial-content">
        <div class="testimonial-left">
            <h2>What our customers are <br> saying us?</h2>
            <p class="description">
                Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like.
            </p>
            <div class="stats">
                <div class="stat-box">
                    <p class="stat-number">10m+</p>
                    <p class="stat-label">Happy People</p>
                </div>
                <div class="stat-box">
                    <p class="stat-number">4.88</p>
                    <p class="stat-label">Overall rating</p>
                    <div class="stars">★★★★★</div>
                </div>
            </div>
        </div>

        <div class="testimonial-right">
            <div class="quote-icon">"</div>
            <div class="profile">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User" loading="lazy"/>
                <div>
                    <p class="name">Cameron Williamson</p>
                    <p class="role">Designer</p>
                </div>
            </div>
            <p class="testimonial-text">
                Searches for multiplexes, property comparisons, and the loan estimator. Works great. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dores.
            </p>
            <div class="nav-buttons">
                <button onclick="prevTestimonial()">&lt;</button>
                <button onclick="nextTestimonial()">&gt;</button>
            </div>
        </div>
    </div>
</div> -->

<!-- <h2 class="section-title">Our Other Products</h2> -->
 <div>
    <h2 class="our">Our Other Products</h2>
 </div>

<div class="scroll-container">
    <div class="scroll-content" id="scrollContent">
        <!-- First set of badges -->
        <div class="badge-set">
            <div class="product-badge" data-product="True Guide">
                <img src="img/truegide.jpg" alt="True Guide" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Jobs">
                <img src="img/truejobs.jpg" alt="True Jobs" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Motors">
                <img src="img/truemotors.jpg" alt="True Motors" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Talk">
                <img src="img/truetalk.jpg" alt="True Talk" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Tickets">
                <img src="img/truetickets.png" alt="True Tickets" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Story">
                <img src="img/truestory.jpg" alt="True Story" class="check-icon" loading="lazy"/>
            </div>
        </div>
        
        <!-- Duplicate set for seamless loop -->
        <div class="badge-set">
            <div class="product-badge" data-product="True Guide">
                <img src="img/truegide.jpg" alt="True Guide" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Jobs">
                <img src="img/truejobs.jpg" alt="True Jobs" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Motors">
                <img src="img/truemotors.jpg" alt="True Motors" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Talk">
                <img src="img/truetalk.jpg" alt="True Talk" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Tickets">
                <img src="img/truetickets.png" alt="True Tickets" class="check-icon" loading="lazy"/>
            </div>
            <div class="product-badge" data-product="True Story">
                <img src="img/truestory.jpg" alt="True Story" class="check-icon" loading="lazy"/>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-section1">
    <div class="container">
        <div class="header">
            <h1>Best Properties</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="main-grid">
            <!-- Left side - Main property -->
            <div class="left-property">
                <div class="badges">
                    <span class="badge for-sale">For Sale</span>
                    <span class="badge featured">Featured</span>
                </div>
                
                <div class="property-info">
                    <h2 class="property-title">Villa One Hyde Park</h2>
                    <div class="property-address">
                        <i class="fa fa-map-marker-alt"></i>  2030 Bloomingdale Ave
                    </div>
                    <div class="property-bottom">
                        <div class="price">₹120,000</div>
                        <div class="specs">
                            <div class="spec"><i class="fa fa-bed"></i> 4</div>
                            <div class="spec"><i class="fa fa-bath"></i> 2</div>
                            <div class="spec"><i class="fa fa-expand"></i> 500</div>
                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side - Three sections -->
            <div class="right-section">
                <!-- Top right - Interior image -->
                <div class="top-right"></div>

                <!-- Bottom right - Two sections -->
                <div class="bottom-right">
                    <!-- Dining section with play button -->
                    <div class="dining-section">
                        <button class="play-button">▶</button>
                    </div>

                    <!-- Stats section -->
                    <div class="stats-section">
                        <div class="stats-number">280+</div>
                        <div class="stats-label">Properties</div>
                        <div class="stats-description">
                            Explore our wide variety of properties to fit your dream home today
                        </div>
                        <button class="arrow-button">→</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="team-section">
    <div class="team-title">
        <h2>Meet Our Team Of Experts</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <div class="team-grid">
        <div class="team-member">
            <img src="img/team1.jpg" alt="John Powell" loading="lazy"/>
            <h4>John Powell</h4>
            <p>Service Support</p>
        </div>
        <div class="team-member">
            <img src="img/team2.jpg" alt="Thomas Powell" loading="lazy"/>
            <h4>Thomas Powell</h4>
            <p>Marketing</p>
        </div>
        <div class="team-member">
            <img src="img/team3.jpg" alt="Tom Wilson" loading="lazy"/>
            <h4>Tom Wilson</h4>
            <p>Designer</p>
        </div>
        <div class="team-member">
            <img src="img/team4.jpg" alt="Samuel Palmer" loading="lazy"/>
            <h4>Samuel Palmer</h4>
            <p>Marketing</p>
        </div>
    </div>
</section>
<section class="real-estate-markets">
    <h2>Popular Real Estate Markets</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <div class="market-tags">
        <span>The Villages, FL real estate</span>
        <span>New York, Real estate</span>
        <span>Madera, CA real estate</span>
        <span>Fontana, CA real estate</span>
        <span>Moreno Valley, CA real estate</span>
        <span>Aurora, IL real estate</span>
        <span>Perris, CA real estate</span>
        <span>Minnesota Lake, MN real estate</span>
        <span>Woodbridge, VA real estate</span>
    </div>
</section>
<?php include 'footer.php'; ?>
<script src="app.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const voiceSearchBtn = document.getElementById('voiceSearch');
    const detectLocationBtn = document.getElementById('detectLocation');
    const searchButton = document.getElementById('searchButton');
    const keywordsInput = document.getElementById('keywords');
    const locationInput = document.getElementById('location');
    const budgetSelect = document.getElementById('budget');
    
    // Voice Search Functionality
    voiceSearchBtn.addEventListener('click', function() {
        // Check if browser supports speech recognition
        if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
            alert('Voice search is not supported in your browser. Please use Chrome, Edge, or Safari.');
            return;
        }
        
        // Create new speech recognition object
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        
        // Configure recognition
        recognition.lang = 'en-US';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;
        
        // Add visual feedback
        const micIcon = voiceSearchBtn.querySelector('i');
        micIcon.classList.add('voice-active');
        
        // Recognition started
        recognition.onstart = function() {
            console.log('Voice recognition started');
        };
        
        // Recognition result
        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            keywordsInput.value = transcript;
            micIcon.classList.remove('voice-active');
        };
        
        // Recognition error
        recognition.onerror = function(event) {
            console.error('Voice recognition error', event.error);
            micIcon.classList.remove('voice-active');
            
            let errorMessage = 'Error occurred in voice recognition: ';
            switch(event.error) {
                case 'no-speech':
                    errorMessage = 'No speech was detected. Please try again.';
                    break;
                case 'audio-capture':
                    errorMessage = 'No microphone was found. Please ensure a microphone is connected.';
                    break;
                case 'not-allowed':
                    errorMessage = 'Permission to use microphone was denied. Please allow microphone access.';
                    break;
                default:
                    errorMessage += event.error;
            }
            
            alert(errorMessage);
        };
        
        // Recognition ended
        recognition.onend = function() {
            micIcon.classList.remove('voice-active');
            console.log('Voice recognition ended');
        };
        
        // Start recognition
        recognition.start();
    });
    
    // Location Detection
    detectLocationBtn.addEventListener('click', function() {
        if (!navigator.geolocation) {
            alert('Geolocation is not supported in your browser');
            return;
        }
        
        const locationIcon = detectLocationBtn.querySelector('i');
        locationIcon.classList.add('detecting');
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                // In a real app, you would reverse geocode to get address
                const lat = position.coords.latitude.toFixed(4);
                const lng = position.coords.longitude.toFixed(4);
                locationInput.value = `Near ${lat}, ${lng}`;
                locationIcon.classList.remove('detecting');
            },
            function(error) {
                alert('Error getting location: ' + error.message);
                locationIcon.classList.remove('detecting');
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    });
    
    // Search Button Click
    searchButton.addEventListener('click', function() {
        const budget = budgetSelect.value;
        const location = locationInput.value;
        const keywords = keywordsInput.value;
        
        if (!location || !keywords) {
            alert('Please fill in location and keywords fields');
            return;
        }
        
        console.log('Searching for:', {
            budget: budget,
            location: location,
            keywords: keywords
        });
        
        // In a real app, you would:
        // 1. Process the search (API call, filter results, etc.)
        // 2. Display results or redirect to results page
        alert(`Searching for "${keywords}" in ${location} (Budget: ${budget || 'Any'})`);
    });

    // Property type buttons functionality
    const propertyTypeBtns = document.querySelectorAll('.property-type-btn');
    propertyTypeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            propertyTypeBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
    // DOM Elements
const searchInput = document.getElementById('propertySearch');
const searchBtn = document.querySelector('.search-btn');
const propertyTypeBtns = document.querySelectorAll('.property-type-btn');
const heroSection = document.querySelector('.hero-section');

// Current Search State
let currentSearchState = {
    query: '',
    type: 'buy', // default to 'buy'
    location: 'Tamilnadu'
};

// Property Data (mock data - in real app this would come from API)
const properties = [
    { id: 1, type: 'buy', address: '123 Main St, Chennai', price: '₹75,00,000', beds: 3, baths: 2, area: '1800 sqft' },
    { id: 2, type: 'rent', address: '456 Oak Ave, Coimbatore', price: '₹25,000/mo', beds: 2, baths: 1, area: '1200 sqft' },
    { id: 3, type: 'buy', address: '789 Beach Rd, Pondicherry', price: '₹1,20,00,000', beds: 4, baths: 3, area: '2400 sqft' },
    { id: 4, type: 'lease', address: '321 Hillside, Ooty', price: '₹50,000/mo', beds: 3, baths: 2, area: '2000 sqft' }
];

// Initialize the page
function init() {
    // Set default active button
    setActiveButton('buy');
    
    // Event listeners
    setupEventListeners();
    
    // Check if there's a saved search in localStorage
    loadSavedSearch();
}

// Set up all event listeners
function setupEventListeners() {
    // Search button click
    searchBtn.addEventListener('click', handleSearch);
    
    // Enter key in search input
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') handleSearch();
    });
    
    // Property type buttons
    propertyTypeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            currentSearchState.type = type;
            setActiveButton(type);
            // In a real app, you might filter results immediately
            // filterProperties();
        });
    });
    
    // Input change - update search state
    searchInput.addEventListener('input', (e) => {
        currentSearchState.query = e.target.value.trim();
    });
}

// Handle search functionality
function handleSearch() {
    if (!currentSearchState.query) {
        showAlert('Please enter a location, address, or ZIP code');
        return;
    }
    
    // Save search to localStorage
    saveSearch();
    
    // In a real app, this would redirect or fetch results
    console.log('Searching for:', currentSearchState);
    
    // For demo: filter properties and show results
    const results = filterProperties();
    displayResults(results);
    
    // Alternatively, redirect to search results page:
    // window.location.href = `property_listing.php?search=${encodeURIComponent(currentSearchState.query)}&type=${currentSearchState.type}`;
}

// Filter properties based on current search state
function filterProperties() {
    return properties.filter(property => {
        const matchesQuery = property.address.toLowerCase().includes(currentSearchState.query.toLowerCase()) || 
                           currentSearchState.query.toLowerCase() === 'tamilnadu';
        const matchesType = property.type === currentSearchState.type;
        return matchesQuery && matchesType;
    });
}

// Display search results (demo functionality)
function displayResults(results) {
    // In a real app, this would render results to the page
    if (results.length > 0) {
        showAlert(`Found ${results.length} properties matching your search`, 'success');
        console.log('Matching properties:', results);
    } else {
        showAlert('No properties found matching your criteria', 'warning');
    }
}

// Set active property type button
function setActiveButton(type) {
    propertyTypeBtns.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.type === type);
    });
}

// Show alert message
function showAlert(message, type = 'error') {
    // Remove any existing alerts
    const existingAlert = document.querySelector('.search-alert');
    if (existingAlert) existingAlert.remove();
    
    // Create alert element
    const alertEl = document.createElement('div');
    alertEl.className = `search-alert alert-${type}`;
    alertEl.textContent = message;
    
    // Style the alert
    alertEl.style.position = 'fixed';
    alertEl.style.top = '20px';
    alertEl.style.left = '50%';
    alertEl.style.transform = 'translateX(-50%)';
    alertEl.style.padding = '10px 20px';
    alertEl.style.borderRadius = '5px';
    alertEl.style.backgroundColor = type === 'error' ? '#ff4444' : '#00C851';
    alertEl.style.color = 'white';
    alertEl.style.zIndex = '1000';
    alertEl.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
    alertEl.style.animation = 'fadeIn 0.3s ease-in-out';
    
    // Add to DOM
    document.body.appendChild(alertEl);
    
    // Remove after 3 seconds
    setTimeout(() => {
        alertEl.style.animation = 'fadeOut 0.3s ease-in-out';
        setTimeout(() => alertEl.remove(), 300);
    }, 3000);
}

// Save search to localStorage
function saveSearch() {
    localStorage.setItem('lastPropertySearch', JSON.stringify(currentSearchState));
}

// Load saved search from localStorage
function loadSavedSearch() {
    const savedSearch = localStorage.getItem('lastPropertySearch');
    if (savedSearch) {
        currentSearchState = JSON.parse(savedSearch);
        searchInput.value = currentSearchState.query;
        setActiveButton(currentSearchState.type);
    }
}

// Add CSS animations for alerts
function addAlertAnimations() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-50%) translateY(-20px); }
            to { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        @keyframes fadeOut {
            from { opacity: 1; transform: translateX(-50%) translateY(0); }
            to { opacity: 0; transform: translateX(-50%) translateY(-20px); }
        }
    `;
    document.head.appendChild(style);
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    addAlertAnimations();
    init();
});

// property section

document.addEventListener('DOMContentLoaded', function() {
    // Image lazy loading enhancement
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => {
            if (img.dataset.src) {
                imageObserver.observe(img);
            }
        });
    }

    // Add animation class when elements come into view
    const animateOnScroll = function() {
        const propertyRows = document.querySelectorAll('.property-row');
        
        propertyRows.forEach(row => {
            const rowPosition = row.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;
            
            if (rowPosition < screenPosition) {
                row.classList.add('animate');
            }
        });
    };

    // Initial check
    animateOnScroll();
    
    // Check on scroll
    window.addEventListener('scroll', animateOnScroll);
});

document.addEventListener('DOMContentLoaded', function() {
            // Animation for feature boxes on scroll
            const featureBoxes = document.querySelectorAll('.feature-box');
            
            const animateOnScroll = () => {
                featureBoxes.forEach((box, index) => {
                    const boxPosition = box.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (boxPosition < screenPosition) {
                        setTimeout(() => {
                            box.style.opacity = '1';
                            box.style.transform = 'translateY(0)';
                        }, index * 200);
                    }
                });
            };

            // Set initial state for animation
            featureBoxes.forEach(box => {
                box.style.opacity = '0';
                box.style.transform = 'translateY(20px)';
                box.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });

            // Run on load and scroll
            animateOnScroll();
            window.addEventListener('scroll', animateOnScroll);

            // Smooth hover effect for touch devices
            featureBoxes.forEach(box => {
                box.addEventListener('touchstart', function() {
                    this.classList.add('hover-effect');
                });
                
                box.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('hover-effect');
                    }, 300);
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carouselTrack');
    const cards = document.querySelectorAll('.city-card');
    const cardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(track).gap);
    const container = document.querySelector('.carousel-container');
    let currentPosition = 0;
    let maxScroll = track.scrollWidth - container.offsetWidth;
    
    // Auto-scroll functionality
    let autoScrollInterval = setInterval(() => {
        if (currentPosition >= maxScroll) {
            currentPosition = 0;
        } else {
            currentPosition += cardWidth;
        }
        track.style.transform = `translateX(-${currentPosition}px)`;
    }, 3000);
    
    // Pause on hover
    container.addEventListener('mouseenter', () => {
        clearInterval(autoScrollInterval);
    });
    
    container.addEventListener('mouseleave', () => {
        autoScrollInterval = setInterval(() => {
            if (currentPosition >= maxScroll) {
                currentPosition = 0;
            } else {
                currentPosition += cardWidth;
            }
            track.style.transform = `translateX(-${currentPosition}px)`;
        }, 3000);
    });
    
    // Touch/swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    
    track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});
    
    track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});
    
    function handleSwipe() {
        const threshold = 50;
        if (touchEndX < touchStartX - threshold) {
            // Swipe left
            if (currentPosition < maxScroll) {
                currentPosition += cardWidth * 2;
                track.style.transform = `translateX(-${Math.min(currentPosition, maxScroll)}px)`;
            }
        } else if (touchEndX > touchStartX + threshold) {
            // Swipe right
            if (currentPosition > 0) {
                currentPosition -= cardWidth * 2;
                track.style.transform = `translateX(-${Math.max(currentPosition, 0)}px)`;
            }
        }
    }
    
    // Update on resize
    window.addEventListener('resize', () => {
        cardWidth = cards[0].offsetWidth + parseInt(window.getComputedStyle(track).gap);
        maxScroll = track.scrollWidth - container.offsetWidth;
    });
});
</script>

<!-- <div class="search-field">
    <i class="fas fa-map-marker-alt search-icon"></i>
    <input type="text" class="search-input" id="location" placeholder="Location" readonly>
    <div class="search-actions">
        <button class="action-btn" id="detectLocation" title="Use current location">
            <i class="fas fa-location-arrow"></i>
        </button>
    </div>
</div> -->

<script>
// Page load ஆகும்போதே location detect பண்ணும்
window.addEventListener('DOMContentLoaded', function() {
    detectUserLocation();
});

// Button click பண்ணினாலும் location detect பண்ணும்
document.getElementById('detectLocation').addEventListener('click', function() {
    detectUserLocation();
});

function detectUserLocation() {
    const locationInput = document.getElementById('location');
    const detectBtn = document.getElementById('detectLocation');
    
    // Check if browser supports geolocation
    if ("geolocation" in navigator) {
        // Loading state காட்டும்
        locationInput.value = "Detecting location...";
        detectBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        
        navigator.geolocation.getCurrentPosition(
            // Success callback
            function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                // Reverse geocoding - coordinates-ஐ city name-ஆக மாற்றும்
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        // City, state, country எடுக்கும்
                        const city = data.address.city || data.address.town || data.address.village || data.address.county;
                        const state = data.address.state;
                        const country = data.address.country;
                        
                        // Location-ஐ input-ல் காட்டும்
                        locationInput.value = `${city}, ${state}, ${country}`;
                        
                        // Success icon காட்டும்
                        detectBtn.innerHTML = '<i class="fas fa-check" style="color: green;"></i>';
                        setTimeout(() => {
                            detectBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
                        }, 2000);
                    })
                    .catch(error => {
                        console.error('Reverse geocoding error:', error);
                        locationInput.value = `Lat: ${lat.toFixed(4)}, Lng: ${lng.toFixed(4)}`;
                        detectBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
                    });
            },
            // Error callback
            function(error) {
                let errorMessage = '';
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        errorMessage = "Location permission denied";
                        break;
                    case error.POSITION_UNAVAILABLE:
                        errorMessage = "Location unavailable";
                        break;
                    case error.TIMEOUT:
                        errorMessage = "Location request timeout";
                        break;
                    default:
                        errorMessage = "Unknown error";
                }
                
                locationInput.value = errorMessage;
                detectBtn.innerHTML = '<i class="fas fa-location-arrow"></i>';
                
                // Manual entry allow பண்ணும்
                locationInput.removeAttribute('readonly');
            },
            // Options
            {
                enableHighAccuracy: true, // GPS use பண்ணும்
                timeout: 10000,           // 10 seconds max wait
                maximumAge: 300000        // 5 minutes cache
            }
        );
    } else {
        locationInput.value = "Geolocation not supported";
        locationInput.removeAttribute('readonly');
    }
}
</script>


<!-- Login Popup JavaScript -->
<script>
    // User login status
    let userLoggedIn = sessionStorage.getItem('userLoggedIn') === 'true';

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
        
        // Mark user as logged in
        userLoggedIn = true;
        sessionStorage.setItem('userLoggedIn', 'true');
        
        // Show success message
        alert('Login successful! You can now access all features.');
        
        // Close popup
        closeLoginPopup();
    }

    // Handle signup submit
    function handleSignupSubmit(event) {
        event.preventDefault();
        
        // Mark user as logged in
        userLoggedIn = true;
        sessionStorage.setItem('userLoggedIn', 'true');
        
        // Show success message
        alert('Signup successful! Welcome to TrueBroker.');
        
        // Close popup
        closeLoginPopup();
    }

    // Handle social login
    function handleSocialLoginPopup(provider) {
        userLoggedIn = true;
        sessionStorage.setItem('userLoggedIn', 'true');
        
        alert(`Login with ${provider} successful!`);
        closeLoginPopup();
    }

    // Close popup on overlay click
    document.addEventListener('DOMContentLoaded', function() {
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

        // Add onclick to protected elements
        addLoginProtection();
    });

    // Add login protection to elements
    function addLoginProtection() {
        // Property type buttons
        const propertyTypeBtns = document.querySelectorAll('.property-type-btn');
        propertyTypeBtns.forEach(btn => {
            const originalOnClick = btn.getAttribute('onclick');
            btn.setAttribute('data-original-click', originalOnClick);
            btn.onclick = function(e) {
                if (showLoginPopup()) {
                    eval(this.getAttribute('data-original-click'));
                }
            };
        });

        // Property tabs
        const propertyTabs = document.querySelectorAll('.tab');
        propertyTabs.forEach(tab => {
            const originalOnClick = tab.getAttribute('onclick');
            tab.setAttribute('data-original-click', originalOnClick);
            tab.onclick = function(e) {
                if (showLoginPopup()) {
                    eval(this.getAttribute('data-original-click'));
                }
            };
        });

        // Property cards
        const propertyCards = document.querySelectorAll('.property-card');
        propertyCards.forEach(card => {
            card.style.cursor = 'pointer';
            card.onclick = function(e) {
                if (showLoginPopup()) {
                    const link = this.querySelector('a');
                    if (link) {
                        window.location.href = link.href;
                    }
                }
            };
        });

        // Search button
        const searchButton = document.getElementById('searchButton');
        if (searchButton) {
            searchButton.onclick = function(e) {
                if (!showLoginPopup()) {
                    e.preventDefault();
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

        // Detect location
        const detectLocation = document.getElementById('detectLocation');
        if (detectLocation) {
            const originalOnClick = detectLocation.onclick;
            detectLocation.onclick = function(e) {
                if (!showLoginPopup()) {
                    e.preventDefault();
                } else if (originalOnClick) {
                    originalOnClick.call(this, e);
                }
            };
        }
    }
</script>

</body>
</html>