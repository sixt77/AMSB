<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <form action="index.php" method="post">

            <ul>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Création d'équipe !
                    </h2>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" name="nom" placeholder="Nom" required>
                </li>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Choix du Coach :
                    </h2>
                </li>

                <?php

                $i = 1;
                foreach ((array) $coach_list as $coach){
                    echo'<li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$coach["nom"].' '.$coach["prenom"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="coach_id_'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'">
                        </span>
                    </li>';

                    $i++;
                }

                ?>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Choix des Joueurs :
                    </h2>
                </li>

                <?php

                $i = 1;
                foreach ((array) $player_list as $player){
                    echo'<li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$player["nom"].' '.$player["prenom"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="player_list_'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">
                        </span>
                    </li>';

                    $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="create_team" value="">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>