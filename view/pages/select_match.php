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
            echo"['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."']";
        }else{
            echo",['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."']";
        }
        $i++;
    }
    echo"];";

    ?>

</script>

<div id="select_match" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Séléctionnez un match à modifier</h2>

        <div class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_match(this.value, items, 'match_div')" placeholder="Recherche..">

            <ul id="reference_display" class="user_div_reference">
                <li>Equipe 1</li>
                <li>Equipe 2</li>
                <li>Lieu</li>
                <li>Date</li>
                <li>Heure</li>
                <li>Catégorie</li>
            </ul>

            <form action="index.php" method="post">

                <div class="amsb-display-scroll">

                    <?php
                    $i = 1;
                    foreach ((array) $match_data as $match){

                        echo '<label class="match_div user_div" id="match_'.$match['match']['id'].'">';
                        if($i == 1) {
                            echo '<input class="input-none-displayList" type="radio" id="match_id_'.$i.'" name="match_id" value="'.$match['match']['id'].'" checked>';
                        } else {
                            echo '<input class="input-none-displayList" type="radio" id="match_id_'.$i.'" name="match_id" value="'.$match['match']['id'].'">';
                        }
                        echo '<ul>';
                        //afficher le nom de l'équipe 1 :
                        if (isset($match['team'][0])){
                            echo '<li>'.$match['team'][0]['nom'].'</li>';
                        } else {
                            echo '<li></li>';
                        }
                        //afficher le nom de l'équipe 2 :
                        if (isset($match['team'][1])){
                            echo '<li>'.$match['team'][1]['nom'].'</li>';
                        } else {
                            echo '<li></li>';
                        }
                        //afficher le lieu
                        echo '<li>'.$match['match']['lieux'].'</li>';

                        //afficher la date :
                        echo '<li>'.date('d/m/Y',$match['match']['date']).'</li>';

                        //afficher l'heure :
                        echo '<li>'.date('H:i',$match['match']['date']).'</li>';

                        //afficher la catégorie
                        echo '<li>'.$match['match']['categorie'].'</li>';
                        echo '</ul>';
                        echo '</label>';
                        $i++;
                    }
                    ?>

                </div>

                <button type="submit" class="amsb-button" name="edit_match_form">Valider</button>

            </form>
        </div>

    </div>

</div>
