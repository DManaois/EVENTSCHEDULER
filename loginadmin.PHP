<?php
session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";
$table_name = "admin";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the login credentials
    $sql = "SELECT * FROM $table_name WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the login credentials are valid
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: profileadmin.php");
    } else {
        $login_error = "Invalid username or password.";
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
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="loginadmin.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <form action="createadmin.php" method="get">
        <button type="submit">Sign Up</button>
    </form>
    <form action="forgotpassword.php" method="get">
        <button type="submit">Forgot Password</button>
    </form>
    <form action="index.php" method="get">
        <button type="submit">CHANGE USER</button>
    </form>
    <?php
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>
</body>
</html>
