<?php

//retourne la liste des rôles
function get_roles_list($c){
    $sql = ("SELECT * FROM roles");
    $result = mysqli_query($c,$sql);
    $role_list = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $role_list[$loop]= $donnees;
        $loop++;
    }
    return $role_list;
}

