<div id="create_team_form" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Création d'équipe !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">

            <div class="amsb-form">
                <span>Nom :</span>
                <input class="amsb-item-input" type="text" name="nom" required>
            </div>

            <div class="amsb-form-coach-joueur">
                <div class="amsb-form-coach">
                    <h2 class="amsb-form-item-title">Choix du Coach :</h2>

                    <ul>
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
                    </ul>
                </div>

                <div class="amsb-form-joueur">

                    <h2 class="amsb-form-item-title">Choix des Joueurs :</h2>

                    <ul>
                        <?php

                        $i = 1;
                        foreach ((array) $player_list as $player){
                            echo'<li class="amsb-display-item">
                                    <label for="player_list_'.$i.'">
                                        <span class="amsb-display-item-text">
                                            '.$player["nom"].' '.$player["prenom"].'
                                        </span>
                                        
                                        <input class="amsb-display-item-radio-item" type="checkbox" id="player_list_'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">
                                    </label>
                                </li>';
                            $i++;
                        }

                        ?>
                    </ul>
                </div>
            </div>

            <button type="submit" class="amsb-button" name="create_team" value="">Valider</button>

        </form>

    </div>

</div>