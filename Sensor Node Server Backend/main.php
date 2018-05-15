<?php
include '_TemperatureHumidity.php';
include 'UpdateDatabase.php';

        //Get Sensor Data
        $data = $_GET['data'];
        $sensorID = $_GET['sensorID'];


        //Compare $senorID to valid sensorIDs.
        //If match, send $data to appropriate function. On success, [store columns[], values[], $tableName] into temporary array t[].
        switch ($sensorID) {

                //Temperature and Humidity Sensor
                case "TH":
                        try {
                            $t = TH($data);
                        } catch (Exception $e) {
                            echo 'Caught exception: ',  $e->getMessage(), "\n";
                        }
                break;

            default:
                echo "Error parsing sensor ID";
        }





?>