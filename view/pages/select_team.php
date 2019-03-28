<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Modification d'équipe !</h2>

        <h3 class="amsb-form-item-title-h3">Liste des équipes :</h3>

        <div  class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">

            <form id="form_list_team" action="index.php" method="post">
                <div class="amsb-display-scroll">
                        <?php
                        $i = 1;
                        foreach ((array) $team_list as $team){
                            echo'<ul>
                                    <label for="team_id_'.$i.'" class="user_div">
                                    
                                    <li>'.$team['nom'].'</li>';
                            if ($i == 1) {
                                echo '<input type="radio" id="team_id_'.$i.'" name="team" value="'.$team['id_equipes'].'" checked>';
                            } else {
                                echo '<input type="radio" id="team_id_'.$i.'" name="team" value="'.$team['id_equipes'].'">';
                            }
                            echo'</label>
                                </ul>';


                            $i++;
                        }

                        ?>
                </div>

                <button type="submit" class="amsb-button" name="update_team_form" value="">Valider</button>
            </form>
        </div>
    </div>
</div>