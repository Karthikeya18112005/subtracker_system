<?php
    require "database.php";

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $sql = "SELECT * FROM users WHERE verification_token = '$token'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            $update = "UPDATE users SET verified = 1, verification_token = NULL WHERE verification_token = '$token'";
            mysqli_query($conn, $update);
            echo "<script>alert('Email verified successfully! You can now log in.'); window.location.href='login.html';</script>";
        } else {
            echo "Invalid or expired token.";
        }
    }
?>