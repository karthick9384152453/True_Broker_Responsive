<?php 
include_once('header.php');
?>
<style>
    .return-container {
        margin-top: 7%;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .return-container h5 {
        color: #742B88;
        font-weight: 700;
        margin-top: 25px;
        margin-bottom: 15px;
        font-size: 1.4rem;
    }
    
    .return-container h5:first-child {
        text-align: center;
        color: #333;
        font-size: 2rem;
        margin-bottom: 30px;
        border-bottom: 3px solid #742B88;
        padding-bottom: 15px;
    }
    
    .return-container p {
        color: #333;
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 15px;
        font-weight: 400;
    }
    
    .return-container ul {
        color: #333;
        font-size: 1.05rem;
        line-height: 1.9;
        padding-left: 25px;
        margin-bottom: 20px;
    }
    
    .return-container ul li {
        margin-bottom: 12px;
        color: #444;
        font-weight: 400;
    }
    
    .return-container ul li::marker {
        color: #742B88;
        font-weight: bold;
    }
    
    .contact-info {
        background: linear-gradient(135deg, #742B88, #9a5bb0);
        color: white;
        padding: 20px;
        border-radius: 8px;
        margin-top: 25px;
    }
    
    .contact-info p {
        color: white;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }
    
    .contact-info p:last-child {
        margin-bottom: 0;
        font-weight: 600;
        font-size: 1.2rem;
    }
    
    @media (max-width: 768px) {
        .return-container {
            margin-top: 60%;
            padding: 20px;
            width: 95% !important;
            margin-left: auto;
            margin-right: auto;
        }
        
        .return-container h5:first-child {
            font-size: 1.5rem;
        }
        
        .return-container h5 {
            font-size: 1.2rem;
        }
        
        .return-container p,
        .return-container ul {
            font-size: 0.95rem;
        }
        
        .contact-info p {
            font-size: 1rem;
        }
        
        .contact-info p:last-child {
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 480px) {
        .return-container {
            margin-top: 80%;
            padding: 15px;
        }
    }
</style>

<div class="return-container container mb-5 w-50">
    <h5>Payment Return Policy</h5>

    <h5>Returns</h5>
    <p>If you are not entirely satisfied with our true coins, please review our return policy outlined below:</p>

    <h5>Refunds</h5>
    <ul>
        <li>We offer a full refund when you give true coins to replace as your fund.</li>
        <li>Refunds will be processed within 7-15 business days after we receive the returned item.</li>
        <li>Contact our customer support team at <strong>9047834783</strong> and provide your order details and reason for the refund request.</li>
        <li>Our support team will assess your request and guide you through the necessary steps.</li>
    </ul>

    <h5>Contact Us</h5>
    <p>If you have any questions about our return policy, please contact us:</p>

    <div class="contact-info">
        <p><i class="fas fa-phone"></i> Phone: <strong>9047834783</strong></p>
    </div>
</div>

<?php
include_once('footer.php');
?>