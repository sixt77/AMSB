<?php
//relie un administrateur avec des rôle
//renvoie true ou false suivant si la requette fonctionne
function set_leader_role($id_leader, $leader_role_list, $c) {
    $i = 0;
    $sql = "INSERT INTO dirigeants_roles (id_dirigeants, id_roles) VALUES ";
    foreach ($leader_role_list as $role)
    {
        if ($i > 0) $sql .= ", ";
        $sql .= "({$id_leader}, {$role})";
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

//renvoie la liste des rôles administrateur avec un id administrateur
function get_leader_role_leader_by_id($id, $c){
    $sql = ("SELECT id_roles FROM dirigeants_roles DR
WHERE DR.id_dirigeants ='$id'");
    $result = mysqli_query($c,$sql);
    $leader_rights = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $leader_rights[$donnees['id_roles']] = true;
        $loop++;
    }

    return $leader_rights;
}