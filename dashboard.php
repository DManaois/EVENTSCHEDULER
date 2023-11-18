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

// Select the 5 most recent images from the admin table, ordered by timestamp in descending order
// Replace 'date_created' with the correct column name, for example, 'date'
$sql = "SELECT * FROM events ORDER BY date DESC LIMIT 5"; 
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!---navigation & searchbar-->
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">Org-anizer</h2>
        </div>
        <div class="searchbar">
            <form action="/search" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <!---sidebar-->
    <div class="container">
        <div class="column-25">
            <div class="sidebar">
                <!-- Your existing sidebar content -->
            </div>
        </div>

        <!---content-->
        <div class="column-50">
            <div class="contentcontainer">
                <!-- Your existing content -->

                <h1>Recent Events</h1>
                <div id="carousel-container">
                    <ul id="carousel">
                        <?php
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $imageSrc = isset($row["image_filename"]) ? 'uploads/' . $row["image_filename"] : 'path_to_placeholder_image.jpg'; // Adjust the placeholder image path and extension.
                            echo "<td><img src='uploads/" . basename($row["image"]) . "' alt='Event Image' height='50' width='50'></td>";
                          }

                        } else {
                            // Placeholder images or a message if no events found
                            for ($i = 1; $i <= 5; $i++) {
                                echo "<li><img src='\Prototypedatabase\uploads$i.jpg' alt='Placeholder Image $i'></li>";
                            }
                        }
                        ?>
                    </ul>
                    <button id="prev-button">Prev</button>
                    <button id="next-button">Next</button>
                </div>

                <!-- Your existing content -->
            </div>
        </div>

        <div class="column-10"></div>
    </div>

    <!-- Your existing HTML content -->

    <footer>  
        <div class="footer">
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="index.php">SIGNOUT</a></li>
                </ul>
                <p>&copy; 2023 Org-anizer. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="dashboard.js"></script>
</body>
</html>
