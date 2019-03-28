<?php



function write_json($data) {
//format the data
    header("Access-Control-Allow-Origin: *");
    $formattedData = json_encode($data);
    //$formattedData -> time = time();

//write data
    echo $formattedData;
}

