<?php
include 'connect.php';

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $lname = trim($_POST['lname']);
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $sname = trim($_POST['sname']);
    $houseno = trim($_POST['houseno']);
    $street = trim($_POST['street']);
    $barangay = trim($_POST['barangay']);
    $city_town = trim($_POST['city_town']);
    $province = trim($_POST['province']);
    $zip_code = trim($_POST['zip_code']);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $birthplace = trim($_POST['birthplace']);
    $civil_status = $_POST['civil_status'];
    $cellphone = trim($_POST['cellphone']);
    $telephone = trim($_POST['telephone']);
    $citizenship = trim($_POST['citizenship']);
    $email = trim($_POST['email']);

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (Last_Name, First_Name, Middle_Name, Suffix, House_No, Street, Barangay, City_or_Town, Province, Zip_Code, Gender, Birthday, Birth_Place, Civil_Status, Cell_Num, Tell_Num, Citizenship, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssssss", $lname, $fname, $mname, $sname, $houseno, $street, $barangay, $city_town, $province, $zip_code, $gender, $birthdate, $birthplace, $civil_status, $cellphone, $telephone, $citizenship, $email);

        if ($stmt->execute()) {
            $success = "Record successfully added!";
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="Animation.css">
    <link rel="stylesheet" type="text/css" href="Global.css">
    <link rel="stylesheet" href="Personal_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="container">
        <h1 id="form-title">Personal Information</h1>
        <div class="form-wrapper">
            <form action="Personal.php" method="POST">
                <!-- Name Section -->
                <div class="form-section">
                    <h2>Personal Details</h2>
                    <div class="input-name-container">
                        <div class="input-container">
                            <input type="text" id="fname" name="fname" required>
                            <label>First Name</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="lname" name="lname" required>
                            <label>Last Name</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="mname" name="mname" required>
                            <label>Middle Name</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="sname" name="sname">
                            <label>Suffix</label>
                        </div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="form-section">
                    <h2>Address Information</h2>
                    <div class="input-address-container">
                        <div class="input-container">
                            <input type="text" id="houseno" name="houseno" required>
                            <label>House No.</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="street" name="street" required>
                            <label>Street</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="barangay" name="barangay" required>
                            <label>Barangay</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="city_town" name="city_town" required>
                            <label>City/Town</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="province" name="province" required>
                            <label>Province</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="zip_code" name="zip_code" required>
                            <label>Zip Code</label>
                        </div>
                    </div>
                </div>

                <!-- Personal Info Section -->
                <div class="form-section">
                    <h2>Additional Information</h2>
                    <div class="input-identity-container">
                        <div class="radio-group">
                            <label>Gender</label>
                            <div class="radio-options">
                                <label><input type="radio" name="gender" value="male" required> Male</label>
                                <label><input type="radio" name="gender" value="female" required> Female</label>
                            </div>
                        </div>
                        <div class="radio-group">
                            <label>Civil Status</label>
                            <div class="radio-options">
                                <label><input type="radio" name="civil_status" value="single" required> Single</label>
                                <label><input type="radio" name="civil_status" value="married" required> Married</label>
                                <label><input type="radio" name="civil_status" value="separated" required> Separated</label>
                                <label><input type="radio" name="civil_status" value="widowed" required> Widowed</label>
                            </div>
                        </div>
                        <div class="input-container">
                            <input type="date" id="birthdate" name="birthdate" required>
                            <label>Date of Birth</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="birthplace" name="birthplace" required>
                            <label>Place of Birth</label>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="form-section">
                    <h2>Contact Information</h2>
                    <div class="input-contact-container">
                        <div class="input-container">
                            <input type="tel" name="cellphone" pattern="^(\+63|0)?\d{10}$" required>
                            <label>Cellphone No.</label>
                        </div>
                        <div class="input-container">
                            <input type="tel" name="telephone" pattern="^0\d{9,10}$" required>
                            <label>Telephone No.</label>
                        </div>
                        <div class="input-container">
                            <input type="text" id="citizenship" name="citizenship" required>
                            <label>Citizenship</label>
                        </div>
                        <div class="input-container full-width">
                            <input type="email" id="email" name="email" required>
                            <label>Email Address</label>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <div>
                        <button type="button" class="btn records"><a href="Display.php">View All Records</a></button>
                    </div>
                    <div class="btn-container">
                        <button type="reset" class="btn secondary">Clear</button>
                        <button type="submit" class="btn primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>