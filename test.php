<?php

    $servername = "Db-01.soe.ucsc.edu";
    $username = "arboretum_data";
    $password = "icherdak_backend";
    $dbname = "arboretum_data";
    $table = "test_table";

    $timeRecieved = date("m-d-Y H:i:s");

    $timeSent = $_GET['timeSent'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO $table (timeSent, timeRecieved)
                         VALUES ('$timeSent','$timeRecieved')";

    // Print result
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();

?>