<?php
session_start();
require_once 'db.php'; // adjust path

if (!isset($_SESSION['appointment'])) {
    header("Location: ../index.php");
    exit;
}

$data = $_SESSION['appointment'];


$stmt = $conn->prepare("INSERT INTO appointments (fullname, mobile, email, appointment, date, time) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $data['fullname'], $data['mobile'], $data['email'], $data['appointment'], $data['date'], $data['time']);
$stmt->execute();
$stmt->close();
$conn->close();


unset($_SESSION['appointment']);


header("Location: ../pages/thankyou.html");
exit;
