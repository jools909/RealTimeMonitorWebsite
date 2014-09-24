<?php
$con=mysqli_connect("joolsubuntu.cloudapp.net", "azureuser", "SPL_ash2", "ArduinoMySQL");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT TOP 10 * FROM sensordata");

while($row = mysqli_fetch_array($result)) {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
}

mysqli_close($con);