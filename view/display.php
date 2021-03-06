<?php

function display_home(){

	require ("pages/home.php");

}

function display_navBar($leader_role_array){

    require ("pages/navBar.php");

}

function display_main(){

    require ("pages/main.php");

}

function display_role_selection($id, $role_list){

    require ("pages/role_selection.php");

}

function display_role_update_form($id, $role_list, $user_role_list, $leader_role_list){

    require ("pages/role_update.php");

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

function display_modif_success(){

    require ("pages/modif_success.php");

}

function display_modif_failed(){

    require ("pages/modif_failed.php");

}

function display_subscribe_parent_success(){

    require ("pages/subscribe_parent_success.php");

}

function display_subscribe_parent_failed(){

    require ("pages/subscribe_parent_failed.php");

}

function display_subscribe_user_success(){

    require ("pages/subscribe_user_success.php");

}

function display_subscribe_user_failed(){

    require ("pages/subscribe_user_failed.php");

}

function display_signup_failed(){

    require ("pages/signup_failed.php");

}

function display_user_sub() {

    require("pages/user_sub_form.php");

}

function display_user_edit($id_leader, $user_list) {

    require("pages/user_edit.php");

}
function display_renewal_licence($user_list) {

    require("pages/renewal_licence.php");

}

function display_renewal_form($user_info) {

    require("pages/renewal_licence_form.php");

}



function display_user_edit_form($user_info) {

    require("pages/user_edit_form.php");

}

function display_user_form() {

    require("pages/user_sub_form_by_user.php");

}

function display_create_match_list($match_data) {

    require("pages/display_match_list.php");

}

function display_create_match_form($team_list) {

    require("pages/create_match_form.php");

}

function display_select_match($match_data) {

    require("pages/select_match.php");

}

function display_edit_match_form($match_info) {

    require("pages/edit_match_form.php");

}

function display_match_selection_form($match_list, $get) {

    require("pages/match_selection.php");

}

function display_otm_selection_form($otm_list, $otm_sub_list, $get, $match_id) {

    require("pages/otm_selection.php");

}

function display_arbiter_selection_form($arbiter_list, $arbiter_sub_list, $get, $match_id) {

    require("pages/arbiter_selection.php");

}

function display_team_list($team_list) {

    require("pages/display_team_list.php");

}

function display_create_team_form($player_list, $coach_list) {

    require("pages/create_team_form.php");

}

function display_select_team($team_list) {

    require("pages/select_team.php");

}

function display_edit_team_form($player_list, $coach_list, $team_info, $team_player_list) {

    require("pages/edit_team_form.php");

}

function display_users_list($users_list) {

    require("pages/display_users_list.php");

}

function display_parent_sub() {

    require("pages/parent_sub_form.php");

}



function display_error404(){

    require ("pages/error404.php");

}

function display_error(){

    require ("pages/error.php");

}

function display_error_message($message){

    require ("pages/error_message.php");

}