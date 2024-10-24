<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Pembangunan Jalan</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <style>
        header nav a img {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }
    </style>
</head>

<body onload="displayWelcome()">
    <div class="layer2">
        <header>
            <nav>
                <a href="index.php">HOME</a>
                <a href="ongoing.php">ONGOING</a>
                <a href="budget.php">BUDGET</a>
                <a href="material.php">MATERIAL</a>
                <a href="progress.php">PROGRESS</a>
                <a href="aboutme.php">ABOUT ME</a>
                <a href="admin.php"><img src="login.jpg" alt="Login" title="Login"></a>
            </nav>
            <h1>Proyek<br>Pembangunan Jalan</h1>
        </header>
        <div class="container">
            <div class="box2">
                <p id="welcomeUser"></p>
            </div>
            <div class="box">
                <img src="ongoing.jpeg">
                <p>List of ongoing project</p>
                <a href="ongoing.html">ONGOING PROJECT</a>
            </div>
            <div class="box">
                <img src="BUDGET.jpeg">
                <p>List of budget project</p>
                <a href="budget.html">BUDGET PROJECT</a>
            </div>
        </div>
        <div class="container">
            <div class="box">
                <img src="MATERIAL.jpeg">
                <p>List of available materials</p>
                <a href="material.html">MATERIAL</a>
            </div>
            <div class="box">
                <img src="PROGRESS-REPORT.jpeg">
                <p>List of progress report</p>
                <a href="progress.html">PROGRESS REPORT</a>
            </div>
            <div class="box">
                <img src="me.jpg">
                <p> Website owner</p>
                <a href="aboutme.html">ABOUT ME</a>
            </div>
        </div>
        <div class="layer3">
            <footer>
                <table>
                    <td>
                        <nav>
                            <a><img src="location.jpg">Samarinda, Kalimantan Timur, Indonesia</a>
                            <a link href="naylazpn@gmail.com"><img src="mail.jpg">naylazpn@gmail.com</a>
                            <a link
                                href="https://www.instagram.com/nayla.znlta?igsh=dnJhc3hqMzJvZ2Zs&utm_source=qr"><img
                                    src="insta.jpg">nayla.znlta</a>
                            <a link href="http://wa.me//6281545140227"><img src="contact.jpg">+62 815 4514 0227</a>
                        </nav>
                    </td>
                    <td>
                        <nav>
                            <a href="index.php">Home</a>
                            <a href="aboutme.php">About Me</a>
                            <a href="reviewform.php">Form Review</a>
                            <a href="recform.php">Form Recommendation</a>
                            <a href="reviewresult.php">Review</a>
                            <a href="recresult.php">Recommendation</a>
                        </nav>
                    </td>
                </table>
            </footer>
        </div>
    </div>
</body>

</html>