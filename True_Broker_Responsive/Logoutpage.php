<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./LogoutPage.css" >
   
</head>


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
    --search-bg: rgba(255, 255, 255, 0.9);
    --search-focus-bg: #ffffff;
    --button-bg: #7b2cbf;
    --button-hover: #6a27a8;
    --search-container-bg: rgba(255, 255, 255, 0.1);
}
body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--background-light);
    overflow-x: hidden;
}
/* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
/* Hero Section Styles */
.hero-section {
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('./img/landing_page.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: var(--white);
    padding: 80px 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
}
.hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}
.hero-subtitle {
    font-size: 1.25rem;
    font-weight: 400;
    margin-top:100px;
    margin-bottom: 15px;
    color: rgba(255, 255, 255, 0.9);
}
.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
    color: var(--white);
}
.hero-description {
    font-size: 1.125rem;
    margin-bottom: 40px;
    color: rgba(255, 255, 255, 0.8);
}
/* Search Container */
.search_Container {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 15px;
    width: 100%;
    border-radius: 50px;
    margin-bottom: 20px;
}
/* Flex Search Box Styles */
.search-box {
    display: flex;
    background: var(--white);
    border-radius: 50px;
    box-shadow: var(--shadow);
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    overflow: hidden;
    position: relative;
}
.search-field {
    flex: 1;
    display: flex;
    align-items: center;
    padding: 0 12px;
    border-right: 1px solid var(--gray-medium);
    position: relative;
}
.search-field:last-child {
    border-right: none;
}
.search-icon {
    color: #777;
    margin-right: 8px;
    font-size: 16px;
}
.search-input {
    flex: 1;
    padding: 12px 8px;
    border: none;
    outline: none;
    font-size: 14px;
    background: transparent;
    min-width: 120px;
    color: black;
}
.search-select {
    flex: 1;
    padding: 12px 8px;
    border: none;
    outline: none;
    font-size: 14px;
    background: transparent;
    appearance: none;
    cursor: pointer;
    padding-right: 25px;
    color: var(--gray-dark);
}
.search-actions {
    display: flex;
    gap: 8px;
    margin-left: 8px;
    color: #6a27a8;
}
.action-btn {
    background: none;
    border: none;
    color: #777;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.2s;
    padding: 4px;
}
.action-btn:hover {
    color: var(--primary);
}
.listening {
    color: red !important;
    animation: pulse 1.5s infinite;
}
.detecting {
    animation: spin 1s infinite linear;
}
.voice-active {
    color: var(--primary) !important;
    position: relative;
}
.voice-active::after {
    content: "";
    position: absolute;
    width: 8px;
    height: 8px;
    background-color: red;
    border-radius: 50%;
    top: -2px;
    right: -2px;
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.2); opacity: 0.7; }
    100% { transform: scale(1); opacity: 1; }
}
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.search-btn {
    position: absolute;
    right: 5px;
    top: 5px;
    bottom: 5px;
    width: 50px;
    border-radius: 50px;
    border: none;
    background-color: var(--button-bg);
    color: var(--white);
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}
#voiceSearch {
    position: absolute;
    right: 60px; /* Position to the left of the search button */
    top: 5px;
    bottom: 5px;
    width: 50px;
    border-radius: 50px;
    border: none;
    background-color: var(--button-bg);
    color: var(--white);
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1; /* Ensure it appears above other elements */
}
#voiceSearch:hover {
    background-color: rgba(13, 1, 19, 0.1);
    color: #6a27a8;
}
#searchButton:hover {
    background-color: rgba(13, 1, 19, 0.1);
    color: #6a27a8;
}
/* For mobile responsiveness */
@media (max-width: 768px) {
    #voiceSearch {
        position: relative;
        right: auto;
        top: auto;
        bottom: auto;
        width: 100%;
        height: 40px;
        border-radius: 50px;
        margin-top: 5px;
        margin-left: 0;
        background-color: var(--button-bg);
        color: var(--white);
    }
}
.search-btn:hover {
    background-color: var(--primary-light);
}
.select-wrapper {
    position: relative;
    flex: 1;
    color: #777;
}
.select-arrow {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #777;
    font-size: 12px;
}
/* Property Type Selector */
.property-types {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}
.property-type-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 50px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    background-color: transparent;
    color: var(--white);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}
.property-type-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}
.property-type-btn.active {
    background-color: var(--button-bg);
    border-color: var(--button-bg);
}
.property-type-btn i {
    font-size: 1rem;
}
/* Responsive adjustments */
@media (max-width: 768px) {
    .search-box {
        flex-direction: column;
        border-radius: 20px;
        padding: 5px;
    }
   
    .search-field {
        border-right: none;
        border-bottom: 1px solid var(--gray-medium);
        padding: 10px;
    }
   
    .search-btn {
        position: relative;
        width: 100%;
        height: 40px;
        border-radius: 50px;
        margin-bottom: 3px;
        top: auto;
        bottom: auto;
        right: auto;
        margin-top: 5px;
    }
   
    .hero-title {
        font-size: 2.5rem;
    }
   
    .hero-description {
        font-size: 1rem;
    }
}
@media (max-width: 576px) {
    .hero-section {
        padding: 60px 0;
    }
   
    .hero-title {
        font-size: 2.2rem;
    }
   
    .hero-subtitle {
        font-size: 1.1rem;
        margin-top: 2rem;
    }
   
    .property-type-btn {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}
@media (max-width: 480px) {
    .property-types {
        gap: 8px;
    }
}
@media (max-width: 375px) {
    .property-types {
        flex-direction: column;
        align-items: center;
    }
   
    .property-type-btn {
        width: 100%;
        justify-content: center;
    }
}
/* Property Types */
.property-types {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}
.property-type-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 50px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    background-color: transparent;
    color: var(--white);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}
