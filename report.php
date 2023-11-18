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

// Select all data from the events table
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>View Events</h2>
    <table>
        <tr>
            <th>Organization Name</th>
            <th>Activity</th>
            <th>Venue</th>
            <th>Borrowed Chairs</th>
            <th>Borrowed Tables</th>
            <th>Description</th>
            <th>Date</th>
            <th>Image</th>
        </tr>

        <?php
// ... (Database connection and fetching data)

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["orgname"] . "</td>";
        echo "<td>" . $row["activity"] . "</td>";
        echo "<td>" . $row["venue"] . "</td>";
        echo "<td>" . $row["borrowed_chairs"] . "</td>";
        echo "<td>" . $row["borrowed_tables"] . "</td>";    
        echo "<td>" . $row["description"] . "</td>";    
        echo "<td>" . $row["date"] . "</td>";
        echo "<td><img src='uploads/" . basename($row["image"]) . "' alt='Event Image' height='50' width='50'></td>";

        // Edit button
        echo "<td><a href='editevent.php?eventid=" . $row["eventid"] . "'>Edit</a></td>";

        // Delete button with confirmation
        echo "<td><a href='deleteevent.php?eventid=" . $row["eventid"] . "' onclick='return confirm(\"Are you sure you want to delete this event?\")'>Delete</a></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No events found.</td></tr>";
}
?>

    </table>
    <br>
    <a href="createevent.php">createevent</a>
    <a href="loginadmin.php">Login</a>
    <a href="inventoryform.php">inventory</a>
    <a href="profileadmin.php">profile</a>
</body>
</html>
