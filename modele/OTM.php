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



?>