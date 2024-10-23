<?php
session_start();
require "connection.php";

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = "Please enter username and password.";
    } else {
        $sql = "SELECT * FROM akunadmin WHERE Username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['Password'])) {  
                    $_SESSION['username'] = $username;
                    header("Location: admin.php");
                    exit();
                } else {
                    $message = "Invalid username or password.";
                }
            } else {
                $message = "Invalid username or password.";
            }
            $stmt->close();
        } else {
            $message = "Database error. Please try again later.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .layer2{
            background-image: url("BG.jpeg");
            height: 300px;
            padding-top: 25%;
            padding-bottom: 25%;
            background-repeat: no-repeat;
        }

        .form-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            width: 30%;
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
        input[type="password"] {
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

        a {
            text-decoration: none;
            color: #0a0a55;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="layer2">
        <div class="form-container">
            <div class="form-column">
                <h2>Admin Login</h2>
                <?php if (!empty($message)) { ?>
                    <div class="message <?php echo strpos($message, 'Invalid') === false ? 'success' : 'error'; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php } ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit">Login</button>
                    <p></p>
                    <a href="regist.php">Registration</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
