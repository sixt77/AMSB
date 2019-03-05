<?php
//fait devenir un licencié dirigeant
function add_arbiter($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO arbitres(id_utilisateurs) VALUES('$id_user')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle d'arbitre a un utilisateur
function delete_arbiter($id_user, $c) {
    $sql = ("DELETE FROM `arbitres` WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//recupère la liste des matchs, le nombre d'arbitre présent sur chaque
function get_arbiter_number_on_all_match($c){
    $sql = ("SELECT M.id, COUNT(MA.id_arbitres) as nb_arbitres, M.date, M.lieux
FROM matchs M
LEFT JOIN matchs_arbitres MA ON MA.id_matchs = M.id
GROUP BY M.id");
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

//recupère la liste des match ou l'arbitre est présent
function get_matchs_by_arbiter_id($id_arbitres, $c){
    $sql = ("SELECT id_matchs
FROM matchs_arbitres
WHERE id_arbitres = '$id_arbitres'");
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

//permet a un arbitre de s'inscire sur un match
function arbiter_subscribe_to_match($id_match, $id_arbitres, $c){
    $sql = ("INSERT INTO matchs_arbitres (id_matchs, id_arbitres)
SELECT * FROM (SELECT '$id_match', '$id_arbitres') AS tmp
WHERE NOT EXISTS (
    SELECT id_matchs FROM matchs_arbitres WHERE id_matchs = '$id_match' AND id_arbitres = '$id_arbitres' 
) LIMIT 1;");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//permet a un arbitre de désinscrire d'un match
function arbiter_unsubscribe_to_match($id_match, $id_arbitres, $c){
    $sql = ("DELETE FROM matchs_arbitres WHERE id_matchs = '$id_match' AND id_arbitres = '$id_arbitres'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//recupère la liste des arbitres avec leurs info
function get_arbiter_list($c){
    $sql = ("SELECT *
FROM utilisateurs U
INNER JOIN arbitres A ON A.id_utilisateurs = U.id");
    $result = mysqli_query($c,$sql);
    $otm_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $otm_list[$loop] = $donnees;
        $loop++;
    }
    return $otm_list;
}

//recupère la liste des arbitres présent sur un match
function get_arbiter_by_match_id($id_match, $c){
    $sql = ("SELECT id_otm FROM matchs_otm WHERE id_matchs = '$id_match' ");
    $result = mysqli_query($c,$sql);
    $otm_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $otm_list[$loop] = $donnees['id_otm'];
        $loop++;
    }
    return $otm_list;
}

//permet d'enlever tous les arbitres d'un match
function Delete_all_arbiter_from_match($id_match, $c){
    $sql = ("DELETE FROM matchs_arbiters WHERE id_matchs = '$id_match'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

?>