<?php
try {
    if($_SERVER['HTTP_HOST']=="os-vps418.infomaniak.ch"){
        $c = mysqli_connect("localhost", "amsb1", "D9NEywPS", "amsb1_dev");
    }else{
        $c = mysqli_connect("localhost", "root", "", "amsb_dev");
    }
}

catch (Exception $e) {
        die('Erreur : ' . $e->getMessage(failed));
}
?>