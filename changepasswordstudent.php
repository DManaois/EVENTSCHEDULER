<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: loginstudent.php");
    exit();
}

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the current username from the session
    $username = $_SESSION['username'];

    // Retrieve the new password from the form
    $newPassword = $_POST['new_password'];

    // Update the password in the database (store as plain text)
    $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Provide a message indicating a successful password change
        $message = "Password changed successfully!";
    } else {
        // Provide an error message
        $message = "Error changing password. Please try again.";
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
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>

    <!-- Display a message if the password change was successful or failed -->
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Change Password Form -->
    <form method="post" action="">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>

    <br>
    <a href="loginstudent.php">Logout</a>
</body>
</html>
