<?php
try {
    if($_SERVER['HTTP_HOST']=="os-vps418.infomaniak.ch"){
        $c = mysqli_connect("localhost", "amsb1", "D9NEywPS", "amsb1");
    }else{
        $c = mysqli_connect("localhost", "root", "", "amsb");
    }
}

catch (Exception $e) {
        die('Erreur : ' . $e->getMessage(failed));
}
?>