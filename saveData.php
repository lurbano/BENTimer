<?php

    // Get POST data (json)
    $json = file_get_contents('php://input');
    // Converts it into a PHP object
    $data = json_decode($json);

    
    if (!empty($data['username'])){
        
        $data["time"] = time();
        
        //save info to database file
        $dbFileName = $data['username']. '_log.json';

        $file = fopen($dbFileName, 'a');
        fwrite($file, json_encode($data)."\n");
        fclose($file);
        //send the information back as confimration
        echo json_encode($data);
    } else {
        echo "DATA NOT SAVED";
        
    }

?>
