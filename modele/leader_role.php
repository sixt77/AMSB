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
