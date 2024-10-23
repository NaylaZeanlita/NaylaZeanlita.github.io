<?php
session_start();
require "connection.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = mysqli_query($conn, "SELECT*FROM projectreview");
$reviewresult = [];
while ($row = mysqli_fetch_assoc($sql)){
    $reviewresult[] = $row;
}

$sql = mysqli_query($conn, "SELECT*FROM projectrecommendation");
$recommendationresult = [];
while ($row = mysqli_fetch_assoc($sql)){
    $recommendationresult[] = $row;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $type = $_GET['type'];
    
    $table = ($type == 'review') ? 'projectreview' : 'projectrecommendation';
    $sql = "DELETE FROM $table WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

$reviews = $conn->query("SELECT * FROM projectreview ORDER BY ReviewDate DESC");
$recommendations = $conn->query("SELECT * FROM projectrecommendation ORDER BY RecommendationDate DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CRUD Page</title>
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

        .action-links {
            padding: auto;
            justify-content: space-around;
            
        }

        .action-links img {
            width: 24px;
            height: 24px;
            cursor: pointer;
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
                <a href="logout.php">LOGOUT</a>
            </nav>
            <h1>Proyek<br>Pembangunan Jalan</h1>
        </header>
        <table class="review-table">
            <thead>
                <tr>
                    <th colspan="7">REVIEW</th>
                </tr>
                <tr>
                    <th>NO</th>
                    <th>NAME</th>
                    <th>DATE</th>
                    <th>RATE</th>
                    <th>REVIEW</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($reviewresult as $reviewproject) : ?>
                    <tr>
                        <td><?php echo $reviewproject['ID'] ?></td>
                        <td><?php echo $reviewproject['User'] ?></td>
                        <td><?php echo $reviewproject['ReviewDate'] ?></td>
                        <td><?php echo $reviewproject['Rating'] ?></td>
                        <td><?php echo $reviewproject['Review'] ?></td>
                        <td><?php if($reviewproject['Images']): ?>
                            <img src="<?php echo $reviewproject['Images']; ?>" alt="Review Image" style="max-width: 100px;">
                            <?php else: ?>
                                No image
                            <?php endif; 
                            ?></td>
                        <td class="action-links">
                            <a href="editrev.php?id=<?php echo $reviewproject['ID']; ?>">
                            <img src="edit.jpg" alt="Edit" title="Edit"></a>
                            <a href="?delete=<?php echo $reviewproject['ID']; ?>&type=review" onclick="return confirm('Are you sure you want to delete this review?');">
                            <img src="delete.png" alt="Delete" title="Delete">
                            </a>
                        </td>
                    </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>  
        <table class="review-table">
            <thead>
                <tr>
                    <th colspan="7">RECOMMENDATION</th>
                </tr>
                <tr>
                    <th>NO</th>
                    <th>NAME</th>
                    <th>DATE</th>
                    <th>CATEGORY</th>
                    <th>RECOMMENDATION</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
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
                        <td class="action-links">
                            <a href="editrec.php?id=<?php echo $recproject['ID']; ?>">
                            <img src="edit.jpg" alt="Edit" title="Edit"></a>
                            <a href="?delete=<?php echo $recproject['ID']; ?>&type=review" onclick="return confirm('Are you sure you want to delete this review?');">
                            <img src="delete.png" alt="Delete" title="Delete">
                            </a>
                        </td>
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