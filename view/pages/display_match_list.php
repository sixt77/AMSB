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

        //génération des intervals pour le trie
        date1 = new Date();
        saison = new Date();
        saison.setMonth(5);
        saison.setDate(29);

        date2 = new Date();
        date3 = new Date();
        date4 = new Date();
        date5 = new Date();
        date6 = new Date();
        date7 = new Date();
        date8 = new Date();
        date9 = new Date();

        //ajustement des intervals a la saison de basket
        if(date1 > saison){
            date6.setFullYear(date6.getFullYear()-1);
            date7.setFullYear(date7.getFullYear()-1);
            date8.setFullYear(date8.getFullYear()-1);
            date9.setFullYear(date9.getFullYear()-1);
        }

        //affectation des intervals

        //moi
        date2.setMonth(date2.getMonth()-1); //moi précédent
        date2.setDate(0);
        //date3.setMonth(date3.getMonth()); //moi actuel
        date3.setDate(0);
        date4.setMonth(date4.getMonth()+1); //moi suivant
        date4.setDate(0);
        date5.setMonth(date5.getMonth()+2); //moi suivant+1
        date5.setDate(0);

        //saison
        date6.setMonth(5);
        date6.setDate(29);
        date6.setFullYear(date6.getFullYear()-2);


        date7.setMonth(5);
        date7.setDate(29);
        date7.setFullYear(date7.getFullYear()-1);

        date8.setMonth(5);
        date8.setDate(29);
        //date8.setFullYear(date8.getFullYear()+1);

        date9.setMonth(5);
        date9.setDate(29);
        date9.setFullYear(date9.getFullYear()+1);


    </script>

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Liste des matchs</h2>

        <div class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_match(this.value, items, 'match_div')" placeholder="Recherche..">



            <label class="amsb-diplay-input_time_display" for="mois_precedent">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="mois_precedent" onclick="sort_match_by_date(date2.getTime()/1000, date3.getTime()/1000, 'match_div', items)">
                <span>Mois précédent</span>
            </label>

            <label class="amsb-diplay-input_time_display" for="mois_actuel">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="mois_actuel" onclick="sort_match_by_date(date3.getTime()/1000, date4.getTime()/1000, 'match_div', items)">
                <span>Mois actuel</span>
            </label>

            <label class="amsb-diplay-input_time_display" for="mois_suivant">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="mois_suivant" onclick="sort_match_by_date(date4.getTime()/1000, date5.getTime()/1000, 'match_div', items)">
                <span>Mois suivant</span>
            </label>

            <label class="amsb-diplay-input_time_display" for="saison_precedente">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="saison_precedente" onclick="sort_match_by_date(date6.getTime()/1000, date7.getTime()/1000, 'match_div', items)">
                <span>Saison précédente</span>
            </label>

            <label class="amsb-diplay-input_time_display" for="saison_actuel">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="saison_actuel" onclick="sort_match_by_date(date7.getTime()/1000, date8.getTime()/1000, 'match_div', items)">
                <span>Saison actuel</span>
            </label>

            <label class="amsb-diplay-input_time_display" for="saison_suivante">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="saison_suivante" onclick="sort_match_by_date(date8.getTime()/1000, date9.getTime()/1000, 'match_div', items)">
                <span>Saison suivante</span>
            </label>

            <label class="amsb-diplay-input_time_display amsb-diplay-input_time_display_last" for="tous_match">
                <input class="input-none-displayList" name="match_affichage" type="radio" id="tous_match" onclick="sort_match_by_date(null, null, 'match_div', items)" checked>
                <span>Tous les matchs</span>
            </label>


            <ul id="reference_display" class="user_div_reference">
                <li>Local</li>
                <li>Extérieur</li>
                <li>Lieu</li>
                <li>Date</li>
                <li>Heure</li>
                <li>Catégorie</li>
                <li>Score local</li>
                <li>Score extérieur</li>
            </ul>

            <div class="amsb-display-scroll">
                <?php

                foreach ((array) $match_data as $data){

                    echo '<ul class="match_div user_div" id="match_'.$data['match']['id'].'">';
                    //afficher le nom de l'équipe 1 :
                    if (isset($data['team'][0])){
                        echo '<li>'.$data['team'][0]['nom'].'</li>';
                    } else {
                        echo '<li></li>';
                    }
                    //afficher le nom de l'équipe 2 :
                    if (isset($data['team'][1])){
                        echo '<li>'.$data['team'][1]['nom'].'</li>';
                    } else {
                        echo '<li></li>';
                    }
                    //afficher le lieux
                    echo '<li>'.$data['match']['lieux'].'</li>';

                    //afficher la date :
                    echo '<li>'.date('d/m/Y',$data['match']['date']).'</li>';

                    //afficher l'heure :
                    echo '<li>'.date('H:i',$data['match']['date']).'</li>';

                    //afficher la catégorie :
                    echo '<li>'.$data['match']['categorie'].'</li>';

                    //afficher le score, si match terminé :
                    if ($data['match']['date'] < time() && $data['match']['scEquipe1']!= null && $data['match']['scEquipe2']!= null) {
                        echo  '<li>'.$data['match']['scEquipe1'].'</li>';
                        echo  '<li>'.$data['match']['scEquipe2'].'</li>';
                    } else {
                        echo '<li></li>';
                        echo '<li></li>';
                    }
                    echo '</ul>';

                }
                ?>

            </div>

        </div>

    </div>

</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('display_match_list');"
    ?>
</script>