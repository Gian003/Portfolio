<?php
include 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT First_Name, Last_Name, Gender, Civil_Status FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($fname, $lname, $gender, $civil_status);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
} else {
    header("Location: Display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Page</title>
    <link rel="stylesheet" href="Animation.css">
    <link rel="stylesheet" type="text/css" href="Global.css">
    <link rel="stylesheet" href="View_Style.css">
</head>
<body>
    <div class="nav_container">
        <!--Logo-->
        <div class="logo">
            <div class="slanted-line"></div>
            <div class="slanted-line"></div>
            <div class="slanted-rectangle"></div>
        </div>

        <!--Navigation-->
        <div class="nav">
            <nav>
                <ul>
                    <li><a href="Home.html">Home</a></li>
                    <li><a href="Gallery.html">Gallery</a></li>
                    <li><a href="About.html">About</a></li>
                    <li><a href="Personal.php">Personal</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="view-container">
        <h1>View Record</h1>
        <div class="info-item">
            <strong>Name:</strong> <?php echo htmlspecialchars($fname . ' ' . $lname); ?>
        </div>
        <div class="info-item">
            <strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?>
        </div>
        <div class="info-item">
            <strong>Civil Status:</strong> <?php echo htmlspecialchars($civil_status); ?>
        </div>
        <a href="Display.php" class="back-link">← Back to List</a>
    </div>
</body>
</html>
