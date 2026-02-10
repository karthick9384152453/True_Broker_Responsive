<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP Real Estate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        
        .modal {
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 85%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid #e0e0e0;
        }
        
        @keyframes popIn {
            0% { transform: scale(0.9); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 24px;
            height: 24px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .close-btn:hover {
            transform: rotate(90deg);
        }
        
        .coin-balance {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #742B88;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .coin-balance svg {
            width: 16px;
            height: 16px;
            fill: #FFD700;
        }
        
        .property-title {
            font-size: 24px;
            margin-bottom: 5px;
            color: #742B88;
            text-align: center;
            font-weight: 700;
            margin-top: 10px;
        }
        
        .property-subtitle {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 20px;
            color: #555;
            text-align: center;
            font-weight: 500;
        }
        
        .property-details {
            background-color: #f9f9f9;
            padding: 18px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #742B88;
        }
        
        .property-details p {
            margin: 12px 0;
            font-size: 15px;
            display: flex;
            justify-content: space-between;
            color: #333;
        }
        
        .property-label {
            font-weight: 600;
            color: #742B88;
        }
        
        .highlight {
            font-weight: 600;
            color: #742B88;
        }
        
        .area {
            font-style: italic;
            font-size: 16px;
            margin-top: 15px;
            color: #666;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .area svg {
            width: 16px;
            height: 16px;
            fill: #742B88;
        }
        
        /* New Call Button Styles */
        .call-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #742B88;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            margin: 20px auto;
            width: 80%;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(116, 43, 136, 0.3);
            border: none;
            cursor: pointer;
        }
        
        .call-button:hover {
            background-color: #5a226d;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(116, 43, 136, 0.4);
        }
        
        .call-button:active {
            transform: translateY(0);
        }
        
        .call-button svg {
            width: 20px;
            height: 20px;
            fill: white;
        }
        
        .call-number {
            font-size: 20px;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

<div id="propertyModal" class="modal">
    <div class="modal-content">
        <div class="coin-balance">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"/>
            </svg>
            50 Coins
        </div>
        
        <svg class="close-btn" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill="#742B88" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
        </svg>
        
        <h2 class="property-title">SP REAL ESTATE</h2>
        <h3 class="property-subtitle">Coconut Farm with Farm House</h3>
        
        <div class="property-details">
            <p><span class="property-label">Mobile:</span> <span class="highlight">9962115552</span></p>
            <p><span class="property-label">Property Size:</span> <span>5 Acre</span></p>
            <p><span class="property-label">Property Price:</span> <span class="highlight">1.20 Crore</span></p>
            <p><span class="property-label">Product Code:</span> <span>67603002484</span></p>
            <p><span class="property-label">Listing Date:</span> <span>2023-11-29</span></p>
        </div>
        
        <button class="call-button" onclick="window.location.href='tel:9962115552'">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
            </svg>
            <span class="call-number">Call 9962115552</span>
        </button>
        
        <p class="area">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            Palani
        </p>
    </div>
</div>

<script>
    // Get the modal
    const modal = document.getElementById("propertyModal");
    
    // Get the close button
    const closeBtn = document.querySelector(".close-btn");
    
    // When the user clicks the close button, close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Coin balance system
    let coins = 50;
    
    // Function to update coin display
    function updateCoinBalance() {
        document.querySelector('.coin-balance').innerHTML = `
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"/>
            </svg>
            ${coins} Coins
        `;
    }

    // Initialize coin balance display
    updateCoinBalance();
</script>

</body>
</html>