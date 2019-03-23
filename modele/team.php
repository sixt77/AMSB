<?php
//creer une equipe
function create_team($id_coach, $nom, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO equipes(id_coachs, nom, interne) VALUES('$id_coach', '$nom', true)");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//fait devenir un licencié dirigeant
function create_external_team($nom, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO equipes(nom, id_coachs, interne) VALUES('$nom', 0, false)");

    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//fait devenir un licencié dirigeant
function update_team($id_team, $id_coach, $nom, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE equipes 
SET nom = '$nom', id_coachs = '$id_coach'
WHERE id_equipes = '$id_team'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


//ajoute une liste de joueur a une équipe
//renvoie true ou false suivant si la requette fonctionne
function add_player_team($player_list, $id_team, $c) {
    $i = 0;
    $sql = "INSERT INTO joueurs_equipes (id_joueurs, id_equipes) VALUES ";
    foreach ($player_list as $player)
    {
        if ($i > 0) $sql .= ", ";
        $sql .= "({$player_list[$i]}, {$id_team})";
        $i++;
    }

    //execution
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//efface tout les joueurs d'une équipe
//renvoie true ou false suivant si la requette fonctionne
function delete_all_player_team($id_team, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("DELETE FROM `joueurs_equipes` WHERE id_equipes = '$id_team'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//retourne la liste des équipes
function get_team_list($c){
    $sql = ("SELECT * FROM equipes");
    $result = mysqli_query($c,$sql);
    $team_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $team_list[$loop]= $donnees;
        $loop++;
    }
    return $team_list;
}

//retourne les équipes du clubs (interne)
function get_internal_team_list($c){
    $sql = ("SELECT * FROM equipes WHERE interne ='1'");
    $result = mysqli_query($c,$sql);
    $team_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $team_list[$loop]= $donnees;
        $loop++;
    }
    return $team_list;
}


//retourne toutes les informations d'une équipe
function get_team_info_by_id($id_team, $c){
    $sql = ("SELECT * FROM equipes WHERE id_equipes ='$id_team'");
    $result = mysqli_query($c,$sql);
    if($row = mysqli_fetch_row($result)){
        $team_info = $row;
    }
    if(isset($team_info)){
        return $team_info;
    }
    else{
        return null;
    }
}

//retourne tous les joueurs d'une equipe via son id
function get_team_player_by_id($id_team, $c){
    $sql = ("SELECT id_joueurs FROM joueurs_equipes WHERE id_equipes ='$id_team'");
    $result = mysqli_query($c,$sql);
    $team_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $team_list[$loop]= $donnees['id_joueurs'];
        $loop++;
    }

    return $team_list;
}
//recherche dans une liste passé en paramètre un nom d'équipe, si elle en fait partie renvoie son id sinon renvoie false
function search_team_id_by_name($name, $team_list){
    $loop = 0;
    $end = false;
    while(!$end && isset($team_list[$loop])){
        if($team_list[$loop]['nom']==$name){
            $end = true;
        }else{
            $loop++;
        }
    }
    if($end){
        return $team_list[$loop]['id_equipes'];
    }else{
        return false;
    }
}
//recupère le coach via un id team
function get_coach_id_by_team_id($team_id, $c){
    $sql = ("SELECT id_coachs FROM equipes WHERE id_equipes ='$team_id'");
    $result = mysqli_query($c,$sql);
    if($row = mysqli_fetch_row($result)){
        $coach_id = $row[0];
    }
    if(isset($coach_id)){
        return $coach_id;
    }
    else{
        return null;
    }
}
//recupère les équipes participant a un match via un id match
function get_team_by_match_id($id_match, $c){
    $sql = ("SELECT E.id_equipes, E.nom, MEC.id_coachs
FROM matchs_equipes_coachs MEC
INNER JOIN equipes E ON MEC.id_equipes = E.id_equipes
WHERE MEC.id_matchs = '$id_match'");
    $result = mysqli_query($c,$sql);
    $team_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $team_list[$loop]= $donnees;
        $loop++;
    }

    return $team_list;
}


?>