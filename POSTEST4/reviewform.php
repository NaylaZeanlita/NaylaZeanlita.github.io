<?php
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    
    // Save the review to a file
    $review_data = "$name|$date|$rating|$review\n";
    file_put_contents('reviews.txt', $review_data, FILE_APPEND);
    
    $message = "Thank you, $name! Your review has been submitted.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Project Review</h1>
    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="">Select a rating</option>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>

        <label for="review">Review:</label>
        <textarea id="review" name="review" rows="4" required></textarea>

        <input type="submit" value="Submit Review">
    </form>
    <p><a href="index.html">Back to Home</a></p>
</body>
</html>