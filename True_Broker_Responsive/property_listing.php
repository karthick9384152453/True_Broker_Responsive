<?php include "header.php"; ?>
<br><br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>True Broker - Premium Property Listings</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./Property_listing.css">
    <style>
        /* Scam Warning Banner Styles */
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

        .banner-content {
            grid-area: content;
            margin-top: -40px;
        }

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

        .footer-container11 {
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
            margin-left: 500px;
            padding-left: 30px;
        }

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
            margin-left: -60px;
            margin-top: -20px;
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
            
            .footer-container11 {
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

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        
        /* Rest of your existing styles */
        :root {
            --primary: #742B88;
            --primary-light: #9a5bb0;
            --primary-dark: #5a1e6e;
            --secondary: #1E8540;
            --secondary-light: #2aa954;
            --secondary-dark: #156b32;
            --text: #2d3748;
            --text-light: #4a5568;
            --bg: #f8f5fa;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 1.5rem;
        }

        /* Sidebar Styles */
        .sidebar {
            position: sticky;
            top: 1rem;
            height: fit-content;
        }

        .filter-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
        }

        .filter-card h3 {
            color: var(--primary);
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-group {
            margin-bottom: 1.25rem;
        }

        .filter-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .filter-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: var(--transition);
            background-color: var(--card-bg);
        }

        .filter-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(116, 43, 136, 0.1);
        }

        .price-range-container {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .price-range-container input {
            flex: 1;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .checkbox-item input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .action-btn {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-clear {
            background-color: #f8f0fc;
            color: var(--primary);
            border: 1px solid #e9d8fd;
        }

        .btn-clear:hover {
            background-color: #f3e8ff;
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--card-bg);
            padding: 1rem 1.5rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .results-count {
            font-weight: 600;
            color: var(--text);
        }

        .sort-dropdown {
            padding: 0.5rem 1rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            background: var(--card-bg);
            cursor: pointer;
            font-size: 0.9rem;
        }

        .property-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* Property Card Styles */
        .property-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .property-media {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .property-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .property-card:hover .property-image {
            transform: scale(1.05);
        }

        .property-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--secondary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 1;
        }

        .verified-badge {
            background-color: blue;
        }

        .property-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .property-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .property-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .property-location {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .property-features {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .property-footer {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .enquiry-count {
            font-size: 0.8rem;
            color: var(--secondary);
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            border-radius: 20px;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius: 20px;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Save Button Styles */
        .save-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            display:none;
        }

        .save-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        .save-btn.saved {
            color: var(--primary);
        }

        /* Mobile Filter Toggle */
        .mobile-filter-toggle {
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 1rem;
            width: 100%;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-close {
            display: none;
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #ef4444;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 250px 1fr;
            }
            
            .property-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 0.5rem;
            }
            
            .sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                width: 90%;
                max-width: 400px;
                height: 100vh;
                background: var(--card-bg);
                z-index: 1000;
                padding: 1.5rem;
                overflow-y: auto;
                transition: left 0.3s ease;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .mobile-filter-toggle {
                display: flex;
            }
            
            .filter-close {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .results-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .property-grid {
                grid-template-columns: 1fr;
            }
            
            .property-media {
                height: 180px;
            }
            
            .property-content {
                padding: 1.25rem;
            }
            
            .action-buttons {
                flex-direction: column;
                width: 100%;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .property-card {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        .property-card:nth-child(1) { animation-delay: 0.1s; }
        .property-card:nth-child(2) { animation-delay: 0.2s; }
        .property-card:nth-child(3) { animation-delay: 0.3s; }
        .property-card:nth-child(4) { animation-delay: 0.4s; }
        .property-card:nth-child(5) { animation-delay: 0.5s; }
        .property-card:nth-child(6) { animation-delay: 0.6s; }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: var(--radius);
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 2rem;
            position: relative;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
        }

        .modal-title {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .modal-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .modal-section {
            margin-bottom: 1.5rem;
        }

        .modal-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .modal-badge {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 1rem;
        }

        .modal-description {
            color: var(--text);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .modal-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .feature-card {
            background: var(--bg);
            padding: 1rem;
            border-radius: 8px;
        }

        .feature-label {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-bottom: 0.25rem;
        }

        .feature-value {
            font-weight: 600;
        }

        .modal-amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .amenity-tag {
            background: #f0e5f5;
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }

        .modal-posted {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
        }

        .modal-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .modal-btn-primary {
            background: var(--primary);
            color: white;
        }

        .modal-btn-primary:hover {
            background: var(--primary-dark);
        }

        .modal-btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            border-radius:20px;
        }

        .modal-btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Saved Properties Tab */
        .saved-tab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--primary);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: var(--transition);
        }

        .saved-tab:hover {
            transform: scale(1.1);
        }

        .saved-tab .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--secondary);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Saved Properties Panel */
        .saved-panel {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.3s ease;
            padding: 1.5rem;
            overflow-y: auto;
        }

        .saved-panel.active {
            right: 0;
        }

        .saved-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border);
        }

        .saved-title {
            font-size: 1.25rem;
            color: var(--primary);
            font-weight: 600;
        }

        .close-saved {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
        }

        .saved-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .saved-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 8px;
            background: var(--bg);
            position: relative;
        }

        .saved-item-image {
            width: 80px;
            height: 80px;
            border-radius: 6px;
            object-fit: cover;
        }

        .saved-item-content {
            flex: 1;
        }

        .saved-item-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .saved-item-price {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .remove-saved {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .remove-saved:hover {
            color: #ef4444;
        }

        .empty-saved {
            text-align: center;
            padding: 2rem 0;
            color: var(--text-light);
        }

        .empty-saved i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-light);
        }

        @media (max-width: 600px) {
            .saved-panel {
                width: 100%;
                right: -100%;
            }
            
            .saved-tab {
                bottom: 1rem;
                right: 1rem;
                width: 50px;
                height: 50px;
            }
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--secondary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1002;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .toast.show {
            opacity: 1;
        }

        .toast i {
            font-size: 1.2rem;
        }

        /* Rating Styles */
        .single-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.85rem;
            background: #36A603;
            color: white;
            padding: 0.25rem 0.5rem;
            width: 53.14594650268555;
            height: 26.572973251342773;
            opacity: 1;
            margin-left: 34px;
            border-radius: 6.64px;

        }

        .single-rating-star {
            color: white;
        }

        .single-rating-value {
            font-weight: 600;
            color: white;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
   <!-- Scam Warning Banner -->
<div class="scam-banner" id="scamWarning" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="alert_img">
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

    <div class="container">
        <!-- Mobile Filter Toggle -->
        <button class="mobile-filter-toggle" onclick="toggleMobileFilter()">
            <i class="fas fa-sliders-h"></i> Filter Properties
        </button>

        <!-- Sidebar Filters -->
        <aside class="sidebar" id="sidebar">
            <button class="filter-close" onclick="toggleMobileFilter()">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="filter-card">
                <h3><i class="fas fa-filter"></i> Filter Properties</h3>
                
                <div class="filter-group">
                    <label for="propertyType">Property Type</label>
                    <select id="propertyType" class="filter-control" onchange="applyFilters()">
                        <option value="">All Types</option>
                        <option value="plot">Plot/Land</option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                        <option value="house">Independent House</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Price Range (₹)</label>
                    <div class="price-range-container">
                        <input type="number" id="minPrice" class="filter-control" placeholder="Min" onchange="applyFilters()">
                        <span>to</span>
                        <input type="number" id="maxPrice" class="filter-control" placeholder="Max" onchange="applyFilters()">
                    </div>
                </div>

                <div class="filter-group">
                    <label for="location">Location</label>
                    <select id="location" class="filter-control" onchange="applyFilters()">
                        <option value="">All Locations</option>
                        <option value="coimbatore">Coimbatore</option>
                        <option value="kovai">Kovaipudur</option>
                        <option value="peelamedu">Peelamedu</option>
                        <option value="saravanampatti">Saravanampatti</option>
                        <option value="gandhipuram">Gandhipuram</option>
                    </select>
                </div>
            </div>
            
            <div class="filter-card">
                <div class="filter-group">
                    <label>Amenities</label>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="water" onchange="applyFilters()">
                            <label for="water">24/7 Water Supply</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="electricity" onchange="applyFilters()">
                            <label for="electricity">Power Backup</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="transport" onchange="applyFilters()">
                            <label for="transport">Public Transport</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="schools" onchange="applyFilters()">
                            <label for="schools">Near Schools</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="hospitals" onchange="applyFilters()">
                            <label for="hospitals">Near Hospitals</label>
                        </div>
                    </div>
                </div>

                <div class="filter-group">
                    <label for="bhk">BHK (for Apartments/Houses)</label>
                    <select id="bhk" class="filter-control" onchange="applyFilters()">
                        <option value="">Any BHK</option>
                        <option value="1">1 BHK</option>
                        <option value="2">2 BHK</option>
                        <option value="3">3 BHK</option>
                        <option value="4">4+ BHK</option>
                    </select>
                </div>
            </div>
            
            <button class="action-btn btn-clear" onclick="clearFilters()">
                <i class="fas fa-eraser"></i> Clear Filters
            </button>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="results-header">
                <div class="results-count" id="resultsCount">Loading properties...</div>
                <select class="sort-dropdown" id="sortBy" onchange="sortProperties()">
                    <option value="newest">Newest First</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>

            <div class="property-grid" id="propertyGrid">
                <!-- Properties will be loaded here -->
            </div>
        </main>
    </div>

    <!-- Property Modal -->
    <div class="modal-overlay" id="propertyModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            <h2 class="modal-title" id="modalTitle"></h2>
            <img src="" alt="" class="modal-image" id="modalImage">
            <div class="modal-section">
                <div style="display: flex; align-items: center;">
                    <div class="modal-price" id="modalPrice"></div>
                    <div class="modal-badge" id="modalBadge"></div>
                </div>
                <p class="modal-location" id="modalLocation"></p>
                <p class="modal-description" id="modalDescription"></p>
            </div>
            <div class="modal-section">
                <h3 style="margin-bottom: 1rem;">Property Details</h3>
                <div class="modal-features">
                    <div class="feature-card">
                        <div class="feature-label">Area</div>
                        <div class="feature-value" id="modalArea"></div>
                    </div>
                    <div class="feature-card" id="modalBhkContainer">
                        <div class="feature-label">BHK</div>
                        <div class="feature-value" id="modalBhk"></div>
                    </div>
                    <div class="feature-card">
                        <div class="feature-label">Rating</div>
                        <div class="feature-value" id="modalRating"></div>
                    </div>
                    <div class="feature-card">
                        <div class="feature-label">Enquiries</div>
                        <div class="feature-value" id="modalEnquiries"></div>
                    </div>
                </div>
            </div>
            <div class="modal-section">
                <h3 style="margin-bottom: 1rem;">Amenities</h3>
                <div class="modal-amenities" id="modalAmenities"></div>
            </div>
            <div class="modal-footer">
                <div class="modal-posted" id="modalPosted"></div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-outline" onclick="viewContact()">
                        <i class="fas fa-phone-alt"></i> Contact
                    </button>
                    <button class="modal-btn modal-btn-primary" style="display:none" id="modalSaveBtn" onclick="savePropertyModal()">
                        <i class="far fa-bookmark"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal-overlay" id="contactModal">
        <div class="modal-content" style="max-width: 500px;">
            <button class="modal-close" onclick="closeContactModal()">&times;</button>
            <h2 class="modal-title">Contact Information</h2>
            <div style="text-align: center; margin: 1.5rem 0;">
                <div style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--text-light);" id="contactOwnerText">
                </div>
                <div style="background: var(--bg); padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);" id="contactNumber">
                    </div>
                </div>
                <button class="modal-btn modal-btn-primary" onclick="initiateCall()" style="width: 100%;">
                    <i class="fas fa-phone"></i> Call Now
                </button>
            </div>
        </div>
    </div>

    <!-- Saved Properties Tab -->
    <div class="saved-tab" onclick="toggleSavedPanel()">
        <i class="fas fa-bookmark"></i>
        <div class="badge" id="savedCountBadge">0</div>
    </div>

    <!-- Saved Properties Panel -->
    <div class="saved-panel" id="savedPanel">
        <div class="saved-header">
            <h3 class="saved-title">Saved Properties</h3>
            <button class="close-saved" onclick="toggleSavedPanel()">&times;</button>
        </div>
        <div class="saved-list" id="savedList">
            <!-- Saved properties will be loaded here -->
            <div class="empty-saved">
                <i class="fas fa-bookmark"></i>
                <p>No properties saved yet</p>
                <p>Click the bookmark icon to save properties</p>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <i class="fas fa-check-circle"></i>
        <span id="toastMessage"></span>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Enhanced Property Data with unique locations
        const properties = [
            {
                id: 1,
                title: "Premium Empty Plots For Sale in Prime Location",
                location: "Kovaipudur, Near CBM College, Coimbatore",
                price: "₹7.50 Lac Per cent",
                type: "plot",
                area: "2400",
                verified: true,
                enquiries: 68,
                rating: 4.6,
                beds: 0,
                baths: 0,
                size: "2400",
                image: "https://truebroker.in/web_new/uploads/pro_img1/img_4/980133-photo.jfif",
                amenities: ["water", "electricity", "transport", "schools"],
                postedTime: "2023-06-15",
                owner: "Owner",
                contact: "+91 99447 96969",
                description: "Premium residential plots available in a well-developed area with all basic amenities. Perfect for building your dream home."
            },
            {
                id: 2,
                title: "Luxury 3 BHK Apartment with Modern Amenities",
                location: "Peelamedu, Near PSG Tech, Coimbatore",
                price: "₹85 Lac",
                type: "apartment",
                area: "1400",
                bhk: 3,
                verified: true,
                enquiries: 45,
                rating: 4.8,
                beds: 3,
                baths: 2,
                size: "1400",
                image: "https://truebroker.in/web_new/uploads/pro_img1/img_4/588529-photo.jfif",
                amenities: ["water", "electricity", "transport", "schools", "hospitals"],
                postedTime: "2023-07-02",
                owner: "Builder",
                contact: "+91 98765 43210",
                description: "Spacious 3 BHK apartment in a premium gated community with swimming pool, gym, and 24/7 security."
            },
            {
                id: 3,
                title: "Elegant Independent Villa with Garden",
                location: "Saravanampatti, Near IT Park, Coimbatore",
                price: "₹1.2 Cr",
                type: "villa",
                area: "2800",
                bhk: 4,
                verified: false,
                enquiries: 32,
                rating: 4.5,
                beds: 4,
                baths: 3,
                size: "2800",
                image: "https://truebroker.in/web_new/uploads/pro_img1/img_4/427920-photo.jpeg",
                amenities: ["water", "electricity", "schools", "hospitals"],
                postedTime: "2023-06-18",
                owner: "Owner",
                contact: "+91 87654 32109",
                description: "Beautiful independent villa with landscaped garden, modern kitchen, and spacious bedrooms."
            },
            {
                id: 4,
                title: "Commercial Plot in Business District",
                location: "Gandhipuram, CBD, Coimbatore",
                price: "₹2.5 Cr",
                type: "commercial",
                area: "5000 sq.ft",
                verified: true,
                enquiries: 23,
                rating: 4.2,
                beds: 0,
                baths: 0,
                size: "5000",
                image: "https://truebroker.in/web_new/uploads/pro_img1/img_4/871960-photo.jpeg",
                amenities: ["electricity", "transport"],
                postedTime: "2023-06-10",
                owner: "Agent",
                contact: "+91 76543 21098",
                description: "Prime commercial plot in the heart of the city's business district with excellent road connectivity."
            },
            {
                id: 5,
                title: "Modern 2 BHK Apartment Near Tech Parks",
                location: "Singanallur, Near Hopes College, Coimbatore",
                price: "₹45 Lac",
                type: "apartment",
                area: "1100",
                bhk: 2,
                verified: true,
                enquiries: 89,
                rating: 4.7,
                beds: 2,
                baths: 2,
                size: "1100",
                image: "https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=600&h=400&fit=crop",
                amenities: ["water", "electricity", "transport", "schools"],
                postedTime: "2023-07-05",
                owner: "Builder",
                contact: "+91 65432 10987",
                description: "Affordable 2 BHK apartment with modern fittings and close proximity to IT parks and schools."
            },
            {
                id: 6,
                title: "Residential Plot with Clear Title",
                location: "Thudiyalur, Near NGP College, Coimbatore",
                price: "₹12 Lac",
                type: "plot",
                area: "1800",
                verified: false,
                enquiries: 15,
                rating: 4.1,
                beds: 0,
                baths: 0,
                size: "1800",
                image: "https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&h=400&fit=crop",
                amenities: ["water", "electricity"],
                postedTime: "2023-06-22",
                owner: "Owner",
                contact: "+91 54321 09876",
                description: "Residential plot with clear title documents and basic amenities available nearby."
            }
        ];

        let filteredProperties = [...properties];
        let currentPropertyId = null;
        let savedProperties = JSON.parse(localStorage.getItem('savedProperties')) || [];

        // Format date to relative time (e.g., "2 days ago")
        function formatRelativeTime(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            
            const intervals = {
                year: 31536000,
                month: 2592000,
                week: 604800,
                day: 86400,
                hour: 3600,
                minute: 60
            };
            
            for (const [unit, seconds] of Object.entries(intervals)) {
                const interval = Math.floor(diffInSeconds / seconds);
                if (interval >= 1) {
                    return interval === 1 ? `1 ${unit} ago` : `${interval} ${unit}s ago`;
                }
            }
            
            return 'Just now';
        }

        // Render single star rating
        function renderRating(rating) {
            return `
                <div class="single-rating">
                    <div class="single-rating-star"><i class="fas fa-star"></i></div>
                    <div class="single-rating-value">${rating.toFixed(1)}</div>
                </div>
            `;
        }

        // Update saved count badge
        function updateSavedCount() {
            const count = savedProperties.length;
            document.getElementById('savedCountBadge').textContent = count;
            if (count === 0) {
                document.getElementById('savedCountBadge').style.display = 'none';
            } else {
                document.getElementById('savedCountBadge').style.display = 'flex';
            }
        }

        // Load saved properties into the panel
        function loadSavedProperties() {
            const savedList = document.getElementById('savedList');
            
            if (savedProperties.length === 0) {
                savedList.innerHTML = `
                    <div class="empty-saved">
                        <i class="fas fa-bookmark"></i>
                        <p>No properties saved yet</p>
                        <p>Click the bookmark icon to save properties</p>
                    </div>
                `;
                return;
            }
            
            savedList.innerHTML = savedProperties.map(id => {
                const property = properties.find(p => p.id === id);
                if (!property) return '';
                
                return `
                    <div class="saved-item" data-id="${property.id}" onclick="viewProperty(${property.id})">
                        <img src="${property.image}" alt="${property.title}" class="saved-item-image">
                        <div class="saved-item-content">
                            <div class="saved-item-title">${property.title}</div>
                            <div class="saved-item-price">${property.price}</div>
                            <div style="font-size: 0.8rem; color: var(--text-light);">
                                <i class="fas fa-map-marker-alt"></i> ${property.location}
                            </div>
                        </div>
                        <button class="remove-saved" onclick="removeSavedProperty(${property.id}, event)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            }).join('');
        }

        // Save property to saved list
        function saveProperty(id, event) {
            if (event) event.stopPropagation();
            
            const index = savedProperties.indexOf(id);
            let message = '';
            
            if (index === -1) {
                savedProperties.push(id);
                message = 'Property saved to your favorites!';
            } else {
                savedProperties.splice(index, 1);
                message = 'Property removed from favorites';
            }
            
            // Update localStorage
            localStorage.setItem('savedProperties', JSON.stringify(savedProperties));
            
            // Update UI
            updateSavedCount();
            loadSavedProperties();
            loadProperties();
            
            // Update modal save button if this property is currently being viewed
            if (currentPropertyId === id) {
                const modalSaveBtn = document.getElementById('modalSaveBtn');
                if (modalSaveBtn) {
                    const isSaved = savedProperties.includes(id);
                    modalSaveBtn.innerHTML = isSaved ? 
                        '<i class="fas fa-bookmark"></i> Saved' : 
                        '<i class="far fa-bookmark"></i> Save';
                }
            }
            
            showToast(message);
        }

        // Remove saved property from the saved panel
        function removeSavedProperty(id, event) {
            event.stopPropagation();
            
            const index = savedProperties.indexOf(id);
            if (index !== -1) {
                savedProperties.splice(index, 1);
                localStorage.setItem('savedProperties', JSON.stringify(savedProperties));
                
                updateSavedCount();
                loadSavedProperties();
                loadProperties();
                
                showToast('Property removed from favorites');
            }
        }

        // Toggle saved properties panel
        function toggleSavedPanel() {
            document.getElementById('savedPanel').classList.toggle('active');
        }

        // Show toast notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            toastMessage.textContent = message;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Load properties into the grid
        function loadProperties() {
            const grid = document.getElementById('propertyGrid');
            const resultsCount = document.getElementById('resultsCount');
            
            resultsCount.textContent = `${filteredProperties.length} ${filteredProperties.length === 1 ? 'property' : 'properties'} found`;
            
            if (filteredProperties.length === 0) {
                grid.innerHTML = `
                    <div style="grid-column: 1/-1; text-align: center; padding: 3rem; color: var(--text-light);">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                        <h3>No properties found</h3>
                        <p>Try adjusting your filters to see more results</p>
                    </div>
                `;
                return;
            }
            
            grid.innerHTML = filteredProperties.map(property => {
                const isSaved = savedProperties.includes(property.id);
                
                return `
                <div class="property-card" onclick="viewProperty(${property.id})">
                    <button class="save-btn ${isSaved ? 'saved' : ''}" onclick="saveProperty(${property.id}, event)">
                        <i class="${isSaved ? 'fas' : 'far'} fa-bookmark"></i>
                    </button>
                    <div class="property-media">
                        <img src="${property.image}" alt="${property.title}" class="property-image" loading="lazy">
                        <div class="property-badge ${property.verified ? 'verified-badge' : ''}">
                            ${property.verified ? 'Verified' : 'For Sale'}
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">${property.price}</div>
                        <div class="property-title">${property.title}</div>
                        <div class="property-location">
                            <i class="fas fa-map-marker-alt"></i> ${property.location}
                        </div>
                        
                        <div class="property-features">
                            <div class="feature"><i class="fas fa-bed"></i> ${property.beds || 'NA'}</div>
                            <div class="feature"><i class="fas fa-bath"></i> ${property.baths || 'NA'}</div>
                            <div class="feature"><i class="fas fa-expand"></i> ${property.size}</div>
                            <div class="feature">${renderRating(property.rating)}</div>
                        </div>
                        
                        <div class="property-footer">
                            <div class="enquiry-count">
                                <i class="fas fa-users"></i> ${property.enquiries} enquiries
                            </div>
                            <div class="action-buttons">
                                <button class="btn btn-outline" onclick="event.stopPropagation(); viewNumber(${property.id})">
                                    <i class="fas fa-phone-alt"></i> Contact
                                </button>
                                <button class="btn btn-primary" onclick="event.stopPropagation(); saveProperty(${property.id}, event)">
                                    <i class="${isSaved ? 'fas' : 'far'} fa-bookmark"></i> ${isSaved ? 'Saved' : 'Save'}
                                </button>
                            </div>
                        </div>
                        <div style="margin-top: 0.5rem; font-size: 0.8rem; color: #6b7280;">
                            <i class="far fa-clock"></i> ${formatRelativeTime(property.postedTime)} • ${property.owner}
                        </div>
                        <button class="modal-btn modal-btn-outline" style="border-radius:50px;height:3rem;margin-top:1rem" onclick="event.stopPropagation(); window.location.href='property.php?id=${property.id}'">
                            <i class="fa fa-eye"></i> View Details
                        </button>
                    </div>
                </div>
                `;
            }).join('');
        }

        // Apply filters based on user selection
        function applyFilters() {
            const propertyType = document.getElementById('propertyType').value;
            const minPrice = document.getElementById('minPrice').value;
            const maxPrice = document.getElementById('maxPrice').value;
            const location = document.getElementById('location').value;
            const bhk = document.getElementById('bhk').value;
            
            const amenities = [];
            if (document.getElementById('water').checked) amenities.push('water');
            if (document.getElementById('electricity').checked) amenities.push('electricity');
            if (document.getElementById('transport').checked) amenities.push('transport');
            if (document.getElementById('schools').checked) amenities.push('schools');
            if (document.getElementById('hospitals').checked) amenities.push('hospitals');

            filteredProperties = properties.filter(property => {
                // Type filter
                if (propertyType && property.type !== propertyType) return false;
                
                // Price filter
                const priceNum = parseFloat(property.price.replace(/[^\d.]/g, ''));
                if (minPrice && priceNum < parseFloat(minPrice)) return false;
                if (maxPrice && priceNum > parseFloat(maxPrice)) return false;
                
                // Location filter
                if (location && !property.location.toLowerCase().includes(location.toLowerCase())) return false;
                
                // BHK filter
                if (bhk) {
                    if (bhk === '4' && (!property.bhk || property.bhk < 4)) return false;
                    if (bhk !== '4' && property.bhk !== parseInt(bhk)) return false;
                }
                
                // Amenities filter
                if (amenities.length > 0) {
                    const hasAllAmenities = amenities.every(amenity => property.amenities.includes(amenity));
                    if (!hasAllAmenities) return false;
                }
                
                return true;
            });

            loadProperties();
        }

        // Clear all filters
        function clearFilters() {
            // Reset all filter inputs
            document.getElementById('propertyType').value = '';
            document.getElementById('minPrice').value = '';
            document.getElementById('maxPrice').value = '';
            document.getElementById('location').value = '';
            document.getElementById('bhk').value = '';
            
            // Uncheck all checkboxes
            document.getElementById('water').checked = false;
            document.getElementById('electricity').checked = false;
            document.getElementById('transport').checked = false;
            document.getElementById('schools').checked = false;
            document.getElementById('hospitals').checked = false;
            
            // Reset sort dropdown
            document.getElementById('sortBy').value = 'newest';
            
            // Reset filtered properties to all properties
            filteredProperties = [...properties];
            
            // Reload properties
            loadProperties();
            
            // Show success message
            showToast('Filters have been cleared');
        }

        // Sort properties based on selected option
        function sortProperties() {
            const sortBy = document.getElementById('sortBy').value;
            
            switch(sortBy) {
                case 'price-low':
                    filteredProperties.sort((a, b) => parseFloat(a.price.replace(/[^\d.]/g, '')) - parseFloat(b.price.replace(/[^\d.]/g, '')));
                    break;
                case 'price-high':
                    filteredProperties.sort((a, b) => parseFloat(b.price.replace(/[^\d.]/g, '')) - parseFloat(a.price.replace(/[^\d.]/g, '')));
                    break;
                case 'popular':
                    filteredProperties.sort((a, b) => b.enquiries - a.enquiries);
                    break;
                case 'newest':
                default:
                    filteredProperties.sort((a, b) => new Date(b.postedTime) - new Date(a.postedTime));
                    break;
            }
            
            loadProperties();
        }

        // Toggle mobile filter sidebar
        function toggleMobileFilter() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // View property details
        function viewProperty(id) {
            const property = properties.find(p => p.id === id);
            if (!property) return;
            
            currentPropertyId = id;
            const isSaved = savedProperties.includes(id);
            
            // Set modal content
            document.getElementById('modalTitle').textContent = property.title;
            document.getElementById('modalImage').src = property.image;
            document.getElementById('modalImage').alt = property.title;
            document.getElementById('modalPrice').textContent = property.price;
            document.getElementById('modalBadge').textContent = property.verified ? 'Verified' : 'For Sale';
            document.getElementById('modalBadge').className = property.verified ? 'modal-badge verified-badge' : 'modal-badge';
            document.getElementById('modalLocation').textContent = property.location;
            document.getElementById('modalDescription').textContent = property.description;
            document.getElementById('modalArea').textContent = property.area;
            
            if (property.bhk) {
                document.getElementById('modalBhk').textContent = property.bhk;
                document.getElementById('modalBhkContainer').style.display = 'block';
            } else {
                document.getElementById('modalBhkContainer').style.display = 'none';
            }
            
            document.getElementById('modalRating').innerHTML = renderRating(property.rating);
            document.getElementById('modalEnquiries').textContent = property.enquiries;
            
            const amenitiesContainer = document.getElementById('modalAmenities');
            amenitiesContainer.innerHTML = property.amenities.map(amenity => `
                <span class="amenity-tag">
                    ${amenity === 'water' ? '<i class="fas fa-tint"></i> 24/7 Water' : 
                      amenity === 'electricity' ? '<i class="fas fa-bolt"></i> Power Backup' : 
                      amenity === 'transport' ? '<i class="fas fa-bus"></i> Transport' : 
                      amenity === 'schools' ? '<i class="fas fa-school"></i> Schools' : 
                      '<i class="fas fa-hospital"></i> Hospitals'}
                </span>
            `).join('');
            
            document.getElementById('modalPosted').textContent = `Posted ${formatRelativeTime(property.postedTime)} by ${property.owner}`;
            
            // Update save button in modal
            const modalSaveBtn = document.getElementById('modalSaveBtn');
            modalSaveBtn.innerHTML = isSaved ? 
                '<i class="fas fa-bookmark"></i> Saved' : 
                '<i class="far fa-bookmark"></i> Save';
            modalSaveBtn.style.display = 'block';
            
            // Show modal
            document.getElementById('propertyModal').classList.add('active');
        }

        // Close property modal
        function closeModal() {
            document.getElementById('propertyModal').classList.remove('active');
        }

        // View contact number
        function viewNumber(id) {
            const property = properties.find(p => p.id === id);
            if (!property) return;
            
            currentPropertyId = id;
            
            document.getElementById('contactOwnerText').textContent = `Contact the ${property.owner} about this property`;
            document.getElementById('contactNumber').textContent = property.contact;
            
            // Show contact modal
            document.getElementById('contactModal').classList.add('active');
        }

        // Close contact modal
        function closeContactModal() {
            document.getElementById('contactModal').classList.remove('active');
        }

        // Initiate call
        function initiateCall() {
            const property = properties.find(p => p.id === currentPropertyId);
            if (property) {
                alert(`Calling ${property.owner} at ${property.contact}...`);
            }
        }

        // Save property to favorites from modal
        function savePropertyModal() {
            if (currentPropertyId) {
                saveProperty(currentPropertyId);
            }
        }

        // View contact from modal
        function viewContact() {
            closeModal();
            setTimeout(() => {
                viewNumber(currentPropertyId);
            }, 300);
        }

        // Scam Warning Banner Script
        document.addEventListener('DOMContentLoaded', function() {
            const closeBtn = document.getElementById('closeBtn');
            const understoodBtn = document.getElementById('understoodBtn');
            const scamWarning = document.getElementById('scamWarning');
            
            // Check if banner should be shown (only on first visit or page refresh)
            const shouldShowWarning = !sessionStorage.getItem('scamWarningDismissed');
            
            if (shouldShowWarning) {
                // Show the banner with animation
                setTimeout(() => {
                    scamWarning.style.opacity = '1';
                    scamWarning.style.transform = 'translateY(0) translateX(-50%)';
                }, 1000); // Show after 1 second delay
            } else {
                scamWarning.style.display = 'none';
            }
            
            // Close banner functionality
            function dismissBanner() {
                scamWarning.classList.add('animate-out');
                
                setTimeout(() => {
                    scamWarning.style.display = 'none';
                    // Use sessionStorage so it remembers only for this session
                    sessionStorage.setItem('scamWarningDismissed', 'true');
                }, 500);
            }
            
            closeBtn.addEventListener('click', dismissBanner);
            
            // Understood button functionality
            understoodBtn.addEventListener('click', function() {
                dismissBanner();
            });
            
            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && scamWarning.style.display !== 'none') {
                    dismissBanner();
                }
            });

            // Initialize the page
            loadProperties();
            updateSavedCount();
            loadSavedProperties();
            
            // Show welcome message
            setTimeout(() => {
                console.log('Welcome to PropHub! Find your dream property in Coimbatore');
            }, 500);
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('propertyModal')) {
                closeModal();
            }
            if (event.target === document.getElementById('contactModal')) {
                closeContactModal();
            }
            if (event.target === document.getElementById('savedPanel')) {
                toggleSavedPanel();
            }
        });
    </script>
</body>
</html>