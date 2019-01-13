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
        //connection
        if ($_POST["action"] == "signin") {
            if (user_signin(protect($_POST["pseudo"]), protect($_POST["password"]), $c, $encryption_key)) {
                header('Location: index.php');
            } else {
                $page = "erreur";
            }
        }
        //incription
        if ($_POST["action"] == "signup") {
            if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["Telephone"]) && !empty($_POST["Licence"])) {
                if (user_signup(protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["motDePasse"]), protect($_POST["Telephone"]), protect($_POST["Licence"]), $c, $encryption_key)) {
                    $id = $c->insert_id;
                    $page = "role_selection";
                    $role_list = get_roles_list($c);
                } else {
                    $page = "erreur";
                }
            } else {
                $page = "erreur";
            }
        }
        //ajout de rôle
        if ($_POST["action"] == "role_selection") {
            $sucess = true;
            //dirigeants
            if(isset($_POST["Leader"])){

                if (add_leader($_POST["id_user"], $c)) {
                    if(isset($_POST["leader_role_list"])){
                        if(!set_leader_role(get_leader_id_by_user_id($_POST["id_user"], $c), $_POST['leader_role_list'], $c)){
                            $sucess = false;
                        }
                    }
                } else {
                    $sucess = false;
                }
            }
            //OTM
            if(isset($_POST["OTM"])){
                if (!add_OTM($_POST["id_user"], $c)) {
                    $sucess = false;
                }
            }
            //arbitres
            if(isset($_POST["Arbiter"])){
                if (!add_arbiter($_POST["id_user"], $c)) {
                    $sucess = false;
                }
            }
            //bénévoles
            if(isset($_POST["Volunteer"])){
                if (!add_volunteer($_POST["id_user"], $c)) {
                    $sucess = false;
                }
            }
            //joueur
            if(isset($_POST["Player"])){
                if (!add_player($_POST["id_user"], $c)) {
                    $sucess = false;
                }
            }

            if($sucess ==  true){
                $page = "creation_success";
            }else{
                $page = "creation_failed";
            }



        }


        //affichage des page view
    } else {
        //formulaire d'incription
        if (isset($_GET["subform"])) {
            $page = "user_sub";
        }
        //inscription parents
        if (isset($_GET["parent"])) {
            $page = "parentform";
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
