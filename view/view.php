<?php

if ($page == "home") {
    display_home();
}

elseif ($page == "main") {
    display_navBar();
    display_main();
}


elseif ($page == "role_selection") {
    display_navBar();
    display_role_selection($id, $role_list);
}

elseif ($page == "role_update") {
    display_navBar();
    display_role_update_form($id, $role_list, $user_role_list, $leader_role_list);
}

elseif ($page == "children_selection") {
    display_children_selection($id_parent, $player_list);
}

elseif ($page == "connection_failed") {
    display_home();
    display_signin_failed();
}

elseif ($page == "creation_success") {
    display_navBar();
    display_creation_success();
}

elseif ($page == "creation_failed") {
    display_navBar();
    display_creation_failed();
}

elseif ($page == "subscribe_parent_success") {
    display_subscribe_parent_success();
}

elseif ($page == "subscribe_parent_failed") {
    display_subscribe_parent_failed();
}

elseif ($page == "subscribe_user_success") {
    display_subscribe_user_success();
}

elseif ($page == "subscribe_user_failed") {
    display_subscribe_user_failed();
}

elseif ($page == "sub_failed") {
    display_home();
    display_signup_failed();
}

elseif ($page == "user_sub") {
    display_navBar();
    display_user_sub();
}

elseif ($page == "parentform") {
    display_parent_sub();
}

elseif ($page == "userform") {
    display_user_form();
}

elseif ($page == "edit_user") {
    display_navBar();
    display_user_edit($id_leader, $user_list);
}

elseif ($page == "edit_user_form") {
    display_navBar();
    display_user_edit_form($user_info);
}

elseif ($page == "display_match_list") {
    display_navBar();
    display_create_match_list($match_data);
}

elseif ($page == "create_match_form") {
    display_navBar();
    display_create_match_form($team_list);
}

elseif ($page == "match_selection_form") {
    display_navBar();
    display_match_selection_form($match_list, $get);
}

elseif ($page == "otm_selection_form") {
    display_navBar();
    display_otm_selection_form($otm_list, $otm_sub_list, $get, $match_id);
}

elseif ($page == "arbiter_selection_form") {
    display_navBar();
    display_arbiter_selection_form($arbiter_list, $arbiter_sub_list, $get, $match_id);
}

elseif ($page == "display_team_list") {
    display_navBar();
    display_team_list($team_list);
}

elseif ($page == "create_team_form") {
    display_navBar();
    display_create_team_form($player_list, $coach_list);
}

elseif ($page == "select_team") {
    display_navBar();
    display_select_team($team_list);
}

elseif ($page == "edit_team_form") {
    display_navBar();
    display_edit_team_form($player_list, $coach_list, $team_info, $team_player_list);

}

elseif ($page == "display_users_list") {
    display_navBar();
    display_users_list($users_list);
}

elseif ($page == "erreur404") {
    display_error404();
}

elseif ($page == "erreur") {
    display_error();
}

elseif ($page == "erreur_message") {
    display_error_message($message);
}

elseif ($page == "json") {
    //display_error();
}

else{
    display_error404();
}


