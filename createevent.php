<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <h2>Create Event</h2>
    <form method="post" action="createevent.php" enctype="multipart/form-data">
        <label for="orgname">Organization Name:</label>
        <input type="text" id="orgname" name="orgname" required><br><br>

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" required><br><br>

        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required><br><br>

        <label for="borrowed_chairs">Borrowed Chairs:</label>
        <input type="number" id="borrowed_chairs" name="borrowed_chairs" required><br><br>

        <label for="borrowed_tables">Borrowed Tables:</label>
        <input type="number" id="borrowed_tables" name="borrowed_tables" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        <input type="submit" value="Create Event">
    </form>
    <br>
    <a href="loginadmin.php">Back to login</a>
    <a href="inventoryform.php">Back to inventory</a>
    <a href="report.php">View Reports</a>
    <a href="prfileadmin.php">profile</a>
</body>
</html>



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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orgname = $_POST['orgname'];
    $activity = $_POST['activity'];
    $venue = $_POST['venue'];
    $borrowed_chairs = $_POST['borrowed_chairs'];
    $borrowed_tables = $_POST['borrowed_tables'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Handle image upload
    // ...

// Handle image upload
// ...

// Handle image upload
$uploadDirectory = __DIR__ . "/uploads/";
$image_path = $uploadDirectory . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
    // Insert data into the events table
    $sql = "INSERT INTO events (orgname, activity, venue, borrowed_chairs, borrowed_tables, description, date, image) VALUES ('$orgname', '$activity', '$venue', $borrowed_chairs, $borrowed_tables, '$description', '$date', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully!";
    } else {
        echo "Error creating event: " . $conn->error;
    }
} else {
    echo "File upload error: " . $_FILES["image"]["error"];
}
}
// Close the database connection
$conn->close();


?>