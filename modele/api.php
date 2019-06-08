<?php



function write_json($data) {
//format the data
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    $formattedData = json_encode($data, JSON_UNESCAPED_UNICODE);
    //$formattedData -> time = time();
//write data
    echo $formattedData;
}

