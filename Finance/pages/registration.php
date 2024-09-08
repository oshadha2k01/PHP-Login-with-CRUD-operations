<?php
session_start();
?>

<link rel="stylesheet" href="../css/register.css">

<h3>Registration</h3>

<?php if (isset($_SESSION['success_message'])): ?>
    <script>
        alert("<?php echo $_SESSION['success_message']; ?>");
    </script>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<div class="regcon">
    <form action="../includes/registration.inc.php" method="post">
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit">Register</button>
        <p class="register">Already have an account? <a href="./login.php" style="color: blue;">Login Here</a></p>
    </form>
</div>
