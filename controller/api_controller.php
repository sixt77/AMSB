<?php
if(parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/AMSB/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/AMSB/" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/etu_info/amsb1/DEV/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/etu_info/amsb1/DEV/") {
    if (parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/index.php/api" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/index.php/api") {
        //verification des paramètres  GET
        //fonction d'identification
        if ($_GET['action'] == "login") {
            if (isset($_GET["login"]) && isset($_GET["password"])) {
                $user_id = user_signin_by_application($_GET["login"], $_GET["password"], $c);
                if ($user_id != false) {
                    $user_info = get_info_user_by_id($user_id, $c);
                    //renvoie les données en JSON
                    $data = [
                        'user_id' => $user_info[0],
                        'user_nom_familleget_match_list' => $user_info[1],
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
        if ($_GET['action'] == "get_user_info") {
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

        //recuperation listes des match
        if ($_GET['action'] == "get_match_list") {
            $loop = 0;
            $match_list = get_all_matchs($c);
            foreach ((array)$match_list as $match) {
                $data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                $loop++;
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }

        }

        //recuperation listes des match
        if ($_GET['action'] == "get_match_info_by_id") {
            if(isset($_GET['match_id'])){
                $data['match'] = get_matchs_info_by_id($_GET['match_id'], $c);
                $data['team'] = get_team_by_match_id($_GET['match_id'], $c);
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }

        }

        //recuperation listes des coachs
        if ($_GET['action'] == "get_coach_list") {
            $loop = 0;
            $data = get_coach_list($c);
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }

        }

        //recuperation liste match via un id user (uniquement les match joué par la/les équipes du joueurs)
        if ($_GET['action'] == "get_match_list_by_id_player") {
            if (isset($_GET["player_id"])) {
                $loop = 0;
                $match_list = get_sub_matchs_by_player_id($_GET["player_id"], $c);
                foreach ((array)$match_list as $match) {
                    $data[$loop]['match'] = get_matchs_info_by_id($match['id'], $c);
                    $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);
                    $data[$loop]['stat'] = $match['etat'];
                    $loop++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }

            }
        }
        //recuperation des matchs pour un otm (nombre d'otm présent sur chaque match et si l'otm actuel est affecté a un match
        if ($_GET['action'] == "get_match_list_by_id_OTM") {
            if (isset($_GET["OTM_id"])) {
                $loop = 0;
                $all_matchs = get_otm_number_on_all_match($c);
                $match_list = get_matchs_by_OTM_id($_GET['OTM_id'], $c);
                foreach ((array)$all_matchs as $match) {
                    $data[$loop]['match'] = $match;
                    if (in_array($match['id'], $match_list)) {
                        $data[$loop]['match']['selected'] = true;
                    } else {
                        $data[$loop]['match']['selected'] = false;
                    }
                    $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);

                    $loop++;
                }

                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        //permet a un OTM de s'inscire sur un match, renvoie true si la requette fonctionne, false sinon, et null si les informations ne sont pas suffisante
        if ($_GET['action'] == "OTM_subscribe_to_match") {
            if (isset($_GET["OTM_id"]) && isset($_GET['match_id'])) {
                if (OTM_subscribe_to_match($_GET['match_id'], $_GET["OTM_id"], $c)) {
                    $data = true;
                } else {
                    $data = false;
                }
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }
        }

        //permet a un OTM de se désinscire d'un match, renvoie true si la requette fonctionne, false sinon, et null si les informations ne sont pas suffisante
        if ($_GET['action'] == "OTM_unsubscribe_to_match") {
            if (isset($_GET["OTM_id"]) && isset($_GET['match_id'])) {
                if (OTM_unsubscribe_to_match($_GET['match_id'], $_GET["OTM_id"], $c)) {
                    $data = true;
                } else {
                    $data = false;
                }
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }
        }


        //recuperation des matchs pour un arbitre (nombre d'arbitre présent sur chaque match et si l'arbitre actuel est affecté a un match
        if ($_GET['action'] == "get_match_list_by_id_arbiter") {
            if (isset($_GET["arbiter_id"])) {
                $loop = 0;
                $all_matchs = get_arbiter_number_on_all_match($c);
                $match_list = get_matchs_by_arbiter_id($_GET['arbiter_id'], $c);
                foreach ((array) $all_matchs as $match) {
                    $data[$loop]['match'] = $match;
                    if (in_array($match['id'], $match_list)) {
                        $data[$loop]['match']['selected'] = true;
                    } else {
                        $data[$loop]['match']['selected'] = false;
                    }
                    $data[$loop]['team'] = get_team_by_match_id($match['id'], $c);

                    $loop++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }


        //permet a un arbitre de s'inscire sur un match, renvoie true si la requette fonctionne, false sinon, et null si les informations ne sont pas suffisante
        if ($_GET['action'] == "arbiter_subscribe_to_match") {
            if (isset($_GET["arbiter_id"]) && isset($_GET['match_id'])) {
                if (arbiter_subscribe_to_match($_GET['match_id'], $_GET["arbiter_id"], $c)) {
                    $data = true;
                } else {
                    $data = false;
                }
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }
        }

        //permet a un arbitre de se désinscire d'un match, renvoie true si la requette fonctionne, false sinon, et null si les informations ne sont pas suffisante
        if ($_GET['action'] == "arbiter_unsubscribe_to_match") {
            if (isset($_GET["arbiter_id"]) && isset($_GET['match_id'])) {
                if (arbiter_unsubscribe_to_match($_GET['match_id'], $_GET["arbiter_id"], $c)) {
                    $data = true;
                } else {
                    $data = false;
                }
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }
        }

        //permet a un coach d'acceder a la liste de ses match
        if ($_GET['action'] == "get_match_by_id_coach") {
            if (isset($_GET["coach_id"])) {
                $loop = 0;
                $match_list = get_matchs_by_coach_id($_GET['coach_id'], $c);
                $match = get_list_matchs_by_coach_id($_GET['coach_id'], $c);
                $match_list = array_unique(array_merge($match_list,$match));
                foreach ((array)$match_list as $match) {
                    $data[$loop]['match'] = get_matchs_info_by_id($match, $c);
                    $data[$loop]['team'] = get_team_by_match_id($match, $c);
                    $loop++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        //permet a un coach d'acceder a la liste de ses match
        if ($_GET['action'] == "get_match_list_by_id_coach") {
            if (isset($_GET["coach_id"])) {
                $loop = 0;
                $match_list = get_list_matchs_by_coach_id($_GET['coach_id'], $c);
                foreach ((array)$match_list as $match) {
                    $data[$loop]['match'] = get_matchs_info_by_id($match, $c);
                    $data[$loop]['team'] = get_team_by_match_id($match, $c);
                    $loop++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }


        //permet a un coach d'acceder a liste des joueurs
        if ($_GET['action'] == "get_player_list_by_match_id") {
            if (isset($_GET["match_id"]) && isset($_GET["coach_id"])) {
                $loop = 0;
                $player_list = get_player_info_by_match_id($_GET['match_id'], $c);
                foreach ((array) $player_list as $player) {
                    $data[$loop] = $player;
                    $loop++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        //permet a un coach d'acceder a liste des information d'un joueur+parent
        if ($_GET['action'] == "get_player_profile") {
            if (isset($_GET["player_id"])) {
                $data = get_player_profil($_GET["player_id"], $c);
                $data['parent'] = get_parent_info_by_player_id($_GET["player_id"], $c);
                $data['image'] = get_image_by_id_user($_GET["player_id"]);
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        //permet de recupérer les notifications match d'un joueurs et les infos de ce match
        if ($_GET['action'] == "get_player_notification") {
            if (isset($_GET["user_id"])) {
                $match_list = get_notification_list($_GET['user_id'], $c);
                if (isset($match_list)) {
                    write_json($match_list);
                } else {
                    write_json(null);
                }
            }
        }

        //permet de valider une notification avec un id user
        if ($_GET['action'] == "valider_notification") {
            if (isset($_GET["notification_id"])) {
                if($match_list = valid_notification($_GET['notification_id'], $c)){
                    $data =true;
                }else{
                    $data = false;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        if ($_GET['action'] == "create_player_list") {
            $i=1;
            $data = true;
            if (isset($_GET["player_id1"]) && isset($_GET["match_id"]) && isset($_GET["coach_id"])) {
                delete_match_list($_GET["coach_id"], $_GET["match_id"], $c);
                while (isset($_GET["player_id".$i])){
                    if(!create_match_list($_GET["coach_id"], $_GET["match_id"],$_GET["player_id".$i], $c)){
                        $data = false;
                    }
                    $i++;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        if ($_GET['action'] == "get_player_list") {
            $i=1;
            $data = true;
            if (isset($_GET["match_id"]) && isset($_GET["coach_id"])) {
                $data = get_player_match_list($_GET["coach_id"], $_GET["match_id"], $c);
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        if ($_GET['action'] == "send_switch_coach_request") {
            if (isset($_GET["id_demandeur"]) && isset($_GET["id_receveur"]) && isset($_GET["id_match"])) {
                if(send_coach_switch_request($_GET["id_demandeur"], $_GET["id_receveur"], $_GET["id_match"], $c)){
                    $data = true;
                }else{
                    $data = false;
                }
                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        if ($_GET['action'] == "get_switch_coach_request") {
            if (isset($_GET["id_coach"])) {
                $data = get_coach_switch_request_list($_GET['id_coach'], $c);

                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }

        if ($_GET['action'] == "valid_switch_coach_request") {
            if (isset($_GET["id_request"]) && isset($_GET["id_coach1"]) && isset($_GET["id_coach2"]) && isset($_GET["id_match"])) {
                if(switch_coach_match_list($_GET["id_coach1"], $_GET["id_coach2"], $_GET["id_match"], $c)){
                    if(valid_coach_switch_request($_GET["id_request"], $c)){
                        $data = true;
                    }else{
                        $data = false;
                    }
                }else{
                    $data = false;
                }

                if (isset($data)) {
                    write_json($data);
                } else {
                    write_json(null);
                }
            }
        }


        //permet d'envoyer un message
        if ($_GET['action'] == "post_score") {
            if (isset($_GET["match_id"]) && isset($_GET["score1"]) && isset($_GET["score2"])) {
                if(post_score($_GET["match_id"], $_GET["score1"], $_GET["score2"], $c)) {
                    write_json(true);
                }else{
                    write_json(null);
                }
            }
        }








        ///////////////////////////////////CHAT///////////////////////////////////////

        //permet d'obtenir l'id sujet en fonction d'un id match et d'un role
        if ($_GET['action'] == "get_subject_id") {
            if (isset($_GET["match_id"]) && isset($_GET["role"])) {
                $id_subject = find_id_subject_by_role($_GET['match_id'], $_GET["role"], $c);
                if(isset($id_subject)) {
                    write_json($id_subject);
                }else{
                    write_json(null);
                }
            }
        }

        //permet d'obtenir l'id sujet en fonction d'un id match
        if ($_GET['action'] == "get_subject_list") {
            if (isset($_GET["match_id"])) {
                $id_subject = find_id_subject_by_match($_GET['match_id'], $c);
                if(isset($id_subject)) {
                    write_json($id_subject);
                }else{
                    write_json(null);
                }
            }
        }

        //permet d'obtenir la liste des sujet en fonction d'un id sujet
        if ($_GET['action'] == "get_message_list") {
            if (isset($_GET["subject_id"]) && isset($_GET["limit"])) {
                $message_list = view_message($_GET['subject_id'], $_GET['limit'], $c);
                if(isset($message_list)) {
                    write_json($message_list);
                }else{
                    write_json(null);
                }
            }
        }


        //permet d'envoyer un message
        if ($_GET['action'] == "send_message") {
            if (isset($_GET["subject_id"]) && isset($_GET["user_id"]) && isset($_GET["date"]) && isset($_GET["content"])) {
                if(send_message($_GET["subject_id"], $_GET["user_id"], $_GET["date"], $_GET["content"], $c)) {
                    write_json(true);
                }else{
                    write_json(null);
                }
            }
        }


        $page = "json";
    }
}