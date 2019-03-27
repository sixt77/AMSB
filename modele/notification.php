<?php
//retourne la liste des notifications et les infos match lié
function get_notification_list($id_user, $c){
    $sql = ("SELECT N.id, M.id, M.date, M.lieux
FROM notification N
INNER JOIN matchs M ON M.id = N.id_matchs
WHERE N.id_utilisateurs = '$id_user'
AND N.etat = '0'");

    $result = mysqli_query($c,$sql);
    $notif_list = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $notif_list[$loop]= $donnees;
        $loop++;
    }
    return $notif_list;
}

//valide une notification
function valid_notification($id_notification, $c){
    $sql = ("UPDATE `notification` SET `etat`='1' WHERE id = '$id_notification'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}
