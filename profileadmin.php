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

// Initialize variables
$orgname = $email = $password = $contact = $facebook = $twitter = $instagram = "";

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Select data for the logged-in user from the login table
    $sql = "SELECT orgname, email, password, contact, facebook, twitter, instagram FROM $table_name WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orgname = $row['orgname'];
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $facebook = $row['facebook'];
        $twitter = $row['twitter'];
        $instagram = $row['instagram'];
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
                    <td>ORG NAME</td>
                    <td><?php echo $orgname; ?></td>
                </tr>

                <tr>
                    <td>EMAIL ADDRESS</td>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><a href="changepassword.php">Change Password</a></td>
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

                <tr>
                    <td>TWITTER</td>
                    <td><?php echo $twitter; ?></td>
                </tr>

                <tr>
                    <td>INSTAGRAM</td>
                    <td><?php echo $instagram; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <a href="dashboard.php">view reports</a>
    <a href="createevent.php">createevent</a>
    <a href="inventoryform.php">inventory</a>
    <a href="report.php">view reports</a>
    <a href="loginadmin.php">login</a>
    
</body>
</html>
