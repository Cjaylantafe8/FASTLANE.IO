<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location:../admin/adminlogin.php");
    exit();
}

include "../queuedata/db.php";

$id = $_GET['id'];
$conn->query("DELETE FROM appointments WHERE id = $id");

header("Location: ../admin/adminappointment.php");
exit;
