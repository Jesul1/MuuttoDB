<?php
$servername = "localhost";
$username = "input";  // Use your database username
$password = "Kaut321!";      // Use your database password
$dbname = "BusinessOulu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // // Insert furniture data
    // $furnitureName = $_POST['furnitureName'];
    // $furnitureRoomID = $_POST['furnitureRoomID'];

    // $sql = "INSERT INTO Furniture (Name, RoomID) VALUES ('$furnitureName', $furnitureRoomID)";
    // if ($conn->query($sql) === TRUE) {
    //     echo "New furniture record created successfully<br>";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // Insert device data
    $DeviceName = $_POST['DeviceName'];
    $DeviceSerialnumber = $_POST['DeviceSerialnumber'];
    $DeviceDestination = $_POST['DeviceDestination'];
    $DeviceCleared = $_POST['DeviceCleared'];
    $DeviceTags = $_POST['DeviceTags'];
    $DeviceRoomNum = $_POST['DeviceRoomNum'];
    $DeviceDetails = $_POST['DeviceDetails'];


    $sql = "INSERT INTO `IT_Devices` (DeviceName, Serialnumber, Destination, Cleared, Tags, RoomNum, Details) VALUES ($DeviceName, $DeviceSerialnumber, $DeviceDestination, $DeviceCleared, $DeviceTags, $DeviceRoomNum, $DeviceDetails)";
    if ($conn->query($sql) === TRUE) {
        echo "New device record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>