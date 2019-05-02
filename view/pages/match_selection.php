<div id="match_selection" class="amsb-container-right">
    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Séléctionnez un match</h2>

        <div class="amsb-display">

            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">

            <ul id="reference_display" class="user_div_reference">
                <li>Date</li>
                <li>Lieu</li>
                <?php
                if(isset($_POST["designation_OTM_form"])) {
                    echo '<li>Nombre d\'OTM</li>';
                }
                if(isset($_POST["designation_arbiter_form"])) {
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
                            echo'<label for="'.$i.'" class="user_div">';
                            if ($i == 1) {
                                echo '<input class="input-none-displayList" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" checked>';
                            } else {
                                echo '<input class="input-none-displayList" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'">';
                            }
                            echo '<ul>
                                    <li>'.date('m/d/Y', $match["date"]).'</li>
                                    <li>'.$match["lieux"].'</li>
                                    <li>'.$match["nb_otm"].'</li>
                                </ul>
                            </label>';
                        }

                        if(isset($match["nb_arbitres"])) {
                            echo '<label for="'.$i.'" class="user_div">';
                            if ($i == 1) {
                                echo '<input class="input-none-displayList" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" checked>';
                            } else {
                                echo '<input class="input-none-displayList" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'">';
                            }
                            echo '<ul>
                                    <li>'.date('m/d/Y', $match["date"]).'</li>
                                    <li>'.$match["lieux"].'</li>
                                    <li>'.$match["nb_arbitres"].'</li>
                                </ul>
                            </label>';
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