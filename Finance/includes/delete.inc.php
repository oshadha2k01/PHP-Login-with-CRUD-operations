<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once 'dbh.inc.php';

    $sql = "DELETE FROM crud WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Employee deleted successfully!";
        header("Location: ../pages/index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../pages/index.php");
    exit();
}
?>
