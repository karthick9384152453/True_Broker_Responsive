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
    
    <!-- YOUR EXISTING CSS - DON'T CHANGE ANYTHING -->
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
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ebf0 100%);
            color: var(--dark);
            line-height: 1.6;
            padding-top: 80px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Back Button */
        .back-navigation {
            margin-bottom: 25px;
            animation: slideInLeft 0.5s ease;
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: white;
            color: var(--primary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 2px solid var(--primary-light);
        }
        
        .back-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateX(-5px);
            box-shadow: 0 4px 15px rgba(116, 43, 136, 0.3);
        }

        /* Main Layout - Two Column */
        .details-layout {
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 25px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Sidebar - Category Card */
        .category-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .category-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        
        /* Category Image */
        .category-image-large {
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        
        .category-image-large::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.5) 100%);
        }
        
        /* Category Info */
        .category-info {
            padding: 25px;
        }
        
        .category-name {
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 15px;
            font-weight: 700;
            line-height: 1.2;
        }
        
        .category-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: var(--light);
            border-radius: 8px;
            font-size: 14px;
        }

        .meta-item i {
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        .meta-item strong {
            color: var(--dark);
            min-width: 80px;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background: var(--secondary-light);
            color: var(--success);
        }
        
        .status-inactive {
            background: #fdedee;
            color: var(--danger);
        }

        /* Action Buttons in Sidebar */
        .sidebar-actions {
            display: flex;
            gap: 10px;
            padding: 20px;
            background: var(--light);
            border-top: 2px solid #e0e0e0;
        }

        .sidebar-btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
        }

        .btn-edit:hover {
            background: #5a226d;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(116, 43, 136, 0.3);
        }

        .btn-delete {
            background: var(--danger);
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }
        
        /* Right Content Area */
        .category-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .content-section {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }

        .content-section:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.12);
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--primary-light);
        }

        .section-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, #5a226d 100%);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .section-title {
            font-size: 22px;
            color: var(--dark);
            font-weight: 700;
            margin: 0;
        }
        
        .category-description {
            line-height: 1.9;
            color: #555;
            font-size: 16px;
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid var(--primary);
        }

        .category-description p {
            margin-bottom: 12px;
        }

        .category-description p:last-child {
            margin-bottom: 0;
        }
        
        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, #5a226d 100%);
            padding: 25px;
            border-radius: 14px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 15px rgba(116, 43, 136, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transition: transform 0.5s ease;
        }

        .stat-card:hover::before {
            transform: scale(1.2);
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 8px 25px rgba(116, 43, 136, 0.35);
        }
        
        .stat-card.secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #197a36 100%);
        }
        
        .stat-card.accent {
            background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);
        }

        .stat-card.info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }
        
        .stat-icon {
            font-size: 38px;
            margin-bottom: 12px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }
        
        .stat-label {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }
        
        .stat-value {
            font-size: 20px;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .details-layout {
                grid-template-columns: 350px 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .details-layout {
                grid-template-columns: 1fr;
            }

            .category-sidebar {
                order: -1;
            }

            .category-image-large {
                height: 250px;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }

            .container {
                padding: 15px;
            }

            .back-navigation {
                margin-bottom: 20px;
            }

            .back-btn {
                width: 100%;
                justify-content: center;
                padding: 14px;
            }
            
            .category-image-large {
                height: 220px;
            }
            
            .category-info {
                padding: 20px;
            }
            
            .category-name {
                font-size: 24px;
            }

            .content-section {
                padding: 20px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .section-title {
                font-size: 20px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 18px;
            }

            .sidebar-actions {
                flex-direction: column;
                gap: 12px;
            }

            .sidebar-btn {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .category-image-large {
                height: 200px;
            }

            .category-name {
                font-size: 22px;
            }

            .meta-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .meta-item strong {
                min-width: auto;
            }

            .stat-icon {
                font-size: 32px;
            }

            .stat-value {
                font-size: 16px;
            }
        }

        @media (max-width: 400px) {
            .category-description {
                padding: 15px;
                font-size: 15px;
            }

            .content-section {
                padding: 15px;
            }

            .section-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Back Button -->
        <div class="back-navigation">
            <a href="./category.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Properties
            </a>
        </div>
        
        <!-- Main Layout -->
        <div class="details-layout">
            <!-- Left Sidebar -->
            <div class="category-sidebar">
                <div class="category-card">
                    <!-- Property Image -->
                    <div class="category-image-large" style="background-image: url('<?php echo htmlspecialchars($selected['image']); ?>');">
                    </div>
                    
                    <!-- Property Info -->
                    <div class="category-info">
                        <h1 class="category-name"><?php echo htmlspecialchars($selected['title']); ?></h1>
                        
                        <div class="category-meta">
                            <div class="meta-item">
                                <i class="fas fa-tag"></i>
                                <strong>ID:</strong>
                                <span><?php echo htmlspecialchars($selected['id']); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <strong>Location:</strong>
                                <span><?php echo htmlspecialchars($selected['location']); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-home"></i>
                                <strong>Type:</strong>
                                <span><?php echo htmlspecialchars($selected['type']); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-bed"></i>
                                <strong>BHK:</strong>
                                <span><?php echo htmlspecialchars($selected['bhk']); ?></span>
                            </div>
                            
                            <div class="meta-item">
                                <i class="fas fa-rupee-sign"></i>
                                <strong>Price:</strong>
                                <span class="status-badge status-active">
                                    <?php echo htmlspecialchars($selected['price']); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="sidebar-actions">
                        <button class="sidebar-btn btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="sidebar-btn btn-delete" id="delete-category">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Right Content -->
            <div class="category-content">
                <!-- Description Section -->
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3 class="section-title">Property Details</h3>
                    </div>
                    <div class="category-description">
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($selected['location']); ?></p>
                        <p><strong>Area:</strong> <?php echo htmlspecialchars($selected['area']); ?></p>
                        <p><strong>Listed By:</strong> <?php echo htmlspecialchars($selected['listedBy']); ?></p>
                        <p><strong>Category:</strong> <?php echo htmlspecialchars($selected['category']); ?></p>
                    </div>
                </div>
                
                <!-- Statistics Section -->
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="section-title">Property Information</h3>
                    </div>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="stat-label">Property Type</div>
                            <div class="stat-value"><?php echo htmlspecialchars($selected['type']); ?></div>
                        </div>
                        
                        <div class="stat-card secondary">
                            <div class="stat-icon">
                                <i class="fas fa-bed"></i>
                            </div>
                            <div class="stat-label">BHK</div>
                            <div class="stat-value"><?php echo htmlspecialchars($selected['bhk']); ?></div>
                        </div>
                        
                        <div class="stat-card accent">
                            <div class="stat-icon">
                                <i class="fas fa-expand"></i>
                            </div>
                            <div class="stat-label">Area</div>
                            <div class="stat-value"><?php echo htmlspecialchars($selected['area']); ?></div>
                        </div>

                        <div class="stat-card info">
                            <div class="stat-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="stat-label">Listed By</div>
                            <div class="stat-value"><?php echo htmlspecialchars($selected['listedBy']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Delete property confirmation
        document.getElementById('delete-category')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#742B88',
                cancelButtonColor: '#95a5a6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Property has been deleted.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'categories.php';
                    });
                }
            });
        });

        // Edit button functionality
        document.querySelector('.btn-edit')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Edit Property',
                html: `
                    <input type="text" id="edit-name" class="swal2-input" placeholder="Property Title" value="<?php echo htmlspecialchars($selected['title']); ?>">
                    <input type="text" id="edit-location" class="swal2-input" placeholder="Location" value="<?php echo htmlspecialchars($selected['location']); ?>">
                `,
                showCancelButton: true,
                confirmButtonColor: '#742B88',
                cancelButtonColor: '#95a5a6',
                confirmButtonText: 'Save Changes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Property updated successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        toast: true
                    });
                }
            });
        });

        // Add entrance animations
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('.content-section');
            sections.forEach((section, index) => {
                setTimeout(() => {
                    section.style.animation = `fadeInUp 0.6s ease forwards`;
                }, index * 100);
            });
        });
    </script>
</body>
</html>