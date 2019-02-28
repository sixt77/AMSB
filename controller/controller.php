<?php

//direction de base
$page = "erreur404";

if(parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/"){
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

        //incription parent personnelle
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

        if (isset($_POST["children_selection"])) {
            if (isset($_POST["children_list"])) {
                if (add_children($_POST['children_list'], $_POST["id_user"], $c)) {
                    $page = "subscribe_parent_success";
                } else {
                    $page = "subscribe_parent_failed";
                }
            }

        }
        //verification de la connection de l'utilisateur
        if (isset($_SESSION['stat']) && isset($_SESSION['id_leader'])) {

            //incription d'un licencé
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
                //coach
                if (isset($_POST["Coach"])) {
                    if (!add_coach($_POST["role_selection"], $c)) {
                        $sucess = false;
                    }
                }

                if ($sucess == true) {
                    $page = "creation_success";
                } else {
                    $page = "creation_failed";
                }
            }

            //mise a jour d'un utilisateur
            if (isset($_POST["update_user"])) {
                if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["Telephone"]) && !empty($_POST["Licence"])) {
                    if (user_update($_POST["update_user"], protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["Telephone"]), protect($_POST["Licence"]), $c)) {
                        $id = $_POST["update_user"];
                        $role_list = get_roles_list($c);
                        $user_role_list = get_role_user_by_id($id, $c);
                        if (isset($user_role_list[1])) {
                            $leader_role_list = get_leader_role_leader_by_id($user_role_list[1], $c);
                        } else {
                            $leader_role_list = null;
                        }
                        $page = "role_update";
                    } else {
                        $page = "erreur";
                    }
                } else {
                    $page = "erreur";
                }
            }
            //mise a jour des droits d'un utilisateur
            if (isset($_POST["update_user_right"])) {
                $sucess = true;
                $user_role_list = get_role_user_by_id($_POST["update_user_right"], $c);

                //Leader
                //modification du role et des sous rôles
                if (isset($_POST["Leader"])) {
                    //ajout du role
                    if ($user_role_list[1] == null && isset($_POST["Leader"])) {
                        if (!add_leader($_POST["update_user_right"], $c)) {
                            $sucess = false;
                        }
                    }
                    //suppression de tout les sous role (modification = delete + create)
                    if (!delete_all_leader_role(get_leader_id_by_user_id($_POST["update_user_right"], $c), $c)) {
                        $sucess = false;
                    }

                    //ajout des sous roles
                    if (isset($_POST["leader_role_list"])) {
                        if (!set_leader_role(get_leader_id_by_user_id($_POST["update_user_right"], $c), $_POST['leader_role_list'], $c)) {
                            $sucess = false;
                        }
                    }
                } else {
                    //suppression du rôle et des sous roles
                    if (!delete_all_leader_role(get_leader_id_by_user_id($_POST["update_user_right"], $c), $c)) {
                        $sucess = false;
                    }
                    //suppression du role
                    if ($user_role_list[1] != null && !isset($_POST["Leader"])) {
                        if (!delete_leader($_POST["update_user_right"], $c)) {
                            $sucess = false;
                        }
                    }
                }

                //OTM
                //ajout du role
                if ($user_role_list[2] == null && isset($_POST["OTM"])) {
                    if (!add_OTM($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                //suppression du role
                if ($user_role_list[2] != null && !isset($_POST["OTM"])) {
                    if (!delete_OTM($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }

                //arbiter
                //ajout du role
                if ($user_role_list[3] == null && isset($_POST["Arbiter"])) {
                    if (!add_arbiter($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                //suppression du role
                if ($user_role_list[3] != null && !isset($_POST["Arbiter"])) {
                    if (!delete_arbiter($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }


                //volunteer
                //ajout du role
                if ($user_role_list[4] == null && isset($_POST["Volunteer"])) {
                    if (!add_volunteer($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                //suppression du role
                if ($user_role_list[4] != null && !isset($_POST["Volunteer"])) {
                    if (!delete_volunteer($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }


                //player
                //ajout du role
                if ($user_role_list[5] == null && isset($_POST["Player"])) {
                    if (!add_player($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                //suppression du role
                if ($user_role_list[5] != null && !isset($_POST["Player"])) {
                    if (!delete_player($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }

                //coach
                //ajout du role
                if ($user_role_list[6] == null && isset($_POST["Coach"])) {
                    if (!add_coach($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                //suppression du role
                if ($user_role_list[6] != null && !isset($_POST["Coach"])) {
                    if (!delete_coach($_POST["update_user_right"], $c)) {
                        $sucess = false;
                    }
                }
                if ($sucess == true) {
                    $page = "creation_success";
                } else {
                    $page = "creation_failed";
                }
            }


            //modification de rôle
            if (isset($_POST["role_update"])) {
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

            //formulaire creation match
            if (isset($_POST["create_match_form"])) {
                $page = 'create_match_form';
                $team_list = get_team_list($c);
            }

            //creation match
            if (isset($_POST["create_match"])) {
                $sucess = true;
                if(!create_match(strtotime($_POST['date'])+(strtotime($_POST['time'])%86400), $c)){
                    $sucess = false;
                }

                $id_match = $c->insert_id;

                $team_list =  get_team_list($c);
                //ajout team1
                if(search_team_id_by_name($_POST['team1'], $team_list) != false){
                    if(!add_team_to_match($id_match, search_team_id_by_name($_POST['team1'], $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team1'], $team_list),$c), $c)){
                        $sucess = false;
                    }
                }else{
                    if(create_external_team($_POST['team1'], $c)){
                        $team_list =  get_team_list($c);
                        if(!add_team_to_match($id_match, search_team_id_by_name($_POST['team1'], $team_list), 0, $c)){
                            $sucess = false;
                        }
                    }
                }
                //ajout team2
                if(search_team_id_by_name($_POST['team2'], $team_list) != false){
                    if(!add_team_to_match($id_match, search_team_id_by_name($_POST['team2'], $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team2'], $team_list),$c), $c)){
                        $sucess = false;
                    }
                }else{
                    if(create_external_team($_POST['team2'], $c)){
                        $team_list =  get_team_list($c);
                        if(!add_team_to_match($id_match, search_team_id_by_name($_POST['team2'],  $team_list), 0, $c)){
                            $sucess = false;
                        }
                    }
                }

                if($sucess == true){
                    $page = "creation_success";
                }else{
                    $page = "creation_failed";
                }
            }

            //voire liste des matchs
            if(isset($_POST["get_matchs_list"])) {
                $match_list = get_all_matchs($c);
                $loop = 0;
                foreach ((array) $match_list as $match){
                    $match_data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                    $match_data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                    $loop++;
                }
                $page = "display_match_list";
            }

            //formulaire creation equipe
            if (isset($_POST["create_team_form"])) {
                $page = 'create_team_form';
                $player_list = get_players_list($c);
                $coach_list = get_coach_list($c);
            }
            //creation equipe
            if (isset($_POST["create_team"])) {
                if (isset($_POST['coach']) && isset($_POST['nom'])) {
                    if (create_team($_POST['coach'], $_POST['nom'], $c)) {
                        $id_team = $c->insert_id;
                        if (isset($_POST['player_list'])) {
                            if (add_player_team($_POST['player_list'], $id_team, $c)) {
                                $page = "creation_success";
                            } else {
                                $page = "creation_failed";
                            }
                        }
                        $page = "creation_success";
                    } else {
                        $page = "creation_failed";
                    }
                } else {
                    $page = "creation_failed";
                }
            }

            //selection  d'équipe
            if (isset($_POST["select_team"])) {
                $page = 'select_team';
                $team_list = get_team_list($c);
            }
            //formulaire de modification d'équipe
            if (isset($_POST["update_team_form"])) {
                $page = "edit_team_form";
                $player_list = get_players_list($c);
                $coach_list = get_coach_list($c);
                $team_info = get_team_info_by_id($_POST['team'], $c);
                $team_player_list = get_team_player_by_id($_POST['team'], $c);
            }
            //modification equipe
            if (isset($_POST["update_team"])) {
                if (update_team($_POST['update_team'], $_POST['coach'], $_POST['nom'], $c)) {
                    if (delete_all_player_team($_POST['update_team'], $c) && add_player_team($_POST['player_list'], $_POST['update_team'], $c)) {
                        $page = "creation_success";
                    } else {
                        $page = "creation_failed";
                    }
                } else {
                    $page = "creation_failed";
                }

            }



            //incription
            if (isset($_POST["user_edit_form"])) {
                $page = 'edit_user_form';
                $user_info = get_info_user_by_id($_POST['user_id'], $c);
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
}else{
    if(parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/index.php/api" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/index.php/api" ){
        //verification des paramètres  GET
        //fonction d'identification
        header("Access-Control-Allow-Origin: *");
        if($_GET['action'] == "login") {
            if (isset($_GET["login"]) && isset($_GET["password"])) {
                $user_id = user_signin_by_application($_GET["login"], $_GET["password"], $c);
                if ($user_id != false) {
                    $user_info = get_info_user_by_id($user_id, $c);
                    //renvoie les données en JSON
                    $data = [
                        'user_id' => $user_info[0],
                        'user_nom_famille' => $user_info[1],
                        'user_prenom' => $user_info[2],
                        'user_email' => $user_info[3],
                        'user_telephone' => $user_info[4],
                        'user_licence' => $user_info[5],
                    ];
                    write_json($data);
                } else {
                    $data = [
                        'user_info' => null
                    ];
                    write_json($data);
                }
            }
        }
        //recupération des rôles d'un utilisateur
        if($_GET['action'] == "get_user_info") {
            if (isset($_GET["user_id"])) {
                if ($_GET["user_id"] != false) {
                    $user_role = get_role_user_by_id($_GET["user_id"], $c);
                    //renvoie les données en JSON
                    $data = [
                        'utilisateur' => $user_role[0],
                        'dirigeant' => $user_role[1],
                        'otm' => $user_role[2],
                        'arbitre' => $user_role[3],
                        'benevole' => $user_role[4],
                        'joueur' => $user_role[5],
                        'entraineur' => $user_role[6],
                    ];
                    write_json($data);
                } else {
                    $data = [
                        'user_info' => null
                    ];
                    write_json($data);
                }
            }
        }
        //recuperation listes match
        if($_GET['action'] == "get_match_list") {
            $match_list = get_all_matchs($c);
            $loop = 0;
            foreach ((array) $match_list as $match){
                $data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                $loop++;
            }
            if(isset($data)){
                write_json($data);
            }else{
                write_json(null);
            }

        }
        //recuperation liste match via un id user (uniquement les match joué par la/les équipes du joueurs)
        if($_GET['action'] == "get_match_list_by_id_player") {
            if (isset($_GET["player_id"])) {
                $match_list = get_matchs_by_player_id($_GET["player_id"], $c);
                $loop = 0;
                foreach ((array) $match_list as $match){
                    $data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                    $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                    $loop++;
                }
                if(isset($data)){
                    write_json($data);
                }else{
                    write_json(null);
                }

            }
        }
        $page = "json";
    }else{
        $page = "erreur404";
    }

}
