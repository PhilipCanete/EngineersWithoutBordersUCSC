<?php

function W($data, $table)
{

    //Set olumn names, parse and set values based on semicolon delimiter
    $columns = array("Wind Speed");


    try {
        //Currently error only throws if no data was sent
        if (!$data) {
            throw new Exception('Error with ' . basename(__FILE__, '.php') . 'data.');
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