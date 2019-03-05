<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <form action="index.php" method="post">

            <ul>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Modification d'équipe !
                    </h2>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" name="nom" placeholder="Nom" value="<?php echo $team_info[2]; ?>" required>
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
                        </span>';
                    if($coach['id_entraineurs'] == $team_info[1]){
                        echo'<span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'" checked>
                        </span>';
                    }else{
                        echo'<span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'">
                        </span>';
                    }
                    echo '</li>';

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
                        </span>';
                    if(in_array($player['id_joueurs'], $team_player_list)){
                        echo'<span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'" checked>
                        </span>';
                    }else{
                        echo'<span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">
                        </span>';
                    }

                    echo'</li>';

                    $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="update_team" value="<?php echo $team_info[0]; ?>">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>