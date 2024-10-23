<?php
require "connection.php";

$sql = mysqli_query($conn, "SELECT*FROM projectrecommendation");
$recommendationresult = [];
while ($row = mysqli_fetch_assoc($sql)){
    $recommendationresult[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .review-table {
            width: 96%;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin: 20px;
        }

        .review-table th,
        .review-table td {
            padding: 10px;
            text-align: center;
            background-color: #d3cfcf;
            overflow-y: auto;
        }

        .review-table thead {
            position:sticky;
        }

        .review-table th {
            background-color: #343333;
            color: aliceblue;
            font-weight: bold;
            text-transform: uppercase;
        }

        .review-table td:first-child,
        .review-table th:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .review-table td:last-child,
        .review-table th:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        header nav a img {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }
    </style>
</head>

<body>
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
        <table class="review-table">
            <thead>
                <tr>
                    <th colspan="6">RECOMMENDATION</th>
                </tr>
                <tr>
                    <th>NO</th>
                    <th>NAME</th>
                    <th>DATE</th>
                    <th>CATEGORY</th>
                    <th>RECOMMENDATION</th>
                    <th>IMAGE</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($recommendationresult as $recproject) : ?>
                    <tr>
                        <td><?php echo $recproject['ID'] ?></td>
                        <td><?php echo $recproject['User'] ?></td>
                        <td><?php echo $recproject['RecommendationDate'] ?></td>
                        <td><?php echo $recproject['Category'] ?></td>
                        <td><?php echo $recproject['Recommendation'] ?></td>
                        <td><?php if($recproject['Images']): ?>
                            <img src="<?php echo $recproject['Images']; ?>" alt="Review Image" style="max-width: 100px;">
                            <?php else: ?>
                                No image
                            <?php endif; 
                            ?></td>
                    </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>   
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