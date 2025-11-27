<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="icon" href="../assets/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap" rel="stylesheet">
    <title>Queue Summary</title>
</head>
<body>
    <header id="header">
        <nav class="navbar">
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label for="menu-toggle" class="menu-btns">☰</label>
            <ul class="navlinks">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li> 
                <li><a href="#">Contact</a></li>   
                <li><a href="#">Services</a></li>
            </ul>
                <a href="#" class="navbarlogo">
                <img src="../assets/images/logo.PNG" alt="logo" class="weblogo" style="height: 50px; width: 75px;">
                <span class="Fast fs-1 fw-medium " style="color: #0c6c36;">Fast</span><span class="Lane fs-1" style="color: #333;">Lane</span>
                </a>
            <a href="#">
                <button class="btn btn-success navbutton rounded-5 p-2 ps-4 pe-4 fw-medium">
                    Contact Us
                </button>
            </a>

        </nav>
                <div class="bg-circle1"></div>
                <div class="bg-circle2"></div>
    </header>
    <?php
session_start(); // start session to store user data temporarily

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save form data in session
    $_SESSION['appointment'] = [
        'fullname' => htmlspecialchars($_POST['fullname']),
        'mobile' => htmlspecialchars($_POST['mobile']),
        'email' => htmlspecialchars($_POST['email']),
        'appointment' => htmlspecialchars($_POST['appointment']),
        'date' => htmlspecialchars($_POST['date']),
        'time' => htmlspecialchars($_POST['time'])
    ];
} elseif (!isset($_SESSION['appointment'])) {
    header("Location: ../index.php");
    exit;
}

$data = $_SESSION['appointment'];
?>
    <main>
<section class="container mt-5 p-4 summary-box shadow rounded-4" style="max-width: 650px; background: #ffffffcc;">
    <h2 class="text-center mb-4 fw-bold" style="color:#0c6c36;">Summary of Appointment</h2>

    <div class="summary-group mb-2"><strong>Full Name:</strong> <?php echo $data['fullname']; ?></div>
    <div class="summary-group mb-2"><strong>Phone Number:</strong> <?php echo $data['mobile']; ?></div>
    <div class="summary-group mb-2"><strong>Email:</strong> <?php echo $data['email']; ?></div>
    <div class="summary-group mb-2"><strong>Appointment For:</strong> <?php echo $data['appointment']; ?></div>
    <div class="summary-group mb-2"><strong>Date:</strong> <?php echo $data['date']; ?></div>
    <div class="summary-group mb-2"><strong>Time:</strong> <?php echo $data['time']; ?></div>

    <div class="text-center mt-4">
        <a href="../goQueue.html" class="btn btn-secondary rounded-5 px-4 py-2">Go Back</a>
        <form action="confirmAppointment.php" method="POST" style="display:inline-block;">
            <button type="submit" class="btn btn-success rounded-5 px-4 py-2 ms-2">Confirm</button>
        </form>
    </div>
</section>
</main>
    <footer>

    </footer>
</body>
</html>