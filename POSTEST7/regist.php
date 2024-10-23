<?php
require "connection.php";

$message = '';

if (isset($_POST["submit"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    if (empty($username) || empty($password)) {
        $message = "Username and password are required";
    } elseif (strlen($password) < 8) {
        $message = "Password must be at least 8 characters long";
    } else {
        $checkQuery = "SELECT * FROM akunadmin WHERE Username = ?";
        $stmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $checkResult = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($checkResult) > 0) {
            $message = "Username already exists, please use another username";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            

            $insertQuery = "INSERT INTO akunadmin (Username, Password) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
            
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success_message'] = "Registration successful!";
                header("Location: login.php");
                exit();
            } else {
                $message = "Registration failed, please try again";
            }
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    </style>
</head>
<body>
    <div class="layer2">
        <div class="form-container">
            <div class="form-column">
                <h2>Admin Registration</h2>
                <?php if (!empty($message)): ?>
                    <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required 
                               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required 
                               minlength="8" placeholder="Minimum 8 characters">
                    </div>

                    <button type="submit" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>