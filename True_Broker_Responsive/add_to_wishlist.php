<?php
session_start();

// If wishlist not created, create it
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

$id = $_GET['id'] ?? null;

if ($id) {
    // If not already added, add it
    if (!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }
}

// Go back to previous page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;   