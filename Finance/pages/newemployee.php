<?php
session_start();
?>

<link rel="stylesheet" href='../css/new.css'>

<h3>New Employee</h3>

<?php if (isset($_SESSION['success_message'])): ?>
    <script>
        alert("<?php echo $_SESSION['success_message']; ?>");
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<div class="regcon">
 <form action="../includes/employee.inc.php" method="post">
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
    </div>
    <div class="form-group">
        <input type="text" name="address" class="form-control" placeholder="Address" required>
    </div>
    <div class="form-group">
        <input type="text" name="role" class="form-control" placeholder="Role" required>
    </div>
    <button type="submit">Add</button>
 </form>
</div>

<?php
?>
