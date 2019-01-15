<?php
//fait devenir un licencié dirigeant
function add_leader($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO dirigeants(id_utilisateurs) VALUES('$id_user')");

    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le droit de leader a un utilisateur
function delete_leader($id_user, $c) {
    $sql = ("DELETE FROM `dirigeants` WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


//renvoie un id_leader par rapport a un id_utilisateur
function get_leader_id_by_user_id($id_user, $c) {
    $sql = ("SELECT id_dirigeants FROM dirigeants WHERE id_utilisateurs ='$id_user'");
    $result = mysqli_query($c,$sql);
    if($row = mysqli_fetch_row($result)){
        $id_leader = $row[0];
    }
    return $id_leader;
}

?>