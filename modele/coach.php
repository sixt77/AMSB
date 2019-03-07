<?php
//fait devenir un licencié dirigeant
function add_coach($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO entraineurs(id_utilisateurs) VALUES('$id_user')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle de joueur a un utilisateur
function delete_coach($id_user, $c) {
    $sql = ("DELETE FROM entraineurs WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//retourne la liste des matchs
function get_coach_list($c){
    $sql = ("SELECT *
FROM entraineurs C
INNER JOIN utilisateurs U ON C.id_utilisateurs = U.id");
    $result = mysqli_query($c,$sql);
    $coach_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $coach_list[$loop]= $donnees;
        $loop++;
    }
    return $coach_list;
}

//retourne la liste des joueurs avec leurs info principales présent a un match
function get_player_info_by_match_id($match_id, $coach_id, $c){
    $sql = ("SELECT U.id, U.nom, U.prenom, J.id_joueurs
FROM matchs_equipes_coachs MEC
INNER JOIN joueurs_equipes JE ON MEC.id_equipes = JE.id_equipes
INNER JOIN joueurs J ON J.id_joueurs = JE.id_joueurs
INNER JOIN utilisateurs U ON J.id_utilisateurs = U.id
WHERE MEC.id_coachs = '$coach_id' AND MEC.id_matchs = '$match_id'");
    $result = mysqli_query($c,$sql);
    $coach_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $coach_list[$loop]= $donnees;
        $loop++;
    }
    return $coach_list;
}

//retourne les toutes les infos d'un joueurs (joueur + parents)
function get_player_profile($id_player, $c){
    $sql = ("SELECT U.id, U.nom, U.prenom, U.mail, U.telephone, U.licence, J.id_joueurs
FROM utilisateurs U
INNER JOIN joueurs J ON J.id_utilisateurs = U.id 
WHERE U.id = '$id_player'");
    $result = mysqli_query($c,$sql);
    $player_info = array ();
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $player_info= $donnees;
    }
    return $player_info;
}

//recupère la liste des match et leurs infos ou le coach est présent
function get_matchs_by_coach_id($id_coach, $c){
    $sql = ("SELECT M.id, M.date, M.lieux 
FROM matchs_equipes_coachs MEC
INNER JOIN matchs M ON M.id = MEC.id_matchs
WHERE id_coachs = '$id_coach'");
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

?>