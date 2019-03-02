<?php

foreach ((array) $match_data as $data){

    //afficher l'id du match :
    echo $data['match']['id'];

    //afficher la date :
    echo date('d/m/Y',$data['match']['date']);

    //afficher le lieux
    echo $data['match']['lieux'];

    //afficher le nom de l'équipe 1 :
    echo $data['team'][0]['nom'];

    //afficher le nom de l'équipe 2 :
    echo $data['team'][1]['nom'];


}
