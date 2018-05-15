<?php

function TH($data, $table)
{

    //Set column names, parse and set values based on semicolon delimiter
    $columns = array("Temperature", "Humidity");
    $values = explode((';'), $data);

    try {

        //Currently error only throws if 2 semicolons do not exist
        if (substr_count ($data,";") != 1 ) {
            throw new Exception('Error with ' . basename(__FILE__, '.php') . ' data.');
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