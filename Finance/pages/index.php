<?php
session_start();
require_once '../includes/dbh.inc.php';

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        li.right {
            float: right;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="right"><a href="logout.php">Logout</a></li> <!-- Logout option -->
    </ul>

    <div class="container1" style="margin: 20px;">
        <h1>Employee</h1>
        <a class='btn btn-primary btn-sm' href="/Finance/pages/newemployee.php">New Employee</a>
        <br><br>

        <div class="data">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from the CRUD table
                    $sql = "SELECT * FROM crud";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    // Display data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['role']}</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/Finance/pages/update.php?id={$row['id']}'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/Finance/includes/delete.inc.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this employee?\");'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
