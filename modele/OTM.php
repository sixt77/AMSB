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


?>