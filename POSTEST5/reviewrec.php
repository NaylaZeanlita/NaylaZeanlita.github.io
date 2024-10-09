<?php
require "connection.php";

// Fetch reviews
$reviewsResult = mysqli_query($conn, "SELECT * FROM projectreview ORDER BY ReviewDate DESC");

// Fetch recommendations
$recommendationsResult = mysqli_query($conn, "SELECT * FROM projectrecommendation ORDER BY Recommendationdate DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Proyek Pembangunan Jalan</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .feedback-section {
            width: 45%;
            margin-bottom: 30px;
        }

        .feedback-item {
            background-color: var(--secondary-color);
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .feedback-item h3 {
            margin-top: 0;
            color: var(--text-color);
        }

        .feedback-item p {
            margin: 5px 0;
            font-size: 14px;
        }

        .rating {
            color: gold;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .feedback-section {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="layer2">
        <header>
            <nav>
                <a href="index.php">HOME</a>
                <a href="ongoing.html">ONGOING</a>
                <a href="budget.html">BUDGET</a>
                <a href="material.html">MATERIAL</a>
                <a href="progress.html">PROGRESS</a>
                <a href="aboutme.html">ABOUT ME</a>
                <a href="feedback.php">FEEDBACK</a>
            </nav>
            <h1>Proyek<br>Pembangunan Jalan</h1>
        </header>

        <div class="feedback-container">
            <div class="feedback-section">
                <h2>Reviews</h2>
                <?php while ($review = mysqli_fetch_assoc($reviewsResult)): ?>
                    <div class="feedback-item">
                        <h3><?php echo htmlspecialchars($review['User']); ?></h3>
                        <p>Date: <?php echo htmlspecialchars($review['ReviewDate']); ?></p>
                        <p>Rating: <span class="rating"><?php echo str_repeat('★', $review['Rating']); ?></span></p>
                        <p><?php echo htmlspecialchars($review['Review']); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="feedback-section">
                <h2>Recommendations</h2>
                <?php while ($recommendation = mysqli_fetch_assoc($recommendationsResult)): ?>
                    <div class="feedback-item">
                        <h3><?php echo htmlspecialchars($recommendation['User']); ?></h3>
                        <p>Date: <?php echo htmlspecialchars($recommendation['Recommendationdate']); ?></p>
                        <p>Category: <?php echo htmlspecialchars($recommendation['category']); ?></p>
                        <p><?php echo htmlspecialchars($recommendation['recommendation']); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="layer3">
            <footer>
                <table>
                    <tr>
                        <td>
                            <nav>
                                <a><img src="location.jpg" alt="Location">Samarinda, Kalimantan Timur, Indonesia</a>
                                <a href="mailto:naylazpn@gmail.com"><img src="mail.jpg" alt="Email">naylazpn@gmail.com</a>
                                <a href="https://www.instagram.com/nayla.znlta"><img src="insta.jpg" alt="Instagram">nayla.znlta</a>
                                <a href="http://wa.me//6281545140227"><img src="contact.jpg" alt="WhatsApp">+62 815 4514 0227</a>
                            </nav>
                        </td>
                        <td>
                            <nav>
                                <a href="index.php">Home</a>
                                <a href="aboutme.php">About Me</a>
                                <a href="reviewform.php">Form Review</a>
                                <a href="recommendationform.php">Form Recommendation</a>
                                <a href="reviewrec.php">Review & Recommendation</a>
                            </nav>
                        </td>
                    </tr>
                </table>
            </footer>
        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>