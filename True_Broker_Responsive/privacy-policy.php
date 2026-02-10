<?php include "./header.php"; ?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - True Broker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7b2cbf;
            --secondary-color: #9d4edd;
            --accent-color: #c77dff;
            --text-color: #333;
            --light-text: #666;
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
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--background-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .privacy-container {
            /* margin-top: 7%; */
            margin-top: 110px !important;
            padding: 50px 40px;
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            margin-bottom: 50px;
        }

        .privacy-container h1 {
            color: var(--primary-color);
            font-size: 2.8rem;
            margin-bottom: 15px;
            font-weight: 700;
            line-height: 1.2;
        }

        .last-updated {
            color: var(--light-text);
            font-size: 0.95rem;
            margin-bottom: 30px;
            font-style: italic;
        }

        .privacy-container h4 {
            color: var(--primary-color) !important;
            font-size: 1.8rem;
            margin: 40px 0 20px;
            font-weight: 600;
            border-bottom: 3px solid var(--accent-color);
            padding-bottom: 10px;
        }

        .privacy-container h5 {
            color: var(--secondary-color);
            font-size: 1.3rem;
            margin: 25px 0 15px;
            font-weight: 600;
        }

        .privacy-container p {
            margin-bottom: 18px;
            color: var(--text-color);
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .privacy-container ul {
            margin-bottom: 25px;
            padding-left: 30px;
        }

        .privacy-container li {
            margin-bottom: 12px;
            color: var(--text-color);
            font-size: 1.02rem;
            line-height: 1.7;
        }

        .privacy-container li::marker {
            color: var(--primary-color);
        }

        .privacy-container strong {
            color: var(--primary-color);
            font-weight: 600;
        }

        .privacy-container a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }

        .privacy-container a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .contact-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 25px;
            border-radius: 12px;
            margin-top: 30px;
            color: var(--white);
        }

        .contact-section h4 {
            color: var(--white) !important;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            margin-top: 0 !important;
        }

        .contact-section p {
            color: var(--white);
        }

        .contact-section ul {
            list-style: none;
            padding-left: 0;
        }

        .contact-section li {
            color: var(--white);
            padding: 8px 0;
            font-size: 1.1rem;
        }

        .contact-section li::before {
            content: "✓ ";
            font-weight: bold;
            margin-right: 8px;
        }

        .contact-section a {
            color: var(--white);
            text-decoration: underline;
        }

        /* Tablet Responsive */
        @media (max-width: 992px) {
            .container {
                padding: 0 15px;
            }

            .privacy-container {
                padding: 35px 30px;
                margin-top: 10%;
            }

            .privacy-container h1 {
                font-size: 2.3rem;
            }

            .privacy-container h4 {
                font-size: 1.6rem;
            }

            .privacy-container h5 {
                font-size: 1.2rem;
            }
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            body {
                font-size: 16px;
            }

            .container {
                padding: 0 10px;
            }

            .privacy-container {
                margin-top: 25%;
                padding: 25px 20px;
                border-radius: 12px;
                margin-bottom: 30px;
            }
            
            .privacy-container h1 {
                font-size: 1.9rem;
                line-height: 1.3;
            }

            .last-updated {
                font-size: 0.85rem;
                margin-bottom: 20px;
            }
            
            .privacy-container h4 {
                font-size: 1.4rem;
                margin: 30px 0 15px;
                padding-bottom: 8px;
            }
            
            .privacy-container h5 {
                font-size: 1.15rem;
                margin: 20px 0 12px;
            }

            .privacy-container p {
                font-size: 0.95rem;
                line-height: 1.7;
                margin-bottom: 15px;
            }

            .privacy-container ul {
                padding-left: 20px;
                margin-bottom: 20px;
            }

            .privacy-container li {
                font-size: 0.92rem;
                margin-bottom: 10px;
                line-height: 1.6;
            }

            .contact-section {
                padding: 20px 15px;
                margin-top: 25px;
            }

            .contact-section li {
                font-size: 0.95rem;
                padding: 6px 0;
            }
        }

        /* Small Mobile Responsive */
        @media (max-width: 480px) {
            .privacy-container {
                margin-top: 35%;
                padding: 20px 15px;
                border-radius: 8px;
            }

            .privacy-container h1 {
                font-size: 1.6rem;
            }

            .privacy-container h4 {
                font-size: 1.25rem;
                margin: 25px 0 12px;
            }

            .privacy-container h5 {
                font-size: 1.05rem;
                margin: 18px 0 10px;
            }

            .privacy-container p {
                font-size: 0.9rem;
            }

            .privacy-container li {
                font-size: 0.88rem;
            }

            .contact-section {
                padding: 18px 12px;
            }

            .contact-section li {
                font-size: 0.9rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .privacy-container {
                margin-top: 40%;
                padding: 15px 12px;
            }

            .privacy-container h1 {
                font-size: 1.4rem;
            }

            .privacy-container h4 {
                font-size: 1.15rem;
            }

            .privacy-container h5 {
                font-size: 1rem;
            }

            .privacy-container p,
            .privacy-container li {
                font-size: 0.85rem;
            }
        }

        /* Landscape Mode for Mobile */
        @media (max-width: 768px) and (orientation: landscape) {
            .privacy-container {
                margin-top: 15%;
            }
        }

        /* Print Styles */
        @media print {
            .privacy-container {
                box-shadow: none;
                margin-top: 0;
            }

            .privacy-container h1,
            .privacy-container h4,
            .privacy-container h5 {
                page-break-after: avoid;
            }

            .privacy-container ul,
            .privacy-container p {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div class="container privacy-container">
        <h1>Privacy Policy</h1>
        <p class="last-updated">Last updated: December 25, 2025</p>
        <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
        <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</p>

        <h4>Interpretation and Definitions</h4>
        <h5>Interpretation</h5>
        <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
        
        <h5>Definitions</h5>
        <p>For the purposes of this Privacy Policy:</p>
        <ul>
            <li><strong>Account</strong> means a unique account created for You to access our Service or parts of our Service.</li>
            <li><strong>Affiliate</strong> means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</li>
            <li><strong>Company</strong> (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to Truebroker, 348 A, Kamarajar Rd, Singanallur, Coimbatore, Tamil Nadu 641015.</li>
            <li><strong>Cookies</strong> are small files that are placed on Your computer, mobile device or any other device by a website, containing the details of Your browsing history on that website among its many uses.</li>
            <li><strong>Country</strong> refers to: Tamil Nadu, India</li>
            <li><strong>Device</strong> means any device that can access the Service such as a computer, a cellphone or a digital tablet.</li>
            <li><strong>Personal Data</strong> is any information that relates to an identified or identifiable individual.</li>
            <li><strong>Service</strong> refers to the Website.</li>
            <li><strong>Service Provider</strong> means any natural or legal person who processes the data on behalf of the Company.</li>
            <li><strong>Website</strong> refers to Truebroker, accessible from <a href="https://truebroker.in" target="_blank">https://truebroker.in</a></li>
            <li><strong>You</strong> means the individual accessing or using the Service.</li>
        </ul>
        
        <h4>Collecting and Using Your Personal Data</h4>
        <h5>Types of Data Collected</h5>
        <p>While using Our Service, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:</p>
        <ul>
            <li>Email address</li>
            <li>First name and last name</li>
            <li>Phone number</li>
            <li>Address, State, Province, ZIP/Postal code, City</li>
            <li>Usage Data</li>
        </ul>

        <h5>Usage Data</h5>
        <p>Usage Data is collected automatically when using the Service. Usage Data may include information such as Your Device's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>

        <h5>Tracking Technologies and Cookies</h5>
        <p>We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service.</p>

        <h4>Use of Your Personal Data</h4>
        <p>The Company may use Personal Data for the following purposes:</p>
        <ul>
            <li><strong>To provide and maintain our Service,</strong> including to monitor the usage of our Service.</li>
            <li><strong>To manage Your Account:</strong> to manage Your registration as a user of the Service.</li>
            <li><strong>For the performance of a contract:</strong> the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased.</li>
            <li><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication.</li>
            <li><strong>To provide You</strong> with news, special offers and general information about other goods, services and events which we offer.</li>
        </ul>

        <h4>Retention of Your Personal Data</h4>
        <p>The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations, resolve disputes, and enforce our legal agreements and policies.</p>

        <h4>Security of Your Personal Data</h4>
        <p>The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.</p>

        <h4>Children's Privacy</h4>
        <p>Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us.</p>

        <h4>Changes to this Privacy Policy</h4>
        <p>We may update Our Privacy Policy from time to time. We will notify You of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date at the top of this Privacy Policy.</p>

        <div class="contact-section">
            <h4>Contact Us</h4>
            <p>If you have any questions about this Privacy Policy, You can contact us:</p>
            <ul>
                <li>By email: <a href="mailto:truebroker22@gmail.com">truebroker22@gmail.com</a></li>
                <li>By phone number: <a href="tel:9047834783">9047834783</a></li>
            </ul>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>