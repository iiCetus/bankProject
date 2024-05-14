<?php
// Database connection parameters
$servername = "bankproj";
$username = "edward";
$password = "cupoftea0908!";
$dbname = "BankProj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];
    $email = $_POST['email'];
    $cc_number = $_POST['cc_number'];
    $cc_pin = $_POST['cc_pin'];
    $cvv = $_POST['cvv'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO your_table_name (first_name, last_name, dob, country, city, address, zip_code, email, cc_number, cc_pin, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $first_name, $last_name, $dob, $country, $city, $address, $zip_code, $email, $cc_number, $cc_pin, $cvv);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
