<?php
session_start();
// === AUTO CREATE UPLOADS FOLDER ===
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
// === DEFAULT VALUES ===
$default_pic = 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png';
// === GET CURRENT DATA FROM SESSION ===
$profile_pic = $_SESSION['profile_pic'] ?? $default_pic;
$user_name   = $_SESSION['user_name'] ?? 'Guest User';
$location    = $_SESSION['location'] ?? 'Coimbatore, Tamilnadu';
// === HANDLE UPLOAD & NAME/LOCATION UPDATE ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update name & location
    if (!empty($_POST['fullname'])) $_SESSION['user_name'] = trim($_POST['fullname']);
    if (!empty($_POST['location'])) $_SESSION['location'] = trim($_POST['location']);
    // Upload picture
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $file = $_FILES['profile_pic'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];
        if (in_array($ext, $allowed) && $file['size'] < 5000000) {
            $new_path = $upload_dir . 'profile_' . session_id() . '.' . $ext;
            if (move_uploaded_file($file['tmp_name'], $new_path)) {
                $_SESSION['profile_pic'] = $new_path;
            }
        }
    }
    header("Location: my_profile.php");
    exit;
}
?>
<?php include 'header.php'; ?>
<br><br><br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | RealEstatePro</title>
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
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            margin-top: 30px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .profile-header h1 {
            font-size: 24px;
            color: var(--dark);
        }
        
        /* Main Layout */
        .profile-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 25px;
        }
        
        /* Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 25px;
            position: sticky;
            top: 20px;
            height: fit-content;
        }
        
        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary-light);
            margin: 0 auto 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .profile-info h2 {
            font-size: 20px;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .user-type {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        
        .profile-meta {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .profile-meta i {
            margin-right: 5px;
            width: 16px;
            text-align: center;
        }

        /* Token Balance Section */
        .token-balance {
            background: var(--primary-light);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid rgba(116, 43, 136, 0.1);
        }

        .token-balance h3 {
            font-size: 16px;
            color: var(--primary);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .balance-amount {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .balance-amount i {
            margin-right: 8px;
            color: var(--accent);
        }

        .token-value {
            font-size: 14px;
            color: var(--gray);
            margin-bottom: 15px;
        }

        .btn-token {
            background: var(--secondary);
            margin-top: 0;
        }

        .btn-token:hover {
            background: #197a36;
        }
        
        .profile-nav {
            margin: 25px 0;
        }
        
        .profile-nav a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin: 5px 0;
            color: var(--dark);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .profile-nav a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            font-size: 16px;
        }
        
        .profile-nav a.active, 
        .profile-nav a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }
        
        .profile-nav a.active {
            font-weight: 600;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn:hover {
            background: #5a226d;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-logout {
            background: var(--danger);
            margin-top: 20px;
        }
        
        .btn-logout:hover {
            background: #c0392b;
        }
        
        /* Main Content */
        .profile-content {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 25px;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            cursor: pointer;
        }
        
        .content-header h2 {
            font-size: 22px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }
        
        .content-header h2 i {
            margin-right: 10px;
            color: var(--primary);
            transition: transform 0.3s;
        }
        
        .content-header.collapsed h2 i {
            transform: rotate(-90deg);
        }
        
        .search-filter {
            display: flex;
            gap: 10px;
        }
        
        .search-input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            min-width: 200px;
        }
        
        .filter-select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Property Cards */
        .property-card {
            display: grid;
            grid-template-columns: 150px 1fr auto;
            gap: 20px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }
        
        .property-card.hidden {
            opacity: 0;
            transform: translateY(15px);
            height: 0;
            margin: 0;
            padding-top: 0;
            padding-bottom: 0;
            border: none;
            overflow: hidden;
        }
        
        .property-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
            border-color: var(--primary-light);
        }
        
        .property-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        .property-details {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .property-details h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .property-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        
        .property-meta span {
            display: flex;
            align-items: center;
        }
        
        .property-meta i {
            margin-right: 5px;
            color: var(--primary);
        }
        
        .property-date {
            font-size: 13px;
            color: var(--gray);
        }
        
        .property-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-available {
            background: var(--secondary-light);
            color: var(--success);
        }
        
        .status-sold {
            background: #fdedee;
            color: var(--danger);
        }
        
        .status-pending {
            background: #fef5e7;
            color: var(--warning);
        }
        
        .property-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
        }
        
        .property-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .edit-btn {
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary-light);
        }
        
        .edit-btn:hover {
            background: var(--primary);
            color: white;
        }
        
        .delete-btn {
            background: #fdedee;
            color: var(--danger);
            border: 1px solid #fdedee;
        }
        
        .delete-btn:hover {
            background: var(--danger);
            color: white;
        }
        
        /* Settings Form */
        .settings-form {
            max-width: 600px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(116, 43, 136, 0.1);
        }
        
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }
        
        .file-upload-label i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        /* Collapsible sections */
        .collapsible-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        /* Notifications */
        .notifications {
            position: relative;
            cursor: pointer;
            font-size: 20px;
            color: var(--dark);
        }
        
        .notification-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 90%;
        }
        
        .close-modal {
            float: right;
            font-size: 24px;
            font-weight: bold;
            color: var(--gray);
            cursor: pointer;
        }
        
        .close-modal:hover {
            color: var(--dark);
        }
        
        /* Saved Properties Styles */
        .saved-property-card {
            display: flex;
            gap: 15px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .saved-property-card:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .saved-property-img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        .saved-property-details {
            flex: 1;
        }
        
        .saved-property-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .saved-property-price {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .saved-property-location {
            font-size: 13px;
            color: var(--gray);
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .saved-property-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .saved-property-remove {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .saved-property-view {
            color: var(--primary);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .empty-saved {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray);
        }
        
        .empty-saved i {
            font-size: 48px;
            color: var(--primary-light);
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
            
            .profile-sidebar {
                position: static;
                margin-bottom: 25px;
            }
            
            .property-card {
                grid-template-columns: 120px 1fr;
            }
            
            .property-status {
                grid-column: span 2;
                flex-direction: row;
                align-items: center;
                margin-top: 15px;
            }
            
            .saved-property-card {
                flex-direction: column;
            }
            
            .saved-property-img {
                width: 100%;
                height: 150px;
            }
        }
        
        @media (max-width: 768px) {
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .search-filter {
                width: 100%;
                flex-direction: column;
            }
            
            .search-input, .filter-select {
                width: 100%;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 576px) {
            .property-card {
                grid-template-columns: 1fr;
            }
            
            .property-img {
                height: 180px;
            }
            
            .property-status {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="profile-header">
            <h1>My Profile</h1>
            <div class="notifications">
                <i class="fas fa-bell"></i>
                <span class="notification-count">3</span>
            </div>
        </header>
        
        <div class="profile-container">
            <aside class="profile-sidebar">
              <div class="profile-info">
               <div style="position:relative;display:inline-block;">
    <img src="<?= htmlspecialchars($profile_pic) ?>" class="profile-pic" alt="Profile" id="displayPic">
    
    <!-- Camera Icon + Hidden Upload Form -->
    <form method="POST" enctype="multipart/form-data" id="picForm" style="margin:0;">
        <label for="picUpload" style="position:absolute;bottom:10px;right:10px;background:var(--primary);color:white;width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 4px 15px rgba(0,0,0,0.3);">
            <i class="fas fa-camera"></i>
        </label>
        <input type="file" name="profile_pic" id="picUpload" accept="image/*" style="display:none;">
    </form>
</div>
               <h2 id="profile-name"><?= htmlspecialchars($user_name) ?></h2>
<p class="profile-meta"><i class="fas fa-map-marker-alt"></i> <span id="profile-location"><?= htmlspecialchars($location) ?></span></p>                <p class="profile-meta"><i class="fas fa-calendar-alt"></i> Member since <?php echo isset($_SESSION['join_date']) ? date('Y', strtotime($_SESSION['join_date'])) : '2022'; ?></p>
                <button class="btn" id="edit-profile-btn"><i class="fas fa-edit"></i> Edit Profile</button>
              </div>

              <!-- Token Balance Section -->
              <div class="token-balance">
                  <h3>My Tokens</h3>
                  <div class="balance-amount">
                      <i class="fas fa-coins"></i>
                      <span id="token-count">1,250</span>
                  </div>
                  <p class="token-value">≈ ₹12,500</p>
                  <a href="PurchaseCoin.php" class="btn btn-token">
                      <i class="fas fa-plus"></i> Buy Tokens
                  </a>
              </div>
                
                <nav class="profile-nav">
                    <a href="#" class="active" data-tab="listings"><i class="fas fa-home"></i> My Listings</a>
                    <a href="#" data-tab="saved"><i class="fas fa-heart"></i> Saved Properties</a>
                    <a href="#" data-tab="messages"><i class="fas fa-envelope"></i> Messages</a>
                    <a href="#" data-tab="transactions"><i class="fas fa-receipt"></i> Transactions</a>
                    <a href="#" data-tab="settings"><i class="fas fa-cog"></i> Settings</a>
                </nav>
                
                <button class="btn btn-logout" id="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </aside>
            
            <main class="profile-content">
                <!-- Listings Tab -->
                <div id="listings" class="tab-content active">
                    <div class="content-header collapsed" id="listings-header">
                        <h2><i class="fas fa-chevron-down"></i> My Listings (<span id="listingCount">2</span>)</h2>
                        <div class="search-filter">
                            <input type="text" id="searchInput" class="search-input" placeholder="Search properties...">
                            <select id="statusFilter" class="filter-select">
                                <option value="all">All Status</option>
                                <option value="available">Available</option>
                                <option value="sold">Sold/Rented</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="collapsible-content" id="listings-content" style="max-height: 1000px;">
                        <div class="property-card" data-status="available" data-title="Modern Apartment in Manhattan">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="property-img" alt="Modern Apartment">
                            <div class="property-details">
                                <div>
                                    <h3>Modern Apartment in Manhattan</h3>
                                    <div class="property-meta">
                                        <span><i class="fas fa-bed"></i> 3 Beds</span>
                                        <span><i class="fas fa-bath"></i> 2 Baths</span>
                                        <span><i class="fas fa-vector-square"></i> 1200 sqft</span>
                                        <span><i class="fas fa-building"></i> Apartment</span>
                                    </div>
                                    <p class="property-date">Listed: May 15, 2023</p>
                                </div>
                                <div class="property-actions">
                                    <button class="action-btn edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="action-btn delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                            <div class="property-status">
                                <span class="status-badge status-available">Available</span>
                                <div class="property-price">₹12,00,000</div>
                            </div>
                        </div>
                        
                        <div class="property-card" data-status="sold" data-title="Luxury Villa in Miami">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" class="property-img" alt="Luxury Villa">
                            <div class="property-details">
                                <div>
                                    <h3>Luxury Villa in Miami</h3>
                                    <div class="property-meta">
                                        <span><i class="fas fa-bed"></i> 5 Beds</span>
                                        <span><i class="fas fa-bath"></i> 4 Baths</span>
                                        <span><i class="fas fa-vector-square"></i> 3200 sqft</span>
                                        <span><i class="fas fa-home"></i> Villa</span>
                                    </div>
                                    <p class="property-date">Listed: Apr 10, 2023</p>
                                </div>
                                <div class="property-actions">
                                    <button class="action-btn edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="action-btn delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                            <div class="property-status">
                                <span class="status-badge status-sold">Sold</span>
                                <div class="property-price">₹25,00,000</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Saved Properties Tab -->
                <div id="saved" class="tab-content">
                    <div class="content-header collapsed" id="saved-header">
                        <h2><i class="fas fa-chevron-down"></i> Saved Properties (<span id="saved-count">0</span>)</h2>
                        <div class="search-filter">
                            <input type="text" class="search-input" placeholder="Search saved properties..." id="saved-search">
                            <select class="filter-select" id="saved-filter">
                                <option value="all">All Types</option>
                                <option value="plot">Plots</option>
                                <option value="apartment">Apartments</option>
                                <option value="villa">Villas</option>
                                <option value="house">Houses</option>
                                <option value="commercial">Commercial</option>
                            </select>
                        </div>
                    </div>
                    <div class="collapsible-content" id="saved-content">
                        <div id="saved-properties-container">
                            <div class="empty-saved">
                                <i class="fas fa-heart"></i>
                                <h3>No saved properties yet</h3>
                                <p>Browse properties and save your favorites to view them here</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Messages Tab -->
                <div id="messages" class="tab-content">
                    <div class="content-header collapsed" id="messages-header">
                        <h2><i class="fas fa-chevron-down"></i> Messages</h2>
                        <div class="search-filter">
                            <input type="text" class="search-input" placeholder="Search messages...">
                        </div>
                    </div>
                    <div class="collapsible-content" id="messages-content">
                        <p style="text-align: center; padding: 40px; color: var(--gray);">Your messages will appear here when you receive them.</p>
                    </div>
                </div>
                
                <!-- Transactions Tab -->
                <div id="transactions" class="tab-content">
                    <div class="content-header collapsed" id="transactions-header">
                        <h2><i class="fas fa-chevron-down"></i> Transaction History</h2>
                        <div class="search-filter">
                            <select class="filter-select">
                                <option>All Transactions</option>
                                <option>Sales</option>
                                <option>Purchases</option>
                                <option>Rentals</option>
                            </select>
                        </div>
                    </div>
                    <div class="collapsible-content" id="transactions-content">
                        <p style="text-align: center; padding: 40px; color: var(--gray);">Your transaction history will be displayed here.</p>
                    </div>
                </div>
                
                <!-- Settings Tab -->
                <div id="settings" class="tab-content">
                    <div class="content-header collapsed" id="settings-header">
                        <h2><i class="fas fa-chevron-down"></i> Account Settings</h2>
                    </div>
                    <div class="collapsible-content" id="settings-content">
                        <form class="settings-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Location</label>
                                <select class="form-control">
                                    <option>Coimbatore, Tamilnadu</option>
                                    <option>Theni, Tamilnadu</option>
                                    <option>Madurai, Tamilnadu</option>
                                    <option>Karur, Tamilnadu</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Profile Photo</label>
                                <div class="file-upload">
                                    <input type="file" id="profile-photo" class="file-upload-input" accept="image/*">
                                    <label for="profile-photo" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i> Choose a photo
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            
                            <button type="submit" class="btn">Save Changes</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal" id="profile-edit-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Edit Profile</h2>
            <form id="profile-edit-form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" id="edit-fullname" name="fullname" class="form-control" 
                           value="<?php echo htmlspecialchars($user_name); ?>">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" id="edit-location" name="location" class="form-control" 
                           value="<?php echo htmlspecialchars($location); ?>">
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <div class="file-upload">
                        <input type="file" id="edit-profile-pic" name="profile_pic" class="file-upload-input" accept="image/*">
                        <label for="edit-profile-pic" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i> Change Photo
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn">Update Profile</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // === SAVED PROPERTIES - COMPLETE FIX ===
        
        // Get saved properties from localStorage
        let savedProperties = JSON.parse(localStorage.getItem('savedProperties')) || [];
        
        // Update saved count
        document.getElementById('saved-count').textContent = savedProperties.length;

        // Token system
        let tokenBalance = localStorage.getItem('tokenBalance') || 1250;
        document.getElementById('token-count').textContent = tokenBalance.toLocaleString();

        // Function to load saved properties
        function loadSavedProperties() {
            const savedContainer = document.getElementById('saved-properties-container');
            const savedCount = document.getElementById('saved-count');
            
            // Get fresh data from localStorage
            savedProperties = JSON.parse(localStorage.getItem('savedProperties')) || [];
            
            // Update count
            savedCount.textContent = savedProperties.length;
            
            if (savedProperties.length === 0) {
                savedContainer.innerHTML = `
                    <div class="empty-saved">
                        <i class="fas fa-heart"></i>
                        <h3>No saved properties yet</h3>
                        <p>Browse properties and save your favorites to view them here</p>
                    </div>
                `;
                return;
            }
            
            // Get search and filter values
            const searchValue = document.getElementById('saved-search')?.value.toLowerCase() || '';
            const filterValue = document.getElementById('saved-filter')?.value.toLowerCase() || 'all';
            
            // Filter saved properties
            let filteredProps = savedProperties.filter(property => {
                const matchesSearch = 
                    (property.title || '').toLowerCase().includes(searchValue) ||
                    (property.location || '').toLowerCase().includes(searchValue);
                
                const matchesType = 
                    filterValue === 'all' || 
                    (property.type || '').toLowerCase() === filterValue;
                
                return matchesSearch && matchesType;
            });
            
            if (filteredProps.length === 0) {
                savedContainer.innerHTML = `
                    <div class="empty-saved">
                        <i class="fas fa-search"></i>
                        <h3>No properties found</h3>
                        <p>Try adjusting your search or filter criteria</p>
                    </div>
                `;
                return;
            }
            
            // Generate HTML for saved properties
            savedContainer.innerHTML = filteredProps.map(property => `
                <div class="saved-property-card" data-id="${property.id}">
                    <img src="${property.image || 'https://via.placeholder.com/120x90'}" 
                         alt="${property.title}" 
                         class="saved-property-img"
                         onerror="this.src='https://via.placeholder.com/120x90?text=No+Image'">
                    <div class="saved-property-details">
                        <h3 class="saved-property-title">${property.title || 'Untitled Property'}</h3>
                        <div class="saved-property-price">${property.price || 'Price not available'}</div>
                        <div class="saved-property-location">
                            <i class="fas fa-map-marker-alt"></i> ${property.location || 'Location not specified'}
                        </div>
                        <div class="property-meta" style="margin-top: 8px; font-size: 13px; color: #666;">
                            ${property.bedrooms ? `<span><i class="fas fa-bed"></i> ${property.bedrooms} Beds</span>` : ''}
                            ${property.bathrooms ? `<span style="margin-left: 10px;"><i class="fas fa-bath"></i> ${property.bathrooms} Baths</span>` : ''}
                            ${property.area ? `<span style="margin-left: 10px;"><i class="fas fa-vector-square"></i> ${property.area}</span>` : ''}
                        </div>
                        <div class="saved-property-actions">
                            <button class="saved-property-view" onclick="viewSavedProperty('${property.id}')">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="saved-property-remove" onclick="removeSavedProperty('${property.id}')">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Function to remove a saved property
        function removeSavedProperty(id) {
            savedProperties = savedProperties.filter(property => property.id !== id);
            localStorage.setItem('savedProperties', JSON.stringify(savedProperties));
            
            // Show toast notification
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Property removed from saved',
                showConfirmButton: false,
                timer: 1500
            });
            
            // Reload saved properties
            loadSavedProperties();
        }

        // Function to view a saved property
        function viewSavedProperty(id) {
            // Redirect to property page with ID
            window.location.href = `property.php?id=${id}`;
        }

        // Function to handle search and filter for saved properties
        function setupSavedSearchFilter() {
            const savedSearch = document.getElementById('saved-search');
            const savedFilter = document.getElementById('saved-filter');
            
            if (savedSearch) {
                savedSearch.addEventListener('input', loadSavedProperties);
            }
            
            if (savedFilter) {
                savedFilter.addEventListener('change', loadSavedProperties);
            }
        }

        // Tab switching functionality
        function handleTabSwitch() {
            document.querySelectorAll('.profile-nav a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all
                    document.querySelectorAll('.profile-nav a').forEach(el => {
                        el.classList.remove('active');
                    });
                    
                    // Add active to clicked
                    this.classList.add('active');
                    
                    // Hide all tab contents
                    document.querySelectorAll('.tab-content').forEach(tab => {
                        tab.classList.remove('active');
                    });
                    
                    // Show selected tab
                    const tabId = this.getAttribute('data-tab');
                    const tabElement = document.getElementById(tabId);
                    if (tabElement) {
                        tabElement.classList.add('active');
                    }
                    
                    // Collapse all sections when switching tabs
                    document.querySelectorAll('.collapsible-content').forEach(content => {
                        content.style.maxHeight = null;
                    });
                    document.querySelectorAll('.content-header').forEach(header => {
                        header.classList.add('collapsed');
                    });
                    
                    // Expand the current tab's content
                    const currentHeader = document.getElementById(`${tabId}-header`);
                    const currentContent = document.getElementById(`${tabId}-content`);
                    if (currentHeader && currentContent) {
                        currentHeader.classList.remove('collapsed');
                        currentContent.style.maxHeight = currentContent.scrollHeight + "px";
                    }
                    
                    // If saved tab is clicked, reload saved properties
                    if (tabId === 'saved') {
                        loadSavedProperties();
                    }
                });
            });
        }

        // Toggle collapsible sections
        function setupCollapsibleSections() {
            document.querySelectorAll('.content-header').forEach(header => {
                header.addEventListener('click', function() {
                    this.classList.toggle('collapsed');
                    const content = document.getElementById(this.id.replace('-header', '-content'));
                    if (content) {
                        content.style.maxHeight = this.classList.contains('collapsed') ? null : content.scrollHeight + "px";
                    }
                });
            });
        }

        // Delete button confirmation
        function setupDeleteButtons() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#742B88',
                        cancelButtonColor: '#95a5a6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const propertyCard = this.closest('.property-card');
                            if (propertyCard) {
                                propertyCard.classList.add('hidden');
                                setTimeout(() => {
                                    propertyCard.remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your property has been removed.',
                                        'success'
                                    );
                                }, 300);
                            }
                        }
                    });
                });
            });
        }

        // Settings form submission
        function setupSettingsForm() {
            const settingsForm = document.querySelector('.settings-form');
            if (settingsForm) {
                settingsForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your changes have been saved',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            }
        }

        // Notification bell
        function setupNotificationBell() {
            const notificationBell = document.querySelector('.notifications');
            if (notificationBell) {
                notificationBell.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Notifications',
                        html: `
                            <div style="text-align: left; max-height: 300px; overflow-y: auto;">
                                <div style="padding: 10px; border-bottom: 1px solid #eee;">
                                    <strong>New message</strong><br>
                                    <small>From: Mugeshkumar G</small><br>
                                    <small>2 hours ago</small>
                                </div>
                                <div style="padding: 10px; border-bottom: 1px solid #eee;">
                                    <strong>Viewing scheduled</strong><br>
                                    <small>Modern Apartment in Manhattan</small><br>
                                    <small>Yesterday</small>
                                </div>
                                <div style="padding: 10px; border-bottom: 1px solid #eee;">
                                    <strong>Payment received</strong><br>
                                    <small>For Countryside House in Vermont</small><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                        `,
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                });
            }
        }

        // Profile edit modal
        function setupProfileEditModal() {
            const editProfileBtn = document.getElementById('edit-profile-btn');
            const profileEditModal = document.getElementById('profile-edit-modal');
            const closeModal = document.querySelector('.close-modal');
            const profileEditForm = document.getElementById('profile-edit-form');
            
            if (editProfileBtn && profileEditModal) {
                editProfileBtn.addEventListener('click', function() {
                    profileEditModal.style.display = 'block';
                });
                
                if (closeModal) {
                    closeModal.addEventListener('click', function() {
                        profileEditModal.style.display = 'none';
                    });
                }
                
                window.addEventListener('click', function(event) {
                    if (event.target === profileEditModal) {
                        profileEditModal.style.display = 'none';
                    }
                });
            }
            
            if (profileEditForm) {
                profileEditForm.addEventListener('submit', function(e) {
                    // Let the form submit naturally to PHP for processing
                    // PHP will handle the redirect
                });
            }
        }

        // Logout functionality
        function setupLogoutButton() {
            const logoutBtn = document.getElementById('logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Are you sure you want to logout?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#742B88',
                        cancelButtonColor: '#95a5a6',
                        confirmButtonText: 'Yes, logout'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'Logoutpage.php';
                        }
                    });
                });
            }
        }

        // MY LISTINGS FILTER & SEARCH
        function setupListingsFilter() {
            const cards = document.querySelectorAll("#listings-content .property-card");
            const statusFilter = document.getElementById("statusFilter");
            const searchInput = document.getElementById("searchInput");
            const listingCount = document.getElementById("listingCount");

            function filterListings() {
                let visible = 0;
                const filterValue = statusFilter.value.toLowerCase();
                const searchTerm = searchInput.value.toLowerCase();

                cards.forEach(card => {
                    const status = card.getAttribute("data-status");
                    const title = card.getAttribute("data-title").toLowerCase();

                    const matchesStatus = filterValue === "all" || status === filterValue;
                    const matchesSearch = title.includes(searchTerm);

                    if (matchesStatus && matchesSearch) {
                        card.classList.remove("hidden");
                        visible++;
                    } else {
                        card.classList.add("hidden");
                    }
                });

                listingCount.textContent = visible;
            }

            // Trigger filter on change/input
            if (statusFilter) statusFilter.addEventListener("change", filterListings);
            if (searchInput) searchInput.addEventListener("input", filterListings);

            // Initial count
            listingCount.textContent = cards.length;
        }

        // Auto upload when photo selected
        function setupProfilePicUpload() {
            const picUpload = document.getElementById('picUpload');
            if (picUpload) {
                picUpload.addEventListener('change', function() {
                    if (this.files[0]) {
                        document.getElementById('picForm').submit();
                    }
                });
            }
        }

        // Initialize all functionality when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            handleTabSwitch();
            setupCollapsibleSections();
            setupDeleteButtons();
            setupSettingsForm();
            setupNotificationBell();
            setupProfileEditModal();
            setupLogoutButton();
            setupSavedSearchFilter();
            setupListingsFilter();
            setupProfilePicUpload();
            
            // Initialize the first tab as expanded
            const listingsHeader = document.getElementById('listings-header');
            const listingsContent = document.getElementById('listings-content');
            if (listingsHeader && listingsContent) {
                listingsHeader.classList.remove('collapsed');
                listingsContent.style.maxHeight = listingsContent.scrollHeight + "px";
            }
            
            // Load saved properties if we're on the saved tab
            if (window.location.hash === '#saved') {
                document.querySelector('.profile-nav a[data-tab="saved"]').click();
            }
        });
    </script>
<?php include 'footer.php'; ?>
</body>
</html>