<?php
// Replace the values below with your own database information
$host = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Validate the form data
if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all required fields.";
} else if ($password != $confirm_password) {
    echo "Passwords do not match.";
} else {
    // Insert the user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
