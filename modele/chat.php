<?php

//create subject for a match
function create_subject_for_match($id_match, $c){
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO sujets (id_matchs, role) VALUES");
    $sql .= ("('$id_match', 'general')");
    $sql .= (",('$id_match', 'dirigeant')");
    $sql .= (",('$id_match', 'joueur')");
    $sql .= (",('$id_match', 'coach')");
    $sql .= (",('$id_match', 'OTM')");
    $sql .= (",('$id_match', 'arbitre')");
    $sql .= (",('$id_match', 'benevole')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

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

//permet de trouver l'id de sujet en fonction de l'id match
function find_id_subject_by_match($id_match, $user_id ,$c) {
    $sql = ("SELECT id_sujets, role
FROM sujets
WHERE id_matchs = '$id_match'");
    $user_role = get_role_user_by_id($user_id,$c);
    $result = mysqli_query($c,$sql);
    $subject_list = array ();
    $loop = 0;
    $subject = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        if($donnees['role'] == "general"
            || ($donnees['role'] == "dirigeant" && isset($user_role[1]))
            || ($donnees['role'] == "OTM" && isset($user_role[2]))
            || ($donnees['role'] == "arbitre" && isset($user_role[3]))
            || ($donnees['role'] == "benevole" && isset($user_role[4]))
            || ($donnees['role'] == "joueur" && isset($user_role[5]))
            || ($donnees['role'] == "coach" && isset($user_role[6]))){
            $subject_list[$loop] = $donnees;
            $subject++;
        }
        $loop++;
    }

    if($subject > 0) {
        return $subject_list;
    }else{
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

