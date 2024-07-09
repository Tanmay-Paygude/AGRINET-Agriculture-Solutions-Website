<?php
// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $vehicleType = $_POST["vehicleType"];
    $location = $_POST["location"];
    $goodsTransported = $_POST["goodsTransported"];

    // Connect to MySQL database (assuming localhost with default credentials)
    $servername = "localhost";
    $username = "username"; // Your MySQL username
    $password = "password"; // Your MySQL password
    $dbname = "TransportDatabase"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO TransportVehicles (vehicleType, location, goodsTransported) VALUES ('$vehicleType', '$location', '$goodsTransported')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If the request method is not POST, return an error
    http_response_code(405); // Method Not Allowed
    echo "Error: Method not allowed";
}
?>
