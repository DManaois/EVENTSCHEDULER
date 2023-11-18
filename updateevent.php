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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $eventid = $_POST['eventid'];
    $orgname = $_POST['orgname'];
    $activity = $_POST['activity'];
    $venue = $_POST['venue'];
    $borrowed_chairs = $_POST['borrowed_chairs'];
    $borrowed_tables = $_POST['borrowed_tables'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    // Add other columns as needed

    // Update the event in the database
    $sql = "UPDATE events SET
            orgname = '$orgname',
            activity = '$activity',
            venue = '$venue',
            borrowed_chairs = '$borrowed_chairs',
            borrowed_tables = '$borrowed_tables',
            description = '$description',
            date = '$date'
            WHERE eventid = $eventid";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        echo "Event updated successfully!";
        header("Location:report.php");
    } else {
        echo "Error updating event: " . $conn->error;
    }
} else {
    // If the form is not submitted, provide a message or redirect as needed
    echo "Form not submitted.";
}

// Close the database connection
$conn->close();
?>
