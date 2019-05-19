<?php



function write_json($data) {
//format the data
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    $formattedData = json_encode($data);
    //$formattedData -> time = time();

//write data
    echo $formattedData;
}

