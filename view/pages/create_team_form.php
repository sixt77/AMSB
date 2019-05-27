<div id="create_team_form" class="amsb-container-right">
    <div class="amsb-container-right-item">

        <script>
            <?php

            $i = 0;
            echo"var items = [";
            foreach ((array) $player_list as $player){
                if($i == 0){
                    echo"['".$player["id"]."','".$player["nom"]."','".$player["prenom"]."','".$player["mail"]."','".$player["telephone"]."','".$player["licence"]."','".$player["sex"]."','".$player["categorie"]."','".$player["surclassage"]."']";
                }else{
                    echo",['".$player["id"]."','".$player["nom"]."','".$player["prenom"]."','".$player["mail"]."','".$player["telephone"]."','".$player["licence"]."','".$player["sex"]."','".$player["categorie"]."','".$player["surclassage"]."']";
                }
                $i++;
            }
            echo"];";


            ?>
        </script>

        <h2 class="amsb-form-item-title">Création d'équipe !</h2>

        <form action="index.php" method="post">

            <div class="amsb-form">
                <span>Nom :</span>
                <input class="amsb-item-input" type="text" name="nom" required>
            </div>

            <div class="amsb-form-coach">
                <h2 class="amsb-form-item-title">Choix du Coach :</h2>

                <ul>
                    <?php

                    $i = 1;
                    foreach ((array) $coach_list as $coach){
                        echo'<li class="amsb-display-item">
                                    <label for="coach_id_'.$i.'">';
                        if ($i == 1){
                            echo '<input class="input-none-displayList" type="radio" id="coach_id_'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'" checked>';
                        } else {
                            echo '<input class="input-none-displayList" type="radio" id="coach_id_' . $i . '" name="coach" value="' . $coach['id_entraineurs'] . '">';
                        }
                        echo'<span class="amsb-display-item-text">
                                            '.$coach["nom"].' '.$coach["prenom"].'
                                    </span>
                                 </label>
                             </li>';

                        $i++;
                    }

                    ?>
                </ul>

            </div>

            <div class="amsb-form-joueur">

                <h2 class="amsb-form-item-title">Choix des Joueurs :</h2>

                <div  class="amsb-display">
                    <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">

                    <select class="amsb-display-categorieSelect" id="categorie_select" name="categorie" onchange="sort_element_by_categorie(this.value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                        <option value="all">toutes</option>
                        <option value="U9">U9</option>
                        <option value="U11">U11</option>
                        <option value="U13">U13</option>
                        <option value="U15">U15</option>
                        <option value="U17">U17</option>
                        <option value="U18">U18</option>
                        <option value="U20">U20</option>
                        <option value="Senior">Senior</option>
                    </select>

                    <label class="amsb-display-label" for="surclassage">
                        <input class="amsb-display-surclasse" type="checkbox" id="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                        <span class="amsb-display-surclasseText">Surclassé</span>
                    </label>

                    <ul id="reference_display" class="user_div_reference">
                        <li>Nom</li>
                        <li>Prénom</li>
                        <li>Email</li>
                        <li>Téléphone</li>
                        <li>Licence</li>
                        <li>Sexe</li>
                        <li>Catégorie</li>
                    </ul>

                    <div class="amsb-display-scroll">

                        <?php

                        $i = 1;
                        foreach ((array) $player_list as $player){
                            echo'<label class="user_div" id="user_'.$player['id'].'" for="player_list_'.$i.'">
                                    <input class="input-none-displayList" type="checkbox" id="player_list_'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">
                                    <ul>
                                    
                                        <li>'.$player["nom"].'</li>
                                        <li>'.$player['prenom'].'</li>
                                        <li>'.$player['mail'].'</li>
                                        <li>'.$player['telephone'].'</li>
                                        <li>'.$player['licence'].'</li>
                                        <li>'.$player['sex'].'</li>
                                        <li>'.$player['categorie'].'</li>
                                    </ul>
                                </label>';

                            $i++;
                        }

                        ?>
                    </div>
                    <button type="submit" class="amsb-button" name="create_team" value="">Créer</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('create_team_form');"
    ?>
</script>