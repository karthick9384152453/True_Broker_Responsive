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