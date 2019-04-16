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
                echo"['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."']";
            }else{
                echo",['".$match['match']["id"]."','".$match['match']["lieux"]."','".$match["team"]['0']['nom']."','".$match["team"]['1']['nom']."']";
            }
            $i++;
        }
        echo"];";

        ?>

    </script>

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Liste des matchs</h2>

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
                        echo '<li>';
                        echo $data['team'][0]['nom'];
                        echo '</li>';
                    }
                    //afficher le nom de l'équipe 2 :
                    if (isset($data['team'][1])){
                        echo '<li>';
                        echo $data['team'][1]['nom'];
                        echo '</li>';
                    }

                    //afficher le lieux
                    echo '<li>';
                    echo $data['match']['lieux'];
                    echo '</li>';

                    //afficher la date :
                    echo '<li>';
                    echo date('d/m/Y',$data['match']['date']);
                    echo '</li>';

                    echo '</ul>';

                }
                ?>

            </div>

        </div>

    </div>

</div>
