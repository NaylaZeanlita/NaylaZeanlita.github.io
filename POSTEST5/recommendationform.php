<?php

require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['User'];
    $date = $_POST['date'];
    $recommendation = $_POST['recommendation'];
    $category = $_POST['category'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE projectreccomendation SET User='$name', RecommendationDate='$date', recommendation='$recommendation', category='$category' WHERE id=$id";
    } else {
        $sql = "INSERT INTO projectrecommendation (User, Recommendationdate, recommendation, category) VALUES ('$name', '$date', '$recommendation', '$category')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Success save recommendation.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM projectrecommendation WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Success delete recommendation.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$edit_id = $edit_name = $edit_date = $edit_recommendation = $edit_category = '';
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM projectrecommendation WHERE id=$edit_id");
    $row = mysqli_fetch_assoc($result);
    $edit_name = $row['User'];
    $edit_date = $row['date'];
    $edit_recommendation = $row['recommendation'];
    $edit_category = $row['category'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Recommendation Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="layer2">
        <h2>Recommendation Form</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php if ($edit_id): ?>
                <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
            <?php endif; ?>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $edit_name; ?>" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $edit_date; ?>" required>

            <label for="recommendation">Recommendation:</label>
            <textarea id="recommendation" name="recommendation" required><?php echo $edit_recommendation; ?></textarea>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="Jalan" <?php echo ($edit_category == 'Jalan') ? 'selected' : ''; ?>>Jalan</option>
                <option value="Jembatan" <?php echo ($edit_category == 'Jembatan') ? 'selected' : ''; ?>>Jembatan</option>
                <option value="Infrastruktur Lainnya" <?php echo ($edit_category == 'Infrastruktur Lainnya') ? 'selected' : ''; ?>>Infrastruktur Lainnya</option>
            </select>

            <button type="submit">Submit</button>
        </form>

        <h2>Recommendation</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Recommendation</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM projectrecommendation");
            while ($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['recommendation']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>
                        <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>

<?php
mysqli_close($conn);
?>