.property-type-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}
.property-type-btn.active {
    background-color: var(--button-bg);
    border-color: var(--button-bg);
}
.property-type-btn i {
    font-size: 1rem;
}
.text-white {
    color: var(--white) !important;
}
.mb-3 {
    margin-bottom: 1rem !important;
}
.fw-bold {
    font-weight: 700 !important;
}
.mt-4 {
    margin-top: 1.5rem !important;
}
/* Responsive Styles */
@media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
   
    .hero-description {
        font-size: 1rem;
    }
   
    .search-container {
        padding: 25px;
    }
}
@media (max-width: 768px) {
    .hero-section {
        padding: 60px 0;
    }
   
    .hero-title {
        font-size: 2.2rem;
    }
   
    .hero-subtitle {
        font-size: 1.1rem;
    }
   
    .search-input {
        padding: 12px 18px;
        font-size: 0.9rem;
    }
   
    .search-btn {
        position: relative;
        right: auto;
        top: auto;
        bottom: auto;
        width: 100%;
        height: 40px;
        border-radius: 50px;
        margin-top: 5px;
        margin-left: 0;
        background-color: var(--button-bg);
        color: var(--white);
    }
   
    .property-type-btn {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}
@media (max-width: 576px) {
    .hero-section {
        padding: 50px 0;
    }
   
    .hero-title {
        font-size: 1.8rem;
    }
   
    .hero-subtitle {
        font-size: 1rem;
    }
   
    .hero-description {
        font-size: 0.9rem;
        margin-bottom: 30px;
    }
   
    .search-container {
        padding: 20px;
    }
   
    .property-types {
        gap: 8px;
    }
   
    .property-type-btn {
        padding: 6px 12px;
        font-size: 0.8rem;
    }
}
@media (max-width: 375px) {
    .hero-title {
        font-size: 1.6rem;
    }
   
    .search-input {
        padding: 10px 15px;
        font-size: 0.85rem;
    }
   
    .search-btn {
        width: 260px;
    }
   
    .property-types {
        flex-direction: column;
        align-items: center;
    }
   
    .property-type-btn {
        width: 100%;
        justify-content: center;
    }
}
@media (max-width: 320px) {
    .hero-content {
        margin-top: 30px;
    }
    .hero-section{
        width:auto;
       
    }
    .hero-title {
        font-size: 1.4rem;
    }
   
    .hero-subtitle {
        font-size: 0.9rem;
    }
   
    .hero-description {
        font-size: 0.8rem;
    }
   
    .search-container {
        padding: 15px;
    }
   
    .search-input {
        padding: 8px 12px;
        font-size: 0.8rem;
    }
   
    .search-btn {
        width: 250px;
    }
   
    .property-type-btn {
        padding: 5px 10px;
    }
   
}
/* Property Section Styles */
.property-section {
    padding: 80px 0;
    background-color: #f9f9f9;
}
.property-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto 60px;
    padding: 0 20px;
    gap: 40px;
}
.property-row.reverse {
    flex-direction: row-reverse;
}
.text-block {
    flex: 1;
    padding: 30px;
}
/* .center-text {
    /* text-align: center; */
/* } */
.heading-text {
    font-size: 22.5px;
    font-style: bold;
    line-height: 22.8px;
    font-weight: 600;
    color: #000000;
    margin-bottom: 20px;
    vertical-align: middle;
}
.paragraph-text {
    font-size: 1rem;
    color: #000;
    line-height: 1.6;
    margin-bottom: 25px;
    width: 491;
    height: 270;
/* angle: 0 deg; */
    opacity: 1;
    top: 459px;
    left: 789px;
   
}
.image-block {
    flex: 1;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.image-block:hover {
    transform: translateY(-5px);
}
.image-block img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
}
.image-block:hover img {
    transform: scale(1.03);
}
/* Responsive Styles */
@media (max-width: 1024px) {
    .property-row {
        gap: 30px;
    }
   
    .heading-text {
        font-size: 2.2rem;
    }
   
    .paragraph-text {
        font-size: 1rem;
    }
}
@media (max-width: 768px) {
    .property-section {
        padding: 60px 0;
    }
   
    .property-row,
    .property-row.reverse {
        flex-direction: column;
        gap: 30px;
    }
   
    .text-block {
        padding: 20px;
    }
   
    .heading-text {
        font-size: 2rem;
    }
}
@media (max-width: 576px) {
    .property-section {
        padding: 50px 0;
    }
   
    .heading-text {
        font-size: 1.8rem;
    }
   
    .paragraph-text {
        font-size: 0.95rem;
    }
}
@media (max-width: 425px) {
    .property-row {
        padding: 0 15px;
        margin-bottom: 40px;
    }
   
    .heading-text {
        font-size: 1.6rem;
    }
}
@media (max-width: 375px) {
    .property-section {
        padding: 40px 0;
    }
   
    .heading-text {
        font-size: 1.5rem;
    }
   
    .paragraph-text {
        font-size: 0.9rem;
    }
}
@media (max-width: 320px) {
    .heading-text {
        font-size: 1.4rem;
    }
   
    .paragraph-text {
        font-size: 0.85rem;
    }
   
    .text-block {
        padding: 15px 10px;
    }
}
/* Why Work Section */
        .why-work-section {
            padding: 3rem 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        .main-heading {
            font-size: 30px;
            margin-bottom: 0.75rem;
            color: var(--primary-color);
            font-weight: 500;
            line-height: 39px;
            font-style: medium;
            vertical-align: middle;
        }
        .sub-heading {
            font-size: 12.75px;
            color: var(--primary-color);
            margin-bottom: 2.5rem;
            font-weight: 400;
            line-height: 24.22px;
            vertical-align: middle;
        }
        /* Features Row */
        .features-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            justify-content: center;
        }
        .feature-box {
            background: var(--white);
            padding: 2rem 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 1.5rem;
            object-fit: contain;
        }
        .feature-box h4 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
            font-weight: 600;
        }
        .feature-box p {
            color: var(--primary-color);
            font-size: 0.9375rem;
            line-height: 1.6;
        }
        /* Mobile Responsive Adjustments */
        @media (max-width: 767px) {
            .why-work-section {
                padding: 2rem 1rem;
            }
            .features-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            .feature-box {
                padding: 1.5rem 1rem;
            }
            .feature-icon {
                width: 50px;
                height: 50px;
                margin-bottom: 1rem;
            }
        }
        /* Small Mobile (320px) */
        @media (max-width: 320px) {
            .main-heading {
                font-size: 1.5rem;
            }
            .sub-heading {
                font-size: 0.8125rem;
                margin-bottom: 1.5rem;
            }
            .feature-box h4 {
                font-size: 1.125rem;
            }
            .feature-box p {
                font-size: 0.875rem;
            }
        }
        /* Featured Properties Section - Responsive */
