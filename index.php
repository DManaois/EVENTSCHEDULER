<!DOCTYPE html>
<html>
<head>
    <title>User/Admin Selection</title>
</head>
<body>
    <h2>User/Admin Selection</h2>
    <form method="post" action="index.php">
        <button type="submit" name="role" value="user">User</button>
        <button type="submit" name="role" value="admin">Admin</button>
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected role from the form
    $selectedRole = isset($_POST['role']) ? $_POST['role'] : "";

    // Process the selected role and redirect accordingly
    if ($selectedRole === "user") {
        header("Location: loginstudent.php");
        exit;
    } elseif ($selectedRole === "admin") {
        header("Location: loginadmin.php");
        exit;
    } else {
        echo "Invalid role selected.";
    }
} else {
    // If the form is not submitted, provide a message or redirect as needed
    echo "Form not submitted.";
}
?>
