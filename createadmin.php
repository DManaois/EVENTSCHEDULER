<!DOCTYPE html>
<html>
<head>
    <title>Create Acc Form</title>
</head>
<body>
    <h2>Create Acc Form</h2>
    <form action="createadmin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <!-- New fields -->
        <label for="orgname">Organization Name:</label>
        <input type="text" id="orgname" name="orgname"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact"><br>

        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook"><br>

        <label for="twitter">Twitter:</label>
        <input type="text" id="twitter" name="twitter"><br>

        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram"><br>

        <input type="submit" value="Create Account">
    </form>
    <br>

    <a href="loginadmin.php">login</a>

</body>
</html>

<?php

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
    // Retrieve the form data
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $orgname = isset($_POST['orgname']) ? $_POST['orgname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $contact = isset($_POST['contact']) ? $_POST['contact'] : "";
    $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : "";
    $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : "";
    $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";

    // Insert the data into the login table
    $sql = "INSERT INTO $table_name (username, password, orgname, email, contact, facebook, twitter, instagram) 
            VALUES ('$username', '$password', '$orgname', '$email', '$contact', '$facebook', '$twitter', '$instagram')";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Account created successfully!";
        header("Location: loginadmin.php");
    } else {
        echo "Error creating account: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted, provide a message or redirect as needed
    echo "Form not submitted.";
}

// Close the database connection
$conn->close();
?>
