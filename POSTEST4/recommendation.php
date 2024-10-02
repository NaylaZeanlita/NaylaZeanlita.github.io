<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .recommendation {
            background-color: #f4f4f4;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .recommendation h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h1>Submitted Recommendations</h1>
    <?php
    if (file_exists('recommendations.txt')) {
        $recommendations = file('recommendations.txt', FILE_IGNORE_NEW_LINES);
        foreach ($recommendations as $recommendation) {
            list($name, $date, $text) = explode('|', $recommendation);
            echo "<div class='recommendation'>";
            echo "<h3>$name</h3>";
            echo "<p>Date: $date</p>";
            echo "<p>$text</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No recommendations submitted yet.</p>";
    }
    ?>
    <p><a href="index.html">Back to Home</a></p>
</body>
</html>