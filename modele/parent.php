<?php
//enregistre un parent dans la bdd
//renvoie true en cas de succes ou false
function parent_signup($nom, $prenom, $mail,$motDePasse, $telephone, $c, $encryption_key) {
    //cryptage du password
    $motDePasse = crypt($motDePasse,$encryption_key);
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO parents(nom, prenom, mail, motDePasse, telephone) VALUES('$nom', '$prenom', '$mail', '$motDePasse', '$telephone')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//relie un parent avec des enfants
//renvoie true ou false suivant si la requette fonctionne
function add_children($id_leader, $leader_role_list, $c) {
    $i = 0;
    $sql = "INSERT INTO joueurs_parents (id_joueurs, id_parents, validation) VALUES ";
    foreach ($leader_role_list as $role)
    {
        if ($i > 0) $sql .= ", ";
        $sql .= "({$id_leader}, {$role}, 0)";
        $i++;
    }



    //execution
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


?>