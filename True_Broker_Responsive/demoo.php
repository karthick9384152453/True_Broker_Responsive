<!-- ________________wishlist__________________ -->

<?php
session_start();
require "data.php";

// AJAX handler for adding to wishlist
if (isset($_POST['add_id'])) {
    $id = intval($_POST['add_id']);
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }
    if (!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }
    echo json_encode(['success' => true]);
    exit;
}

// AJAX handler for removing from wishlist
if (isset($_POST['remove_id'])) {
    $id = intval($_POST['remove_id']);
    if (isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array_values(array_filter($_SESSION['wishlist'], function($item) use ($id) {
            return intval($item) != $id;
        }));
    }
    echo json_encode(['success' => true]);
    exit;
}

// Get current wishlist
$currentWishlist = $_SESSION['wishlist'] ?? [];
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
    width: 100%;
    height: 170px;
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
        <!-- Filter Sidebar -->
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
        
        <!-- Property Results Area -->
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

<script>
const allProperties = <?php echo $propertiesJson; ?>;
const urlCategory = "<?php echo $selectedCategory; ?>";
let currentWishlist = <?php echo json_encode(array_map('intval', $currentWishlist)); ?>;

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
        const isInWishlist = currentWishlist.includes(p.id);
        const heartClass = isInWishlist ? 'fas fa-heart active' : 'far fa-heart';
        
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
    
    document.getElementById('clearFilters').addEventListener('click', clearAllFilters);
    document.getElementById('clearFiltersNoResults').addEventListener('click', clearAllFilters);
}

function clearAllFilters() {
    filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
    document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
    document.getElementById('typeFilter').value = "All Types";
    document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
    document.getElementById('budgetMin').value = '';
    document.getElementById('budgetMax').value = '';
    document.getElementById('searchBar').value = '';
    filterProperties();
}

function addToWishlist(propertyId) {
    return fetch("categories.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "add_id=" + propertyId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && !currentWishlist.includes(propertyId)) {
            currentWishlist.push(propertyId);
        }
        return data;
    })
    .catch(err => {
        console.error('Error adding to wishlist:', err);
        return {success: false};
    });
}

