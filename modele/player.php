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



?>