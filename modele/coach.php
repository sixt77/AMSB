<?php
//fait devenir un licencié dirigeant
function add_coach($id_user, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO entraineurs(id_utilisateurs) VALUES('$id_user')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//enleve le rôle de joueur a un utilisateur
function delete_coach($id_user, $c) {
    $sql = ("DELETE FROM entraineurs WHERE id_utilisateurs = '$id_user'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


function get_coach_list($c){
    $sql = ("SELECT *
FROM entraineurs C
INNER JOIN utilisateurs U ON C.id_utilisateurs = U.id");
    $result = mysqli_query($c,$sql);
    $coach_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $coach_list[$loop]= $donnees;
        $loop++;
    }
    return $coach_list;
}

?>