<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .review {
            background-color: #f4f4f4;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .review h3 {
            margin-top: 0;
        }
        .rating {
            color: #FFD700;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <h1>Project Reviews</h1>
    <?php
    if (file_exists('reviews.txt')) {
        $reviews = file('reviews.txt', FILE_IGNORE_NEW_LINES);
        if (count($reviews) > 0) {
            foreach ($reviews as $review) {
                list($name, $date, $rating, $text) = explode('|', $review);
                echo "<div class='review'>";
                echo "<h3>$name</h3>";
                echo "<p>Date: $date</p>";
                echo "<p class='rating'>Rating: " . str_repeat("★", $rating) . str_repeat("☆", 5 - $rating) . "</p>";
                echo "<p>$text</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No reviews submitted yet.</p>";
        }
    } else {
        echo "<p>No reviews submitted yet.</p>";
    }
    ?>
    <p><a href="index.html">Back to Home</a></p>
</body>
</html>