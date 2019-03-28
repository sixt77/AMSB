<?php
//enregistre un parent dans la bdd
//renvoie true en cas de succes ou false
function parent_signup($nom, $prenom, $mail,$motDePasse, $telephone, $c) {
    //cryptage du password
    $motDePasse = encrypt($motDePasse);
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
function add_children($id_joueurs, $id_parents, $c) {
    $i = 0;
    $sql = "INSERT INTO joueurs_parents (id_joueurs, id_parents, validation) VALUES ";
    foreach ($id_joueurs as $joueur)
    {
        if ($i > 0) $sql .= ", ";
        $sql .= "({$joueur}, {$id_parents}, 0)";
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

//relie un parent avec des enfants
//renvoie true ou false suivant si la requette fonctionne
function add_one_children($id_joueurs, $id_parents, $c) {
    $i = 0;
    $sql = "INSERT INTO `joueurs_parents`(`id_joueurs`, `id_parents`, `validation`) VALUES ('$id_joueurs','$id_parents','1')";
    //execution
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


//renvoie la listes des informations des parents du joueur
function get_parent_info_by_player_id($player_id, $c){
    $sql = ("SELECT P.id, P.nom, P.prenom, P.telephone, P.mail 
FROM parents P
INNER JOIN joueurs_parents JP ON P.id = JP.id_parents
WHERE JP.id_joueurs = '$player_id'");
    $result = mysqli_query($c,$sql);
    $parent_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $parent_list[$loop]= $donnees;
        $loop++;
    }

    return $parent_list;
}

?>