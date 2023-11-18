<?php
// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username from the form
    $username = $_POST['username'];

    // Check if the username exists in the admin table
    $check_username_query = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        // Username found, redirect to change password form
        header("Location: changepassword.php?username=$username");
        exit();
    } else {
        // Username not found
        $message = "Username not found. Please enter a valid username.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>

    <!-- Display a message if the username is not found -->
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Forgot Password Form -->
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <input type="submit" value="Reset Password">
    </form>

    <br>
    <a href="loginadmin.php">Login</a>
</body>
</html>
