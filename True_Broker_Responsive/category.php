<?php
require "data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>True Broker - Property Listings</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
/* Your existing CSS - DON'T CHANGE */
.filter-sidebar {
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 2px 8px rgba(80,70,180,0.10);
    padding: 1.5rem 1.5rem 0.5rem 1.5rem;
    min-width: 300px;
}
.filter-section { margin-bottom: 1.8rem; }
.filter-title {
    font-size: 1.12rem;
    font-weight: bold;
    color: #6d28d9;
    margin-bottom: 10px;
    display:flex; align-items:center; gap:8px;
}
.filter-section label,
.filter-section select {
    display:block; margin-top:5px; font-size:1rem; color:#333;
}
.filter-section input[type="checkbox"] {
    accent-color: #8b5cf6;
    margin-right: 7px;
}
.search-bar-wrap {
    position: relative;
    margin-bottom: 1.6rem;
}
.search-bar-input {
    width: 100%;
    padding: 11px 45px 11px 15px;
    font-size: 1rem;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    outline: none;
    transition: border 0.19s;
}
.search-bar-input:focus { border-color: #8b5cf6; }
.search-bar-icon, .search-bar-geo {
    position: absolute;
    top: 47%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.22rem;
    color: #8b5cf6;
}
.search-bar-geo { right: 38px; }
.search-bar-icon { right: 10px; }
input.budget-min, input.budget-max {
    width: 90px;
    padding: 0.4rem 0.6rem;
    border: 1px solid #ddd;
    border-radius: 7px;
    margin-right: 8px;
    margin-top: 4px;
}
#clearFilters {
    width: 100%; font-weight: 600; font-size: 1rem; background: #ef4444;
    color: #fff; border: none; border-radius: 8px; padding: 13px 0; margin-top:13px;
}
#clearFilters:hover { background: #c53030; cursor: pointer; }
.custom-property-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(60, 80, 120, 0.10);
    overflow: hidden;
    transition: box-shadow 0.2s;
    display: flex;
    flex-direction: column;
    min-width: 290px;
    border: 1px solid #f6f6f6;
    margin-bottom: 18px;
}
.img-wrap {
    position: relative;
    width: 100%;
    height: 170px;
    overflow: hidden;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}
