<div id="display_match_list" class="amsb-container-right">

    <script>
        <?php

        $i = 0;
        echo"var items = [";
        foreach ((array) $match_data as $match){
            if(!isset($match['team']['0'])){
                $match['team']['0']['nom']=null;
            }
            if(!isset($match['team']['1'])){
                $match['team']['1']['nom']=null;
            }
            if($i == 0){
                echo"['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."','".$match["match"]['date']."']";
            }else{
                echo",['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."','".$match["match"]['date']."']";
            }
            $i++;
        }
        echo"];";

        ?>

    </script>
    <script>
        //génération des intervals pour le trie
        date1 = new Date();
        date2 = new Date();
        date3 = new Date();
        date4 = new Date();
        date5 = new Date();
        //affectation des intervals
        date2.setMonth(date2.getMonth()-1); //moi précédent
        date3.setMonth(date3.getMonth()+1); //moi suivant
        date4.setFullYear(date4.getFullYear()-1); //anneé suivante
        date5.setFullYear(date5.getFullYear()+1); //anneé suivante


    </script>
    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Liste des matchs</h2>
        <input type="button" value="moi précédent" onclick="sort_match_by_date(date2.getTime()/1000, date1.getTime()/1000, 'match_div', items)">
        <input type="button" value="moi suivant" onclick="sort_match_by_date(date1.getTime()/1000, date3.getTime()/1000, 'match_div', items)">
        <input type="button" value="année précédente" onclick="sort_match_by_date(date4.getTime()/1000, date1.getTime()/1000, 'match_div', items)">
        <input type="button" value="année suivante" onclick="sort_match_by_date(date1.getTime()/1000, date5.getTime()/1000, 'match_div', items)">
        <div class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_match(this.value, items, 'match_div')" placeholder="Recherche..">



            <ul id="reference_display" class="user_div_reference">
                <li>Equipe 1</li>
                <li>Equipe 2</li>
                <li>Lieu</li>
                <li>Date</li>
            </ul>

            <div class="amsb-display-scroll">
                <?php

                foreach ((array) $match_data as $data){

                    echo '<ul class="match_div user_div" id="match_'.$data['match']['id'].'">';
                    //afficher le nom de l'équipe 1 :
                    if (isset($data['team'][0])){
                        echo '<li>'.$data['team'][0]['nom'].'</li>';
                    }
                    //afficher le nom de l'équipe 2 :
                    if (isset($data['team'][1])){
                        echo '<li>'.$data['team'][1]['nom'].'</li>';
                    }
                    //afficher le lieux
                    echo '<li>'.$data['match']['lieux'].'</li>';

                    //afficher la date :
                    echo '<li>'.date('d/m/Y',$data['match']['date']).'</li>';
                    echo '</ul>';

                }
                ?>

            </div>

        </div>

    </div>

</div>
