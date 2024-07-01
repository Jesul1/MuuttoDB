<?php
// Database credentials
$servername = "localhost";
$username = "input";
$password = "Kaut321!";
$dbname = "BusinessOulu";

// Error log file path
$log_file = '../logfile.log';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error, 3, $log_file);
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO IT_Devices (DeviceName, Serialnumber, Destination, Cleared, RoomNum) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    error_log("Prepare failed: " . $conn->error, 3, $log_file);
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sisii", $deviceName, $deviceSerialnumber, $deviceDestination, $deviceCleared, $deviceRoomNum);

// Sample data
$deviceName = "Laptop";
$deviceSerialnumber = 123456789;
$deviceDestination = "Office";
$deviceCleared = 1;
$deviceRoomNum = 101;

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    error_log("Execute failed: " . $stmt->error, 3, $log_file);
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
