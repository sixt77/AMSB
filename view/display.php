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
function display_children_selection($id_parent, $player_list){

    require ("pages/children_selection.php");

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
function display_subscribe_parent_success(){

    require ("pages/subscribe_parent_success.php");

}
function display_subscribe_parent_failed(){

    require ("pages/subscribe_parent_failed.php");

}
function display_subscribe_user_success(){

    require ("pages/subscribe_parent_success.php");

}
function display_subscribe_user_failed(){

    require ("pages/subscribe_parent_failed.php");

}
function display_signup_failed(){

    require ("pages/signup_failed.php");

}
function display_user_sub() {

    require("pages/user_sub.php");

}
function display_user_form() {

    require("pages/user_form.php");

}

function display_parent_sub() {

    require("pages/parent_sub.php");

}

function display_error404(){

    require ("pages/error404.php");

}
function display_error(){

    require ("pages/error.php");

}