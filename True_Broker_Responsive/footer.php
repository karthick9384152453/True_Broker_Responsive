<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>True Broker Footer – Wrap on All Except Desktop</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;600&display=swap" rel="stylesheet"/>

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding-bottom: 100px;
    }

    footer {
      background-color: #fff;
      padding: 60px 20px 20px;
      border-radius: 20px 20px 0 0;
      margin-top: 80px;
      box-shadow: 0 -5px 20px rgba(0,0,0,0.05);
    }

    .footer-container {
      max-width: 1600px;
      margin: 0 auto;
      position: relative;
    }
    .icons{
      text-decoration: none !important;
    }

    /* TOP */
    .footer-top {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      margin-bottom: 50px;
      padding-bottom: 30px;
      border-bottom: 1px solid #eee;
    }

    .footer-logo img { width: 170px; }
    .footer-socials p { margin-bottom: 10px; font-weight: 600; font-size: 15px; color: #1D1D1D; }

    .icons { display: flex; gap: 12px; flex-wrap: wrap; justify-content: flex-end; }
    .icons a {
      width: 42px; height: 42px; background: #1D1D1D; color: #fff;
      border-radius: 50%; display: flex; align-items: center; justify-content: center;
      font-size: 18px; transition: all .3s;
    }
    .icons a:hover { background: #742B88; transform: scale(1.15); }

    /* GRID */
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 40px 10px;
      margin-bottom: 60px;
    }
    @media (min-width: 1200px) { .footer-grid { grid-template-columns: repeat(6, 1fr); } }

    .footer-section h4 {
      color: #742B88;
      margin-bottom: 18px;
      font-weight: 600;
      font-size: 17px;
    }
    .footer-section ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .footer-section ul li a, .footer-section p, .footer-section ul li {
      color: #1D1D1D; font-size: 14.5px; line-height: 1.6; text-decoration: none; transition: color .3s;
    }
    .footer-section ul li a:hover { color: #742B88; }
    .footer-section ul li i { margin-right: 8px; color: #742B88; width: 18px; }

    /* SUBSCRIBE – Default: Wrap (for mobile & tablet) */
    .subscribe-box {
      display: flex;
      flex-wrap: wrap;            /* Wrap by default */
      gap: 12px;
      max-width: 380px;

      margin-bottom: 16px;
    }

    .subscribe-box input,
    .subscribe-box button {
      width: 100%;                /* Full width by default */
    }

    .subscribe-box input {
      padding: 10px 22px;
      border: 2.5px solid #7d3a93;
      border-radius: 30px;
      background: #fff;
      font-size: 16px;
      outline: none;
      transition: all .3s;
    }
    .subscribe-box input:focus { border-color: #742B88; box-shadow: 0 0 0 4px rgba(116,43,136,0.15); }

    .subscribe-box button {
      padding: 16px 0;
      border: 2.5px solid #7d3a93;
      background: transparent;
      color: #1D1D1D;
      border-radius: 30px;
      cursor: pointer;
      font-weight: 600;
      font-size: 15px;
      transition: all .3s;
    }
    .subscribe-box button:hover {
      background: #742B88;
      color: #fff;
      border-color: #742B88;
    }

    .subscribe-note { font-size: 13.5px; color: #555; line-height: 1.55; max-width: 340px; }

    /* DESKTOP ONLY (≥1024px): Keep input + button inline */
    @media (min-width: 1024px) {
      .subscribe-box {
        flex-wrap: nowrap;       /* Inline only on large desktop */
      }
      .subscribe-box input {
        width: auto;
        flex: 1;
      }
      .subscribe-box button {
        width: auto;
        padding: 0 28px;
      }
    }

    /* APP BUTTONS */
    .app-buttons { display: flex; flex-direction: column; gap: 14px; margin-top: 10px; }
    .app-btn {
      display: flex; align-items: center; padding: 12px 16px;
      background: #742B88; color: #fff; border-radius: 8px; text-decoration: none;
      font-size: 13.5px; transition: all .3s;
    }
    .app-btn i { font-size: 28px; margin-right: 12px; }
    .app-btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(116,43,136,0.3); }

    /* BOTTOM */
    .footer-bottom-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      border-top: 1px solid #ddd;
      padding: 28px 0 10px;
    }

    .footer-bottom {
      font-size: 15px;
      color: #1D1D1D;
      text-align: center;
      flex: 1;
    }
    .footer-bottom a { color: #742B88; text-decoration: none; font-weight: 600; }
    .footer-bottom a:hover { color: #8e4ba4; }

    .scroll-top {
      background: #742B88;
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 56px;
      height: 56px;
      font-size: 24px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(116, 43, 136, 0.3);
      transition: all .3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .scroll-top:hover {
      background: #8e4ba4;
      transform: translateY(-4px);
    }

    @media (max-width: 640px) {
      .footer-bottom-wrapper {
        justify-content: center;
        flex-direction: column-reverse;
      }
      .scroll-top { margin-top: 15px; }
    }
    @media (max-width: 480px) {
      .scroll-top { width: 50px; height: 50px; font-size: 22px; }
    }
  </style>
</head>
<body>

<footer>
  <div class="footer-container">

    <!-- TOP -->
    <div class="footer-top">
      <div class="footer-logo">
        <img src="img/icon1.png" alt="True Broker Logo">
      </div>
      <div class="footer-socials">
        <p>Follow Us</p>
        <div class="icons">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="Telegram"><i class="fab fa-telegram-plane"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </div>

    <!-- GRID -->
    <div class="footer-grid">
      <div class="footer-section">
        <h4>Subscribe</h4>
        <div class="subscribe-container">
          <div class="subscribe-box">
            <input type="email" placeholder="Your e-mail" required>
            <button type="submit">Send</button>
          </div>
          <p class="subscribe-note">Subscribe to our newsletter to receive our weekly feed.</p>
        </div>
      </div>

      <div class="footer-section">
        <h4>Discover</h4>
        <ul>
          <li><a href="property_listing.php">Property for Sale</a></li>
          <li><a href="property_listing.php">Flats for Sale</a></li>
          <li><a href="property_listing.php">Flats for Rent</a></li>
          <li><a href="property_listing.php">Flats for Lease</a></li>
          <li><a href="property_listing.php">Property For Rent</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="about-us.php">About us</a></li>
          <li><a href="contact-us.php">Contact us</a></li>
          <li><a href="privacy-policy.php">Privacy Policy</a></li>
          <li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Contact Us</h4>
        <ul>
          <li><i class="fas fa-envelope"></i> truebroker22@gmail.com</li>
          <li><i class="fas fa-mobile-alt"></i> 90 4783 4783</li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Our Address</h4>
        <p>No.22 B, 9th Street,<br>Sri Krishna Nagar, Irugur,<br>Tamil Nadu 641103</p>
      </div>

      <div class="footer-section">
        <h4>Get the app</h4>
        <div class="app-buttons">
          <a href="#" class="app-btn">
            <i class="fab fa-apple"></i>
            <span><span class="small-text">Download on the</span><br><span class="store-name">App Store</span></span>
          </a>
          <a href="#" class="app-btn">
            <i class="fab fa-google-play"></i>
            <span><span class="small-text">Get it on</span><br><span class="store-name">Google Play</span></span>
          </a>
        </div>
      </div>
    </div>

    <!-- BOTTOM -->
    <div class="footer-bottom-wrapper">
      <div class="footer-bottom">
        <p>All rights reserved © 2025. Made with love by <a href="#">TrueBroker</a></p>
      </div>

      <button class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
      </button>
    </div>

  </div>
</footer>

</body>
</html>