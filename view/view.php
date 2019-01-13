<?php

if ($page == "home") {
    display_home();
    display_footer_home();
}
elseif ($page == "main") {
    display_header_cal();
    display_main();
}
elseif ($page == "role_selection") {
    display_header_cal();
    display_role_selection($id, $role_list);
}
elseif ($page == "role_update") {
    display_header_cal();
    display_role_update_form($id, $role_list);
}
elseif ($page == "children_selection") {
    display_header_cal();
    display_children_selection($id_parent, $player_list);
}
elseif ($page == "connection_failed") {
    display_home();
    display_footer_home();
    display_signin_failed();
}
elseif ($page == "creation_success") {
    display_creation_success();
}
elseif ($page == "creation_failed") {
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
    display_user_sub();
}

elseif ($page == "parentform") {
    display_parent_sub();
}
elseif ($page == "userform") {
    display_user_form();
}
elseif ($page == "edit_user") {
    display_user_edit($id_leader, $user_list);
}
elseif ($page == "edit_user_form") {
    display_user_edit_form($user_info);
}
elseif ($page == "erreur404") {
    display_error404();
    display_footer_home();
}
elseif ($page == "erreur") {
    display_error();
    display_footer_home();
}
elseif ($page == "erreur") {
    display_error();
}
else{
    display_error404();
    display_footer_home();
}