.featured-section {
    padding: clamp(2rem, 5vw, 3.125rem) clamp(1rem, 3vw, 1.25rem);
    background-color: #fff;
    text-align: center;
    max-width: 1400px;
    margin: 0 auto;
}
.main-heading {
    font-size: 30px;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    font-weight: 500;
    line-height: 39px;
    vertical-align: middle;
}
.sub-heading {
    font-size: 12.75px;
    line-height: 24.22px;
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-weight: 400px;
}
/* Tabs Container - Responsive */
.property-tabs-container {
    width: 100%;
    overflow-x: auto;
    padding-bottom: 8px;
    -webkit-overflow-scrolling: touch;
    margin-top: 1.25rem;
}
.property-tabs {
    display: inline-flex;
    flex-wrap: nowrap;
    gap: 0.75rem;
    padding: 0.5rem;
    justify-content: flex-start;
    min-width: min-content;
    white-space: nowrap;
}
/* Tab Styles - Responsive */
.tab {
    display: inline-block;
    border: 1px solid #6a1b9a;
    background-color: transparent;
    color: #6a1b9a;
    padding: clamp(0.5rem, 2vw, 0.5rem) clamp(1rem, 3vw, 1.25rem);
    border-radius: 1.25rem;
    font-size: clamp(0.75rem, 3vw, 0.875rem);
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    text-decoration: none;
    outline: none;
    font-weight: 500;
    flex-shrink: 0;
}
.tab:hover,
.tab.active {
    background-color: #6a1b9a;
    color: #fff;
}
/* Mobile-specific adjustments (320px-480px) */
@media (max-width: 480px) {
    .property-tabs {
        gap: 0.5rem;
        padding: 0.25rem;
    }
   
    .tab {
        padding: 0.4rem 0.8rem;
        font-size: 0.75rem;
    }
}
/* Scrollbar styling for tabs container */
.property-tabs-container::-webkit-scrollbar {
    height: 4px;
}
.property-tabs-container::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
.property-tabs-container::-webkit-scrollbar-thumb {
    background: #6a1b9a;
    border-radius: 10px;
}
/* Touch device hover states */
@media (hover: none) {
    .tab:hover {
        background-color: transparent;
        color: #6a1b9a;
    }
   
    .tab.active:hover {
        background-color: #6a1b9a;
        color: #fff;
    }
}
/* Property Grid Section - Responsive */
.property-grid-section {
    padding: clamp(2rem, 5vw, 3rem) clamp(1rem, 3vw, 2rem);
    background-color: #fff;
    max-width: 1400px;
    margin: 0 auto;
}
.property-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}
.property-card {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #fff;
    position: relative;
}
.property-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
.property-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
}
.labels {
    position: absolute;
    top: 15px;
    left: 15px;
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    z-index: 1;
}
.label-sale,
.label-rent,
.label-featured {
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    text-transform: uppercase;
}
.label-sale {
    color: white;
    background-color: #1E8540;
    border-radius: 50px;
    font-weight: 500px;
    font-size: 9.75px;
    /* line-height: 24.75px; */
    vertical-align: middle;
}
.label-rent {
    background-color: #2e7d32;
}
.label-featured {
    color: var(--primary-color);
    background-color: white;
    border-radius: 50px;
     font-weight: 500px;
    font-size: 9.75px;
    /* line-height: 24.75px; */
    vertical-align: middle;
}
.property-details {
    padding: 1.25rem;
}
.property-details h3 {
    font-size:14.25px;
    line-height: 17.1px;
    margin-bottom: 0.5rem;
    color: var(--primary-color);
    font-weight: 500;
    vertical-align: middle;
    font-style: medium;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.location {
    color:var(--primary-color);
    font-size: 12px;
    line-height: 22.8px;
    font-weight: 400px;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 5px;
}
.location i {
    color: #6a1b9a;
}
.price {
    font-size: 15.75px;
    line-height: 23.63px;
    font-style: bold;
    font-weight: 600;
    color: white;
    margin-bottom: 1rem;
}
.price small {
    font-size: 0.875rem;
    font-weight: 400;
    color: #777;
}
.icons {
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #eee;
    padding-top: 0.75rem;
    color: #555;
    font-size: 0.875rem;
}
.icons span {
    display: flex;
    align-items: center;
    gap: 5px;
}
.icons i {
    color: #6a1b9a;
}
.see-all {
    text-align: center;
    margin-top: 1rem;
}
.see-all a {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #6a1b9a;
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s ease;
}
.see-all a:hover {
    color: #4a148c;
}
.see-all i {
    transition: transform 0.3s ease;
}
.see-all a:hover i {
    transform: translateX(3px);
}
/* Mobile Responsive Adjustments */
@media (max-width: 767px) {
    .property-grid {
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1.25rem;
    }
   
    .property-img {
        height: 180px;
    }
   
    .property-details {
        padding: 1rem;
    }
}
/* Small Mobile (320px-480px) */
@media (max-width: 480px) {
    .property-grid-section {
        padding: 1.5rem 1rem;
    }
   
    .property-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
   
    .property-img {
        height: 160px;
    }
   
    .property-details h3 {
        font-size: 1rem;
    }
   
    .location, .price, .icons {
        font-size: 0.8125rem;
    }
   
    .price {
        font-size: 1.125rem;
    }
   
    .labels {
        top: 10px;
        left: 10px;
    }
   
    .label-sale,
    .label-rent,
    .label-featured {
        padding: 3px 8px;
        font-size: 0.6875rem;
    }
}
/* Touch device hover states */
@media (hover: none) {
    .property-card:hover {
        transform: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
   
    .see-all a:hover {
        color: #6a1b9a;
    }
   
    .see-all a:hover i {
        transform: none;
    }
}
/* City Carousel - Responsive Styles */
.city-carousel {
    text-align: center;
    padding: clamp(2rem, 5vw, 3rem) clamp(1rem, 3vw, 2rem);
    background-color: #fff;
    position: relative;
    overflow: hidden;
}
.city-carousel h2 {
    color: var(--primary-color);
    font-style: medium;
    font-size: 30px;
    line-height:39px;
    margin-bottom: 0.5rem;
    font-weight: 500;
    vertical-align: middle;
}
.city-carousel .subtitle {
    color: var(--primary-color);
    margin-bottom: clamp(1.5rem, 4vw, 2rem);
    font-size:12.75px;
    line-height: 24.22px;
    font-weight: 400px;
}
.carousel-container {
    overflow: hidden;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    padding: 0 20px;
}
.carousel-track {
    display: flex;
    gap: clamp(0.75rem, 2vw, 1.25rem);
    transition: transform 0.5s ease;
    padding: 10px 0;
    will-change: transform;
}
.city-card {
    min-width: clamp(160px, 40vw, 220px);
    height: clamp(200px, 50vw, 300px);
    background-size: cover;
    background-position: center;
    border-radius: 12px;
    position: relative;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: transform 0.3s ease;
}
.city-card:hover {
    transform: translateY(-5px);
}
.city-card::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent 50%);
    border-radius: 12px;
}
.city-info {
    position: absolute;
    bottom: clamp(0.75rem, 3vw, 1.25rem);
    left: clamp(0.75rem, 3vw, 1.25rem);
    color: white;
    z-index: 1;
    text-align: left;
}
.city-info h4 {
    margin: 0;
    font-size: clamp(1rem, 3vw, 1.25rem);
    font-weight: 600;
    text-shadow: 0 1px 3px rgba(0,0,0,0.3);
}
.city-info p {
    margin: 0.25rem 0 0;
    font-size: clamp(0.75rem, 2.5vw, 0.875rem);
    text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}
