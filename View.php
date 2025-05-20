<?php
include 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT First_Name, Last_Name, Gender, Civil_Status FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($fname, $lname, $gender, $status);
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
</head>
<body>
    <h1>View Page</h1><br>
    <a href="Display.php">Back</a>
    <p>
        Name: <?php echo htmlspecialchars($fname . ' ' . $lname); ?><br>
        Gender: <?php echo htmlspecialchars($gender); ?><br>
        Status: <?php echo htmlspecialchars($status); ?><br>
    </p>
</body>
</html>
