<?php

function display_home(){

	require ("pages/home.php");

}
function display_footer_home(){

    require ("footer_home.php");

}

function display_header_cal(){

    require ("header_cal.php");

}
function display_main(){

    require ("pages/main.php");

}
function display_role_selection($id, $role_list){

    require ("pages/role_selection.php");

}
function display_signin_failed(){

	require ("pages/signin_failed.php");

}
function display_creation_success(){

    require ("pages/creation_success.php");

}
function display_creation_failed(){

	require ("pages/creation_failed.php");

}
function display_signup_failed(){

    require ("pages/signup_failed.php");

}

function display_error404(){

    require ("pages/error404.php");

}
function display_error(){

    require ("pages/error.php");

}