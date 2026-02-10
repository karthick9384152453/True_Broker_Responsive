<?php
session_start();
require "data.php";

// Get the property ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
$selected = null;

// Find the selected property
if ($id !== null) {
    foreach ($properties as $p) {
        if ($p['id'] == $id) {
            $selected = $p;
            break;
        }
    }
}

// If property not found, show error
if (!$selected) {
    die("Property not found!");
}

// === GET CURRENT DATA FROM SESSION ===
$default_pic = 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
$profile_pic = $_SESSION['profile_pic'] ?? $default_pic;
$user_name   = $_SESSION['user_name'] ?? 'Guest User';
$location    = $_SESSION['location'] ?? 'Coimbatore, Tamilnadu';
?>
<?php include "./header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($selected['title']); ?> - Property Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        :root {
            --primary: #742B88;
            --primary-light: #f2e8f7;
            --secondary: #1E8540;
            --secondary-light: #e8f5ec;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --gray: #95a5a6;
            --success: #1E8540;
            --warning: #f39c12;
            --danger: #e74c3c;
            --accent: #f59e0b;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            background: #f5f5f5;
            color: var(--dark);
            line-height: 1.6;
            padding-top: 80px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }
        
        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* Property Header */
        .property-header {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .property-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }
        
        .property-location {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 14px;
        }
        
        .property-location i {
            color: var(--primary);
        }
        
        /* Main Layout */
        .property-layout {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 20px;
        }
        
        /* Left Content */
        .property-main {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        /* Image Gallery */
        .image-gallery {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .main-image {
            position: relative;
            width: 100%;
            height: 500px;
            background-size: cover;
            background-position: center;
        }
        
        .image-badges {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            gap: 10px;
        }
        
        .badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: var(--secondary);
            color: white;
        }
        
        .badge.featured {
            background: var(--primary);
        }
        
        .gallery-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }
        
        .gallery-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .gallery-btn:hover {
            background: var(--primary);
            color: white;
        }
        
        .image-thumbnails {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            padding: 15px;
        }
        
        .thumbnail {
            height: 80px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        
        .thumbnail:hover {
            transform: scale(1.05);
        }
        
        /* Price and Info Section */
        .price-info {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--light);
        }
        
        .price {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
        }
        
        .price-label {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        .info-item {
            text-align: center;
        }
        
        .info-icon {
            width: 50px;
            height: 50px;
            margin: 0 auto 10px;
            background: var(--primary-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 20px;
        }
        
        .info-label {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
        }
        
        /* Description */
        .description-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .section-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--primary);
        }
        
        .description-text {
            line-height: 1.8;
            color: #555;
            font-size: 15px;
        }
        
        /* Amenities */
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        
        .amenity-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: var(--light);
            border-radius: 8px;
        }
        
        .amenity-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--primary);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }
        
        .amenity-label {
            font-size: 14px;
            color: var(--dark);
        }
        
        /* Features */
        .features-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px;
            background: var(--light);
            border-radius: 8px;
        }
        
        .feature-item i {
            color: var(--primary);
            margin-top: 3px;
        }
        
        /* Location */
        .location-map {
            width: 100%;
            height: 400px;
            background: #e0e0e0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }
        
        /* Video */
        .video-container {
            position: relative;
            width: 100%;
            height: 400px;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .video-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .play-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: var(--primary);
            transition: transform 0.3s ease;
        }
        
        .play-btn:hover {
            transform: scale(1.1);
        }
        
        /* Reviews */
        .rating-summary {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: var(--light);
            border-radius: 12px;
            margin-bottom: 20px;
        }
        
        .rating-score {
            font-size: 48px;
            font-weight: 700;
            color: var(--primary);
        }
        
        .rating-stars {
            color: #FFC107;
            font-size: 24px;
        }
        
        .rating-count {
            font-size: 14px;
            color: #666;
        }
        
        .rating-filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            padding: 10px 20px;
            border: 2px solid var(--primary);
            background: white;
            color: var(--primary);
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: white;
        }
        
        .review-item {
            padding: 20px;
            background: var(--light);
            border-radius: 12px;
            margin-bottom: 15px;
        }
        
        .review-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .reviewer-name {
            font-weight: 600;
            color: var(--dark);
        }
        
        .review-date {
            font-size: 13px;
            color: #666;
        }
        
        .review-stars {
            color: #FFC107;
            font-size: 14px;
            margin: 5px 0;
        }
        
        .review-text {
            color: #555;
            line-height: 1.6;
            font-size: 14px;
        }
        
        /* Similar Properties */
        .similar-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        
        .property-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
        
        .property-image {
            position: relative;
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .property-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 12px;
            background: var(--secondary);
            color: white;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .property-card-content {
            padding: 15px;
        }
        
        .property-card-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .property-card-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .property-card-info {
            display: flex;
            gap: 15px;
            font-size: 13px;
            color: #666;
        }
        
        .property-card-info span {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        /* Right Sidebar */
        .property-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        /* Agent Card */
        .agent-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .agent-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
            border: 4px solid var(--primary-light);
        }
        
        .agent-name {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }
        
        .agent-role {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }
        
        .agent-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            text-align: left;
        }
        
        .agent-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #555;
        }
        
        .agent-info-item i {
            width: 20px;
            color: var(--primary);
        }
        
        .contact-btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .contact-btn:hover {
            background: #5a226d;
            transform: translateY(-2px);
        }
        
        /* Request Form */
        .request-form {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .form-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        .form-input, .form-textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .submit-btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            background: #5a226d;
        }
        
        /* Schedule Tour */
        .schedule-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .tour-slots {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .tour-slot {
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .tour-slot:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        
        .tour-date {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .tour-time {
            font-size: 15px;
            font-weight: 600;
            color: var(--dark);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .property-layout {
                grid-template-columns: 1fr;
            }
            
            .property-sidebar {
                order: -1;
            }
        }
        
        @media (max-width: 992px) {
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .amenities-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .similar-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .main-image {
                height: 350px;
            }
            
            .image-thumbnails {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .amenities-grid {
                grid-template-columns: 1fr;
            }
            
            .similar-grid {
                grid-template-columns: 1fr;
            }
            
            .tour-slots {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Breadcrumb -->
        <!-- <div class="breadcrumb">
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <span>/</span>
            <a href="category.php">Properties</a>
            <span>/</span>
            <span><?php echo htmlspecialchars($selected['title']); ?></span>
        </div> -->
        
        <!-- Property Header -->
        <div class="property-header">
            <h1 class="property-title"><?php echo htmlspecialchars($selected['title']); ?></h1>
            <div class="property-location">
                <i class="fas fa-map-marker-alt"></i>
                <span><?php echo htmlspecialchars($selected['location']); ?></span>
            </div>
        </div>
        
        <!-- Main Layout -->
        <div class="property-layout">
            <!-- Left Content -->
            <div class="property-main">
                <!-- Image Gallery -->
                <div class="image-gallery">
                    <div class="main-image" style="background-image: url('<?php echo htmlspecialchars($selected['image']); ?>');">
                        <div class="image-badges">
                            <span class="badge featured">Featured</span>
                            <span class="badge">For Sale</span>
                        </div>
                        <div class="gallery-nav">
                            <button class="gallery-btn"><i class="fas fa-chevron-left"></i></button>
                            <button class="gallery-btn"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="image-thumbnails">
                        <?php for($i = 0; $i < 6; $i++): ?>
                        <div class="thumbnail" style="background-image: url('<?php echo htmlspecialchars($selected['image']); ?>');"></div>
                        <?php endfor; ?>
                    </div>
                </div>
                
                <!-- Price and Info -->
                <div class="price-info">
                    <div class="price-row">
                        <div>
                            <div class="price"><?php echo htmlspecialchars($selected['price']); ?></div>
                            <div class="price-label">Negotiable</div>
                        </div>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-user-tie"></i></div>
                            <div class="info-label">Listed By</div>
                            <div class="info-value"><?php echo htmlspecialchars($selected['listedBy']); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-bed"></i></div>
                            <div class="info-label">Bedrooms</div>
                            <div class="info-value"><?php echo htmlspecialchars($selected['bhk']); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-bath"></i></div>
                            <div class="info-label">Bathrooms</div>
                            <div class="info-value">2</div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon"><i class="fas fa-expand"></i></div>
                            <div class="info-label">Area</div>
                            <div class="info-value"><?php echo htmlspecialchars($selected['area']); ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-align-left"></i>
                        Description
                    </h2>
                    <div class="description-text">
                        <p>This beautiful <?php echo htmlspecialchars($selected['type']); ?> is located in the prime area of <?php echo htmlspecialchars($selected['location']); ?>. The property offers modern amenities and excellent connectivity to major parts of the city.</p>
                        <p>With <?php echo htmlspecialchars($selected['bhk']); ?> bedrooms and spacious living areas spanning <?php echo htmlspecialchars($selected['area']); ?>, this property is perfect for families looking for a comfortable and luxurious living experience.</p>
                    </div>
                </div>
                
                <!-- Amenities -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-check-circle"></i>
                        Amenities
                    </h2>
                    <div class="amenities-grid">
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Air Conditioning</span>
                        </div>
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Swimming Pool</span>
                        </div>
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Gym</span>
                        </div>
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Parking</span>
                        </div>
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Security</span>
                        </div>
                        <div class="amenity-item">
                            <div class="amenity-checkbox"><i class="fas fa-check"></i></div>
                            <span class="amenity-label">Power Backup</span>
                        </div>
                    </div>
                </div>
                
                <!-- Features -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-list"></i>
                        Features
                    </h2>
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>24/7 water supply with bore well backup</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Modular kitchen with chimney and hob</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Vitrified tiles flooring</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Premium quality bathroom fittings</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Covered car parking</span>
                        </div>
                    </div>
                </div>
                
                <!-- Location -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-map-marker-alt"></i>
                        Location
                    </h2>
                    <div class="location-map">
                        <i class="fas fa-map" style="font-size: 48px;"></i>
                        <p style="margin-top: 10px;">Map will be integrated here</p>
                    </div>
                </div>
                
                <!-- Video -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-video"></i>
                        Video
                    </h2>
                    <div class="video-container">
                        <div class="video-placeholder">
                            <button class="play-btn">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Reviews -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-star"></i>
                        Reviews
                    </h2>
                    
                    <div class="rating-summary">
                        <div class="rating-score">4.7</div>
                        <div>
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="rating-count">Based on 156 reviews</div>
                        </div>
                    </div>
                    
                    <div class="rating-filters">
                        <button class="filter-btn active">All Reviews</button>
                        <button class="filter-btn">5 Star (87)</button>
                        <button class="filter-btn">4 Star (52)</button>
                        <button class="filter-btn">3 Star (11)</button>
                        <button class="filter-btn">2 Star (4)</button>
                        <button class="filter-btn">1 Star (2)</button>
                    </div>
                    
                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-avatar">JS</div>
                            <div>
                                <div class="reviewer-name">John Smith</div>
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="review-date">January 15, 2025</div>
                            </div>
                        </div>
                        <div class="review-text">
                            Absolutely loved this property! The location is perfect and the house has everything we were looking for. The agent was very helpful throughout the process. Highly recommend!
                        </div>
                    </div>
                    
                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-avatar">GA</div>
                            <div>
                                <div class="reviewer-name">Gary Alfison</div>
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="review-date">January 10, 2025</div>
                            </div>
                        </div>
                        <div class="review-text">
                            Great house! The kitchen is modern and the living room is very spacious. The only downside is that the street can be a bit noisy, but it's not too bad. Overall a very solid property.
                        </div>
                    </div>
                </div>
                
                <!-- Similar Properties -->
                <div class="description-section">
                    <h2 class="section-title">
                        <i class="fas fa-home"></i>
                        Similar Properties
                    </h2>
                    <div class="similar-grid">
                        <?php 
                        $count = 0;
                        foreach($properties as $prop): 
                            if($prop['id'] != $selected['id'] && $count < 3):
                                $count++;
                        ?>
                        <div class="property-card" onclick="window.location.href='view_details.php?id=<?php echo $prop['id']; ?>'">
                            <div class="property-image" style="background-image: url('<?php echo htmlspecialchars($prop['image']); ?>');">
                                <span class="property-badge">For Sale</span>
                            </div>
                            <div class="property-card-content">
                                <h3 class="property-card-title"><?php echo htmlspecialchars($prop['title']); ?></h3>
                                <div class="property-card-price"><?php echo htmlspecialchars($prop['price']); ?></div>
                                <div class="property-card-info">
                                    <span><i class="fas fa-bed"></i> <?php echo htmlspecialchars($prop['bhk']); ?></span>
                                    <span><i class="fas fa-bath"></i> 2</span>
                                    <span><i class="fas fa-expand"></i> <?php echo htmlspecialchars($prop['area']); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Sidebar -->
            <div class="property-sidebar">
                <!-- Agent Card -->
                <div class="agent-card">
                    <img src="<?php echo $profile_pic; ?>" alt="Agent" class="agent-avatar">
                    <h3 class="agent-name">Rakesh</h3>
                    <p class="agent-role">Property Agent</p>
                    <div class="agent-info">
                        <div class="agent-info-item">
                            <i class="fas fa-phone"></i>
                            <span>+91 9384750405</span>
                        </div>
                        <div class="agent-info-item">
                            <i class="fas fa-envelope"></i>
                            <span>rakesh@truebroker.com</span>
                        </div>
                    </div>
                    <button class="contact-btn">Contact Agent</button>
                </div>
                
                <!-- Schedule Tour -->
                <div class="schedule-card">
                    <h3 class="form-title">Schedule a Tour</h3>
                    <div class="tour-slots">
                        <div class="tour-slot">
                            <div class="tour-date">20 Jan</div>
                            <div class="tour-time">10:00 AM</div>
                        </div>
                        <div class="tour-slot">
                            <div class="tour-date">20 Jan</div>
                            <div class="tour-time">11:00 AM</div>
                        </div>
                        <div class="tour-slot">
                            <div class="tour-date">21 Jan</div>
                            <div class="tour-time">10:00 AM</div>
                        </div>
                        <div class="tour-slot">
                            <div class="tour-date">21 Jan</div>
                            <div class="tour-time">02:00 PM</div>
                        </div>
                    </div>
                    <button class="submit-btn">Book a Tour</button>
                </div>
                
                <!-- Request Information -->
                <div class="request-form">
                    <h3 class="form-title">Request Information</h3>
                    <form>
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-input" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" placeholder="your.email@example.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-input" placeholder="+91 9876543210">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea class="form-textarea" placeholder="I'm interested in this property..."></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Contact Agent Button
        document.querySelector('.contact-btn')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Contact Agent',
                html: `
                    <div style="text-align: left; padding: 10px;">
                        <p><strong>Phone:</strong> +91 9384750405</p>
                        <p><strong>Email:</strong> rakesh@truebroker.com</p>
                        <p style="margin-top: 15px;">Or fill out the Request Information form to send a message.</p>
                    </div>
                `,
                icon: 'info',
                confirmButtonColor: '#742B88',
                confirmButtonText: 'OK'
            });
        });

        // Book Tour Button
        document.querySelectorAll('.submit-btn')[0]?.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedSlot = document.querySelector('.tour-slot.active');
            if (!selectedSlot) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Select a Time Slot',
                    text: 'Please select a time slot for your tour',
                    confirmButtonColor: '#742B88'
                });
                return;
            }
            
            Swal.fire({
                icon: 'success',
                title: 'Tour Booked!',
                text: 'Your property tour has been scheduled successfully',
                confirmButtonColor: '#742B88'
            });
        });

        // Tour Slot Selection
        document.querySelectorAll('.tour-slot').forEach(slot => {
            slot.addEventListener('click', function() {
                document.querySelectorAll('.tour-slot').forEach(s => s.classList.remove('active'));
                this.classList.add('active');
                this.style.borderColor = '#742B88';
                this.style.background = '#f2e8f7';
            });
        });

        // Request Form Submission
        document.querySelector('.request-form form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Message Sent!',
                text: 'The agent will contact you soon',
                confirmButtonColor: '#742B88'
            });
        });

        // Review Filters
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
<!-- hello how are you -->