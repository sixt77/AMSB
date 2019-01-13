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

function get_players_list($c){
    $sql = ("SELECT *
FROM joueurs J
INNER JOIN utilisateurs U ON J.id_utilisateurs = U.id");
    $result = mysqli_query($c,$sql);
    $players_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $players_list[$loop]= $donnees;
        $loop++;
    }
    return $players_list;
}

?>