<?php
//Include all files
foreach (glob('Sensor Configs/*.php') as $file)
    include( $file );
include 'UpdateDatabase.php';

//Get Sensor Data
$data = $_GET['data'];
$sensorID = $_GET['sensorID'];

//Returned array of [TableName,Columns[], Values[])
$temp;

//Compare $senorID to valid sensorIDs.
//If match, send $data to appropriate function. On success, [store columns[], values[], $tableName] into temporary array t[].
//Else print error
try {
    switch ($sensorID) {


        //Temperature and Humidity Sensor
        case "TH":
            $temp = TH($data, "Temperature and Humidity");
            break;

        //Wind Sensor
        case "W":
            $temp = W($data, "Wind");
            break;

        case "SW";
            $temp = SW($data, "Magnetic Switch");
            break;

        /* Delete comments and replace all caps to add new sensor
        case "SHORTSENSORID";
            $temp = SHORTSENSORID($data, "TABLE NAME GOES HERE);
            break;
        */

        default:
            echo "Error parsing sensor ID " . PHP_EOL ;
            $temp = ['Error Log', ['Message'], ["Error parsing sensor ID"]];

    }
}

catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    $temp = ['Error Log', ['Message'], [$e->getMessage()]];
}

updateDatabase($temp);

?>