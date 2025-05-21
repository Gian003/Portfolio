<?php
session_start();
include 'connect.php';

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// Fetch records
$sql = "SELECT id, First_Name, Last_Name, Gender, Civil_Status FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Page</title>
    <link rel="stylesheet" href="Animation.css">
    <link rel="stylesheet" type="text/css" href="Global.css">
    <link rel="stylesheet" href="Display_Style.css">
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

    <h1>Display Page</h1><br>
    <a href="Personal.php">Add Record</a>
    <?php
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fullName = $row['First_Name'] . ' ' . $row['Last_Name'];
                echo "<tr>
                        <td>{$fullName}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['Civil_Status']}</td>
                        <td class='action-links'>
                            <a href='view.php?id={$row['id']}'>View</a>
                            <a href='edit.php?id={$row['id']}'>Edit</a>
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
