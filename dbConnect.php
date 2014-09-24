<?php
$con=mysqli_connect("joolsubuntu.cloudapp.net", "azureuser", "SPL_ash2", "ArduinoMySQL");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM sensordata ORDER BY ReadingID DESC LIMIT 0,10");

while($row = mysqli_fetch_array($result)) {
  echo $row['ReadingID'], "," , $row['DateTime'], ",", $row['Sensor1'],";";
}

mysqli_close($con);