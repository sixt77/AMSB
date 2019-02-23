<?php

if ($page == "home") {
    display_home();
}

elseif ($page == "main") {
    display_navigation();
    display_main();
}

elseif ($page == "role_selection") {
    display_role_selection($id);
}

elseif ($page == "connection_failed") {
    display_home();
    display_footer_page();
    display_signin_failed();
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

elseif ($page == "erreur404") {
    display_error404();
    display_footer_page();
}

elseif ($page == "erreur") {
    display_error();
    display_footer_page();
}

elseif ($page == "erreur") {
    display_error();
}