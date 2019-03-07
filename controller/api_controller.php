<?php
if(parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/AMSB/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/AMSB/" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/etu_info/amsb1/DEV/index.php" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) != "/etu_info/amsb1/DEV/") {
    if (parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/AMSB/index.php/api" || parse_url(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), PHP_URL_PATH) == "/etu_info/amsb1/DEV/index.php/api") {
        //verification des paramètres  GET
        //fonction d'identification
        header("Access-Control-Allow-Origin: *");
        if ($_GET['action'] == "login") {
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
        //recuperation liste match via un id user (uniquement les match joué par la/les équipes du joueurs)
        if ($_GET['action'] == "get_match_list_by_id_player") {
            if (isset($_GET["player_id"])) {
                $loop = 0;
                $match_list = get_matchs_by_player_id($_GET["player_id"], $c);
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

        //recuperation des matchs pour un arbitre (nombre d'arbitre présent sur chaque match et si l'arbitre actuel est affecté a un match
        if ($_GET['action'] == "get_match_list_by_id_coach") {
            if (isset($_GET["coach_id"])) {
                $loop = 0;
                $match_list = get_matchs_by_coach_id($_GET['coach_id'], $c);
                foreach ((array) $match_list as $match) {
                    $data[$loop]['match'] = $match;
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

        //permet a un coach d'acceder a liste des joueurs et leurs informations générique
        if ($_GET['action'] == "get_player_list_by_match_id") {
            if (isset($_GET["coach_id"]) && isset($_GET['match_id'])) {
                $loop = 0;
                $player_list = get_player_info_by_match_id($_GET['match_id'], $_GET['coach_id'], $c);
                foreach ((array) $player_list as $player){
                    $data[$loop] = $player;
                    $loop++;
                }
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }


        }

        //permet a un coach d'acceder a la liste précise des infos d'un joueurs
        if ($_GET['action'] == "get_player_profile") {
            if (isset($_GET["player_id"])) {
                $data = get_player_profile($_GET["player_id"], $c);
                $data['parent'] = get_parent_info_by_player_id($data['id_joueurs'], $c);
            }
            if (isset($data)) {
                write_json($data);
            } else {
                write_json(null);
            }


        }

        $page = "json";
    }
}