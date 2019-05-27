<?php
//fait devenir un licencié dirigeant
function add_player($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO joueurs(id_utilisateurs) VALUES('$id_user')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle de joueur a un utilisateur
function delete_player($id_user, $c) {
    $sql = ("DELETE FROM joueurs WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//retourne la liste des joueuers
function get_players_list($c){
    $sql = ("SELECT *
FROM joueurs J
INNER JOIN utilisateurs U ON J.id_utilisateurs = U.id");
    $result = mysqli_query($c,$sql);
    $players_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $players_list[$loop]= $donnees;
        $loop++;
    }
    return $players_list;
}

//retourne les info précise d'un joueur
function get_player_profil($player_id, $c){
    $sql = ("SELECT * FROM utilisateurs");
    $result = mysqli_query($c,$sql);
    $users_info= array ();
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_info= $donnees;
    }
    return $users_info;
}


//permet a un otm de s'inscire sur un match
function player_subscribe_to_match($id_match, $id_player, $c){
    $sql = ("UPDATE liste_matchs 
SET etat = 'true' 
WHERE id_matchs = '$id_match'
AND id_joueurs = '$id_player'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//permet a un otm de désinscrire d'un match
function player_unsubscribe_to_match($id_match, $id_player, $c){
    $sql = ("UPDATE liste_matchs 
SET etat = 'false' 
WHERE id_matchs = '$id_match'
AND id_joueurs = '$id_player'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


?>