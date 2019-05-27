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
                <li>Score 1</li>
                <li>Score 2</li>
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

                        //afficher le score, si match terminé :
                        //$fin_match = mktime(date("H", $data['match']['date'])+1, date("i", $data['match']['date'])+30, date("s", $data['match']['date']), date("m", $data['match']['date']), date("d", $data['match']['date']), date("Y", $data['match']['date']));
                        if (date("Y m d H i",$match['match']['date']/*fin_match*/)<(date("Y m d H i")) && $match['match']['scEquipe1']!= null && $match['match']['scEquipe2']!= null) {
                            echo  '<li>'.$match['match']['scEquipe1'].'</li>';
                            echo  '<li>'.$match['match']['scEquipe2'].'</li>';
                        } else {
                            echo '<li></li>';
                            echo '<li></li>';
                        }

                        echo '</ul>';
                        echo '</label>';
                        $i++;
                    }
                    ?>

                </div>

                <button type="submit" class="amsb-button" name="edit_match_form">Modifier</button>

            </form>
        </div>

    </div>

</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('select_match');"
    ?>
</script>