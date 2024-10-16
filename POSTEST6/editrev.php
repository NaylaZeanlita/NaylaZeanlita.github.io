<?php
require "connection.php";
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM projectreview WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $review = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $user = $_POST['user'];
    $reviewdate = $_POST['reviewdate'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review'];

    $sql = "UPDATE projectreview SET User = ?, ReviewDate = ?, Rating = ?, Review = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $user, $reviewdate, $rating, $review_text, $id);

    if ($stmt->execute()) {
        $message = "Review updated successfully.";
    } else {
        $message = "Error updating review: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
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
                <a>ONGOING</a>
                <a>BUDGET</a>
                <a>MATERIAL</a>
                <a>PROGRESS</a>
                <a href="aboutme.php">ABOUT ME</a>
                <a href="admin.php"><img src="login.jpg" alt="Login" title="Login"></a>
            </nav>
            </nav>
            <h1>Proyek<br>Pembangunan Jalan</h1>
        </header>
        <div class="form-container">
            <div class="form-column">
                <h2>Update Form</h2>
            <?php if ($message): ?>
                <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $review['ID']; ?>">
                
                <div class="form-group">
                    <label for="user">Name:</label>
                    <input type="text" id="user" name="user" value="<?php echo $review['User']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="reviewdate">Date:</label>
                    <input type="date" id="reviewdate" name="reviewdate" value="<?php echo $review['ReviewDate']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="review">Review:</label>
                    <textarea id="review" name="review" required><?php echo $review['Review']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select id="rating" name="rating" required>
                        <option value="">Select Rating</option>
                        <option value="★5 Excellent" <?php if ($review['Rating'] == '★5 Excellent') echo 'selected'; ?>>★5 Excellent</option>
                        <option value="★4 Very Good" <?php if ($review['Rating'] == '★4 Very Good') echo 'selected'; ?>>★4 Very Good</option>
                        <option value="★3 Good" <?php if ($review['Rating'] == '★3 Good') echo 'selected'; ?>>★3 Good</option>
                        <option value="★2 Fair" <?php if ($review['Rating'] == '★2 Fair') echo 'selected'; ?>>★2 Fair</option>
                        <option value="★1 Poor" <?php if ($review['Rating'] == '★1 Poor') echo 'selected'; ?>>★1 Poor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="review-images">Upload images:</label>
                    <input type="file" id="review-images" name="images" accept="images/*">
                </div>

                <button type="submit">Update Review</button>
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