<?php
//direction de base
$page = "erreur404";
if (empty($_POST) && empty($_GET)) {
// Vérification si l'user est enregisté
    if (isset($_SESSION['etat']) and $page != "connection_failed" and $page != "sub_failed") {

        $page = "main";
    } else {
        $page = "home";
    }
} else {
//script de connection et l'inscription
    if (isset($_POST["action"])) {

        if ($_POST["action"] == "signin") {
            if (user_signin(protect($_POST["pseudo"]), protect($_POST["password"]), $c, $encryption_key)) {
                header('Location: index.php');
            } else {
                $page = "erreur";
            }
        } else {
            $page = "erreur";
        }
        //incription et connection automatique
        if ($_POST["action"] == "signup") {
            if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && isset($_POST["password"])) {
                if (user_signup(protect($_POST["fname"]), protect($_POST["lname"]), protect($_POST["email"]), protect($_POST["password"]), $c, $encryption_key)) {
                    user_signin(protect($_POST["email"]), protect($_POST["password"]), $c, $encryption_key);
                    header('Location: index.php');
                } else {
                    $page = "erreur";
                }
            } else {
                $page = "erreur";
            }
        }

        //affichage des page view
    } elseif (isset($_POST["view"])) {
        if ($_POST["view"] == "set_group") {
            $one_group = get_one_group_by_id($_POST["id_groups"], $c);
            $users_in_gr = get_users_list_in_group_by_id($_POST["id_groups"], $c);
            $users_not_in_gr = get_users_list_not_in_group_by_id($_POST["id_groups"], $c);
            $pending_invitation_list = get_pending_invitation_by_id_user($_SESSION['id'], $c);
            $users_list = get_users_list($c);
            $page = "set_group";
        }
        if ($_POST["view"] == "set_event") {
            $one_event = get_one_event_by_id($_POST["id_event"], $c);
            $pending_invitation_list = get_pending_invitation_by_id_user($_SESSION['id'], $c);
            $users_list = get_users_list($c);
            $page = "set_event";
        }

    } else {
        //formulaire d'incription
        if (isset($_GET["subform"])) {
            $page = "user_sub";
        }
// Page A propos
        if (isset($_GET["propos"])) {
            $page = "propos";
        }
        if (isset($_SESSION['etat']) and $page != "connection_failed" and $page != "sub_failed") {
            if (isset($_GET["create-event"])) {
                $groups_list = get_groups_list($c);
                $users_list = get_users_list($c);
                $page = "create-event";
            }


            //formulaire de modification d'information
            if (isset($_GET["infoform"])) {
                $page = "update_info_form";
            }
            //déconnection
            if (isset($_GET["logout"])) {
                user_logout();
                header('location: index.php');
            }
        }
    }
}
