<?php

     function TH($data){

        $columns = array("Temperature", "Humidity");
        $values = explode((';'), $data);

        if(!$values) {
            throw new Exception('Error with temeperature and humidity data.');
        }
        else {
            return array($columns, $values);

        }
    }