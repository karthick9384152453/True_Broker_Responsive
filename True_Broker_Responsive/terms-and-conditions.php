<?php
include_once('header.php');
?>

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
        padding: 0 20px;
    }

    .terms-container {
        margin-top: 7%;
        padding: 40px 0;
    }

    .terms-container h1, 
    .terms-container h3 {
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 20px;
    }

    .terms-container h3 {
        font-size: 2rem;
    }

    .terms-container h4 {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin: 30px 0 15px;
    }

    .terms-container h5 {
        color: var(--secondary-color);
        font-size: 1.2rem;
        margin: 20px 0 10px;
    }

    .terms-container p {
        margin-bottom: 15px;
        color: var(--text-color);
    }

    .terms-container ul {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .terms-container li {
        margin-bottom: 8px;
        color: var(--text-color);
    }

    .terms-container strong {
        color: var(--primary-color);
    }

    .terms-container a {
        color: var(--primary-color);
        text-decoration: none;
        transition: var(--transition);
    }

    .terms-container a:hover {
        color: var(--secondary-color);
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .terms-container {
            margin-top: 25% !important;
            padding: 20px 0;
        }
        
        .terms-container h3 {
            font-size: 1.8rem;
        }
        
        .terms-container h4 {
            font-size: 1.3rem;
        }
        
        .terms-container h5 {
            font-size: 1.1rem;
        }
    }
</style>

<div class="terms-container container mb-5 ">
    <h3 class="mt-4">Our Terms and Conditions</h3>
    
    <p>Welcome to Truebroker!</p>
    <p>These terms and conditions outline the rules and regulations for the use of Truebroker's Website, located at <a href="https://truebroker.in/" target="_blank">https://truebroker.in/</a>.</p>
    <p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use Truebroker if you do not agree to all of the terms and conditions stated on this page.</p>

    <h4><strong>1. Definitions</strong></h4>
    <p>The following terminology applies to these Terms and Conditions, Privacy Statement, and Disclaimer Notice:</p>
    <ul>
        <li><strong>"Client", "You", "Your"</strong>: Refers to you, the person accessing this website.</li>
        <li><strong>"Company", "Ourselves", "We", "Our", "Us"</strong>: Refers to Truebroker.</li>
        <li><strong>"Party", "Parties"</strong>: Refers to both the Client and the Company.</li>
    </ul>

    <h4><strong>2. Cookies</strong></h4>
    <p>We use cookies. By accessing Truebroker, you agree to use cookies in accordance with our <a href="privacy-policy.php">Privacy Policy</a>.</p>
    <p>Most interactive websites use cookies to retrieve user details for each visit. Cookies enable functionality in certain areas to improve user experience.</p>

    <h4><strong>3. License</strong></h4>
    <p>Unless otherwise stated, Truebroker owns all intellectual property rights for material on this site. You may access it for personal use, subject to restrictions:</p>
    <ul>
        <li>Do <strong>not</strong> republish, sell, rent, or sub-license material.</li>
        <li>Do <strong>not</strong> reproduce, duplicate, copy, or redistribute content.</li>
    </ul>

    <h4><strong>4. User Comments</strong></h4>
    <p>Certain parts of this website allow users to post comments. Truebroker does not pre-screen comments but reserves the right to remove inappropriate content.</p>
    <p>By posting comments, you warrant that:</p>
    <ul>
        <li>You have the legal right to post the content.</li>
        <li>Comments do not violate intellectual property rights.</li>
        <li>Comments are not defamatory, offensive, or unlawful.</li>
    </ul>
    <p>You grant Truebroker a non-exclusive license to use, edit, and distribute your comments.</p>

    <h4><strong>5. Hyperlinking</strong></h4>
    <p>The following may link to our site without prior approval:</p>
    <ul>
        <li>Government agencies, search engines, news organizations.</li>
        <li>Online directories (if linking complies with our guidelines).</li>
    </ul>
    <p>Approved organizations must ensure links are not deceptive and do not imply false endorsement.</p>

    <h4><strong>6. iFrames</strong></h4>
    <p>You may not create frames around our webpages without prior written permission.</p>

    <h4><strong>7. Content Liability</strong></h4>
    <p>We are not responsible for content on third-party websites linking to us. You agree to defend us against claims arising from your website.</p>

    <h4><strong>8. Reservation of Rights</strong></h4>
    <p>We may request removal of links to our site at any time. We reserve the right to amend these terms without notice.</p>

    <h4><strong>9. Disclaimer</strong></h4>
    <p>To the fullest extent permitted by law, we exclude all warranties and liabilities related to this website. We are not liable for:</p>
    <ul>
        <li>Death, personal injury, or fraud.</li>
        <li>Loss or damage incurred from using this site.</li>
    </ul>
    <p>This disclaimer applies as long as the website is offered free of charge.</p>
</div>

<?php
include("footer.php");
?>