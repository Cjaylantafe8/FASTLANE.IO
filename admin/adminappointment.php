<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/login.php");
    exit();
}

include "../queuedata/db.php";

$result = $conn->query("SELECT * FROM appointments ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="icon" href="../assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
    <title>Appointments</title>
</head>
<body>
<div class ="adminappointment">
<h1>All Appointments</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Appointment</th>
        <th>Date</th>
        <th>Time</th>
        <th>Actions</th>
    </tr>
</div>
<?php
while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['fullname']}</td>
        <td>{$row['mobile']}</td>
        <td>{$row['email']}</td>
        <td>{$row['appointment']}</td>
        <td>{$row['date']}</td>
        <td>{$row['time']}</td>
        <td><a href='../admin/admindelete.php?id={$row['id']}'>Delete</a></td>
    </tr>";
}
?>
</table>
</body>
</html>
