<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['role']) &&
        !empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && 
        !empty($_POST['address']) && !empty($_POST['role'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $role = $_POST['role'];

        require_once 'dbh.inc.php';

        $sql = "UPDATE crud SET name = ?, email = ?, phone = ?, address = ?, role = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("sssssi", $name, $email, $phone, $address, $role, $id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Update successful!";
            header("Location: ../pages/index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

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
