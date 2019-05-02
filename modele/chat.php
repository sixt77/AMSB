<?php
//permet de trouver l'id de sujet en fonction de l'id match et du role
function find_id_subject_by_role($id_match, $role, $c) {
    $sql = ("SELECT id_sujets
FROM sujets
WHERE id_matchs = '$id_match'
AND role = '$role'
LIMIT 1");
    $result = mysqli_query($c,$sql);
    if($row = mysqli_fetch_row($result)){
        $id_subject = $row[0];
    }
    if(isset($id_subject)){
        return $id_subject;
    }
    else{
        return null;
    }
}

//permet de poster un message sur un sujet en fonction de son id
function send_message($id_subject, $id_user, $date, $contenu, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO `message`(`id_sujets`, `id_auteur`, `date`, `contenu`) VALUES ('$id_subject', '$id_user', '$date', '$contenu')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


//permet de voir les "Limit" dernier messages sur un sujet
function view_message($id_subject, $limit, $c) {
    $sql = ("SELECT U.nom, U.prenom, M.date, M.contenu
FROM message M
INNER JOIN utilisateurs U ON U.id = M.id_auteur
WHERE M.id_sujets = '$id_subject'
LIMIT $limit");
    $result = mysqli_query($c,$sql);
    $message_list = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $message_list[$loop] = $donnees;
        $loop++;
    }
    if($loop > 0) {
        return $message_list;
    }else{
        return null;
    }
}