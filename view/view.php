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


