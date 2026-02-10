<?php include "./header.php"; ?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>True Broker - Comprehensive Services Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7b2cbf;
            --secondary-color: #9d4edd;
            --accent-color: #c77dff;
            --text-color: #333;
            --light-text: #777;
            --white: #ffffff;
            --black: #000000;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --button-bg: #7b2cbf;
            --button-hover: #6a27a8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--white);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ====================== HEADER ====================== */
        header {
            padding: 100px 0 0;
            background-color: var(--white);
            text-align: left; /* Left align everything in header on desktop */
        }

        header .container {
            position: relative;
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--black);
            margin-bottom: 30px;      /* Reduced space below heading */
            text-align: left;
        }

        .hero {
            display: flex;
            align-items: center;
            gap: 50px;
            text-align: left;
            margin: 30px 0 100px;     /* Controlled spacing: top gap reduced */
        }

        .hero-content {
            flex: 1;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 25px;
            color: var(--text-color);
        }

        .hero-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-top: -70px !important;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
        }

        .btn {
            display: inline-block;
            background-color: var(--button-bg);
            color: white;
            padding: 14px 34px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(123, 44, 191, 0.3);
        }

        .btn:hover {
            background-color: var(--button-hover);
            transform: translateY(-3px);
        }

        /* ====================== SERVICES SECTION ====================== */
        .services {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .service {
            display: flex;
            align-items: center;
            gap: 50px;
            margin-bottom: 80px;
        }

        .service.reverse {
            flex-direction: row-reverse;
        }

        .service-content {
            flex: 1;
        }

        .service h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 18px;
            font-weight: 600;
        }

        .service p {
            font-size: 1.05rem;
            color: var(--light-text);
            margin-bottom: 20px;
        }

        .service-image {
            flex: 1;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .service-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
            transition: transform 0.4s ease;
        }

        .service-image img:hover {
            transform: scale(1.05);
        }

        .learn-more {
            display: inline-block;
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            padding: 10px 24px;
            border: 2px solid var(--primary-color);
            border-radius: 30px;
            transition: var(--transition);
        }

        .learn-more:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateX(8px);
        }

        /* ====================== RESPONSIVE ====================== */
        @media (max-width: 992px) {
            h1 { font-size: 2.4rem; }
            .hero, .service { gap: 40px; }
        }

        @media (max-width: 768px) {
            header {
                padding: 80px 0 0;
                text-align: center;
            }

            h1 {
                font-size: 2.2rem;
                margin-bottom: 2rem;
                text-align: center !important; /* Keep centered on mobile */
            }

            .hero {
                flex-direction: column;
                text-align: center;
                margin: 20px 0 80px;
            }

            .hero-content { order: 1; }
            .hero-image { 
                order: 2; 
                max-width: 90%; 
                margin: 0 auto; 
            }

            .hero p { font-size: 1.05rem; }

            .btn {
                padding: 14px 30px;
                font-size: 1rem;
            }

            .service {
                flex-direction: column !important;
                text-align: center;
                gap: 30px;
            }

            .service.reverse {
                flex-direction: column !important;
            }

            .service h2 { font-size: 1.8rem; }

            .service-image {
                max-width: 90%;
                margin: 0 auto;
            }
        }

        @media (max-width: 480px) {
            h1 { font-size: 1.9rem; }
            .hero p { font-size: 1rem; }
            .service h2 { font-size: 1.6rem; }
            .container { padding: 0 15px; }
            .btn, .learn-more {
                width: 100%;
                text-align: center;
                padding: 16px 0;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="container mt-3">
            <h1>Who We Are?</h1>
            <div class="hero">
                <div class="hero-content">
                    <p>Welcome to <strong>True Broker</strong>, the ultimate platform for all your real estate, financial planning, job search, automobile, advanced electronics, and online auction needs.</p>
                    <p>Whether you're buying or selling properties, seeking expert financial advice, searching for your dream job, exploring cars and bikes, staying updated with the latest electronics, or participating in online auctions — we've got you covered.</p>
                    <p>Our secure and user-friendly platform brings together personalized services, professional business valuation, seamless transactions, and endless opportunities — all in one place.</p>
                    <a href="#" class="btn">To Explore More Click Here</a>
                </div>
                <div class="hero-image">
                    <img src="./img/icon1.png" alt="True Broker - All Services Platform">
                </div>
            </div>
        </div>
    </header>

    <section class="services">
        <div class="container">

            <div class="service">
                <div class="service-content">
                    <h2>Real Estate</h2>
                    <p>True Broker is a premier real estate advertising platform that helps you buy, sell, rent, and lease properties with ease. Discover your dream home or investment property.</p>
                    <a href="#" class="learn-more">Learn More About Real Estate →</a>
                </div>
                <div class="service-image">
                    <img src="/img/real-estate.png" alt="Real Estate Services">
                </div>
            </div>

            <div class="service reverse">
                <div class="service-content">
                    <h2>Finance & Investment</h2>
                    <p>Explore investment opportunities, financial planning, loans, insurance, and expert advice. Connect with trusted financial advisors and investors.</p>
                    <a href="#" class="learn-more">Learn More About Finance →</a>
                </div>
                <div class="service-image">
                    <img src="https://truebroker.in/img/finance.jpg" alt="Finance Services">
                </div>
            </div>

            <div class="service">
                <div class="service-content">
                    <h2>Jobs & Career</h2>
                    <p>Discover top career opportunities across industries. Connect with employers and find your dream job with our trusted job advertising platform.</p>
                    <a href="#" class="learn-more">Learn More About Jobs →</a>
                </div>
                <div class="service-image">
                    <img src="https://truebroker.in/img/job.png" alt="Job Opportunities">
                </div>
            </div>

            <div class="service reverse">
                <div class="service-content">
                    <h2>Business Opportunities</h2>
                    <p>Showcase your business, find buyers, partners, or investors. Unlock growth with our professional business advertising platform.</p>
                    <a href="#" class="learn-more">Learn More About Business →</a>
                </div>
                <div class="service-image">
                    <img src="https://truebroker.in/img/business.png" alt="Business Services">
                </div>
            </div>

            <div class="service">
                <div class="service-content">
                    <h2>Electronics Marketplace</h2>
                    <p>Buy and sell new & second-hand electronics — mobiles, laptops, gadgets, appliances. Get the best deals on the latest technology.</p>
                    <a href="#" class="learn-more">Learn More About Electronics →</a>
                </div>
                <div class="service-image">
                    <img src="https://truebroker.in/img/elect.png" alt="Electronics">
                </div>
            </div>

            <div class="service reverse">
                <div class="service-content">
                    <h2>Automobiles</h2>
                    <p>Discover new and used cars, bikes, and commercial vehicles. Buy or sell your dream ride with verified listings and great deals.</p>
                    <a href="#" class="learn-more">Learn More About Automobiles →</a>
                </div>
                <div class="service-image">
                    <img src="https://truebroker.in/img/ato-mobile.png" alt="Cars and Bikes">
                </div>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>