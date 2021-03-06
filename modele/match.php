<?php
//creer un match
function create_match($date, $lieux, $categorie, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO matchs(date, lieux, categorie) VALUES('$date', '$lieux', '$categorie')");
    if(mysqli_query($c,$sql)){
        $id_match = $c->insert_id;
        if(create_subject_for_match($id_match, $c)){
            return $id_match;
        }else{
            return false;
        }
    }
    else{
        return false;
    }
}

//ajouter une relation entre un match et une equipe
function add_team_to_match($id_match, $id_team, $id_coach, $c){
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO matchs_equipes_coachs(id_matchs, id_equipes, id_coachs) VALUES('$id_match', '$id_team', '$id_coach')");

    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

function delete_team_from_match($id_match, $id_coach, $c) {
    //suppression des valeurs dans la bdd
    $sql = ("DELETE FROM matchs_equipes_coachs WHERE id_matchs = $id_match && id_coachs = $id_coach");
    if(mysqli_query($c,$sql)) {
        return true;
    }
    else {
        return false;
    }
}

//recupère la liste des id de match via un id joueur
function get_all_matchs($c){
    $sql = ("SELECT id FROM matchs ORDER BY date DESC");
    $result = mysqli_query($c,$sql);
    $matchs_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_list[$loop]= $donnees;
        $loop++;
    }

    return $matchs_list;
}


//recupère la liste des id de match via un id joueur
function get_matchs_by_player_id($player_id, $c){
    $sql = ("SELECT DISTINCT M.id FROM joueurs_equipes JE 
INNER JOIN matchs_equipes_coachs MEC ON JE.id_equipes = MEC.id_equipes 
INNER JOIN matchs M ON MEC.id_matchs = M.id 
WHERE JE.id_joueurs = '$player_id' ORDER BY date DESC");
    $result = mysqli_query($c,$sql);
    $matchs_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_list[$loop] = $donnees;
        $loop++;
    }
    return $matchs_list;
}

//recupère la liste des id de match via un id joueur
function get_sub_matchs_by_player_id($player_id, $c){
    $sql = ("SELECT DISTINCT M.ID as id, LM.etat as etat
FROM matchs M
INNER JOIN liste_matchs LM ON LM.id_matchs = M.id
WHERE LM.id_joueurs = '$player_id'
ORDER BY M.date DESC");
    $result = mysqli_query($c,$sql);
    $matchs_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_list[$loop] = $donnees;
        $loop++;
    }
    return $matchs_list;
}

//recupère les informations sur un match via son id
function get_matchs_info_by_id($match_id, $c){
    $sql = ("SELECT * FROM matchs
WHERE id = '$match_id'");
    $result = mysqli_query($c,$sql);
    $match_info = array ();
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $match_info = $donnees;
    }
    return $match_info;
}

function update_match($match_id, $match_date, $match_location, $match_categorie, $c) {
    $sql = ("UPDATE matchs
SET date = '$match_date', lieux = '$match_location', categorie = '$match_categorie'
WHERE id = '$match_id'");
    if (mysqli_query($c, $sql)) {
        return true;
    } else {
        return false;
    }
}

//post le score d'un match
function post_score($match_id, $score1, $score2, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE matchs
SET scEquipe1 = '$score1', scEquipe2 =  '$score2'
WHERE id =  '$match_id'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

