<?php

//direction de base
$page = "erreur404";
if(parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/PROD/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/PROD/"|| parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/"){
    if (empty($_POST) && empty($_GET)) {
        // Vérification si l'user est enregisté
        if (isset($_SESSION['stat'])) {
            $leader_role_array = get_leader_role_leader_by_id($_SESSION['id_leader'], $c);
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
            $leader_role_array = get_leader_role_leader_by_id($_SESSION['id_leader'], $c);
            //incription d'un licencé
            if (isset($_POST["signup"])) {
                if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["motDePasse"]) && !empty($_POST["telephone"]) && !empty($_POST["licence"]) && !empty($_POST["sexe"])) {
                    if(!isset($_POST['surclassage'])){
                        $_POST["surclassage"] = false;
                    }

                    if (user_signup(protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["motDePasse"]), protect($_POST["telephone"]), protect($_POST["licence"]), protect($_POST["sexe"]), protect($_POST["categorie"]), protect($_POST["surclassage"]), $c)) {
                        $id = $c->insert_id;
                        if(($_FILES['image']['size']>0)){
                            $message = upload_image($id);
                            if($message !== true){
                                $page = "erreur_message";
                            }
                        }

                        $i = 1;
                        while(isset($_POST['parent'.$i.'_last_name']) && isset($_POST['parent'.$i.'_first_name']) && isset($_POST['parent'.$i.'_mail']) && isset($_POST['parent'.$i.'_password']) && isset($_POST['parent'.$i.'_phone'])){
                            parent_signup(protect($_POST['parent'.$i.'_last_name']), protect($_POST['parent'.$i.'_first_name']), protect($_POST['parent'.$i.'_mail']), protect($_POST['parent'.$i.'_password']), protect($_POST['parent'.$i.'_phone']), $c);
                            $id_parent = $c->insert_id;
                            add_one_children($id, $id_parent, $c);
                            $i++;
                        }

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
                if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["telephone"]) && !empty($_POST["licence"]) && !empty($_POST["sexe"]) && !empty($_POST["categorie"]) && !empty($_POST["date_licence"])) {
                    if (!isset($_POST["surclassage"]))
                    {
                        $_POST["surclassage"] = "0";
                    }
                    if (user_update($_POST["update_user"], protect($_POST["nom"]), protect($_POST["prenom"]), protect($_POST["email"]), protect($_POST["telephone"]), protect($_POST["licence"]), protect($_POST["sexe"]), protect($_POST["categorie"]), $_POST["surclassage"], strtotime($_POST["date_licence"]), $c)) {
                        $id = $_POST["update_user"];
                        $role_list = get_roles_list($c);
                        $user_role_list = get_role_user_by_id($id, $c);
                        $image = get_image_by_id_user($_POST["update_user"]);
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
                    $page = "modif_success";
                } else {
                    $page = "modif_failed";
                }
            }

            //formulaire création match
            if (isset($_POST["create_match_form"])) {
                $page = 'create_match_form';
                $team_list = get_team_list($c);
            }


            //renouvellement licence
            if (isset($_POST["renewal_licence"])) {
                $users_list = get_users_list($c);
                $page = 'renewal_licence';
            }

            //formulaire de renouvellement de licence
            if (isset($_POST["user_renewal_form"])) {
                $user_info = get_all_info_user_by_id($_POST['user_id'], $c);
                $page = 'user_renewal_form';
            }

            //script de renouvellement de licence
            if (isset($_POST["user_renewal"])) {
                if(!isset($_POST['surclassage'])){
                    $_POST['surclassage'] = "false";
                }
                if(($_FILES['image']['size']>0)){
                    $message = upload_image($_POST['user_renewal']);
                    if($message !== true){
                        $page = "erreur_message";
                    }

                }
                if(update_user_licence($_POST['user_renewal'], strtotime($_POST['dateDeLicence']), $_POST['licence'], $_POST['categorie'], $_POST['surclassage'], $c) &&  $page != "erreur_message"){
                    $page = "modif_success";
                }else{
                    $page = "modif_success";
                }
            }


            //création match
            if (isset($_POST["create_match"])) {
                $sucess = true;
                $id_match = create_match(strtotime($_POST['date'])+(strtotime($_POST['time'])%86400), protect($_POST['lieux']), protect($_POST['categorie']), $c);
                if($id_match == null){
                    $sucess = false;
                }else{
                    $team_list = get_team_list($c);

                    //ajout team1
                    if(search_team_id_by_name(protect($_POST['team1']), $team_list) != false){
                        if(!add_team_to_match($id_match, search_team_id_by_name(protect($_POST['team1']), $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team1'], $team_list),$c), $c)){
                            $sucess = false;
                        }
                    }else{
                        if(create_external_team(protect($_POST['team1']), $c)){
                            $team_list =  get_team_list($c);
                            if(!add_team_to_match($id_match, search_team_id_by_name(protect($_POST['team1']), $team_list), 0, $c)){
                                $sucess = false;
                            }
                        }
                    }
                    //ajout team2
                    if(search_team_id_by_name(protect($_POST['team2']), $team_list) != false){
                        if(!add_team_to_match($id_match, search_team_id_by_name(protect($_POST['team2']), $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team2'], $team_list),$c), $c)){
                            $sucess = false;
                        }
                    }else{
                        if(create_external_team(protect($_POST['team2']), $c)){
                            $team_list =  get_team_list($c);
                            if(!add_team_to_match($id_match, search_team_id_by_name(protect($_POST['team2']),  $team_list), 0, $c)){
                                $sucess = false;
                            }
                        }
                    }
                }


                if($sucess == true){
                    $page = "creation_success";
                }else{
                    $page = "creation_failed";
                }
            }

            //voir liste des matchs
            if(isset($_POST["get_matchs_list"])) {
                $loop = 0;
                $match_list = get_all_matchs($c);
                $match_data = null;
                foreach ((array) $match_list as $match){
                    $match_data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                    $match_data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                    $loop++;
                }
                $page = "display_match_list";
            }

            //Séléction d'un match
            if(isset($_POST["select_match"])) {
                $loop = 0;
                $match_list = get_all_matchs($c);
                $match_data = null;
                foreach ((array) $match_list as $match) {
                    $match_data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                    $match_data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                    $loop++;
                }
                $page = "select_match";
            }

            //modification d'un match
            if(isset($_POST["edit_match_form"])) {
                $match_info = null;
                $match_info['match'] = get_matchs_info_by_id($_POST['match_id'], $c);
                $match_info['team'] = get_team_by_match_id($_POST['match_id'], $c);
                $page = "edit_match_form";
            }

            //mise à jour de match
            if(isset($_POST['update_match'])){
                $match_team = get_team_by_match_id($_POST['update_match'], $c);
                $match_info = get_matchs_info_by_id($_POST['update_match'], $c);
                $team_list = get_team_list($c);
                if (!empty($_POST['lieu']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['team1']) && !empty($_POST['team2']) && !empty($_POST['categorie'])) {
                    if ($match_info['date'] == $_POST['date'] || (date("Y m d H i",strtotime($_POST['date']))>  date("Y m d H i"))) {
                        if (($_POST['team1'] == $match_team['0']['nom']) && ($_POST['team2'] == $match_team['1']['nom'])) {
                            if (!empty($_POST['scEquipe1']) && !empty($_POST['scEquipe2'])) {
                                post_score($_POST['update_match'], protect($_POST['scEquipe1']), protect($_POST['scEquipe2']), $c);
                            }
                            if (update_match($_POST['update_match'], strtotime($_POST['date']) + (strtotime($_POST['time']) % 86400), protect($_POST['lieu']), protect($_POST['categorie']), $c)) {
                                $page = "modif_success";
                            } else {
                                $page = "modif_failed";
                            }
                        } else {
                            //suppression de match
                            delete_team_from_match($_POST['update_match'], $match_team['0']['id_coachs'], $c);
                            delete_team_from_match($_POST['update_match'], $match_team['1']['id_coachs'], $c);
                            //recréation du match
                            $sucess = true;

                            $id_match = $c->insert_id;

                            //ajout team1
                            if (search_team_id_by_name($_POST['team1'], $team_list) != false) {
                                if (!add_team_to_match($_POST['update_match'], search_team_id_by_name($_POST['team1'], $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team1'], $team_list), $c), $c)) {
                                    $sucess = false;
                                }
                            } else {
                                if (create_external_team($_POST['team1'], $c)) {
                                    $team_list = get_team_list($c);
                                    if (!add_team_to_match($_POST['update_match'], search_team_id_by_name($_POST['team1'], $team_list), 0, $c)) {
                                        $sucess = false;
                                    }
                                }
                            }
                            //ajout team2
                            if (search_team_id_by_name($_POST['team2'], $team_list) != false) {
                                if (!add_team_to_match($_POST['update_match'], search_team_id_by_name($_POST['team2'], $team_list), get_coach_id_by_team_id(search_team_id_by_name($_POST['team2'], $team_list), $c), $c)) {
                                    $sucess = false;
                                }
                            } else {
                                if (create_external_team($_POST['team2'], $c)) {
                                    $team_list = get_team_list($c);
                                    if (!add_team_to_match($_POST['update_match'], search_team_id_by_name($_POST['team2'], $team_list), 0, $c)) {
                                        $sucess = false;
                                    }
                                }
                            }

                            if (!empty($_POST['scEquipe1']) && !empty($_POST['scEquipe2'])) {
                                post_score($_POST['update_match'], $_POST['scEquipe1'], $_POST['scEquipe2'], $c);
                            }

                            if ($sucess == true && update_match($_POST['update_match'], strtotime($_POST['date']) + (strtotime($_POST['time']) % 86400), $_POST['lieu'], $_POST['categorie'], $c)) {
                                $page = "modif_success";
                            } else {
                                $page = "modif_failed";
                            }
                        }
                    } else {
                        $page = "modif_failed";
                    }
                }
            }


            //désignation d'otm sur un match (choix du match)
            if (isset($_POST["designation_OTM_form"])) {
                $match_list = get_otm_number_on_all_match($c);
                $get = "otm_selection";
                $page = "match_selection_form";
            }

            //désignation d'otm sur un match (désignation des otms)
            if (isset($_POST["otm_selection"])) {
                $match_id = $_POST['match_id'];
                $otm_list = get_otm_list($c);
                $otm_sub_list =  get_OTM_by_match_id($_POST['match_id'], $c);
                $get = "designation_OTM";
                $page = "otm_selection_form";
            }

            //désignation d'otm sur un match (enregistrement des données)
            if (isset($_POST["designation_OTM"])) {
                $sucess = true;
                if(!Delete_all_otm_from_match($_POST['designation_OTM'], $c)){
                    $sucess = false;
                }
                if(isset($_POST['otm_list'])) {
                    foreach ((array)$_POST['otm_list'] as $otm) {
                        if (!OTM_subscribe_to_match($_POST['designation_OTM'], $otm, $c)) {
                            $sucess = false;
                        }
                    }
                }
                if($sucess){
                    $page = "creation_success";
                }else{
                    $page = "creation_failed";
                }
            }


            //désignation d'arbitre sur un match (choix du match)
            if (isset($_POST["designation_arbiter_form"])) {
                $match_list = get_arbiter_number_on_all_match($c);
                $get = "arbiter_selection";
                $page = "match_selection_form";
            }

            //désignation d'arbitre sur un match (désignation des arbitres)
            if (isset($_POST["arbiter_selection"])) {
                $match_id = $_POST['match_id'];
                $arbiter_list = get_arbiter_list($c);
                $arbiter_sub_list =  get_arbiter_by_match_id($_POST['match_id'], $c);
                $get = "designation_arbiter";
                $page = "arbiter_selection_form";
            }

            //désignation d'otm sur un match (enregistrement des données)
            if (isset($_POST["designation_arbiter"])) {
                $sucess = true;
                if(!Delete_all_arbiter_from_match($_POST['designation_arbiter'], $c)){
                    $sucess = false;
                }
                if(isset($_POST['arbiter_list'])) {
                    foreach ((array)$_POST['arbiter_list'] as $arbitre) {
                        if (!arbiter_subscribe_to_match($_POST['designation_arbiter'], $arbitre, $c)) {
                            $sucess = false;
                        }
                    }
                }
                if($sucess){
                    $page = "creation_success";
                }else{
                    $page = "creation_failed";
                }
            }

            //affichage liste utilisateur
            if (isset($_POST["users_list"])) {
                $page = 'display_users_list';
                $users_list = get_users_list($c);
            }

            //affichage liste team
            if (isset($_POST["team_list"])) {
                $page = 'display_team_list';
                $team_list = get_team_list($c);
            }

            //formulaire création equipe
            if (isset($_POST["create_team_form"])) {
                $page = 'create_team_form';
                $player_list = get_players_list($c);
                $coach_list = get_coach_list($c);
            }
            //création equipe
            if (isset($_POST["create_team"])) {
                if (isset($_POST['coach']) && isset($_POST['nom'])) {
                    if (create_team($_POST['coach'], protect($_POST['nom']), $c)) {
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

            //selection d'équipe
            if (isset($_POST["select_team"])) {
                $page = 'select_team';
                $team_list = get_internal_team_list($c);
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
                if (update_team($_POST['update_team'], $_POST['coach'], protect($_POST['nom']), $c)) {
                    if (delete_all_player_team($_POST['update_team'], $c) && add_player_team($_POST['player_list'], $_POST['update_team'], $c)) {
                        $page = "modif_success";
                    } else {
                        $page = "modif_failed";
                    }
                } else {
                    $page = "modif_failed";
                }

            }



            //inscription
            if (isset($_POST["user_edit_form"])) {
                $page = 'edit_user_form';
                $user_info = get_info_user_by_id($_POST['user_id'], $c);
            }

            //formulaire d'inscription
            if (isset($_POST["subform"])) {
                $page = "user_sub";
            }
            //formulaire d'inscription
            if (isset($_POST["edit_user"])) {
                $page = "edit_user";
                $user_list = get_users_list($c);
                $id_leader = $_SESSION['id_leader'];
            }

            //déconnexion
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
}
