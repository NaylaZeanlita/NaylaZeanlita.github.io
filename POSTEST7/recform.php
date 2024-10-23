<?php
require "connection.php";
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type'])) {
        $user = $_POST['user'];
        $images = null;

        if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
            $target_dir = "image/";
            $imageFileType = strtolower(pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION));
            
            $newFileName = date("Y-m-d H.i.s") . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;
            
            $check = getimagesize($_FILES["images"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
                    $images = $target_file;
                } else {
                    $message = "Sorry, there was an error uploading your file.";
                }
            } else {
                $message = "File is not an image.";
            }
        }


        if ($_POST['form_type'] == 'review') {
            $reviewdate = $_POST['reviewdate'];
            $review = $_POST['review'];
            $rating = $_POST['rating'];

            $sql = "INSERT INTO projectreview (User, ReviewDate, Rating, Review, Images) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $user, $reviewdate, $rating, $review, $images);
        } else {
            $recommendationdate = $_POST['recommendationdate'];
            $recommendation = $_POST['recommendation'];
            $category = $_POST['category'];

            $sql = "INSERT INTO projectrecommendation (User, RecommendationDate, Recommendation, Category, Images) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $user, $recommendationdate, $recommendation, $category, $images);
        }

        if ($stmt->execute()) {
            $message = "Form submitted successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review and Recommendation Forms</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            width: 50%;
        }
        .form-column {
            width: 100%;
            background-color: var(--secondary-color);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--text-color);
        }
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            background-color: #4CAF50;
            color: #0a0a55;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        h2 {
            color: var(--text-color);
            text-align: center;
            margin-bottom: 20px;
        }

        header nav a img {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
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
        <div class="form-container">
            <div class="form-column">
                <h2>Recommendation Form</h2>
                <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="form_type" value="recommendation">
                    
                    <div class="form-group">
                        <label for="user">Name:</label>
                        <input type="text" id="reuser" name="user" required>
                    </div>

                    <div class="form-group">
                        <label for="recommendationdate">Date:</label>
                        <input type="date" id="recommendationdate" name="recommendationdate" required>
                    </div>

                    <div class="form-group">
                        <label for="recommendation">Recommendation:</label>
                        <textarea id="recommendation" name="recommendation" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Street">Street</option>
                            <option value="Bridge">Bridge</option>
                            <option value="Other Infrastructur">Infrastruktur Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rec-images">Upload images:</label>
                        <input type="file" id="rec-images" name="images" accept="images/*">
                    </div>

                    <button type="submit">Submit Recommendation</button>
                </form>
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