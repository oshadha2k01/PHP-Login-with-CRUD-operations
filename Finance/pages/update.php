<?php
session_start();
require_once '../includes/dbh.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM crud WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Employee not found.");
    }

    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>


<link rel="stylesheet" href='../css/new.css'>

<h3>Update Employee</h3>

<div class="regcon">
 <form action="../includes/update.inc.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $row['phone']; ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $row['address']; ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="role" class="form-control" placeholder="Role" value="<?php echo $row['role']; ?>" required>
    </div>
    <button type="submit">Update</button>
 </form>
</div>

