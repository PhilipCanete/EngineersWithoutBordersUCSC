<?php

function W($data)
{

    //Set table and column names, parse and set values based on semicolon delimiter
    $table = "Wind";
    $columns = array("Wind Speed");


    try {

        //Currently error only throws if 2 semicolons do not exist
        if (!$data[0]) {
            throw new Exception('Error with wind data.');
        } else {
            return array($table, $columns, [$data]);
        }
    }

        //Add error to database
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n\n";
        return ['Error Log', ['Message'], [$e->getMessage()]];
    }
}