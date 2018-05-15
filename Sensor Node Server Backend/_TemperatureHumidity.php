<?php

function TH($data)
{

    //Set table and column names, parse and set values based on semicolon delimiter
    $table = "Temperature and Humidity";
    $columns = array("Temperature", "Humidity");
    $values = explode((';'), $data);

    try {

        //Currently error only throws if 2 semicolons do not exist
        if (substr_count ($data,";") != 1 ) {
            throw new Exception('Error with temeperature and humidity data.');
        } else {
            return array($table, $columns, $values);
        }
    }

    //Add error to database
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n\n";
        return ['Error Log', ['Message'], [$e->getMessage()]];
}
}