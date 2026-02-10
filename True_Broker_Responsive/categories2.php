    <?php
    session_start();
    require "data.php"; // Contains $properties array
    // AJAX remove
    if (isset($_POST['remove_id'])) {
        $id = $_POST['remove_id'];
        if (isset($_SESSION['wishlist'][$id])) {
            unset($_SESSION['wishlist'][$id]);
        }
        exit; // stop page output
    }

    // ===============================
    // REMOVE FROM WISHLIST (Same Page)
    // ===============================


    // ===============================
    // LOAD WISHLIST ITEMS
    // ===============================
    $wishlist = $_SESSION['wishlist'] ?? [];
    $wishlistItems = [];

    foreach ($wishlist as $id) {
        foreach ($properties as $p) {
            if ($p['id'] == $id) {
                $wishlistItems[] = $p;
                break;
            }
        }
    }
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
    .wish-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: 0.2s;
    }
    .wish-card:hover {
        transform: scale(1.02);
    }
    .wish-img-wrap {
        position: relative;
    }
    .remove-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 22px;
        background: rgba(255,255,255,0.85);
        padding: 8px 10px;
        border-radius: 50%;
        cursor: pointer;
        transition: 0.2s;
        color: #e11d48;
    }
    .remove-btn:hover {
        background: #e11d48;
        color: #fff;
    }
    </style>
    </head>

    <body class="bg-gray-100">

    <?php include "header.php"; ?>
    <br><br><br><br><br><br><br>

    <div class="max-w-6xl mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-700">My Wishlist ❤️</h1>

        <?php if (empty($wishlistItems)) { ?>
            <div class="text-center py-20 bg-white rounded-xl shadow">
                <i class="fa-solid fa-heart-crack text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-xl">Your wishlist is empty</p>
                <a href="properties.php" class="mt-4 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold">
                    Browse Properties
                </a>
            </div>
        <?php } else { ?>

        <!-- Wishlist Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($wishlistItems as $p) { ?>
                <div class="wish-card">

                    <!-- Image + Remove Button -->
                    <div class="wish-img-wrap">
                        <img src="<?= $p['image'] ?>" class="w-full h-52 object-cover">
                        
                        <!-- REMOVE BUTTON (Same Page Action) -->
                        <button class="remove-btn" onclick="removeWishlist(<?= $p['id'] ?>, this)">
        <i class="fa-solid fa-heart-crack"></i>
    </button>
                    </div>

                    <!-- Body -->
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-1 text-gray-800"><?= $p['title'] ?></h2>

                        <p class="text-gray-500 mb-2">
                            <i class="fa-solid fa-location-dot text-red-500 mr-1"></i>
                            <?= $p['location'] ?>
                        </p>

                        <p class="text-blue-600 font-bold text-lg mb-2"><?= $p['price'] ?></p>

                        <p class="text-gray-600 text-sm mb-3">
                            <?= $p['bhk'] ?> • <?= $p['area'] ?>
                        </p>

                        <a href="category-details.php?id=<?= $p['id'] ?>" 
                        class="block bg-blue-600 text-white text-center py-2 rounded-lg font-semibold hover:bg-blue-700">
                            View Details
                        </a>
                    </div>

                </div>
            <?php } ?>

        </div>

        <?php } ?>
    </div>
    <script>
    function removeWishlist(id, btn) {

        // Hide card nicely
        let card = btn.closest(".wish-card");
        card.style.transition = "0.4s";
        card.style.opacity = "0";
        card.style.transform = "scale(0.9)";

        setTimeout(() => { card.remove(); }, 400);

        // AJAX to update session
        fetch("Wish_List.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "remove_id=" + id
        });
    }
    </script>


    <?php include "footer.php"; ?>

    </body>
    </html>