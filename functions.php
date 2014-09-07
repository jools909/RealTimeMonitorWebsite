<?php

    function connectToDatabase(){
        $databaseConnection = mysqli_connect('joolsubuntu.cloudapp.net', 'azureuser', 'SPL_ash2', 'ArduinoMySQL')
        or die('Error connecting to MySQL server.' . mysql_error());
        return $databaseConnection;
    }