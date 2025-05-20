<?php
session_start();
include 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Record successfully deleted.";
    } else {
        $_SESSION['message'] = "Failed to delete record.";
    }

    $stmt->close();
    $conn->close();
}

header("Location: Display.php");
exit();
?>
