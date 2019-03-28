<div id="edit_team_form" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Modification d'équipe !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">

            <div class="amsb-form">
                <span>Nom :</span>
                <input class="amsb-item-input" type="text" name="nom" value="<?php echo $team_info[2]; ?>" required>
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
                            <span class="amsb-display-item-radio">';
                            if($coach['id_entraineurs'] == $team_info[1]){
                                echo'<input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'" checked>';
                            }else{
                                echo'<input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'">';
                            }
                                echo '</span>
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
                                <span class="amsb-display-item-text">
                                    '.$player["nom"].' '.$player["prenom"].'
                                </span>
                                <span class="amsb-display-item-radio">';
                            if(in_array($player['id_joueurs'], $team_player_list)){
                                echo'<input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'" checked>';
                            }else{
                                echo'<input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">';
                            }

                            echo '</span>
                                </li>';

                            $i++;
                        }

                        ?>
                    </ul>
                </div>
            </div>

            <button type="submit" class="amsb-button" name="update_team" value="<?php echo $team_info[0]; ?>">Valider</button>

        </form>

    </div>
</div>