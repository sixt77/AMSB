<?php
//fait devenir un licencié dirigeant
function add_volunteer($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO benevoles(id_utilisateurs) VALUES('$id_user')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle de benevoles a un utilisateur
function delete_volunteer($id_user, $c) {
    $sql = ("DELETE FROM benevoles WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

?>