<?php
//fait devenir un licencié dirigeant
function add_OTM($id_user, $c) {

    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO otm(id_utilisateurs) VALUES('$id_user')");

    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle d'otm a un utilisateur
function delete_OTM($id_user, $c) {
    $sql = ("DELETE FROM otm WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//recupère la liste des otms avec leurs info
function get_otm_list($c){
    $sql = ("SELECT *
FROM utilisateurs U
INNER JOIN otm O ON O.id_utilisateurs = U.id");
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

//recupère la liste des matchs, le nombre d'otm présent sur chaque
function get_otm_number_on_all_match($c){
        $sql = ("SELECT M.id, COUNT(MO.id_otm) as nb_otm, M.date, M.lieux, M.categorie, M.scEquipe1, M.scEquipe2
FROM matchs M
LEFT JOIN matchs_otm MO ON MO.id_matchs = M.id
GROUP BY M.id
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

//recupère la liste des match ou l'otm est présent
function get_matchs_by_OTM_id($id_otm, $c){
    $sql = ("SELECT id_matchs
FROM matchs_otm
WHERE id_otm = '$id_otm'");
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


//recupère la liste des match ou l'otm est présent et qui n'ont pas de score
function get_matchs_without_score_by_OTM_id($id_otm, $c){
    $sql = ("SELECT MO.id_matchs
FROM matchs_otm MO
INNER JOIN matchs M ON MO.id_matchs = M.id
WHERE MO.id_otm = '$id_otm'
AND M.scEquipe1 IS NULL
AND M.scEquipe2 IS NULL
");
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

//recupère la liste des otm présent sur un match
function get_OTM_by_match_id($id_match, $c){
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


//permet a un otm de s'inscire sur un match
function OTM_subscribe_to_match($id_match, $id_otm, $c){
    OTM_unsubscribe_to_match($id_match, $id_otm, $c);
    $sql = ("INSERT INTO matchs_otm (id_matchs, id_otm) VALUES ('$id_match', '$id_otm')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//permet a un otm de désinscrire d'un match
function OTM_unsubscribe_to_match($id_match, $id_otm, $c){
    $sql = ("DELETE FROM matchs_otm WHERE id_matchs = '$id_match' AND id_otm = '$id_otm'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//permet d'enlever tous les otms d'un match
function Delete_all_otm_from_match($id_match, $c){
    $sql = ("DELETE FROM matchs_otm WHERE id_matchs = '$id_match'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}



?>