.img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.custom-card-body {
    padding: 18px 20px 12px 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
}
.custom-card-title {
    font-size: 1.22rem;
    font-weight: 700;
    color: #232b38;
    margin-bottom: 7px;
}
.custom-card-location {
    font-size: 0.97rem;
    color: #7c8a99;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.custom-card-price {
    font-size: 1.37rem;
    font-weight: 700;
    color: #2563eb;
    margin-bottom: 7px;
}
.custom-card-details {
    display: flex;
    gap: 20px;
    font-size: 0.93rem;
    margin-bottom: 6px;
    color: #54565b;
}
.custom-card-badge {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
}
.deal-type-badge {
    background: #e4e7fa;
    color: #4f46e5;
    font-size: 0.88rem;
    border-radius: 5px;
    padding: 4px 13px;
    font-weight: 600;
    margin-right: 10px;
    text-transform: capitalize;
}
.listed-by-info {
    font-size: 0.95rem;
    color: #828393;
}
.custom-card-btn {
    width: 100%;
    background: #4072ee;
    color: #fff;
    border: none;
    border-radius: 7px;
    padding: 12px 0;
    font-weight: 600;
    font-size: 1.08rem;
    transition: background 0.18s;
    cursor: pointer;
    margin-top: 7px;
}
.custom-card-btn:hover {
    background: #2852ac;
}
.fav-heart {
    position: absolute;
    top: 12px;
    right: 12px;
    font-size: 28px;
    color: white;
    padding: 8px;
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
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filter Sidebar - DON'T CHANGE -->
        <aside class="lg:w-80 filter-sidebar">
            <div class="search-bar-wrap">
                <input type="text" id="searchBar" class="search-bar-input" placeholder="Search by location or property name" />
                <button type="button" class="search-bar-geo" id="geoLocateBtn">
                    <i class="fas fa-location-arrow"></i>
                </button>
                <button type="button" class="search-bar-icon" id="searchBtn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="filter-section">
                <div class="filter-title"><i class="fas fa-dollar-sign"></i> Budget</div>
                <div>
                    <input type="number" id="budgetMin" class="budget-min" placeholder="Min" min="0" />
                    <input type="number" id="budgetMax" class="budget-max" placeholder="Max" min="0" />
                </div>
            </div>
            <div class="filter-section">
                <div class="filter-title"><i class="fas fa-bed"></i> BHK</div>
                <label><input type="checkbox" value="1 BHK" class="bhk-filter"> 1 BHK</label>
                <label><input type="checkbox" value="2 BHK" class="bhk-filter"> 2 BHK</label>
                <label><input type="checkbox" value="3 BHK" class="bhk-filter"> 3 BHK</label>
                <label><input type="checkbox" value="N/A" class="bhk-filter"> N/A</label>
            </div>
            <div class="filter-section">
                <div class="filter-title"><i class="fas fa-tag"></i> Property For</div>
                <select id="typeFilter" class="w-full p-2 rounded mt-2 border">
                    <option value="All Types">All Types</option>
                    <option value="Sale">Sale</option>
                    <option value="Rent">Rent</option>
                    <option value="Lease">Lease</option>
                </select>
            </div>
            <div class="filter-section">
                <div class="filter-title"><i class="fas fa-user-tie"></i> Listed By</div>
                <label><input type="checkbox" value="Owner" class="listed-filter"> Owner</label>
                <label><input type="checkbox" value="Dealer" class="listed-filter"> Dealer</label>
                <label><input type="checkbox" value="Builder" class="listed-filter"> Builder</label>
            </div>
            <button id="clearFilters"><i class="fas fa-redo mr-2"></i>Clear All Filters</button>
        </aside>
        
        <!-- Property Results Area - DON'T CHANGE -->
        <main class="flex-1">
            <div class="mb-3 text-lg font-medium text-gray-700" id="propertyCount"></div>
            <div id="propertyGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6"></div>
            <div id="noResults" class="text-center py-16 bg-white rounded-lg shadow-sm hidden">
                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-xl mb-2">No properties found</p>
                <button id="clearFiltersNoResults" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                    <i class="fas fa-redo mr-2"></i>Reset Filters</button>
            </div>
        </main>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- ONLY ONE SCRIPT TAG - KEEP THIS ONE -->
<script>
const allProperties = <?php echo $propertiesJson; ?>;
const urlCategory = "<?php echo $selectedCategory; ?>";
let filters = {
    category: urlCategory,
    bhk: [],
    budgetMin: "",
    budgetMax: "",
    type: "",
    listedBy: [],
    search: ""
};

function parsePrice(p) {
    if (!p) return 0;
    p = p.toString().replace(/[₹,\/month\s]/gi, '');
    let num = parseInt(p);
    return isNaN(num) ? 0 : num;
}

function filterProperties() {
    let filtered = allProperties;
    if (filters.category && filters.category !== "") {
        filtered = filtered.filter(p => p.category === filters.category);
    }
    if (filters.bhk.length > 0) {
        filtered = filtered.filter(p => filters.bhk.includes(p.bhk));
    }
    if (filters.type && filters.type !== "" && filters.type !== "All Types") {
        filtered = filtered.filter(p => p.type === filters.type);
    }
    if (filters.listedBy.length > 0) {
        filtered = filtered.filter(p => filters.listedBy.includes(p.listedBy));
    }
    if (filters.budgetMin !== "") {
        filtered = filtered.filter(p => parsePrice(p.price) >= parseInt(filters.budgetMin));
    }
    if (filters.budgetMax !== "") {
        filtered = filtered.filter(p => parsePrice(p.price) <= parseInt(filters.budgetMax));
    }
    if (filters.search.trim() !== "") {
        let term = filters.search.trim().toLowerCase();
        filtered = filtered.filter(p =>
            p.title.toLowerCase().includes(term) ||
            p.location.toLowerCase().includes(term)
        );
    }
    displayProperties(filtered);
}

function displayProperties(props) {
    const grid = document.getElementById('propertyGrid');
    const count = document.getElementById('propertyCount');
    const noResults = document.getElementById('noResults');
    grid.innerHTML = '';
    count.textContent = `Showing ${props.length} of ${allProperties.length} properties`;
    if (props.length === 0) {
        grid.style.display = 'none';
        noResults.style.display = 'block';
        return;
    }
    grid.style.display = 'grid';
    noResults.style.display = 'none';
    props.forEach(p => {
        const card = document.createElement('div');
        card.className = 'custom-property-card';
        
        // Check wishlist and set correct heart icon
        const isLiked = isInWishlist(p.id.toString());
        const heartClass = isLiked ? 'fas fa-heart active' : 'far fa-heart';
        
        card.innerHTML = `
<div class="img-wrap">
    <img src="${p.image}" alt="${p.title}">
    <i class="fav-heart ${heartClass}" data-id="${p.id}"></i>
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

function setupEventListeners() {
    document.querySelectorAll('.bhk-filter').forEach(input => {
        input.addEventListener('change', () => {
            filters.bhk = Array.from(document.querySelectorAll('.bhk-filter:checked')).map(i => i.value);
            filterProperties();
        });
    });
    document.getElementById('typeFilter').addEventListener('change', e => {
        filters.type = e.target.value;
        filterProperties();
    });
    document.querySelectorAll('.listed-filter').forEach(input => {
        input.addEventListener('change', () => {
            filters.listedBy = Array.from(document.querySelectorAll('.listed-filter:checked')).map(i => i.value);
            filterProperties();
        });
    });
    document.getElementById('budgetMin').addEventListener('input', e => {
        filters.budgetMin = e.target.value;
        filterProperties();
    });
    document.getElementById('budgetMax').addEventListener('input', e => {
        filters.budgetMax = e.target.value;
        filterProperties();
    });
    document.getElementById('searchBar').addEventListener('input', e => {
        filters.search = e.target.value;
        filterProperties();
    });
    document.getElementById('searchBtn').addEventListener('click', () => {
        filters.search = document.getElementById('searchBar').value;
        filterProperties();
    });
    document.getElementById('geoLocateBtn').addEventListener('click', () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                alert(`Latitude: ${pos.coords.latitude}\nLongitude: ${pos.coords.longitude}`);
            }, err => {
                alert('Location access denied.');
            });
        } else {
            alert('Geolocation not supported.');
        }
    });
    
    const clearFiltersFunc = () => {
        filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
        document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
        document.getElementById('typeFilter').value = "All Types";
        document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
        document.getElementById('budgetMin').value = '';
        document.getElementById('budgetMax').value = '';
        document.getElementById('searchBar').value = '';
        filterProperties();
    };
    
    document.getElementById('clearFilters').addEventListener('click', clearFiltersFunc);
    document.getElementById('clearFiltersNoResults').addEventListener('click', clearFiltersFunc);
}

// Wishlist functions
function getWishlist() {
    let wishlist = localStorage.getItem('propertyWishlist');
    return wishlist ? JSON.parse(wishlist) : [];
}

function addToWishlist(propertyId) {
    let wishlist = getWishlist();
    if (!wishlist.includes(propertyId)) {
        wishlist.push(propertyId);
        localStorage.setItem('propertyWishlist', JSON.stringify(wishlist));
    }
}

function removeFromWishlist(propertyId) {
    let wishlist = getWishlist();
    wishlist = wishlist.filter(id => id !== propertyId);
    localStorage.setItem('propertyWishlist', JSON.stringify(wishlist));
}

function isInWishlist(propertyId) {
    return getWishlist().includes(propertyId);
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    filterProperties();
    setupEventListeners();
});

function viewProperty(id) {
    window.location.href = "category-details.php?id=" + id;
}

// Heart click handler
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("fav-heart")) {
        let id = e.target.getAttribute("data-id");
        
        if (e.target.classList.contains("active")) {
            // Remove from wishlist
            e.target.classList.remove("fas", "active");
            e.target.classList.add("far");
            removeFromWishlist(id);
        } else {
            // Add to wishlist
            e.target.classList.remove("far");
            e.target.classList.add("fas", "active");
            addToWishlist(id);
        }
        
        e.target.classList.add("pop");
        setTimeout(() => e.target.classList.remove("pop"), 300);
    }
});
</script>
</body>
</html>