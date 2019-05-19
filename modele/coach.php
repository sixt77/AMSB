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

function get_player_info_by_match_id($match_id, $c){
    $sql = ("SELECT DISTINCT U.id, U.nom, U.prenom, U.telephone, U.licence, U.mail, J.id_joueurs
FROM matchs_equipes_coachs MEC
INNER JOIN joueurs_equipes JE ON MEC.id_equipes = JE.id_equipes
INNER JOIN joueurs J ON J.id_joueurs = JE.id_joueurs
INNER JOIN utilisateurs U ON J.id_utilisateurs = U.id
WHERE MEC.id_matchs = '$match_id' ");
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

//recupère la liste des match ou l'arbitre est présent
function get_matchs_by_coach_id($id_coachs, $c){
    $sql = ("SELECT DISTINCT id_matchs FROM matchs_equipes_coachs WHERE id_coachs = '$id_coachs' AND id_matchs NOT IN(SELECT id_matchs FROM liste_matchs WHERE id_coachs != '$id_coachs')");
    $result = mysqli_query($c,$sql);
    $matchs_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_list[$loop] = $donnees['id_matchs'];
        $loop++;
    }
    return $matchs_list;
}

//recupère la liste des match ou l'arbitre est présent
function get_list_matchs_by_coach_id($id_coachs, $c){
    $sql = ("SELECT DISTINCT id_matchs
FROM liste_matchs
WHERE id_coachs = '$id_coachs'");
    $result = mysqli_query($c,$sql);
    $matchs_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $matchs_list[$loop] = $donnees['id_matchs'];
        $loop++;
    }
    return $matchs_list;
}

//permet de demander un changement de coach
function send_coach_switch_request($id_coach1, $id_coach2, $id_matchs, $c){
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO changement_coachs(id_demandeur, id_receveur, id_matchs, etat) VALUES('$id_coach1', '$id_coach2', '$id_matchs', 'false')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//permet de recuperer les demande de changement
function get_coach_switch_request_list($id_coach, $c){
    $sql = ("SELECT * FROM `changement_coachs` WHERE `id_receveur` = '$id_coach' AND etat = 'false'");
    $result = mysqli_query($c,$sql);
    $notification_list = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $notification_list[$loop]= $donnees;
        $loop++;
    }
    return $notification_list;
}


//permet de valider un changement de coach
function valid_coach_switch_request($id_notification, $c){
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE changement_coachs SET etat='true' WHERE id='$id_notification' ");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

?>