<?php include"./header.php";?>
<br><br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Listing - Mobile Responsive</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: sans-serif;
      background: #f9fbfd;
    }

    .main-container {
      text-align: center;
      margin-top: 40px;
    }

    .header {
      padding: 20px 0;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      gap: 20px;
    }

    .logo {
      color: #742B88;
      font-size: 1.8rem;
      font-weight: 500;
      text-decoration: none;
      white-space: nowrap;
      flex-shrink: 0;
    }

    .search-container {
      position: relative;
      flex: 1;
      max-width: 500px;
    }

    .search-input {
      width: 100%;
      padding: 12px 50px 12px 20px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      outline: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .search-btn {
      position: absolute;
      right: 8px;
      top: 50%;
      transform: translateY(-50%);
      background: #742B88;
      border: none;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      color: white;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .search-btn:hover {
      background: rgba(156, 20, 160, 0.3);
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .gallery-container {
      border-radius: 20px;
      padding: 20px;
    }

    .main-image-container {
      position: relative;
      border-radius: 15px;
      overflow: hidden;
      margin-bottom: 20px;
      height: 500px;
    }

    .main-image {
      object-position: center;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .main-image:hover {
      transform: scale(1.05);
    }

    .status-badge {
      position: absolute;
      top: 20px;
      left: 20px;
      background: #10B981;
      color: white;
      padding: 8px 16px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 14px;
    }

    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      z-index: 10;
    }

    .nav-btn:hover {
      background: white;
      transform: translateY(-50%) scale(1.1);
    }

    .nav-btn.prev {
      left: 20px;
    }

    .nav-btn.next {
      right: 20px;
    }

    .thumbnail-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 15px;
    }

    .thumbnail {
      border-radius: 12px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.3s ease;
      height: 150px;
      position: relative;
    }

    .thumbnail:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .thumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .thumbnail:hover img {
      transform: scale(1.1);
    }

    .thumbnail.active {
      border: 3px solid #8B5CF6;
    }

    .property-actions {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      gap: 10px;
      z-index: 10;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 25px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 6px;
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-save {
      background: rgba(255, 255, 255, 0.9);
      color: #a70eb3;
      border: 2px solid rgba(139, 92, 246, 0.3);
    }

    .btn-save.saved {
      background: #742B88;
      color: white;
    }

    .btn-save:hover {
      background: rgba(156, 22, 174, 0.9);
      color: white;
      transform: translateY(-2px);
    }

    .btn-share {
      background: #742B88;
      color: white;
    }

    .btn-share:hover {
      background: rgba(185, 15, 185, 0.9);
      transform: translateY(-2px);
    }

    .save-container {
      position: relative;
      display: none;
    }

    .saved-count {
      position: absolute;
      top: -5px;
      right: -5px;
      background: #ff4757;
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container01 {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      padding: 40px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .left-section {
      flex: 2;
      min-width: 300px;
      background: #fff;
      border-radius: 12px;
      padding: 25px 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .right-section {
      flex: 1;
      min-width: 300px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      padding: 25px 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .price {
      font-size: 22px;
      color: #6a008a;
      font-weight: bold;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
    }

    .price .old-price {
      text-decoration: line-through;
      color: #777;
      font-weight: normal;
    }

    .price .negotiable {
      color: green;
      font-size: 15px;
    }

    .availability {
      display: flex;
      align-items: center;
      gap: 5px;
      margin-top: 10px;
      font-size: 16px;
      font-weight: 700;
      color: #742B88;
    }

    .property-grid01 {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
      margin: 30px 0;
    }

    .property-grid01 div {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #4b4b4b;
    }

    h3 {
      color: #742B88;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
      margin-top: 40px;
    }

    .amenities, .features {
      display: grid;
      color: black;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 8px;
      margin-top: 15px;
    }

    .features ul {
      padding-left: 18px;
    }

    .features li {
      margin-bottom: 8px;
      color: black;
    }

    .agent {
      text-align: center;
    }

    .agent img {
      width: 80px;
      border-radius: 50%;
      margin: 0 auto 10px;
    }

    .agent h4 {
      margin: 5px 0;
      color: #333;
    }

    .agent p {
      color: #777;
      margin: 3px 0;
    }

    .contact-btn1 {
      margin-top: 15px;
      background: #742B88;
      color: white;
      padding: 10px 20px;
      border: none;
      width: 100%;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .contact-btn1:hover {
      background: #5a0070;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .form-group textarea {
      resize: vertical;
      height: 80px;
    }

    .send-btn {
      background: #742B88;
      color: white;
      padding: 10px 20px;
      border: none;
      width: 100%;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .send-btn:hover {
      background: #5a0070;
    }

    h4 {
      color: purple;
      margin-bottom: 10px;
    }

    .container02 {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
      margin-bottom: 30px;
    }

    .map iframe,
    .video iframe {
      width: 100%;
      height: 400px;
      border: 0;
      border-radius: 10px;
    }

    .schedule {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .schedule h4 {
      margin-bottom: 15px;
    }

    .date-btns,
    .time-btns {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 15px;
    }

    .date-btns button,
    .time-btns button {
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background: #f2f2f2;
      cursor: pointer;
      transition: 0.3s;
      flex: 1 1 auto;
      min-width: 80px;
    }

    .date-btns button.selected,
    .time-btns button.selected {
      background: purple;
      color: white;
      border-color: purple;
    }

    .schedule button#scheduleBtn {
      width: 100%;
      padding: 10px;
      background: purple;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .schedule button#scheduleBtn:hover {
      background: #6a008a;
    }

    .video-neighborhood {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
    }

    .neighborhood, .Description {
      background: white;
      color: black;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .neighborhood p {
      margin-bottom: 20px;
    }

    .info-boxes {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 10px;
    }

    .info-box {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 10px;
      text-align: center;
      background: #f2f2f2;
    }

    .review-section {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      max-width: 1200px;
      margin: 20px auto;
    }

    .review-summary {
      text-align: center;
      margin-bottom: 20px;
    }

    .rating-score {
      font-size: 2.5em;
      font-weight: bold;
      color: #444;
    }

    .rating-score span {
      color: #ffb400;
    }

    .filter-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .filter {
      padding: 8px 16px;
      border: none;
      background: #eee;
      border-radius: 20px;
      cursor: pointer;
      transition: background 0.3s;
      font-size: 14px;
    }

    .filter.active,
    .filter:hover {
      background: #742B88;
      color: #fff;
    }

    .review {
      border-top: 1px solid #ccc;
      padding-top: 20px;
      margin-top: 20px;
    }

    .review-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }

    .review-header img {
      border-radius: 50%;
      margin-right: 10px;
      width: 40px;
      height: 40px;
    }

    .review-header > div {
      flex: 1;
      min-width: 150px;
    }

    .stars {
      color: #ffb400;
    }

    .date {
      font-size: 0.9em;
      color: #888;
    }

    .para {
      color: #444;
    }

    .property-grid-section {
      text-align: center;
      padding: 40px 20px;
    }

    .property-grid-section h2 {
      color: #742B88;
      margin-bottom: 5px;
    }

    .property-grid-section p {
      color: #777;
      margin-bottom: 40px;
    }

    .property-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .property-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      overflow: hidden;
      position: relative;
      transition: transform 0.3s ease;
    }

    .property-card:hover {
      transform: translateY(-5px);
    }

    .property-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .labels {
      position: absolute;
      top: 15px;
      left: 15px;
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .labels span {
      font-size: 12px;
      color: #fff;
      padding: 3px 8px;
      border-radius: 5px;
      font-weight: bold;
    }

    .label-sale {
      background: #27ae60;
    }

    .label-featured {
      background: #8e44ad;
    }

    .label-rent {
      background: #3498db;
    }

    .property-details {
      padding: 20px;
      text-align: left;
    }

    .property-details h3 {
      font-size: 18px;
      margin-bottom: 5px;
      color: #333;
      border: none;
    }

    .location {
      font-size: 14px;
      color: #888;
      margin-bottom: 15px;
    }

    .icons span {
      margin-right: 15px;
      font-size: 14px;
      color: #555;
    }

    .see-all {
      margin-top: 40px;
    }

    .see-all a {
      background: #742B88;
      color: #fff;
      padding: 12px 25px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
      display: inline-block;
    }

    .see-all a:hover {
      background: #7a1596ff;
    }

    .modal1 {
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
      padding: 20px;
    }

    .modal-content1 {
      background: white;
      padding: 30px;
      border-radius: 12px;
      width: 100%;
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

    .close-btn1 {
      position: absolute;
      top: 15px;
      right: 15px;
      width: 24px;
      height: 24px;
      cursor: pointer;
      transition: transform 0.3s;
    }

    .close-btn1:hover {
      transform: rotate(90deg);
    }

    .coin-balance1 {
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

    .coin-balance1 svg {
      width: 16px;
      height: 16px;
      fill: #FFD700;
    }

    .property-title1 {
      font-size: 24px;
      margin-bottom: 5px;
      color: #742B88;
      text-align: center;
      font-weight: 700;
      margin-top: 10px;
    }

    .property-subtitle1 {
      font-size: 18px;
      margin-top: 0;
      margin-bottom: 20px;
      color: #555;
      text-align: center;
      font-weight: 500;
    }

    .property-details1 {
      background-color: #f9f9f9;
      padding: 18px;
      border-radius: 8px;
      margin: 20px 0;
      border-left: 4px solid #742B88;
    }

    .property-details1 p {
      margin: 12px 0;
      font-size: 15px;
      display: flex;
      justify-content: space-between;
      color: #333;
      flex-wrap: wrap;
      gap: 5px;
    }

    .property-label1 {
      font-weight: 600;
      color: #742B88;
    }

    .highlight {
      font-weight: 600;
      color: #742B88;
    }

    .area1 {
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

    .area1 svg {
      width: 16px;
      height: 16px;
      fill: #742B88;
    }

    .call-button1 {
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
      width: 100%;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(116, 43, 136, 0.3);
      border: none;
      cursor: pointer;
    }

    .call-button1:hover {
      background-color: #5a226d;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(116, 43, 136, 0.4);
    }

    .call-button1:active {
      transform: translateY(0);
    }

    .call-button1 svg {
      width: 20px;
      height: 20px;
      fill: white;
    }

    .call-number1 {
      font-size: 18px;
      letter-spacing: 0.5px;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 15px;
      }

      .logo {
        font-size: 1.2rem;
        text-align: center;
        white-space: normal;
      }

      .search-container {
        margin: 0;
        max-width: 100%;
      }

      .property-actions {
        position: static;
        margin-top: 15px;
        justify-content: center;
        flex-wrap: wrap;
      }

      .btn {
        padding: 10px 16px;
        font-size: 13px;
      }

      .main-image-container {
        height: 250px;
      }

      .nav-btn {
        width: 40px;
        height: 40px;
        font-size: 16px;
      }

      .nav-btn.prev {
        left: 10px;
      }

      .nav-btn.next {
        right: 10px;
      }

      .thumbnail-gallery {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
      }

      .thumbnail {
        height: 100px;
      }

      .container01 {
        flex-direction: column;
        padding: 20px;
      }

      .left-section, .right-section {
        min-width: 100%;
      }

      .price {
        font-size: 18px;
        flex-direction: column;
        align-items: flex-start;
      }

      .availability {
        width: 100%;
        margin-top: 10px;
      }

      .property-grid01 {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
      }

      .property-grid01 div {
        font-size: 14px;
      }

      .amenities, .features {
        grid-template-columns: 1fr;
      }

      .container02 {
        grid-template-columns: 1fr;
      }

      .map iframe,
      .video iframe {
        height: 300px;
      }

      .date-btns button,
      .time-btns button {
        min-width: 70px;
        padding: 6px 10px;
        font-size: 13px;
      }

      .video-neighborhood {
        grid-template-columns: 1fr;
      }

      .info-boxes {
        grid-template-columns: 1fr 1fr;
      }

      .review-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
      }

      .filter-buttons {
        flex-direction: column;
        align-items: stretch;
      }

      .filter {
        width: 100%;
      }

      .property-grid {
        grid-template-columns: 1fr;
      }

      .property-card {
        max-width: 100%;
      }

      .modal-content1 {
        padding: 20px;
        margin: 10px;
      }

      .property-title1 {
        font-size: 20px;
      }

      .property-subtitle1 {
        font-size: 16px;
      }

      .call-button1 {
        padding: 12px 20px;
        font-size: 16px;
      }

      .call-number1 {
        font-size: 16px;
      }
    }

    @media (max-width: 480px) {
      .logo {
        font-size: 1rem;
      }

      .main-image-container {
        height: 200px;
      }

      .property-grid01 {
        grid-template-columns: 1fr;
      }

      .container01 {
        padding: 15px;
      }

      .left-section, .card {
        padding: 20px;
      }

      h3, h4 {
        font-size: 18px;
      }

      .rating-score {
        font-size: 2em;
      }

      .info-boxes {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="header-content">
      <a href="#" class="logo">Modern Luxury House In Coimbatore</a>
      <div class="search-container">
        <input type="text" class="search-input" id="searchInput" placeholder="Search properties...">
        <button class="search-btn" id="searchBtn"><i class="fas fa-search"></i></button>
      </div>
      <div class="save-container">
        <button class="btn btn-save" id="viewSavedBtn">
          <i class="fas fa-heart"></i> Saved
          <span class="saved-count" id="savedCount">0</span>
        </button>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="gallery-container">
      <div class="main-image-container">
        <img id="main-image" class="main-image" src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2075&q=80" alt="Modern Luxury House">
        <div class="status-badge">For Sale</div>
        <div class="property-actions">
          <button class="btn btn-save" id="savePropertyBtn">
            <i class="far fa-heart" id="saveIcon"></i>
            <span id="saveText">Save</span>
          </button>
          <button class="btn btn-share" onclick="shareProperty()">
            <i class="fas fa-share-square"></i> Share
          </button>
        </div>
        <button class="nav-btn prev" onclick="previousImage()">❮</button>
        <button class="nav-btn next" onclick="nextImage()">❯</button>
      </div>

      <div class="thumbnail-gallery">
        <div class="thumbnail active" onclick="selectImage(0)">
          <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=400&q=80" alt="Front View">
        </div>
        <div class="thumbnail" onclick="selectImage(1)">
          <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=80" alt="Side View">
        </div>
        <div class="thumbnail" onclick="selectImage(2)">
          <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=400&q=80" alt="Pool Area">
        </div>
        <div class="thumbnail" onclick="selectImage(3)">
          <img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=400&q=80" alt="Modern Design">
        </div>
        <div class="thumbnail" onclick="selectImage(4)">
          <img src="https://images.unsplash.com/photo-1600607687644-c7171b42498f?auto=format&fit=crop&w=400&q=80" alt="Luxury Pool">
        </div>
      </div>
    </div>
  </div>

  <div class="container01">
    <div class="left-section">
      <div class="price">
        <span class="old-price">₹4,90,000</span> 
        <span>₹4,50,000</span>
        <span class="negotiable">(Negotiable)</span>
      </div>
      <div class="availability">
        <i class="fas fa-circle" style="color: green;"></i> Available
      </div>

      <div class="property-grid01">
        <div><i class="fas fa-house"></i> <strong>House</strong></div>
        <div><i class="fas fa-bed"></i> <strong>3 Bedrooms</strong></div>
        <div><i class="fas fa-bath"></i> <strong>2 Bathrooms</strong></div>
        <div><i class="fas fa-ruler-combined"></i> <strong>1,850 sq.ft.</strong></div>
        <div><i class="fas fa-calendar-alt"></i> <strong>2015</strong></div>
        <div><i class="fas fa-warehouse"></i> <strong>2 Garage</strong></div>
      </div>

      <h3>Description</h3>
      <div class="Description">
        <p>This stunning modern house in the heart of Manhattan offers the perfect blend of luxury and comfort. Recently renovated with high-end finishes, this property features an open floor plan that's perfect for entertaining.</p>
        <p>The gourmet kitchen boasts stainless steel appliances, quartz countertops, and custom cabinetry. The spacious master suite includes a walk-in closet and spa-like bathroom with dual vanities and a soaking tub.</p>
        <p>Located in one of New York's most desirable neighborhoods, this home is just steps from Central Park, top-rated schools, and world-class shopping and dining.</p>
      </div>

      <h3>Amenities</h3>
      <div class="amenities">
        <div>✓ High-speed Internet</div>
        <div>✓ Gym</div>
        <div>✓ Air Conditioning</div>
        <div>✓ Washer/Dryer</div>
        <div>✓ Garage</div>
        <div>✓ Fireplace</div>
        <div>✓ Swimming Pool</div>
        <div>✓ Central Heating</div>
      </div>

      <h3>Features</h3>
      <div class="features">
        <ul>
          <li>Recently renovated with high-end finishes</li>
          <li>Open floor plan perfect for entertaining</li>
          <li>Gourmet kitchen with stainless steel appliances</li>
          <li>Hardwood floors throughout</li>
          <li>Spacious master suite with walk-in closet</li>
          <li>Private backyard oasis</li>
          <li>Energy efficient windows and appliances</li>
          <li>Smart home technology</li>
        </ul>
      </div>
    </div>

    <div class="right-section">
      <div class="card agent">
        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="agent">
        <h4>Rakesh</h4>
        <p>Licensed Real Estate agent</p>
        <p>📞 +91 90XXXXXX44</p>
        <p>✉ shXXX@truebroker.com</p>
        <button class="contact-btn1" id="contactAgentBtn1">Contact agent</button>
      </div>

      <div class="card">
        <h3>Request Information</h3>
        <form id="infoRequestForm">
          <div class="form-group">
            <input type="text" placeholder="Full Name" required>
          </div>
          <div class="form-group">
            <input type="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="tel" placeholder="Phone">
          </div>
          <div class="form-group">
            <textarea placeholder="Message"></textarea>
          </div>
          <button type="submit" class="send-btn">Send Message</button>
        </form>
      </div>
    </div>
  </div>

  <section class="container01">
    <h4>Location</h4>
    <div class="container02">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.372287362061!2d77.31766237426736!3d11.17031325208525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba98fb47482e0cd%3A0xf947f738e4a9168f!2sSmart%20Global%20Solutions!5e0!3m2!1sen!2sin!4v1719474510000!5m2!1sen!2sin" allowfullscreen></iframe>
      </div>

      <div class="schedule">
        <h4>Schedule a Tour</h4>
        <div class="date-btns" id="dateBtns">
          <button>Today</button>
          <button>Tomorrow</button>
          <button>Jun 28</button>
          <button>Jun 29</button>
          <button>Jun 30</button>
          <button>July 1</button>
          <button>July 2</button>
          <button>July 3</button>
        </div>
        <div class="time-btns" id="timeBtns">
          <button>09:00 AM</button>
          <button>10:00 AM</button>
          <button>11:00 AM</button>
          <button>12:00 PM</button>
          <button>1:00 PM</button>
          <button>2:00 PM</button>
          <button>3:00 PM</button>
          <button>4:00 PM</button>
        </div>
        <button id="scheduleBtn">Schedule Viewing</button>
      </div>
    </div>

    <h4>Video</h4>
    <div class="video-neighborhood">
      <div class="video">
        <iframe src="https://www.youtube.com/embed/Ofrz7K6zGvA" allowfullscreen></iframe>
      </div>

      <div class="neighborhood">
        <h4>Neighborhood</h4>
        <p>This property is located in the heart of Manhattan's Upper East Side, one of New York's most prestigious neighborhoods. The area is known for its cultural institutions, upscale shopping, and excellent schools.</p>
        <div class="info-boxes">
          <div class="info-box">
            <strong>Central Park</strong><br>0.3 miles away
          </div>
          <div class="info-box">
            <strong>Subway Station</strong><br>0.2 miles away
          </div>
          <div class="info-box">
            <strong>Top Schools</strong><br>5 within 1 mile
          </div>
          <div class="info-box">
            <strong>Restaurants</strong><br>50+ nearby
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="review-section">
    <div class="review-summary">
      <div class="rating-score">4.7 <span>★</span></div>
      <p class="para">Based on 44 reviews</p>
    </div>

    <div class="filter-buttons">
      <button class="filter active" data-star="all">All Reviews</button>
      <button class="filter" data-star="5">5 Star (32)</button>
      <button class="filter" data-star="4">4 Star (8)</button>
      <button class="filter" data-star="3">3 Star (2)</button>
      <button class="filter" data-star="2">2 Star (0)</button>
      <button class="filter" data-star="1">1 Star (0)</button>
    </div>

    <div class="reviews-container" id="reviews">
      <div class="review" data-rating="5">
        <div class="review-header">
          <img src="https://i.pravatar.cc/40?img=1" alt="User">
          <div>
            <strong class="para">John Smith</strong>
            <div class="stars">★★★★★</div>
          </div>
          <span class="date">March 15, 2023</span>
        </div>
        <p class="para">Absolutely loved this property! The location is perfect and the kitchen is amazing. The backyard is perfect for summer gatherings.</p>
      </div>

      <div class="review" data-rating="4">
        <div class="review-header">
          <img src="https://i.pravatar.cc/40?img=2" alt="User">
          <div>
            <strong class="para">Emily Johnson</strong>
            <div class="stars">★★★★☆</div>
          </div>
          <span class="date">February 28, 2023</span>
        </div>
        <p class="para">Great house overall. The kitchen is amazing and the backyard is perfect for summer gatherings. Very spacious and well-maintained.</p>
      </div>
    </div>
  </section>

  <section class="property-grid-section">
    <h2>Similar Properties</h2>
    <p>Available Properties</p>
    <div class="property-grid" id="propertyGrid"></div>
    <div class="see-all">
      <a href="#">See All Listing <i class="fa fa-arrow-right"></i></a>
    </div>
  </section>
  <?php include 'footer.php'; ?>

  <div id="propertyModal1" class="modal1" style="display: none;">
    <div class="modal-content1">
      <div class="coin-balance1">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M11,17V16H9V14H13V13H10A1,1 0 0,1 9,12V9A1,1 0 0,1 10,8H11V7H13V8H15V10H11V11H14A1,1 0 0,1 15,12V15A1,1 0 0,1 14,16H13V17H11Z"/>
        </svg>
        50 Coins
      </div>
      
      <svg class="close-btn1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path fill="#742B88" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
      </svg>
      
      <h2 class="property-title1">SP REAL ESTATE</h2>
      <h3 class="property-subtitle1">Modern Luxury House In Coimbatore</h3>
      
      <div class="property-details1">
        <p><span class="property-label1">Mobile:</span> <span class="highlight">+91 90XXXXXX44</span></p>
        <p><span class="property-label1">Property Size:</span> <span>1,850 sq.ft.</span></p>
        <p><span class="property-label1">Property Price:</span> <span class="highlight">₹4,50,000</span></p>
        <p><span class="property-label1">Product Code:</span> <span>PROP12345</span></p>
        <p><span class="property-label1">Listing Date:</span> <span>2023-11-29</span></p>
      </div>
      
      <button class="call-button1" onclick="window.location.href='tel:+9190XXXXXX44'">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
        </svg>
        <span class="call-number1">Call +91 90XXXXXX44</span>
      </button>
      
      <p class="area1">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
        </svg>
        Irugur, Coimbatore
      </p>
    </div>
  </div>

  <script>
    const images = [
      'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2075&q=80',
      'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2075&q=80',
      'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=2075&q=80',
      'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=2075&q=80',
      'https://images.unsplash.com/photo-1600607687644-c7171b42498f?auto=format&fit=crop&w=2075&q=80'
    ];

    const similarProperties = [
      {
        id: 'property_456',
        title: 'Luxury Villa with Pool',
        address: 'Race Course, Coimbatore',
        price: '₹6,50,000',
        beds: '4 Beds',
        baths: '3 Baths',
        size: '2,200 sq.ft.',
        image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=80',
        labels: ['FOR SALE', 'FEATURED']
      },
      {
        id: 'property_789',
        title: 'Modern Apartment',
        address: 'RS Puram, Coimbatore',
        price: '₹3,20,000',
        beds: '2 Beds',
        baths: '2 Baths',
        size: '1,200 sq.ft.',
        image: 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=400&q=80',
        labels: ['FOR RENT']
      },
      {
        id: 'property_101',
        title: 'Spacious Family Home',
        address: 'Saibaba Colony, Coimbatore',
        price: '₹5,75,000',
        beds: '3 Beds',
        baths: '2 Baths',
        size: '1,800 sq.ft.',
        image: 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=400&q=80',
        labels: ['FOR SALE']
      }
    ];

    let currentImageIndex = 0;
    let savedProperties = [];
    let isSaved = false;

    function selectImage(index) {
      currentImageIndex = index;
      document.getElementById('main-image').src = images[index];
      document.querySelectorAll('.thumbnail').forEach((thumb, i) => {
        thumb.classList.toggle('active', i === index);
      });
    }

    function nextImage() {
      currentImageIndex = (currentImageIndex + 1) % images.length;
      selectImage(currentImageIndex);
    }

    function previousImage() {
      currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
      selectImage(currentImageIndex);
    }

    function shareProperty() {
      if (navigator.share) {
        navigator.share({
          title: 'Modern Luxury House In Coimbatore',
          text: 'Check out this amazing luxury property!',
          url: window.location.href
        }).catch(() => {
          alert('Link copied to clipboard!');
        });
      } else {
        alert('Link copied to clipboard!');
      }
    }

    function initSimilarProperties() {
      const propertyGrid = document.getElementById('propertyGrid');
      if (!propertyGrid) return;
      
      similarProperties.forEach((prop) => {
        const card = document.createElement('div');
        card.className = 'property-card';

        const labelsHTML = prop.labels.map(label => {
          let labelClass = label === 'FOR SALE' ? 'label-sale' :
                          label === 'FEATURED' ? 'label-featured' : 'label-rent';
          return `<span class="${labelClass}">${label}</span>`;
        }).join('');

        card.innerHTML = `
          <img src="${prop.image}" alt="${prop.title}" class="property-img" />
          <div class="labels">${labelsHTML}</div>
          <div class="property-details">
            <h3>${prop.title}</h3>
            <p class="location"><i class="fa fa-map-marker-alt"></i> ${prop.address}</p>
            <div class="price">${prop.price}</div>
            <div class="icons">
              <span><i class="fa fa-bed"></i> ${prop.beds}</span>
              <span><i class="fa fa-bath"></i> ${prop.baths}</span>
              <span><i class="fa fa-expand"></i> ${prop.size}</span>
            </div>
          </div>
        `;
        propertyGrid.appendChild(card);
      });
    }

    document.addEventListener('DOMContentLoaded', () => {
      initSimilarProperties();

      // Auto-advance slideshow
      setInterval(nextImage, 5000);

      // Schedule tour buttons
      document.querySelectorAll('#dateBtns button').forEach(button => {
        button.addEventListener('click', () => {
          document.querySelectorAll('#dateBtns button').forEach(btn => btn.classList.remove('selected'));
          button.classList.add('selected');
        });
      });

      document.querySelectorAll('#timeBtns button').forEach(button => {
        button.addEventListener('click', () => {
          document.querySelectorAll('#timeBtns button').forEach(btn => btn.classList.remove('selected'));
          button.classList.add('selected');
        });
      });

      document.getElementById('scheduleBtn')?.addEventListener('click', () => {
        const selectedDate = document.querySelector('#dateBtns .selected');
        const selectedTime = document.querySelector('#timeBtns .selected');
        
        if (selectedDate && selectedTime) {
          alert(`Viewing Scheduled:\nDate: ${selectedDate.innerText}\nTime: ${selectedTime.innerText}`);
        } else {
          alert('Please select both a date and time.');
        }
      });

      // Review filters
      document.querySelectorAll('.filter').forEach(button => {
        button.addEventListener('click', () => {
          document.querySelector('.filter.active')?.classList.remove('active');
          button.classList.add('active');
          
          const star = button.dataset.star;
          document.querySelectorAll('.review').forEach(review => {
            review.style.display = (star === 'all' || review.dataset.rating === star) ? 'block' : 'none';
          });
        });
      });

      // Contact agent modal
      const modal = document.getElementById('propertyModal1');
      document.getElementById('contactAgentBtn1')?.addEventListener('click', () => {
        modal.style.display = 'flex';
      });

      document.querySelector('.close-btn1')?.addEventListener('click', () => {
        modal.style.display = 'none';
      });

      window.onclick = (event) => {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      };

      // Form submission
      document.getElementById('infoRequestForm')?.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Your request has been submitted! An agent will contact you soon.');
        e.target.reset();
      });

      // Save property
      document.getElementById('savePropertyBtn')?.addEventListener('click', () => {
        isSaved = !isSaved;
        const icon = document.getElementById('saveIcon');
        const text = document.getElementById('saveText');
        const btn = document.getElementById('savePropertyBtn');
        
        if (isSaved) {
          icon.classList.remove('far');
          icon.classList.add('fas');
          text.textContent = 'Saved';
          btn.classList.add('saved');
          alert('Property saved!');
        } else {
          icon.classList.remove('fas');
          icon.classList.add('far');
          text.textContent = 'Save';
          btn.classList.remove('saved');
          alert('Property removed from saved');
        }
      });
    });
  </script>
</body>
</html>