<?php
session_start();
include "dbh.inc.php";

if (isset($_POST['uname'], $_POST['pwd'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    // Check if the user exists
    $sql = "SELECT userPassword FROM users WHERE userUsername = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);

            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['userID'] = $username;  // Set session or any other relevant user data
                header("Location: ../pages/index.php");
                exit();
            } else {
                header("Location: ../pages/login.php?error=1");
            }
        } else {
            header("Location: ../pages/login.php?error=1");
        }
    } else {
        header("Location: ../pages/login.php?error=1");
    }
} else {
    header("Location: ../pages/login.php?error=1");
    exit();
}
?>
