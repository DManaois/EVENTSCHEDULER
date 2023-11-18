<?php
session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";
$table_name = "users";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$email = $password = $contact = $facebook = "";

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Select data for the logged-in user from the login table
    $sql = "SELECT email, password, contact, facebook FROM $table_name WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $facebook = $row['facebook'];
    } else {
        echo "User not found in the database.";
        exit;
    }
} else {
    echo "Session not set. User not logged in.";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <div class="column-50">
        <div class="contentcontainer">
            <h1>BASIC INFORMATION</h1>
            <table class="t1">
                <tr>
                    <td>EMAIL ADDRESS</td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><a href="changepasswordstudent.php">Change Password</a></td>
                </tr>
            </table>

            <h1><br><br>CONTACT INFORMATION</h1>
            <table class="t2">
                <tr>
                    <td>CONTACT NO.   </td>
                    <td><?php echo $contact; ?></td>
                </tr>

                <tr>
                    <td>FACEBOOK</td>
                    <td><?php echo $facebook; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <a href="viewevents.php">view reports</a>
</body>
</html>
