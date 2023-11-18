

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
