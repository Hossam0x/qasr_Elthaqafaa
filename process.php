<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $dayOfWeek = $_POST["dayOfWeek"];
    $timeOfDay = $_POST["timeOfDay"];
    
    // Process the data (for demonstration, just printing here)
    echo "You selected " . $dayOfWeek . " at " . $timeOfDay . ":00";
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your_form_page.html");
    exit;
}
?>
