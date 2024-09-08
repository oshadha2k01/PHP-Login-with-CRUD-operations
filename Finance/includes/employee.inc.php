<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if all fields are set and not empty
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['role']) &&
        !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && 
        !empty($_POST['address']) && !empty($_POST['role'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $role = $_POST['role'];

        require_once 'dbh.inc.php';

        // Prepare the SQL statement
        $query = "INSERT INTO crud (name, email, phone, address, role) VALUES (?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        // Bind the parameters
        $stmt->bind_param("sssss", $name, $email, $phone, $address, $role);

        // Execute the statement
        if ($stmt->execute()) {
            // Set session variable and redirect to the same page
            $_SESSION['success_message'] = "Registration successful!";
            header("Location: ../pages/index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    header("Location: ../pages/index.php");
    exit();
}
?>
