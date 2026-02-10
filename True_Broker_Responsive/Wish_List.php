<?php
require "data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Wishlist - True Broker</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.custom-property-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(60, 80, 120, 0.10);
    overflow: hidden;
    transition: opacity 0.3s ease, transform 0.3s ease;
    display: flex;
    flex-direction: column;
    border: 1px solid #f6f6f6;
    margin-bottom: 18px;
}
.img-wrap {
    width: 100%;
    height: 160px;
    overflow: hidden;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    position: relative;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.custom-card-body {
    padding: 15px 16px 12px 16px;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
}
.custom-card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #232b38;
    margin-bottom: 6px;
    line-height: 1.3;
}
.custom-card-location {
    font-size: 0.9rem;
    color: #7c8a99;
    margin-bottom: 7px;
    display: flex;
    align-items: center;
    gap: 5px;
}
.custom-card-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 6px;
}
.custom-card-details {
    display: flex;
    gap: 15px;
    font-size: 0.88rem;
    margin-bottom: 6px;
    color: #54565b;
}
.custom-card-badge {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}
.deal-type-badge {
    background: #e4e7fa;
    color: #4f46e5;
    font-size: 0.82rem;
    border-radius: 5px;
    padding: 3px 10px;
    font-weight: 600;
    margin-right: 8px;
    text-transform: capitalize;
}
.listed-by-info {
    font-size: 0.88rem;
    color: #828393;
}
.custom-card-btn {
    width: 100%;
    background: #4072ee;
    color: #fff;
    border: none;
    border-radius: 7px;
    padding: 10px 0;
    font-weight: 600;
    font-size: 1rem;
    transition: background 0.18s;
    cursor: pointer;
    margin-top: 6px;
}
.custom-card-btn:hover {
    background: #2852ac;
}
.fav-heart {
    position: absolute;
    top: 12px;
    right: 12px;
    font-size: 26px;
    color: #ff2b2b;
    padding: 7px;
    border-radius: 50%;
    background: rgba(0,0,0,0.35);
    cursor: pointer;
    transition: color 0.25s ease, transform 0.25s ease;
}
.fav-heart.active {
    color: #ff2b2b !important;
    transform: scale(1.3);
}
.fav-heart.pop {
    animation: popHeart 0.3s ease;
}
@keyframes popHeart {
    0%   { transform: scale(1); }
    50%  { transform: scale(1.5); }
    100% { transform: scale(1.2); }
}
</style>
</head>
<body class="bg-gray-50">

<?php include 'header.php'; ?>
<br><br><br><br><br>

<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        <i class="fas fa-heart text-red-500 mr-2"></i>My Wishlist 
        (<span id="wishlistCount">0</span>)
    </h1>
    
    <div id="wishlistGrid" class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5"></div>
    
    <div id="emptyWishlist" class="text-center py-16 bg-white rounded-lg shadow-sm" style="display: none;">
        <i class="fas fa-heart-broken text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-xl mb-2">Your wishlist is empty</p>
        <a href="categories.php" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold mt-4">
            <i class="fas fa-search mr-2"></i>Browse Properties
        </a>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
const allProperties = <?php echo $propertiesJson; ?>;

// localStorage functions
function getWishlist() {
    let wishlist = localStorage.getItem('propertyWishlist');
    return wishlist ? JSON.parse(wishlist) : [];
}

function removeFromWishlist(propertyId) {
    let wishlist = getWishlist();
    wishlist = wishlist.filter(id => id !== propertyId);
    localStorage.setItem('propertyWishlist', JSON.stringify(wishlist));
    return wishlist;
}

function displayWishlist() {
    const grid = document.getElementById('wishlistGrid');
    const emptyMsg = document.getElementById('emptyWishlist');
    const countEl = document.getElementById('wishlistCount');
    
    // Get wishlist IDs from localStorage
    let wishlistIds = getWishlist();
    
    // Filter properties that are in wishlist
    let wishlistProperties = allProperties.filter(p => wishlistIds.includes(p.id.toString()));
    
    grid.innerHTML = '';
    countEl.textContent = wishlistProperties.length;
    
    if (wishlistProperties.length === 0) {
        grid.style.display = 'none';
        emptyMsg.style.display = 'block';
        return;
    }
    
    grid.style.display = 'grid';
    emptyMsg.style.display = 'none';
    
    wishlistProperties.forEach(p => {
        const card = document.createElement('div');
        card.className = 'custom-property-card';
        card.setAttribute('data-property-id', p.id);
        
        card.innerHTML = `
<div class="img-wrap">
    <img src="${p.image}" alt="${p.title}">
    <i class="fav-heart fas fa-heart active" data-id="${p.id}"></i>
</div>
<div class="custom-card-body">
    <div class="custom-card-title">${p.title}</div>
    <div class="custom-card-location"><i class="fas fa-map-marker-alt"></i> ${p.location}</div>
    <div class="custom-card-price">${p.price}</div>
    <div class="custom-card-details">
        <span>${p.bhk}</span>
        <span>${p.area}</span>
    </div>
    <div class="custom-card-badge">
        <span class="deal-type-badge">${p.type}</span>
        <span class="listed-by-info">By ${p.listedBy}</span>
    </div>
    <button class="custom-card-btn" onclick="viewProperty(${p.id})">View Details</button>
</div>
`;
        grid.appendChild(card);
    });
}

// Heart click handler
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("fav-heart")) {
        let id = e.target.getAttribute("data-id");
        
        // Add pop animation
        e.target.classList.add("pop");
        
        // Remove from wishlist after animation
        setTimeout(() => {
            removeFromWishlist(id);
            
            // Remove card with fade animation
            const card = document.querySelector(`[data-property-id="${id}"]`);
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    displayWishlist(); // Re-render wishlist
                }, 300);
            }
        }, 300);
    }
});

function viewProperty(id) {
    window.location.href = "category-details.php?id=" + id;
}

document.addEventListener('DOMContentLoaded', () => {
    displayWishlist();
});
</script>

</body>
</html>