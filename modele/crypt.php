<?php

function encrypt($string) {
    $string = password_hash($string, PASSWORD_DEFAULT);
    return $string;
}

function verify($password_entered, $password_stored) {
    if (password_verify($password_entered, $password_stored)) {
        return true;
    } else {
        return false;
    }
}
function protect($value){
    return addslashes(stripslashes(strip_tags($value)));
}

?>