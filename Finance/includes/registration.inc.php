<?php
session_start();
include "dbh.inc.php";

if (isset($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password before storing in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO users (userFullname, userEmail, userUsername, userPassword) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
        mysqli_stmt_execute($stmt);

        // Success message and redirect
        $_SESSION['success_message'] = "Registration successful!";
        header("Location: ../pages/registration.php");
    } else {
        header("Location: ../pages/registration.php?error=1");
    }
} else {
    header("Location: ../pages/registration.php?error=1");
    exit();
}
?>
