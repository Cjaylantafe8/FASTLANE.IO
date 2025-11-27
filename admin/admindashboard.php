<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Admin Dashboard</title>
</head>
<body>
<div class="dashboard-banner">
<h1>Welcome, Queue Admin!</h1>
<ul>
    <li><a href="../admin/adminappointment.php">View All Appointments</a></li>
    <li><a href="../admin/adminlogout.php">Logout</a></li>
</ul>
</div>
</body>
</html>
