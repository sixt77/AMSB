<div id="match_selection" class="amsb-container-right">
    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Séléctionnez un match</h2>

        <div class="amsb-display">

            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">

            <select id="categorie_select" name="categorie" onchange="sort_element_by_categorie(this.value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
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

            <ul id="reference_display" class="user_div_reference">
                <li>Date</li>
                <li>Lieu</li>
                <li>A vérifier !</li>
                <?php
                if(isset($match_list["nb_otm"])) {
                    echo '<li>Nombre d\'OTM</li>';
                }
                if(isset($match["nb_arbitres"])) {
                    echo '<li>Nombre d\'Arbitres</li>';
                }
                ?>
            </ul>

            <form action="index.php" method="post">

                <div class="amsb-display-scroll">

                        <?php

                        $i = 1;
                        foreach ((array) $match_list as $match){
                            if(isset($match["nb_otm"])){
                                echo'<ul>
                                            <label for="'.$i.'" class="user_div">
                                                    <li>'.date('m/d/Y', $match["date"]).'</li>
                                                    <li>'.$match["lieux"].'</li>
                                                    <li>'.$match["nb_otm"].'</li>';
                                                    if ($i == 1) {
                                                        echo '<input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" checked>';
                                                    } else {
                                                        echo '<input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'">';
                                                    }
                                                    echo'</label>
                                       </ul>';
                            }

                            if(isset($match["nb_arbitres"])){
                                echo'<ul>
                                        <label for="'.$i.'" class="user_div">
                                            <li>'.date('m/d/Y', $match["date"]).'</li>
                                            <li>'.$match["lieux"].'</li>
                                            <li>'.$match["nb_arbitres"].'</li>';
                                            if ($i == 1) {
                                                echo '<input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" checked>';
                                            } else {
                                                echo '<input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'">';
                                            }
                                    echo'</label>
                                   </ul>';
                            }
                            $i++;
                        }

                        ?>

                </div>

                <button type="submit" class="amsb-button" name="<?php echo$get;?>">Valider</button>
            </form>
        </div>
    </div>
</div>