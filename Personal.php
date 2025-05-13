<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="Animation.css">
    <link rel="stylesheet" type="text/css" href="global.css">
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
        <h1>Personal Information</h1>
        <div class="form-wrapper">
             <form action="Personal.php" method="post">
                <div class="name-section">
                    <div class="name-container">
                        <label for="lname">Last Name:</label><br>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </div>

                    <div class="name-container">
                        <label for="fname">First Name:</label><br>
                        <input type="text" id="fname" name="fname" placeholder="First Name" required>
                    </div>

                    <div class="name-container">
                        <label for="mname">Middle Name:</label><br>
                        <input type="text" id="mname" name="mname" placeholder="Middle Name" required>
                    </div>

                    <div class="name-container">
                        <label for="sname">Suffix:</label><br>
                        <input type="text" id="sname" name="sname" placeholder="Suffix">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>