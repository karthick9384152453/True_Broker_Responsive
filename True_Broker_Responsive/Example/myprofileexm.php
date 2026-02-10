<?php include './header.php'; ?>
<br><br><br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Luxury House In Coimbatore | Property Listing</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* All your existing CSS styles from the original code */
    /* ... */
  </style>
</head>
<body>  
    <header class="header">
        <div class="header-content"><br>
            <a href="#" class="logo">Modern Luxury House In Coimbatore</a><br>
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Search properties by address, city, or zipcode...">
                <button class="search-btn" id="searchBtn"><i class="fas fa-search"></i></button>
            </div>
            <div class="save-container">
              <button class="btn btn-save" id="viewSavedBtn" onclick="window.location.href='myprofile.php#saved'">
                <i class="fas fa-heart"></i> Saved
                <span class="saved-count" id="savedCount">0</span>
              </button>
            </div>
        </div>
    </header>
    
    <!-- Rest of your property listing HTML -->
    <!-- ... -->
    
    <script>
        // Current property data
        const currentProperty = {
            id: 'property_123',
            title: 'Modern Luxury House In Coimbatore',
            price: '₹4,50,000',
            location: 'Irugur, Coimbatore',
            type: 'house',
            image: 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            area: '1,850 sq.ft.',
            bedrooms: 3,
            bathrooms: 2,
            postedTime: "2023-06-15",
            description: "This stunning modern house in the heart of Manhattan offers the perfect blend of luxury and comfort."
        };

        // Get saved properties from localStorage
        let savedProperties = JSON.parse(localStorage.getItem('savedProperties')) || [];
        let isSaved = savedProperties.some(prop => prop.id === currentProperty.id);
        document.getElementById('savedCount').textContent = savedProperties.length;

        // Save property functionality
        function toggleSave() {
            isSaved = !isSaved;
            
            if (isSaved) {
                // Add to saved properties if not already there
                if (!savedProperties.some(prop => prop.id === currentProperty.id)) {
                    savedProperties.push(currentProperty);
                    localStorage.setItem('savedProperties', JSON.stringify(savedProperties));
                }
            } else {
                // Remove from saved properties
                savedProperties = savedProperties.filter(prop => prop.id !== currentProperty.id);
                localStorage.setItem('savedProperties', JSON.stringify(savedProperties));
            }
            
            // Update UI
            updateSaveButton();
            document.getElementById('savedCount').textContent = savedProperties.length;
            
            // Show notification
            const message = isSaved ? 'Property saved to your profile!' : 'Property removed from saved';
            const icon = isSaved ? 'success' : 'info';
            
            Swal.fire({
                position: 'top-end',
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 1500
            });
        }

        // Update save button state
        function updateSaveButton() {
            const saveIcon = document.getElementById('saveIcon');
            const saveText = document.getElementById('saveText');
            const savePropertyBtn = document.getElementById('savePropertyBtn');
            
            if (isSaved) {
                saveIcon.classList.remove('far');
                saveIcon.classList.add('fas');
                saveText.textContent = 'Saved';
                savePropertyBtn.classList.add('saved');
            } else {
                saveIcon.classList.remove('fas');
                saveIcon.classList.add('far');
                saveText.textContent = 'Save';
                savePropertyBtn.classList.remove('saved');
            }
        }

        // Initialize the page when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            updateSaveButton();
            
            // Add event listener to save button
            const savePropertyBtn = document.getElementById('savePropertyBtn');
            if (savePropertyBtn) {
                savePropertyBtn.addEventListener('click', toggleSave);
            }
        });
    </script>
   
<?php include './footer.php'; ?>
</body>
</html>