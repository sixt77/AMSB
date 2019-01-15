<?php

//direction de base
$page = "erreur404";
if (empty($_POST) && empty($_GET)) {
// Vérification si l'user est enregisté
    if (isset($_SESSION['stat'])) {

        $page = "main";
    } else {
        $page = "home";
    }
} else {

//script de connection et l'inscription
    //connection

    if (isset($_POST["signin"])) {
        if (user_signin(protect($_POST["pseudo"]), protect($_POST["password"]), $c)) {
            header('Location: index.php');
        } else {
            $page = "erreur";
        }
    }
    //incription
    if (isset($_POST["signup_by_user"])) {
        if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["Telephone"]) && !empty($_POST["Licence"])) {
            if (user_signup(protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["motDePasse"]), protect($_POST["Telephone"]), protect($_POST["Licence"]), $c)) {
                $page = "subscribe_user_success";
            } else {
                $page = "subscribe_user_failed";
            }
        } else {
            $page = "subscribe_user_failed";
        }
    }

    //verification de la connection de l'utilisateur
    if (isset($_SESSION['stat']) && isset($_SESSION['id_leader'])) {

        //incription
        if (isset($_POST["signup"])) {
            if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["Telephone"]) && !empty($_POST["Licence"])) {
                if (user_signup(protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["motDePasse"]), protect($_POST["Telephone"]), protect($_POST["Licence"]), $c)) {
                    $id = $c->insert_id;
                    $role_list = get_roles_list($c);
                    $page = "role_selection";
                } else {
                    $page = "erreur";
                }
            } else {
                $page = "erreur";
            }
        }
        if (isset($_POST["update_user"])) {
            if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["Telephone"]) && !empty($_POST["Licence"])) {
                if (user_update($_POST["update_user"], protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["Telephone"]), protect($_POST["Licence"]), $c)) {
                    $id = $_POST["update_user"];
                    $user_role_list = get_role_user_by_id($id, $c);
                    var_dump($user_role_list);
                    exit;
                    $page = "role_update";
                } else {
                    $page = "erreur";
                }
            } else {
                $page = "erreur";
            }
        }


        //incription parent
        if (isset($_POST["signup_parent"])) {
            if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["Telephone"])) {
                if (parent_signup(protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["motDePasse"]), protect($_POST["Telephone"]), $c)) {
                    $id_parent = $c->insert_id;
                    $player_list = get_players_list($c);

                    $page = "children_selection";
                } else {
                    $page = "subscribe_parent_failed";
                }
            } else {
                $page = "subscribe_parent_failed";
            }
        }
        //ajout de rôle
        if (isset($_POST["role_selection"])) {
            $sucess = true;
            //dirigeants
            if (isset($_POST["Leader"])) {
                if (add_leader($_POST["role_selection"], $c)) {
                    if (isset($_POST["leader_role_list"])) {
                        if (!set_leader_role(get_leader_id_by_user_id($_POST["role_selection"], $c), $_POST['leader_role_list'], $c)) {
                            $sucess = false;
                        }
                    }
                } else {
                    $sucess = false;
                }
            }
            //OTM
            if (isset($_POST["OTM"])) {
                if (!add_OTM($_POST["role_selection"], $c)) {
                    $sucess = false;
                }
            }
            //arbitres
            if (isset($_POST["Arbiter"])) {
                if (!add_arbiter($_POST["role_selection"], $c)) {
                    $sucess = false;
                }
            }
            //bénévoles
            if (isset($_POST["Volunteer"])) {
                if (!add_volunteer($_POST["role_selection"], $c)) {
                    $sucess = false;
                }
            }
            //joueur
            if (isset($_POST["Player"])) {
                if (!add_player($_POST["role_selection"], $c)) {
                    $sucess = false;
                }
            }

            if ($sucess == true) {
                $page = "creation_success";
            } else {
                $page = "creation_failed";
            }


        }
        //incription
        if (isset($_POST["user_edit_form"])) {
            $page = 'edit_user_form';
            $user_info = get_info_user_by_id($_POST['user_id'], $c);
        }
        if (isset($_POST["children_selection"])) {
            if (isset($_POST["children_list"])) {
                if (add_children($_POST["id_user"], $_POST['children_list'], $c)) {
                    $page = "subscribe_parent_success";
                } else {
                    $page = "subscribe_parent_failed";
                }
            }

        }
        //formulaire d'incription
        if (isset($_POST["subform"])) {
            $page = "user_sub";
        }
        //formulaire d'incription
        if (isset($_POST["edit_user"])) {
            $page = "edit_user";
            $user_list = get_users_list($c);
            $id_leader = $_SESSION['id_leader'];
        }

        //déconnection
        if (isset($_GET["logout"])) {
            user_logout();
            header('location: index.php');
        }
    }

    //inscription parents
    if (isset($_GET["parent"])) {
        $page = "parentform";
    }
    //inscription utilisateurs
    if (isset($_GET["licencié"])) {
        $page = "userform";
    }

// Page A propos
    if (isset($_GET["propos"])) {
        $page = "propos";
    }


}
