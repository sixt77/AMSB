<?php

//efface une liste de match
function delete_match_list($id_coach, $id_match, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("DELETE FROM liste_matchs WHERE id_matchs = '$id_match' AND id_coachs = '$id_coach' ");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//creation de liste de match
function create_match_list($id_coach, $id_match, $player_id, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO liste_matchs(id_coachs, id_matchs, id_joueurs) VALUES('$id_coach', '$id_match', '$player_id')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

function switch_coach_match_list($id_coach1, $id_coach2, $id_match, $c){
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE liste_matchs SET id_coachs='$id_coach2' WHERE id_matchs='$id_match' AND id_coachs='$id_coach1' ");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//retourne tous les joueurs d'une match_list via son id
function get_player_match_list($id_coach, $id_match, $c){
    $sql = ("SELECT id_joueurs FROM liste_matchs WHERE id_coachs = '$id_coach' AND id_matchs = '$id_match'");
    $result = mysqli_query($c,$sql);
    $player_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $player_list[$loop]= $donnees['id_joueurs'];
        $loop++;
    }
    return $player_list;
}