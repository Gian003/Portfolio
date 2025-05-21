<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <link rel="stylesheet" href="Animation.css">
    <link rel="stylesheet" type="text/css" href="Global.css">
    <link rel="stylesheet" href="Edit_Style.css">
</head>
<body>

    <!-- Navigation -->
    <div class="nav_container">
        <div class="logo">
            <div class="slanted-line"></div>
            <div class="slanted-line"></div>
            <div class="slanted-rectangle"></div>
        </div>
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

    <h1>Update Record</h1>
    <a href="Display.php">Back</a><br><br>

    <?php
        session_start();
        include "connect.php";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM user WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);

            if (!$query || mysqli_num_rows($query) == 0) {
                echo "<p>No record found.</p>";
                exit;
            }

            $row = mysqli_fetch_assoc($query);
        } else {
            echo "<p>No ID provided.</p>";
            exit;
        }

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>

    <!-- Update Form -->
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">

        <!-- Name Fields -->
        <label>First Name:</label>
        <input type="text" name="fname" value="<?= $row['First_Name']; ?>">

        <label>Last Name:</label>
        <input type="text" name="lname" value="<?= $row['Last_Name']; ?>">

        <label>Middle Name:</label>
        <input type="text" name="mname" value="<?= $row['Middle_Name']; ?>">

        <label>Suffix:</label>
        <input type="text" name="suffix" value="<?= $row['Suffix']; ?>">

        <!-- Status Dropdown -->
        <label>Status:</label>
        <select name="status">
            <option value="1" <?= $row['Civil_Status'] == "Single" ? 'selected' : '' ?>>Single</option>
            <option value="2" <?= $row['Civil_Status'] == "Married" ? 'selected' : '' ?>>Married</option>
            <option value="3" <?= $row['Civil_Status'] == "Widowed" ? 'selected' : '' ?>>Widowed</option>
            <option value="4" <?= $row['Civil_Status'] == "Separated" ? 'selected' : '' ?>>Separated</option>
        </select><br><br>

        <!-- Gender Radio Buttons -->
        <label>Gender:</label><br>
        <input type="radio" name="gender" value="male" <?= $row['Gender'] == "Male" ? 'checked' : '' ?>> Male
        <input type="radio" name="gender" value="female" <?= $row['Gender'] == "Female" ? 'checked' : '' ?>> Female

        <br><br>
        <input type="submit" name="update" value="Update">
    </form>

    <?php
    // Update logic after form submission
    if (isset($_POST['update'])) {
        include "Connect.php";

        $user_id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mname = $_POST['mname'];
        $suffix = $_POST['suffix'];

        // Convert status
        switch ($_POST['status']) {
            case 1: $civil_status = "Single"; break;
            case 2: $civil_status = "Married"; break;
            case 3: $civil_status = "Widowed"; break;
            default: $civil_status = "Separated"; break;
        }

        // Convert gender
        $gender = ($_POST['gender'] == "male") ? "Male" : "Female";

        // Update database
        $sql = "UPDATE sample_tbl SET 
                    First_Name='$fname', 
                    Last_Name='$lname', 
                    Middle_Name='$mname', 
                    Suffix='$suffix', 
                    Civil_Status='$civil_status', 
                    Gender='$gender' 
                WHERE id='$user_id'";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $_SESSION['message'] = "<h5>Record Successfully Updated</h5>";
            header("Location: edit.php?id=$id");
            exit;
        } else {
            $_SESSION['message'] = "<h5>Failed to Update</h5>";
            header("Location: edit.php?id=$id");
            mysqli_close($conn);
            exit;
        }
    }
    ?>
</body>
</html>
