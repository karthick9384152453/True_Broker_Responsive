<?php
session_start();
include "db.php";

/* Direct access protection */
if (!isset($_SESSION['otp_mobile'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $otp = $_POST['otp'] ?? '';

    /* Expiry / session check */
    if (
        empty($otp) ||
        !isset($_SESSION['otp_code'], $_SESSION['otp_expiry']) ||
        time() > $_SESSION['otp_expiry']
    ) {
        $_SESSION['msg'] = "OTP Expired. Please resend OTP";
        header("Location: verify_otp.php");
        exit;
    }

    /* OTP match */
    if ($otp === $_SESSION['otp_code']) {

        $_SESSION['user_mobile'] = $_SESSION['otp_mobile'];

        /* Clear OTP session */
        unset($_SESSION['otp_code'], $_SESSION['otp_mobile'], $_SESSION['otp_expiry']);

        header("Location: dashboard.php");
        exit;

    } else {
        $_SESSION['msg'] = "Invalid OTP";
        header("Location: verify_otp.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="POST">
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify OTP</button>
</form>

<form method="POST" action="send_otp.php">
    <input type="hidden" name="mobile" value="<?php echo $_SESSION['otp_mobile']; ?>">
    <button type="submit">Resend OTP</button>
</form>

<?php
if (isset($_SESSION['msg'])) {
    echo "<p style='color:red'>".$_SESSION['msg']."</p>";
    unset($_SESSION['msg']);
}
?>

</body>
</html>
