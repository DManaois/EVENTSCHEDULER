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

// Check if eventid is provided in the URL
if (isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];

    // Retrieve event data from the database
    $sql = "SELECT * FROM events WHERE eventid = $eventid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Get the existing data
        $orgname = $row['orgname'];
        $activity = $row['activity'];
        $venue = $row['venue'];
        $borrowed_chairs = $row['borrowed_chairs'];
        $borrowed_tables = $row['borrowed_tables'];
        $description = $row['description'];
        $date = $row['date'];
        // Add other columns as needed

        // Close the database connection
        $conn->close();
    } else {
        // Redirect to the view events page if the eventid is not found
        header("Location: report.php");
        exit();
    }
} else {
    // Redirect to the view events page if eventid is not provided
    header("Location: reprot.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <!-- Add any additional styling as needed -->
</head>
<body>
    <h2>Edit Event</h2>

    <form action="updateevent.php" method="POST">
        <input type="hidden" name="eventid" value="<?php echo $eventid; ?>">

        <label for="orgname">Organization Name:</label>
        <input type="text" id="orgname" name="orgname" value="<?php echo $orgname; ?>" required><br>

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" value="<?php echo $activity; ?>" required><br>

        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" value="<?php echo $venue; ?>" required><br>

        <label for="borrowed_chairs">Borrowed Chairs:</label>
        <input type="text" id="borrowed_chairs" name="borrowed_chairs" value="<?php echo $borrowed_chairs; ?>" required><br>

        <label for="borrowed_tables">Borrowed Tables:</label>
        <input type="text" id="borrowed_tables" name="borrowed_tables" value="<?php echo $borrowed_tables; ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $description; ?></textarea><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $date; ?>" required><br>

        <!-- Add other input fields as needed -->

        <input type="submit" value="Update Event">
    </form>

    <br>
    <a href="report.php">Back to View Events</a>
</body>
</html>
