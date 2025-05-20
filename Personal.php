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
             <form action="Personal.php" method="post">
                <div class="input-name-section">
                    <div class="input-container">
                        <label>Last Name</label><br>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>

                    <div class="input-container">
                        <label>First Name</label><br>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>

                    <div class="input-container">
                        <label>Middle Name</label><br>
                        <input type="text" id="mname" name="mname" placeholder="Middle Name" required>
                    </div>

                    <div class="input-container">
                        <label>Suffix</label><br>
                        <input type="text" id="sname" name="sname" placeholder="Suffix">
                    </div>
                </div>

                <div class="input-address-section">
                    <label id="address-label">Residential Address</label>
                    <div class="input-address-container">
                        <div class="input-container">
                            <input type="text" id="houseno" name="houseno" placeholder="House No." required>
                            <label>House No.</label>
                        </div>

                        <div class="input-container">
                            <input type="text" id="street" name="street" placeholder="Street" required>
                            <label>Street</label>
                        </div>

                        <div class="input-container">
                            <input type="text" id="barangay" name="barangay" placeholder="Barangay" required>
                            <label>Barangay</label>
                        </div>

                        <div class="input-container">
                            <input type="text" id="city_town" name="city_town" placeholder="City/Town" required>
                            <label>City/Town</label>
                        </div>

                        <div class="input-container">
                            <input type="text" id="province" name="province" placeholder="Province" required>
                            <label>Province</label>
                        </div>

                        <div class="input-container">
                            <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code" required>
                            <label>Zip Code</label>
                        </div>
                    </div>
                </div>

                <div class="input-identity-section">
                    <div class="input-container">
                        <div class="gender-container">
                            <label id="gender-label">Gender</label>

                            <div class="radio-container">
                                <input type="radio" id="male" name="gender" value="male" required>
                                <label>Male</label>
                            </div>

                            <div class="radio-container">
                                <input type="radio" id="female" name="gender" value="female" required>
                                <label>Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-container">
                        <label>Date of Birth</label>
                        <input type="date" id="date" name="date" required>
                    </div>

                    <div class="input-container">
                        <label>Place of Birth</label>
                        <input type="text" id="place" name="place" placeholder="Place of Birth" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>