<?php
include "../includes/dbh.inc.php";
?>

<link rel="stylesheet" href="../css/login.css">

<h3>Login</h3>

<?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <script>
        alert("Login failed. Invalid username or password.");
    </script>
<?php endif; ?>

<div class="form">
    <form action="../includes/login.inc.php" method="post">
        <input type="text" id="username" name="uname" placeholder="Username" required>
        <input type="password" id="password" name="pwd" placeholder="Password" required>
        <button name="submit" type="submit">Login</button>
    </form>
    <p class="account">Don't have an account? <a href="./registration.php" style="color: blue;">Create an account</a></p>
</div>
