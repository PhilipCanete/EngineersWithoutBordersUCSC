<?php



function updateDatabase($t, $table)
{
    //Load ini data
    $ini = parse_ini_file("PrivateParts.ini");

    // Create connection
    $conn = new mysqli($ini['servername'], $ini['$username'], $ini['$password'], $ini['$dbname']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //Get Time Data
    $timeRecieved = date("m-d-Y H:i:s");
    $timeSent = $_GET['timeSent'];


    //Prepend temp arrary with time sent and time recieved
    array_unshift($t[0], 'Time Sent', 'Time Recieved');
    array_unshift($t[1], $timeSent, $timeRecieved);


    //Set columns and values. Not necessary but done for clarity
    $columns = $t[0];
    $values = $t[1];


    //Does the doing
    $sql = 'INSERT INTO `' . $table . '` (`' . implode('`,`', $columns) . '`) VALUES (\'' . implode('\',\'', $values) . '\')';

    // Print result
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


}