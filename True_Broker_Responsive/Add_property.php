<?php include 'header.php'; ?>
<br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Property</title>
   
</head>
<style>
   body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: #f4f4f4;
      color: white;
    }


.post-property-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-top: 5px solid #742B88;
}

h2 {
  color: #742B88;
  text-align: center;
  margin-bottom: 1.5rem;
  font-size: 2rem;
}

h3 {
  color: #1E8540;
  margin-bottom: 1rem;
  padding-bottom: 0.5rem;
  border-bottom: 2px solid #f0e6f5;
}

.form-section {
  margin-bottom: 2rem;
  padding-bottom: 1.5rem;
  border-bottom: 1px solid #eee;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-row {
  display: flex;
  gap: 1rem;
}

.form-row .form-group {
  flex: 1;
}

label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: #555;
}

input, select, textarea {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 1rem;
  transition: border 0.3s;
}

input:focus, select:focus, textarea:focus {
  border-color: #742B88;
  outline: none;
  box-shadow: 0 0 0 2px rgba(116, 43, 136, 0.2);
}

.price-input {
  display: flex;
  align-items: center;
}

.price-input .currency {
  padding: 0.75rem;
  background: #f0e6f5;
  border: 1px solid #ddd;
  border-right: none;
  border-radius: 4px 0 0 4px;
  color: #742B88;
  font-weight: bold;
}

.price-input input {
  border-radius: 0 4px 4px 0;
}

.price-period {
  margin-left: 0.5rem;
  width: auto;
}
textarea {
  overflow: hidden;
  resize: none; /* Prevent manual resize */
  width: 100%;
  box-sizing: border-box;
}

.media-upload-area {
  border: 2px dashed #ddd;
  padding: 2rem;
  text-align: center;
  color: #555;
  border-radius: 4px;
  background: #f9f9f9;
  transition: all 0.3s;
}

.media-upload-area:hover {
  border-color: #742B88;
  background: #f5f0f9;
}

.upload-prompt {
  color: #666;
}

.upload-prompt i {
  color: #1E8540;
  font-size: 2rem;
  margin-bottom: 0.5rem;
}

.checkbox-group {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}

.checkbox-group label {
  display: flex;
  align-items: center;
  font-weight: normal;
  cursor: pointer;
  padding: 0.5rem;
  border-radius: 4px;
  transition: all 0.2s;
}

.checkbox-group label:hover {
  background: #f0e6f5;
}

.checkbox-group input[type="checkbox"] {
  width: auto;
  margin-right: 0.5rem;
  accent-color: #1E8540;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
  gap: 1rem;
  margin-top: 2rem;
}

.btn-primary, .btn-secondary {
  padding: 0.75rem 1.5rem;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s;
}

.btn-primary {
  background: #742B88;
  color: white;
  border: none;
}

.btn-primary:hover {
  background: #5a216d;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(116, 43, 136, 0.3);
}

.btn-secondary {
  background: #e8f5e9;
  color: #1E8540;
  border: 1px solid #a5d6a7;
}

.btn-secondary:hover {
  background: #c8e6c9;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(30, 133, 64, 0.2);
}

/* Add some animations */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

.form-section {
  animation: fadeIn 0.5s ease-out forwards;
}

.form-section:nth-child(2) { animation-delay: 0.1s; }
.form-section:nth-child(3) { animation-delay: 0.2s; }
.form-section:nth-child(4) { animation-delay: 0.3s; }
.form-section:nth-child(5) { animation-delay: 0.4s; }
.form-section:nth-child(6) { animation-delay: 0.5s; }
</style>
<body>
    <div class="post-property-container">
  <h2>List Your Property</h2>
  <form id="property-form">
    
    <!-- Basic Information Section -->
    <div class="form-section">
      <h3>Basic Information</h3>
      <div class="form-group">
        <label for="property-type">Property Type*</label>
        <select id="property-type" required>
          <option value="">Select type</option>
          <option value="house">House</option>
          <option value="apartment">Apartment</option>
          <option value="land">Land</option>
          <option value="commercial">Commercial</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="transaction-type">Transaction Type*</label>
        <select id="transaction-type" required>
          <option value="">Select type</option>
          <option value="sale">For Sale</option>
          <option value="rent">For Rent</option>
          <option value="rent">For lease</option>
          <!-- <option value="rent">For </option> -->
        </select>
      </div>
      
      <div class="form-group">
        <label for="title">Listing Title*</label>
        <input type="text" id="title" placeholder="e.g. Beautiful 3-Bedroom Apartment in Downtown" required>
      </div>
      
      <div class="form-group">
  <label for="description">Description*</label>
  <textarea id="description" rows="1" required oninput="autoExpand(this)"></textarea>
