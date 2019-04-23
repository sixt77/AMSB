<div id="display_team_list" class="amsb-container-right">

    <script>
        <?php

        $i = 0;
        echo"var items = [";
        foreach ((array) $team_list as $team){
            if($i == 0){
                echo"['".$team["id_equipes"]."','".$team["nom"]."']";
            }else{
                echo",['".$team["id_equipes"]."','".$team["nom"]."']";
            }
            $i++;
        }
        echo"];";


        ?>
    </script>

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Liste des équipes :</h2>

        <div  class="amsb-display">
            <input style="width: 100%;float: none;" type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_team(this.value, items, 'team_div')" placeholder="Recherche..">

            <div class="amsb-display-scroll" style="width: 500px;margin: auto;">

                <?php
                $i = 1;
                foreach ((array) $team_list as $team){
                    echo'<li id="team_id_'.$team['id_equipes'].'" class="amsb-display-item team_div" style="padding-left: 30px;">
                            <span class="amsb-display-item-text">'.$team['nom'].'</span>
                        </li>';

                    $i++;
                }

                ?>


            </div>
        </div>
    </div>
</div>