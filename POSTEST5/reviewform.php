<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['User'];
    $date = $_POST['Date'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE projectreview SET User='$name', ReviewDate='$date', Review='$review', Rating='$rating' WHERE id=$id";
    } else {
        $sql = "INSERT INTO projectreview (User, ReviewDate, Rating, Review) VALUES ('$name', '$date',  '$rating', '$review')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Success save review.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM projectreview WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Success delete review.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$edit_id = $edit_name = $edit_date = $edit_rating = $edit_review = '';
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM projectreview WHERE id=$edit_id");
    $row = mysqli_fetch_assoc($result);
    $edit_name = $row['name'];
    $edit_date = $row['date'];
    $edit_review = $row['review'];
    $edit_rating = $row['rating'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="layer2">
        <h2>Review From</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php if ($edit_id): ?>
                <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
            <?php endif; ?>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $edit_name; ?>" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $edit_date; ?>" required>

            <label for="review">Review:</label>
            <textarea id="review" name="review" required><?php echo $edit_review; ?></textarea>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">Pilih Rating</option>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($edit_rating == $i) ? 'selected' : ''; ?>><?php echo $i; ?> Bintang</option>
                <?php endfor; ?>
            </select>

            <button type="submit">Submit</button>
        </form>

        <h2>Review</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Action</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM projectreview");
            while ($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['review']; ?></td>
                    <td><?php echo $row['rating']; ?> Bintang</td>
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