function removeFromWishlist(propertyId) {
    return fetch("categories.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "remove_id=" + propertyId
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const index = currentWishlist.indexOf(propertyId);
            if (index > -1) {
                currentWishlist.splice(index, 1);
            }
        }
        return data;
    })
    .catch(err => {
        console.error('Error removing from wishlist:', err);
        return {success: false};
    });
}

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("fav-heart")) {
        let id = parseInt(e.target.getAttribute("data-id"));
        
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

function viewProperty(id) {
    window.location.href = "category-details.php?id=" + id;
}

document.addEventListener('DOMContentLoaded', () => {
    filterProperties();
    setupEventListeners();
});
</script>

</body>
</html>






















<!-- collatory -->
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
.custom-card-img-wrap {
    width: 100%;
    height: 170px;
    overflow: hidden;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
}
.custom-card-img-wrap img {
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
.property-card {
    position: relative;
    width: 100%;
    max-width: 300px;
    background: #fff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.property-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
}

.img-wrap {
    position: relative;
}

.fav-heart {
    position: absolute;
    top: 12px;
    right: 12px;
    font-size: 28px;
    color: white;                         /* outline heart */
    padding: 8px;
    border-radius: 50%;
    background: rgba(0,0,0,0.35);
    cursor: pointer;
    transition: color 0.25s ease, transform 0.25s ease;
}

.fav-heart.active {
    color: #ff2b2b !important;            /* red heart */
    transform: scale(1.3);                /* POP */
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

<!-- Optionally include your header here -->
<?php  include 'header.php';  ?>
<br><br><br><br><br>

<div class="max-w-7xl mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filter Sidebar -->
        <aside class="lg:w-80 filter-sidebar">
            <!-- Search Bar at Top -->
            <div class="search-bar-wrap">
                <input type="text" id="searchBar" class="search-bar-input" placeholder="Search by location or property name" />
                <button type="button" class="search-bar-geo" id="geoLocateBtn">
                    <i class="fas fa-location-arrow"></i>
                </button>
                <button type="button" class="search-bar-icon" id="searchBtn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <!-- Budget filter -->
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
        <!-- Property Results Area -->
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
<!-- Optionally include your footer here -->
<?php  include 'footer.php'; ?>

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
    // For filtering, strip ₹, commas, and /month then convert to int
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
        card.innerHTML = `
<div class="img-wrap">
    <img src="${p.image}" alt="${p.title}">
    <i class="fav-heart far fa-heart" data-id="${p.id}"></i>
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
    document.getElementById('clearFilters').addEventListener('click', () => {
        filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
        document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
        document.getElementById('typeFilter').value = "All Types";
        document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
        document.getElementById('budgetMin').value = '';
        document.getElementById('budgetMax').value = '';
        document.getElementById('searchBar').value = '';
        filterProperties();
    });
    document.getElementById('clearFiltersNoResults').addEventListener('click', () => {
        filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
        document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
        document.getElementById('typeFilter').value = "All Types";
        document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
        document.getElementById('budgetMin').value = '';
        document.getElementById('budgetMax').value = '';
        document.getElementById('searchBar').value = '';
        filterProperties();
    });
}
document.addEventListener('DOMContentLoaded', () => {
    filterProperties();
    setupEventListeners();
});
function viewProperty(id) {
    window.location.href = "category-details.php?id=" + id;
}
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("fav-heart")) {

        e.target.classList.toggle("active");

        e.target.classList.add("pop");
        setTimeout(() => e.target.classList.remove("pop"), 300);

        let id = e.target.getAttribute("data-id");
        console.log("Heart clicked:", id);

        // optionally call wishlist page:
        // if (e.target.classList.contains("active")) {
        //     window.location.href = "add_to_wishlist.php?id=" + id;
        // }
    }
});

</script>








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
        card.innerHTML = `
<div class="img-wrap">
    <img src="${p.image}" alt="${p.title}">
    <i class="fav-heart far fa-heart" data-id="${p.id}"></i>
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
    updateHeartIcons();
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
    document.getElementById('clearFilters').addEventListener('click', () => {
        filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
        document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
        document.getElementById('typeFilter').value = "All Types";
        document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
        document.getElementById('budgetMin').value = '';
        document.getElementById('budgetMax').value = '';
        document.getElementById('searchBar').value = '';
        filterProperties();
    });
    document.getElementById('clearFiltersNoResults').addEventListener('click', () => {
        filters = {category: urlCategory, bhk: [], type: "", listedBy: [], budgetMin: "", budgetMax: "", search: ""};
        document.querySelectorAll('.bhk-filter').forEach(i => i.checked = false);
        document.getElementById('typeFilter').value = "All Types";
        document.querySelectorAll('.listed-filter').forEach(i => i.checked = false);
        document.getElementById('budgetMin').value = '';
        document.getElementById('budgetMax').value = '';
        document.getElementById('searchBar').value = '';
        filterProperties();
    });
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

// Update heart icons on page load
function updateHeartIcons() {
    document.querySelectorAll('.fav-heart').forEach(heart => {
        const propertyId = heart.getAttribute('data-id');
        if (isInWishlist(propertyId)) {
            heart.classList.remove('far');
            heart.classList.add('fas', 'active');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    filterProperties();
    setupEventListeners();
    updateHeartIcons();
});

function viewProperty(id) {
    window.location.href = "category-details.php?id=" + id;
}

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



<!-- category dtails------------------ -->


<?php
session_start();
require "data.php";

// Get the category ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
$selected = null;

// Find the selected category
if ($id !== null) {
    foreach ($properties as $p) {
        if ($p['id'] == $id) {
            $selected = $p;
            break;
        }
    }
}

// If category not found, show error
if (!$selected) {
    die("Category not found!");
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
    <title><?php echo htmlspecialchars($selected['name']); ?> - Category Details</title>
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
            background: linear-gradient(135deg, var(--primary) 0%, #5a226d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .category-image-large::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .category-image-large i {
            font-size: 100px;
            opacity: 0.9;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
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
            text-transform: uppercase;
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
            font-size: 32px;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }
        
        /* Tags */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .tag {
            background: white;
            color: var(--primary);
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-light);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .tag:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(116, 43, 136, 0.2);
        }
        
        .tag i {
            font-size: 12px;
        }
        
        /* Subcategories Grid */
        .subcategories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
        }
        
        .subcategory-item {
            background: white;
            border: 2px solid var(--primary-light);
            padding: 18px;
            border-radius: 12px;
            color: var(--primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .subcategory-item:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(116, 43, 136, 0.25);
        }
        
        .subcategory-item i {
            font-size: 20px;
            width: 30px;
            height: 30px;
            background: var(--primary-light);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .subcategory-item:hover i {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px;
            color: var(--gray);
        }
        
        .empty-state i {
            font-size: 60px;
            color: var(--primary-light);
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 16px;
            margin-top: 10px;
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

            .category-image-large i {
                font-size: 80px;
            }

            .subcategories-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .category-image-large i {
                font-size: 70px;
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
            
            .subcategories-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 28px;
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

            .category-image-large i {
                font-size: 60px;
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

            .tags-container {
                flex-direction: column;
            }

            .tag {
                justify-content: center;
            }

            .stat-icon {
                font-size: 32px;
            }

            .stat-value {
                font-size: 24px;
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
    <div class="container">
        <!-- Back Button -->
        <div class="back-navigation">
            <a href="category.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>
        
        <!-- Main Layout -->
        <div class="details-layout">
            <!-- Left Sidebar -->
            <div class="category-sidebar">
                <div class="category-card">
                    <!-- Category Image -->
                    <div class="category-image-large">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    
                    <!-- Category Info -->
                    <div class="category-info">
                        <h1 class="category-name"><?php echo $category['name'] ?? 'Category not found!'; ?>
</h1>
                        
                        <div class="category-meta">
                            <div class="meta-item">
                                <i class="fas fa-tag"></i>
                                <strong>ID:</strong>
                                <span><?php echo htmlspecialchars($selected['id']); ?></span>
                            </div>
                            
                            <?php if (isset($selected['slug'])): ?>
                            <div class="meta-item">
                                <i class="fas fa-link"></i>
                                <strong>Slug:</strong>
                                <span><?php echo htmlspecialchars($selected['slug']); ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (isset($selected['status'])): ?>
                            <div class="meta-item">
                                <i class="fas fa-circle-dot"></i>
                                <strong>Status:</strong>
                                <span class="status-badge <?php echo strtolower($selected['status']) === 'active' ? 'status-active' : 'status-inactive'; ?>">
                                    <?php echo htmlspecialchars($selected['status']); ?>
                                </span>
                            </div>
                            <?php endif; ?>
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
                <?php if (isset($selected['description'])): ?>
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-align-left"></i>
                        </div>
                        <h3 class="section-title">Description</h3>
                    </div>
                    <p class="category-description"><?php echo htmlspecialchars($selected['description']); ?></p>
                </div>
                <?php endif; ?>
                
                <!-- Statistics Section -->
                <?php if (isset($selected['item_count']) || isset($selected['subcategories']) || isset($selected['created_date'])): ?>
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="section-title">Statistics & Metrics</h3>
                    </div>
                    <div class="stats-grid">
                        <?php if (isset($selected['item_count'])): ?>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div class="stat-label">Total Items</div>
                            <div class="stat-value"><?php echo number_format($selected['item_count']); ?></div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (isset($selected['subcategories'])): ?>
                        <div class="stat-card secondary">
                            <div class="stat-icon">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <div class="stat-label">Subcategories</div>
                            <div class="stat-value"><?php echo count($selected['subcategories']); ?></div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (isset($selected['created_date'])): ?>
                        <div class="stat-card accent">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="stat-label">Created</div>
                            <div class="stat-value"><?php echo htmlspecialchars($selected['created_date']); ?></div>
                        </div>
                        <?php endif; ?>

                        <div class="stat-card info">
                            <div class="stat-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="stat-label">Views</div>
                            <div class="stat-value"><?php echo rand(100, 999); ?></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Tags Section -->
                <?php if (isset($selected['tags']) && !empty($selected['tags'])): ?>
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 class="section-title">Tags</h3>
                    </div>
                    <div class="tags-container">
                        <?php foreach ($selected['tags'] as $tag): ?>
                            <span class="tag">
                                <i class="fas fa-hashtag"></i>
                                <?php echo htmlspecialchars($tag); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Subcategories Section -->
                <?php if (isset($selected['subcategories']) && !empty($selected['subcategories'])): ?>
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="section-title">Subcategories</h3>
                    </div>
                    <div class="subcategories-grid">
                        <?php foreach ($selected['subcategories'] as $subcategory): ?>
                            <div class="subcategory-item">
                                <i class="fas fa-folder"></i>
                                <?php echo htmlspecialchars($subcategory); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php else: ?>
                <div class="content-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="section-title">Subcategories</h3>
                    </div>
                    <div class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <p>No subcategories found</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Delete category confirmation
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
                        text: 'Category has been deleted.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'category.php';
                    });
                }
            });
        });

        // Edit button functionality
        document.querySelector('.btn-edit')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Edit Category',
                html: `
                    <input type="text" id="edit-name" class="swal2-input" placeholder="Category Name" value="<?php echo htmlspecialchars($selected['name']); ?>">
                    <textarea id="edit-description" class="swal2-textarea" placeholder="Description"><?php echo isset($selected['description']) ? htmlspecialchars($selected['description']) : ''; ?></textarea>
                `,
                showCancelButton: true,
                confirmButtonColor: '#742B88',
                cancelButtonColor: '#95a5a6',
                confirmButtonText: 'Save Changes',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'swal-wide'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category updated successfully',
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







<!-- ________________my profile____________________ -->

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
    border: none;
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
                        <h2><i class="fas fa-chevron-down"></i> My Listing</h2>
                        <div class="search-filter">
                            <input type="text" id="searchInput" class="search-input" placeholder="Search properties...">
                            <select  id="statusFilter" class="filter-select">
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
            <form id="profile-edit-form" action="update_profile.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" id="edit-fullname" name="fullname" class="form-control" 
                           value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" id="edit-location" name="location" class="form-control" value="Coimbatore, Tamilnadu">
                </div>
                <div class="form-group">
                    <form action="profile_update.php" method="POST" enctype="multipart/form-data">
                    <label>Profile Picture</label>
                    <div class="file-upload">
                        <input type="file" id="edit-profile-pic" name="profile_pic" class="file-upload-input" accept="image/*" required>
                        <label for="edit-profile-pic" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i> Change Photo
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">updated</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Property data (should match the data from your property listing page)
        const properties = [
            {
                id: 'property_123',
                title: "Modern Luxury House In Coimbatore",
                location: "Irugur, Coimbatore",
                price: "₹4,50,000",
                type: "house",
                image: "https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80",
                area: "1,850 sq.ft.",
                bedrooms: 3,
                bathrooms: 2,
                postedTime: "2023-06-15",
                description: "This stunning modern house in the heart of Manhattan offers the perfect blend of luxury and comfort."
            },
            {
                id: 'property_456',
                title: "Luxury 3 BHK Apartment with Modern Amenities",
                location: "Peelamedu, Coimbatore",
                price: "₹85 Lac",
                type: "apartment",
                image: "https://truebroker.in/web_new/uploads/pro_img1/img_4/588529-photo.jfif",
                area: "1400 sq ft",
                bedrooms: 3,
                bathrooms: 2,
                postedTime: "2023-07-02",
                description: "Spacious 3 BHK apartment in a premium gated community with swimming pool, gym, and 24/7 security."
            }
        ];

        // Get saved properties from localStorage
        let savedProperties = JSON.parse(localStorage.getItem('savedProperties')) || [];
        document.getElementById('saved-count').textContent = savedProperties.length;

        // Token system
        let tokenBalance = localStorage.getItem('tokenBalance') || 1250;
        document.getElementById('token-count').textContent = tokenBalance.toLocaleString();

        // Function to load saved properties
        function loadSavedProperties() {
            const savedContainer = document.getElementById('saved-properties-container');
            const savedCount = document.getElementById('saved-count');
            
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
            
            // Filter properties to only show saved ones
            function setStatusFilter(status) {
    statusFilter = status.toLowerCase();
    renderProperties(); // reload property cards
}
            const savedProps = properties.filter(property => 
                savedProperties.some(savedProp => savedProp.id === property.id)
            );
            
            // Apply search filter if any
            const search = (searchTerm || "").toLowerCase();
const selectedType = (typeFilter || "").toLowerCase();
const selectedStatus = (statusFilter || "").toLowerCase();

const filteredProps = savedProps.filter(property => {

    const title = (property.title || "").toLowerCase();
    const location = (property.location || "").toLowerCase();
    const propType = (property.type || "").toLowerCase();
    const propStatus = (property.status || "").toLowerCase();

    // SEARCH FILTER
    const matchesSearch =
        title.includes(search) ||
        location.includes(search);

    // TYPE FILTER
    const matchesType =
        selectedType === "all" ||
        propType === selectedType;

    // STATUS FILTER
    const matchesStatus =
        selectedStatus === "all" ||
        propStatus === selectedStatus;

    return matchesSearch && matchesType && matchesStatus;
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
                    <img src="${property.image}" alt="${property.title}" class="saved-property-img">
                    <div class="saved-property-details">
                        <h3 class="saved-property-title">${property.title}</h3>
                        <div class="saved-property-price">${property.price}</div>
                        <div class="saved-property-location">
                            <i class="fas fa-map-marker-alt"></i> ${property.location}
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
            const property = properties.find(p => p.id === id);
            if (property) {
                // Redirect to property page with ID
                window.location.href = `property.php?id=${id}`;
            }
        }

        // Function to handle search and filter for saved properties
        function setupSavedSearchFilter() {
            document.getElementById('saved-search').addEventListener('input', loadSavedProperties);
            document.getElementById('saved-filter').addEventListener('change', loadSavedProperties);
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

        // Property card hover effects
        function setupPropertyCardHover() {
            document.querySelectorAll('.property-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                    this.style.boxShadow = '0 6px 16px rgba(0,0,0,0.1)';
                    this.style.borderColor = 'var(--primary-light)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = '';
                    this.style.boxShadow = '0 2px 8px rgba(0,0,0,0.05)';
                    this.style.borderColor = '#eee';
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
                                propertyCard.style.transform = 'scale(0.9)';
                                propertyCard.style.opacity = '0';
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
                                    <small>From:Mugeshkumr G</small><br>
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
                
                closeModal.addEventListener('click', function() {
                    profileEditModal.style.display = 'none';
                });
                
                window.addEventListener('click', function(event) {
                    if (event.target === profileEditModal) {
                        profileEditModal.style.display = 'none';
                    }
                });
            }
            
            if (profileEditForm) {
                profileEditForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const newName = document.getElementById('edit-fullname').value;
                    const newLocation = document.getElementById('edit-location').value;
                    const newProfilePic = document.getElementById('edit-profile-pic').addEventListener('change', function(event) {
    const preview = document.getElementById('profile-img-preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
});
                    
                    document.getElementById('profile-name').textContent = newName;
                    document.getElementById('profile-location').textContent = newLocation;
                    
                    if (newProfilePic) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('.profile-pic').src = e.target.result;
                            const headerProfileImg = document.querySelector('#userImage');
                            if (headerProfileImg) {
                                headerProfileImg.src = e.target.result;
                            }
                        }
                        reader.readAsDataURL(newProfilePic);
                    }
                    
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Profile updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                    profileEditModal.style.display = 'none';
                });
            }
            
            // Profile picture preview update
            const profilePicInput = document.getElementById('edit-profile-pic');
            if (profilePicInput) {
                profilePicInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('.profile-pic').src = e.target.result;
                            const headerProfileImg = document.querySelector('#userImage');
                            if (headerProfileImg) {
                                headerProfileImg.src = e.target.result;
                            }
                        }
                        reader.readAsDataURL(file);
                    }
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

        // Initialize all functionality when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            handleTabSwitch();
            setupCollapsibleSections();
            setupPropertyCardHover();
            setupDeleteButtons();
            setupSettingsForm();
            setupNotificationBell();
            setupProfileEditModal();
            setupLogoutButton();
            setupSavedSearchFilter();
            
            // Initialize the first tab as expanded
            const listingsHeader = document.getElementById('listings-header');
            const listingsContent = document.getElementById('listings-content');
            if (listingsHeader && listingsContent) {
                listingsHeader.classList.remove('collapsed');
                listingsContent.style.maxHeight = listingsContent.scrollHeight + "px";
            }
            
            // Load saved properties if we're on the saved tab
            if (window.location.hash === '#saved') {
                loadSavedProperties();
            }
        });
        // === MY LISTINGS FILTER & SEARCH (Add this inside your existing <script>) ===
document.addEventListener("DOMContentLoaded", function () {
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
});
    </script>
    <script>
// Auto upload when photo selected
document.getElementById('picUpload')?.addEventListener('change', function() {
    if (this.files[0]) {
        document.getElementById('picForm').submit();
    }
});
</script>
<?php include 'footer.php'; ?>
<script>
document.getElementById('picUpload')?.addEventListener('change', function(){
    if(this.files[0]) document.getElementById('picForm').submit();
});
</script>
  <!-- ADD THIS LINE -->
</body>
</html>