</div>



    
    <!-- Location Section -->
    <div class="form-section">
      <h3>Location Details</h3>
      <div class="form-group">
        <label for="address">Full Address*</label>
        <input type="text" id="address" placeholder="Street address" required>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="city">City*</label>
          <input type="text" id="city" required>
        </div>
        <div class="form-group">
          <label for="state">State/Province*</label>
          <input type="text" id="state" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="zip">ZIP/Postal Code</label>
          <input type="text" id="zip">
        </div>
        <div class="form-group">
          <label for="country">Country*</label>
          <select id="country" required>
            <option value="">Select country</option>
            <option value="">India</option>
            <option value="">US</option>
            <option value="">Others</option>
            
          </select>
        </div>
      </div>
    </div>
    
    <!-- Property Details Section -->
    <div class="form-section">
      <h3>Property Details</h3>
      <div class="form-row">
        <div class="form-group">
          <label for="bedrooms">Bedrooms</label>
          <select id="bedrooms">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <!-- More options -->
          </select>
        </div>
        <div class="form-group">
          <label for="bathrooms">Bathrooms</label>
          <select id="bathrooms">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="1.5">1.5</option>
            <!-- More options -->
          </select>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="area">Area (sq ft)*</label>
          <input type="number" id="area" required>
        </div>
        <div class="form-group">
          <label for="year-built">Year Built</label>
          <input type="number" id="year-built" min="1800" max="2025">
        </div>
      </div>
      
      <div class="form-group">
        <label for="amenities">Amenities</label>
        <div class="checkbox-group">
          <label><input type="checkbox" name="amenities" value="parking"> Parking</label>
          <label><input type="checkbox" name="amenities" value="pool"> Swimming Pool</label>
          <label><input type="checkbox" name="amenities" value="gym"> Gym</label>
          <label><input type="checkbox" name="amenities" value="security"> 24/7 Security</label>
          <!-- More amenities -->
        </div>
      </div>
    </div>
    
    <!-- Pricing Section -->
    <div class="form-section">
      <h3>Pricing</h3>
      <div class="form-group">
        <label for="price">Price*</label>
        <div class="price-input">
          <span class="currency">₹</span>
          <input type="number" id="price" required>
          <select id="price-period" class="price-period">
            <option value="">(one-time)</option>
            <option value="month">per month</option>
            <option value="year">per year</option>
          </select>
        </div>  
      </div>
    </div>
    
    <!-- Media Upload Section -->
    <div class="form-section">
      <h3>Photos & Videos</h3>
      <div class="form-group">
        <label>Upload Media* (Minimum 3 photos)</label>
        <div class="media-upload-area">
          <div class="upload-box">
            <input type="file" id="media-upload" multiple accept="image/*,video/*">
            <div class="upload-prompt">
              <i class="upload-icon"></i>
              <p>Drag & drop photos/videos here or click to browse</p>
            </div>
          </div>
          <div class="upload-preview">
            <!-- Thumbnails of uploaded files would appear here -->
          </div>
        </div>
      </div>
    </div>
    
    <!-- Contact Information -->
    <div class="form-section">
      <h3>Contact Information</h3>
      <div class="form-group">
        <label for="contact-name">Contact Person*</label>
        <input type="text" id="contact-name" required>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="contact-email">Email*</label>
          <input type="email" id="contact-email" required>
        </div>
        <div class="form-group">
          <label for="contact-phone">Phone*</label>
          <input type="tel" id="contact-phone" required>
        </div>
      </div>
    </div>
    
    <div class="form-actions">
      <button type="button" class="btn-secondary">Save Draft</button>
      <button type="submit" class="btn-primary">Submit Listing</button>
    </div>
  </form>
</div>
</div>
<br><br><br><br>

    <?php include 'footer.php'; ?>
<script>
  function autoExpand(field) {
    field.style.height = 'auto'; // Reset height
    field.style.height = field.scrollHeight + 'px'; // Set to scrollHeight
  }
  // Auto-expand function
  function autoExpand(field) {
    field.style.height = 'auto';
    field.style.height = field.scrollHeight + 'px';
  }

  // // Add bullet point on Enter key
  // document.getElementById("description").addEventListener("keydown", function (e) {
  //   if (e.key === "Enter") {
  //     e.preventDefault(); // Prevent default new line behavior

  //     const bullet = "• ";
  //     const cursorPos = this.selectionStart;
  //     const textBefore = this.value.substring(0, cursorPos);
  //     const textAfter = this.value.substring(cursorPos);

  //     // Insert bullet at new line
  //     this.value = textBefore + "\n" + bullet + textAfter;

  //     // Move cursor to the right place
  //     this.selectionStart = this.selectionEnd = cursorPos + bullet.length + 1;

  //     // Trigger height adjustment
  //     autoExpand(this);
  //   }
  // });

  // // Optional: Insert first bullet automatically when user starts typing
  // document.getElementById("description").addEventListener("focus", function () {
  //   if (this.value.trim() === "") {
  //     this.value = "• ";
  //   }
  // });
</script>
</body>

</html>
