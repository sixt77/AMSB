<?php
//creer un match
function create_match($date, $lieux, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO matchs(date, lieux) VALUES('$date', '$lieux')");
    if(mysqli_query($c,$sql)){
        return true;
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

//recupère les informations sur un match via son id
function get_matchs_info_by_id($match_id, $c){
    $sql = ("SELECT * FROM matchs
WHERE id = '$match_id'  ORDER BY date DESC");
    $result = mysqli_query($c,$sql);
    $matchs_info= array ();
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_info = $donnees;
    }
    return $matchs_info;
}



