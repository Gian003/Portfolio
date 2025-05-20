<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
</head>
<body>
    <h1>Update Record</h1>

    <a href="display.php">Back</a><br><br>

    <?php

    session_start();
    include "connect.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prevent SQL Injection (use prepared statements ideally)
        $sql = "SELECT * FROM sample_tbl WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);

        if (!$query || mysqli_num_rows($query) == 0) {
            echo "No record found.";
            exit;
        }

        $row = mysqli_fetch_assoc($query);
    } else {
        echo "No ID provided.";
        exit;
    }

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']); // Instead of session_destroy
    }
    ?>

    <form action="edit.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="user_id" value="<?= $row['id'] ?>">

        <!-- Name -->
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"><br><br>

        <!-- Status -->
        <label>Status:</label>
        <select name="status">
            <?php
            $statuses = ["1" => "Single", "2" => "Married", "3" => "Widowed", "4" => "Separated"];
            foreach ($statuses as $key => $value) {
                $selected = ($value === $row['status']) ? 'selected' : '';
                echo "<option value='$key' $selected>$value</option>";
            }
            ?>
        </select><br><br>

        <!-- Gender -->
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="male" <?= ($row['gender'] === "Male") ? "checked" : "" ?>> Male
        <input type="radio" name="gender" value="female" <?= ($row['gender'] === "Female") ? "checked" : "" ?>> Female
        <br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
