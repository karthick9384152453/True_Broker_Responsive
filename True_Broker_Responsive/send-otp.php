<?php
session_start();
include "db.php";

header('Content-Type: application/json');

$mobile = $_POST['mobile'] ?? '';

if (empty($mobile)) {
    echo json_encode([
        "status" => "error",
        "message" => "Mobile number is required"
    ]);
    exit;
}

// Validate mobile number
if (!preg_match('/^[6-9][0-9]{9}$/', $mobile)) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid mobile number"
    ]);
    exit;
}

// Generate OTP
$otp = rand(100000, 999999);

// Expiry (5 minutes)
$expiry_seconds = 300;
$expiry_time = time() + $expiry_seconds;
$expiry_datetime = date("Y-m-d H:i:s", $expiry_time);

// Store in session
$_SESSION['otp_mobile'] = $mobile;
$_SESSION['otp_code'] = $otp;
$_SESSION['otp_expiry'] = $expiry_time;

// Store in DB
$mobile_safe = mysqli_real_escape_string($conn, $mobile);
$otp_safe = mysqli_real_escape_string($conn, $otp);
$expiry_safe = mysqli_real_escape_string($conn, $expiry_datetime);

// Delete old OTP
mysqli_query($conn, "DELETE FROM otp_logs WHERE mobile='$mobile_safe'");

// Insert new OTP
mysqli_query(
    $conn,
    "INSERT INTO otp_logs (mobile, otp, expires_at)
     VALUES ('$mobile_safe', '$otp_safe', '$expiry_safe')"
);

/*
SMS API call here
send $otp to $mobile
*/

// ⚠️ Production-la OTP return panna koodathu
echo json_encode([
    "status" => "success",
    "message" => "OTP sent successfully"
    // "otp" => $otp // testing-ku mattum
]);
