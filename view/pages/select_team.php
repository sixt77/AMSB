<div id="select_team" class="amsb-container-right">

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

        <h2 class="amsb-form-item-title">Modification d'équipe !</h2>

        <div  class="amsb-display">
            <input style="width: 100%;float: none;" type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_team(this.value, items, 'team_div')" placeholder="Recherche..">

            <form id="form_list_team" action="index.php" method="post">
                <div class="amsb-display-scroll" style="width: 300px;margin: auto;">

                <?php
                $i = 1;
                foreach ((array) $team_list as $team){
                    echo'<li id="team_id_'.$team['id_equipes'].'" class="amsb-display-item team_div">
                            <label for="team_list_id_'.$i.'">';
                    if ($i == 1) {
                        echo '<input class="input-none-displayList" type="radio" id="team_list_id_'.$i.'" name="team" value="'.$team['id_equipes'].'" checked>';
                    } else {
                        echo '<input class="input-none-displayList" type="radio" id="team_list_id_'.$i.'" name="team" value="'.$team['id_equipes'].'">';
                    }
                    echo '<span class="amsb-display-item-text">'
                                    .$team['nom'].'
                            </span>
                        </label>
                     </li>';

                    $i++;
                }

                ?>


                </div>

                <button type="submit" class="amsb-button" name="update_team_form" value="">Modifier</button>
            </form>
        </div>
    </div>
</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('select_team');"
    ?>
</script>