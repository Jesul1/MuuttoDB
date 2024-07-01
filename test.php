<?php
// Database credentials
$servername = "localhost";
$username = "input";
$password = "Kaut321!";
$dbname = "BusinessOulu";

// Error log file path
$log_file = 'logfile.log';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error, 3, $log_file);
    die("Connection failed: " . $conn->connect_error);
}


// // Sample data
// $DeviceName = "Gaming123";
// $DeviceSerialnumber = 1234;
// $DeviceDestination = "OSAO";
// $DeviceCleared = 1;
// $DeviceTags = "TV"
// $DeviceRoomNum = 13
// $DeviceDetails = "Epic Thingy"

// // Execute the statement
// if ($stmt->execute()) {
//     echo "New record created successfully";
// } else {
//     error_log("Execute failed: " . $stmt->error, 3, $log_file);
//     echo "Error: " . $stmt->error;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // $deviceName = $_POST['DeviceName'];
    // $deviceSerialnumber = $_POST['DeviceSerialnumber'];
    // $deviceDestination = $_POST['DeviceDestination'];
    // $deviceCleared = isset($_POST['DeviceCleared']) ? 1 : 0;
    // $deviceRoomNum = $_POST['DeviceRoomNum'];

    // Sample data
    $DeviceName = "Gaming123";
    $DeviceSerialnumber = 1234;
    $DeviceDestination = "OSAO";
    $DeviceCleared = 1;
    $DeviceTags = "TV"
    $DeviceRoomNum = 13
    $DeviceDetails = "Epic Thingy"

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO IT_Devices (DeviceName, Serialnumber, Destination, Tags, Cleared, RoomNum, Details) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error, 3, $log_file);
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sisii", $deviceName, $deviceSerialnumber, $deviceDestination, $deviceCleared, $DeviceTags, $deviceRoomNum, $DeviceDetails);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        error_log("Execute failed: " . $stmt->error, 3, $log_file);
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
// Close the connection
$conn->close();
?>
