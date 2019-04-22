<?php
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