/* Navigation Arrows */
.carousel-nav {
    display: none;
}
/* Mobile Navigation Dots */
.carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 1.5rem;
}
.carousel-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #ddd;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.carousel-dot.active {
    background-color: #6b21a8;
}
/* Responsive Adjustments */
@media (min-width: 768px) {
    .carousel-nav {
        display: block;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        pointer-events: none;
    }
   
    .carousel-btn {
        pointer-events: all;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        cursor: pointer;
        border: none;
        z-index: 2;
    }
   
    .carousel-dots {
        display: none;
    }
}
/* 320px Specific Adjustments */
@media (max-width: 320px) {
    .carousel-container {
        padding: 0 10px;
    }
   
    .city-card {
        min-width: 140px;
    }
}
/* Touch device adjustments */
@media (hover: none) {
    .city-card:hover {
        transform: none;
    }
}
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
}
/* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: var(--text-color);
    background-color: var(--background-light);
    overflow-x: hidden;
}
/* How It Works Section */
.how-it-works {
    display: flex;
    align-items: center;
    padding: 60px 5%;
    gap: 60px;
    flex-wrap: wrap;
    justify-content: center;
}
.left-image {
    flex: 1;
    min-width: 280px;
    max-width: 100%;
    text-align: center;
}
.left-image img {
    width: 100%;
    max-width: 500px;
    height: auto;
    border-radius: 16px;
    object-fit: cover;
}
.how-content {
    max-width: 500px;
    flex: 1;
    min-width: 280px;
}
.how-content h2 {
    font-size:30px;
    line-height: 39px;
    vertical-align: middle;
    color:#414141;
    font-style: bold;
    font-weight: 500;
    margin-bottom: 10px;
    line-height: 1.4;
}
.how-content h2 span {
    color: #414141;
}
.how-content .subtext {
    color: #1E8540;
    font-weight: 400px;
    font-size: 12px;
    line-height: 22.8px;
    vertical-align: middle;
    margin-bottom: 25px;
}
.step {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
}
.step img {
    width: 40px;
    height: 40px;
    min-width: 40px;
}
.step-content {
    flex: 1;
}
.step h4 {
    font-size: clamp(16px, 3vw, 18px);
    color: #414141;
    font-weight: 500;
    font-style: bold;
    font-size: 15.75px;
    line-height: 18.9px;
    letter-spacing: 0%;
    margin-bottom: 5px;
    vertical-align: middle;
   
}
.step p {
   
    font-size: clamp(13px, 3vw, 14px);
    color: #742B88;
    font-weight: 400;
    font-size: 11.25px;
    line-height: 21.38px;
    letter-spacing: 0%;
    vertical-align: middle;
    width: 215.84393310546875;
    height: 42.75;
    /* angle: 0 deg; */
    opacity: 1;
    top: 187.29px;
    left: 48.75px;
}
/* Responsive Adjustments */
@media (max-width: 768px) {
    .how-it-works {
        padding: 40px 5%;
        gap: 40px;
    }
   
    .left-image, .how-content {
        min-width: 100%;
    }
   
    .left-image img {
        max-width: 100%;
    }
   
    .how-content h2 {
        text-align: center;
    }
   
    .how-content .subtext {
        text-align: center;
    }
}
@media (max-width: 480px) {
    .how-it-works {
        padding: 30px 15px;
        gap: 30px;
    }
   
    .step {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
   
    .step img {
        margin-bottom: 10px;
    }
}
@media (max-width: 320px) {
    .how-it-works {
        padding: 25px 10px;
    }
   
    .step h4 {
        font-size: 15px;
    }
   
    .step p {
        font-size: 12px;
    }
}
/* Testimonial Sections (if needed) */
.testimonial-section {
    padding: 60px 20px;
    background-color: #FFF8F6;
}
.testimonial-section1 {
    padding: 60px 20px;
    background-color: #742B88;
}
.testimonial-content {
    display: flex;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: auto;
    gap: 40px;
    align-items: flex-start;
}
.testimonial-left {
    flex: 1 1 45%;
    min-width: 300px;
}
.testimonial-left h2 {
    font-size: clamp(26px, 5vw, 32px);
    color: #333;
    margin-bottom: 20px;
}
.testimonial-left .description {
    color: #7B2CBF;
    margin-bottom: 30px;
    max-width: 500px;
    font-size: clamp(14px, 3vw, 16px);
}
.stats {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
}
.stat-box {
    min-width: 100px;
}
.stat-box .stat-number {
    font-size: clamp(20px, 3vw, 24px);
    font-weight: bold;
    color: #7B2CBF;
}
.stat-box .stat-label {
    font-size: clamp(12px, 3vw, 14px);
    color: #444;
}
.stars {
    color: #FFD700;
    font-size: 18px;
    margin-top: 5px;
}
.testimonial-right {
    flex: 1 1 45%;
    position: relative;
    min-width: 280px;
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.quote-icon {
    font-size: 50px;
    color: #7B2CBF;
    position: absolute;
    right: 30px;
    top: 15px;
    font-family: Georgia, serif;
    opacity: 0.2;
}
.profile {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.profile img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}
.profile .name {
    font-weight: bold;
    color: #222;
    font-size: clamp(14px, 3vw, 16px);
}
.profile .role {
    font-size: 13px;
    color: #666;
}
.testimonial-text {
    color: #555;
    font-size: clamp(14px, 3vw, 15px);
    line-height: 1.6;
    margin-bottom: 30px;
}
.nav-buttons {
    display: flex;
    gap: 10px;
}
.nav-buttons button {
    width: 35px;
    height: 35px;
    border: 1px solid #7B2CBF;
    background: transparent;
    color: #7B2CBF;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    transition: var(--transition);
}
.nav-buttons button:hover {
    background: #7B2CBF;
    color: white;
}
/* Section Title */
.section-title {
    color: #742B88;
    font-size: clamp(26px, 6vw, 32px);
    font-weight: bold;
    margin-bottom: 10px;
    margin-top: 40px;
    text-align: center;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
    animation: titlePulse 3s ease-in-out infinite;
    position: relative;
    font-family: Roboto;
font-weight: 600;
font-style: SemiBold;
font-size: 20px;
/* leading-trim: NONE; */
line-height: 24.22px;
letter-spacing: 0%;
/* text-align: center; */
/* vertical-align: middle; */
width: 173;
height: 25;
/* angle: 0 deg; */
opacity: 1;
/* top: -170px; */
/* left: 634px; */
}
@keyframes titlePulse {
    0%, 100% { transform: scale(1); text-shadow: 0 4px 8px rgba(0,0,0,0.3); }
    50% { transform: scale(1.05); text-shadow: 0 6px 12px rgba(0,0,0,0.4); }
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1);
    border-radius: 2px;
    animation: lineGlow 2s ease-in-out infinite alternate;
}
@keyframes lineGlow {
    0% { box-shadow: 0 0 5px rgba(255, 107, 107, 0.5); }
    100% { box-shadow: 0 0 20px rgba(255, 107, 107, 0.8); }
}
/* Responsive adjustments for testimonials */
@media (max-width: 768px) {
    .testimonial-section, .testimonial-section1 {
        padding: 40px 20px;
    }
   
    .testimonial-content {
        gap: 30px;
    }
   
    .testimonial-right {
        padding: 25px;
    }
}
@media (max-width: 480px) {
    .testimonial-section, .testimonial-section1 {
        padding: 30px 15px;
    }
   
    .testimonial-left, .testimonial-right {
        min-width: 100%;
    }
   
    .stats {
        gap: 20px;
        justify-content: space-between;
    }
   
    .quote-icon {
        font-size: 40px;
        right: 20px;
        top: 10px;
    }
}
@media (max-width: 320px) {
    .testimonial-section, .testimonial-section1 {
        padding: 25px 10px;
    }
   
    .testimonial-right {
        padding: 20px;
    }
   
    .profile {
        flex-direction: column;
        text-align: center;
    }
   
    .profile img {
        margin-right: 0;
        margin-bottom: 10px;
    }
   
    .nav-buttons {
        justify-content: center;
    }
}
.testimonial-section {
    padding: 60px 20px;
    background-color: #FFF8F6;
}
.testimonial-content {
    display: flex;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    gap: 40px;
    align-items: flex-start;
}
.testimonial-left {
    flex: 1 1 45%;
    min-width: 280px;
}
.testimonial-left h2 {
    font-size: clamp(26px, 5vw, 32px);
    color: #333;
    margin-bottom: 20px;
    line-height: 1.3;
}
.testimonial-left .description {
    color: #7B2CBF;
    margin-bottom: 30px;
    max-width: 500px;
    font-size: clamp(14px, 3vw, 16px);
    line-height: 1.5;
}
.stats {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
}
.stat-box {
    min-width: 100px;
}
.stat-box .stat-number {
    font-size: clamp(20px, 4vw, 24px);
    font-weight: bold;
    color: #7B2CBF;
    margin-bottom: 5px;
}
.stat-box .stat-label {
    font-size: clamp(12px, 3vw, 14px);
    color: #444;
}
.stars {
    color: #FFD700;
    font-size: clamp(16px, 3vw, 18px);
    margin-top: 5px;
}
.testimonial-right {
    flex: 1 1 45%;
    position: relative;
    min-width: 280px;
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.quote-icon {
    font-size: clamp(40px, 8vw, 60px);
    color: #7B2CBF;
    position: absolute;
    right: 30px;
    top: 20px;
    font-family: Georgia, serif;
    opacity: 0.2;
    line-height: 1;
}
.profile {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}
.profile img {
    width: clamp(40px, 8vw, 50px);
    height: clamp(40px, 8vw, 50px);
    border-radius: 50%;
    margin-right: 15px;
    object-fit: cover;
}
.profile .name {
    font-weight: bold;
    color: #222;
    font-size: clamp(14px, 3vw, 16px);
    margin-bottom: 2px;
}
.profile .role {
    font-size: clamp(12px, 2.5vw, 13px);
    color: #666;
}
.testimonial-text {
    color: #555;
    font-size: clamp(14px, 3vw, 15px);
    line-height: 1.6;
    margin-bottom: 30px;
}
.nav-buttons {
    display: flex;
    gap: 10px;
}
.nav-buttons button {
    width: clamp(30px, 7vw, 35px);
    height: clamp(30px, 7vw, 35px);
    border: 1px solid #7B2CBF;
    background: transparent;
    color: #7B2CBF;
    border-radius: 50%;
    font-size: clamp(16px, 3vw, 18px);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}
.nav-buttons button:hover {
    background: #7B2CBF;
    color: white;
}
/* Responsive adjustments */
@media (max-width: 768px) {
    .testimonial-section {
        padding: 50px 20px;
    }
   
    .testimonial-content {
        gap: 30px;
    }
   
    .testimonial-right {
        padding: 25px;
    }
   
    .stats {
        gap: 30px;
    }
}
@media (max-width: 480px) {
    .testimonial-section {
        padding: 40px 15px;
    }
   
    .testimonial-left h2 br {
        display: none;
    }
   
    .testimonial-left, .testimonial-right {
        min-width: 100%;
    }
   
    .stats {
        gap: 20px;
    }
   
    .quote-icon {
        right: 20px;
        top: 15px;
    }
}
@media (max-width: 375px) {
    .testimonial-section {
        padding: 35px 12px;
    }
   
    .testimonial-right {
        padding: 20px;
    }
   
    .stats {
        flex-direction: column;
        gap: 15px;
    }
}
@media (max-width: 320px) {
    .testimonial-section {
        padding: 30px 10px;
    }
   
    .profile {
        flex-direction: column;
        text-align: center;
    }
   
    .profile img {
        margin-right: 0;
        margin-bottom: 10px;
    }
   
    .nav-buttons {
        justify-content: center;
    }
   
    .testimonial-text {
        text-align: center;
    }
}
/* Section Title */
.section-title {
    color: #742B88;
    font-size: clamp(26px, 6vw, 32px);
    font-weight: bold;
    margin-bottom: clamp(30px, 5vw, 50px);
    text-align: center;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
    animation: titlePulse 3s ease-in-out infinite;
    position: relative;
    padding: 0 15px;
}
@keyframes titlePulse {
    0%, 100% { transform: scale(1); text-shadow: 0 4px 8px rgba(0,0,0,0.3); }
    50% { transform: scale(1.05); text-shadow: 0 6px 12px rgba(0,0,0,0.4); }
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: clamp(80px, 20vw, 100px);
    height: 3px;
    background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1);
    border-radius: 2px;
    animation: lineGlow 2s ease-in-out infinite alternate;
}
@keyframes lineGlow {
    0% { box-shadow: 0 0 5px rgba(255, 107, 107, 0.5); }
    100% { box-shadow: 0 0 20px rgba(255, 107, 107, 0.8); }
}
/* Scroll Container */
.scroll-container {
    width: 100%;
    max-width: 1950px;
    overflow: hidden;
    position: relative;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: clamp(15px, 3vw, 30px) 0;
    margin: 0 auto;
}
.scroll-content {
    display: flex;
    gap: clamp(15px, 3vw, 30px);
    animation: scroll 20s linear infinite;
    width: calc(200% + clamp(15px, 3vw, 30px));
    will-change: transform;
}
.scroll-content:hover {
    animation-play-state: paused;
}
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}
/* Product Badges */
.badge-set {
    display: flex;
    gap: clamp(15px, 3vw, 30px);
    flex-shrink: 0;
    padding: 0 clamp(10px, 3vw, 20px);
}
.product-badge {
    flex-shrink: 0;
    /* border-radius: 25px; */
    padding: clamp(15px, 3vw, 24px);
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 400;
    color: #1f2937;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    min-width: clamp(120px, 20vw, 160px);
    justify-content: center;
    /* background: rgba(255, 255, 255, 0.95); */
    /* box-shadow: 0 4px 15px rgba(0,0,0,0.05); */
    width: 144.81011962890625;
    height: 31.677215576171875;
/* angle: 0 deg; */
    opacity: 1;
    top: 2.26px;
    left: 228.97px;
}
.product-badge:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    background: rgba(255, 255, 255, 1);
}
.check-icon {
    width: clamp(80px, 20vw, 120px);
    height: clamp(30px, 5vw, 45px);
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    object-fit: contain;
}
.product-text {
    font-size: clamp(12px, 3vw, 14px);
    white-space: nowrap;
}
/* Responsive Adjustments */
@media (max-width: 768px) {
    .scroll-container {
        border-radius: 15px;
        padding: 15px 0;
    }
   
    .product-badge {
        border-radius: 20px;
        min-width: 110px;
    }
}
@media (max-width: 480px) {
    .scroll-container {
        border-radius: 12px;
        backdrop-filter: blur(5px);
    }
   
    .badge-set {
        gap: 10px;
    }
   
    .product-badge {
        border-radius: 15px;
        padding: 12px;
        min-width: 100px;
    }
   
    .check-icon {
        width: 80px;
        height: 30px;
    }
}
@media (max-width: 375px) {
    .section-title {
        font-size: 24px;
    }
   
    .scroll-content {
        animation-duration: 15s;
    }
   
    .product-badge {
        min-width: 90px;
    }
   
    .check-icon {
        width: 70px;
    }
}
@media (max-width: 320px) {
    .section-title {
        font-size: 22px;
        margin-bottom: 25px;
    }
   
    .section-title::after {
        width: 70px;
        bottom: -8px;
    }
   
    .scroll-container {
        padding: 10px 0;
    }
   
    .badge-set {
        gap: 8px;
        padding: 0 5px;
    }
   
    .product-badge {
        min-width: 80px;
        padding: 10px;
        border-radius: 12px;
    }
   
    .check-icon {
        width: 60px;
        height: 25px;
    }
}
/* Best Properties Section */
.testimonial-section1 {
    padding: clamp(40px, 5vw, 80px) 20px;
    background-color: #742B88;
}
.testimonial-section1 .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 clamp(15px, 3vw, 30px);
}
.header {
    text-align: center;
    margin-bottom: clamp(30px, 5vw, 50px);
}
.header h1 {
    color: white;
    font-size: clamp(1.8rem, 6vw, 2.4rem);
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.3;
}
.header p {
    color: rgba(255, 255, 255, 0.85);
    font-size: clamp(0.9rem, 3vw, 1rem);
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
}
.main-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(15px, 3vw, 20px);
}
.left-property {
    background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.1)), url('img/landing_page.jpg');
    background-size: cover;
    background-position: center;
    border-radius: clamp(15px, 3vw, 20px);
    padding: clamp(15px, 3vw, 25px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    color: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
    min-height: clamp(300px, 60vw, 400px);
}
.badges {
    display: flex;
    gap: clamp(8px, 2vw, 10px);
    margin-bottom: clamp(15px, 3vw, 20px);
    flex-wrap: wrap;
}
.badge {
    padding: clamp(6px, 1.5vw, 8px) clamp(12px, 3vw, 16px);
    border-radius: 25px;
    font-size: clamp(0.65rem, 2.5vw, 0.75rem);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.badge.for-sale {
    background: #10B981;
    color: white;
}
.badge.featured {
    background: rgba(255,255,255,0.25);
    color: white;
    backdrop-filter: blur(10px);
}
.property-info {
    margin-top: auto;
}
.property-title {
    font-size: clamp(1.4rem, 5vw, 1.8rem);
    font-weight: 700;
    margin-bottom: clamp(5px, 1vw, 8px);
    line-height: 1.2;
}
.property-address {
    font-size: clamp(0.8rem, 2.5vw, 0.9rem);
    opacity: 0.9;
    margin-bottom: clamp(15px, 3vw, 20px);
    display: flex;
    align-items: center;
    gap: 6px;
}
.property-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: clamp(10px, 2vw, 15px);
}
.price {
    font-size: clamp(1.1rem, 4vw, 1.4rem);
    font-weight: 700;
}
.specs {
    display: flex;
    gap: clamp(10px, 3vw, 20px);
    font-size: clamp(0.75rem, 2.5vw, 0.85rem);
    opacity: 0.95;
    flex-wrap: wrap;
}
.spec {
    display: flex;
    align-items: center;
    gap: 5px;
}
.right-section {
    display: grid;
    grid-template-rows: auto auto;
    gap: clamp(15px, 3vw, 20px);
}
.top-right {
    background: linear-gradient(rgba(0,0,0,0.05), rgba(0,0,0,0.1)), url('img/landing_page.jpg');
    background-size: cover;
    background-position: center;
    border-radius: clamp(15px, 3vw, 20px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    min-height: clamp(150px, 40vw, 200px);
}
.bottom-right {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(15px, 3vw, 20px);
}
.dining-section {
    background: linear-gradient(rgba(0,0,0,0.05), rgba(0,0,0,0.1)), url('img/landing_page.jpg');
    background-size: cover;
    background-position: center;
    border-radius: clamp(15px, 3vw, 20px);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    position: relative;
    min-height: clamp(150px, 40vw, 200px);
}
.play-button {
    width: clamp(40px, 10vw, 50px);
    height: clamp(40px, 10vw, 50px);
    background: rgba(255,255,255,0.95);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: clamp(14px, 3vw, 16px);
    color: #666;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}
.play-button:hover {
    transform: scale(1.1);
    background: white;
}
.stats-section {
    background: white;
    border-radius: clamp(15px, 3vw, 20px);
    padding: clamp(20px, 4vw, 25px) clamp(18px, 3vw, 22px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
.stats-number {
    font-size: clamp(1.8rem, 7vw, 2.5rem);
    font-weight: 800;
    color: #742B88;
    margin-bottom: 5px;
    line-height: 1;
}
.stats-label {
    font-size: clamp(0.85rem, 3vw, 0.95rem);
    font-weight: 600;
    color: #742B88;
    margin-bottom: clamp(10px, 3vw, 15px);
}
.stats-description {
    font-size: clamp(0.75rem, 2.5vw, 0.8rem);
    line-height: 1.4;
    color: #742B88;
    margin-bottom: clamp(15px, 4vw, 20px);
}
.arrow-button {
    width: clamp(28px, 8vw, 32px);
    height: clamp(28px, 8vw, 32px);
    background: #F9FAFB;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6B7280;
    cursor: pointer;
    font-size: clamp(10px, 3vw, 12px);
    transition: all 0.3s ease;
    align-self: flex-start;
}
.arrow-button:hover {
    background: #8B5CF6;
    color: white;
    transform: translateX(3px);
}
/* Tablet Layout */
@media (min-width: 768px) {
    .main-grid {
        grid-template-columns: 1fr 1fr;
    }
   
    .bottom-right {
        grid-template-columns: 1fr 1fr;
    }
}
/* Mobile-specific adjustments */
@media (max-width: 480px) {
    .property-bottom {
        flex-direction: column;
        align-items: flex-start;
    }
   
    .specs {
        gap: 15px;
    }
}
@media (max-width: 320px) {
    .testimonial-section1 {
        padding: 30px 15px;
    }
   
    .header h1 {
        font-size: 1.6rem;
    }
   
    .header p {
        font-size: 0.85rem;
    }
   
    .left-property {
        min-height: 280px;
    }
   
    .property-title {
        font-size: 1.3rem;
    }
   
    .stats-section {
        padding: 18px 15px;
    }
   
    .stats-number {
        font-size: 1.6rem;
    }
}
/* Team Section */
.team-section {
    text-align: center;
    padding: 40px 15px;
    background-color: #fff;
    color: #333;
    font-family: 'Inter', sans-serif;
    max-width: 1200px;
    margin: 0 auto;
}
.team-title h2 {
    color: #742B88;
    font-size: clamp(24px, 5vw, 32px); /* Responsive font size */
    margin-bottom: 10px;
    font-family: Roboto;
font-weight: 500;
font-style: Medium;
font-size: 30px;
/* leading-trim: NONE; */
line-height: 39px;
letter-spacing: 0%;
text-align: center;
vertical-align: middle;
}
.team-title p {
    color: #742B88;
    font-size: clamp(12px, 3vw, 14px); /* Responsive font size */
    margin-bottom: 30px;
    font-family: Roboto;
font-weight: 400;
font-style: Regular;
font-size: 12.75px;
/* leading-trim: NONE; */
line-height: 24.22px;
letter-spacing: 0%;
text-align: center;
vertical-align: middle;
}
.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
    justify-items: center;
    padding: 0 10px;
}
.team-member {
    text-align: center;
    width: 100%;
    max-width: 220px;
}
.team-member img {
    width: 100%;
    height: auto;
    aspect-ratio: 3/4; /* Maintain aspect ratio */
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
    max-height: 280px;
}
.team-member h4 {
    color: #742B88;;
    margin: 5px 0;
    font-size: clamp(14px, 3vw, 18px); /* Responsive font size */
}
.team-member p {
    color: #742B88;
    font-size: clamp(12px, 3vw, 14px); /* Responsive font size */
    margin: 0;
}
/* Media Queries for specific adjustments */
@media (max-width: 480px) {
    .team-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on very small screens */
        gap: 15px;
    }
   
    .team-member {
        max-width: none;
    }
}
@media (max-width: 320px) {
    .team-grid {
        grid-template-columns: 1fr; /* Single column on smallest screens */
    }
   
    .team-section {
        padding: 30px 10px;
    }
}
/* Real Estate Markets */
.real-estate-markets {
    padding: clamp(30px, 5vw, 60px) clamp(15px, 3vw, 20px); /* Responsive padding */
    text-align: center;
    font-family: 'Inter', sans-serif;
    max-width: 1200px;
    margin: 0 auto;
}
.real-estate-markets h2 {
    font-size: clamp(22px, 5vw, 28px); /* Responsive font size */
    color: #742B88;
    margin-bottom: 8px;
    line-height: 1.3;
}
.real-estate-markets p {
    color: #742B88;
    font-size: clamp(13px, 3vw, 14px); /* Responsive font size */
    margin-bottom: clamp(20px, 3vw, 30px); /* Responsive margin */
    line-height: 1.5;
}
.market-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px 12px; /* row column gap */
    justify-content: center;
    padding: 0 10px;
}
.market-tags span {
    border: 1px solid #7b2cbf;
    padding: 8px clamp(12px, 3vw, 20px); /* Responsive padding */
    border-radius: 999px;
    color:#742B88;
    font-size: clamp(12px, 3vw, 14px); /* Responsive font size */
    transition: all 0.3s ease;
    cursor: pointer;
    white-space: nowrap; /* Prevent text wrapping */
}
.market-tags span:hover {
    background-color: #7b2cbf;
    color: #fff;
}
/* Media Queries for specific adjustments */
@media (max-width: 480px) {
    .market-tags {
        gap: 8px;
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 10px;
        flex-wrap: nowrap;
        justify-content: start;
        -webkit-overflow-scrolling: touch;
    }
   
    .market-tags::-webkit-scrollbar {
        height: 4px;
    }
   
    .market-tags span {
        flex: 0 0 auto; /* Prevent flex items from shrinking */
    }
}
@media (max-width: 320px) {
    .market-tags {
        gap: 6px;
        flex-wrap: wrap;
    }
   
    .market-tags span {
        padding: 6px 12px;
        font-size: 12px;
    }
   
    .real-estate-markets {
        padding: 25px 10px;
    }
}
</style>


<body>
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
                        <div class="search-field">
                            <i class="fas fa-map-marker-alt search-icon"></i>
                            <input type="text" class="search-input" id="location" placeholder="Location">
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
                        <button type="button" class="property-type-btn active" data-type="buy" onclick="alert('Please Login...')">
                            <i class="fas fa-shopping-cart"></i>
                            Buy
                        </button>
                        <button type="button" class="property-type-btn" data-type="sell" onclick="alert('Please Login...')">
                            <i class="fas fa-tag"></i>
                            Sell
                        </button>
                        <button type="button" class="property-type-btn" data-type="rent" onclick="alert('Please Login...')">
                            <i class="fas fa-home"></i>
                            Rent
                        </button>
                        <button type="button" class="property-type-btn" data-type="lease" onclick="alert('Please Login...')">
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
        <div class="text-block center-text">
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
                <button type="button" class="tab active" data-filter="all" onclick="alert('Please Login...')">All Properties</button>
                <button type="button" class="tab" data-filter="sale" onclick="alert('Please Login...')">For Sale</button>
                <button type="button" class="tab" data-filter="rent" onclick="alert('Please Login...')">For Rent</button>
                <button type="button" class="tab" data-filter="lease" onclick="alert('Please Login...')">For Lease</button>
                <button type="button" class="tab" data-filter="stay" onclick="alert('Please Login...')">For Stay</button>
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
            <a href=" #?id=1" class="property-link">
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
                <div class="price">₹395,000</div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 1</span>
                    <span><i class="fa fa-expand"></i> 400</span>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property2.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <div class="price">₹280,000</div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="property-card">
           <a href=" #?id=1" class="property-link"> <img src="img/property3.jpg" alt="North Dillard Street" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR RENT</span>
            </div>
            <div class="property-details">
                <h3>North Dillard Street</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 4330 Bell Shoals Rd</p>
                <div class="price">₹250 <small>/month</small></div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 400</span>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property4.jpg" alt="Eaton Garth Penthouse" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>Eaton Garth Penthouse</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 7722 18th Ave, Brooklyn</p>
                <div class="price">₹180,000</div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>
        <!-- Card 5 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property5.jpg" alt="New Apartment Nice View" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR RENT</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>New Apartment Nice View</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 42 Avenue O, Brooklyn</p>
                <div class="price">₹850 <small>/month</small></div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 1</span>
                    <span><i class="fa fa-expand"></i> 460</span>
                </div>
            </div>
        </div>
        <!-- Card 6 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property6.jpg" alt="Diamond Manor Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
                <span class="label-featured">FEATURED</span>
            </div>
            <div class="property-details">
                <h3>Diamond Manor Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 7802 20th Ave, Brooklyn</p>
                <div class="price">₹259,000</div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 500</span>
                </div>
            </div>
        </div>
         <!-- Card 7 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property2.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <div class="price">₹280,000</div>
                <div class="icons">
                    <span><i class="fa fa-bed"></i> 4</span>
                    <span><i class="fa fa-bath"></i> 2</span>
                    <span><i class="fa fa-expand"></i> 450</span>
                </div>
            </div>
        </div>
        <!-- Card 8 -->
        <div class="property-card">
            <a href=" #?id=1" class="property-link"><img src="img/property5.jpg" alt="Skyper Pool Apartment" class="property-img" loading="lazy"/></a>
            <div class="labels">
                <span class="label-sale">FOR SALE</span>
            </div>
            <div class="property-details">
                <h3>Skyper Pool Apartment</h3>
                <p class="location"><i class="fa fa-map-marker-alt"></i> 1020 Bloomingdale Ave</p>
                <div class="price">₹280,000</div>
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
<div class="testimonial-section">
    <div class="testimonial-content">
        <!-- Left Side -->
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
        <!-- Right Side -->
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
</div>
<h2 class="section-title">Our Other Products</h2>
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
                        <i class="fa fa-map-marker-alt"></i> 2030 Bloomingdale Ave
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
</body>
</html>