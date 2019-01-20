<div class="ac-home-container ac-home-signup">

    <div class="ac-home">

        <form action="index.php" method="post">

            <ul>

                <li class="ac-home-sign-item-inscrip">

                    <h2 class="ac-home-sign-item-h2">
                        modification d'équipe !
                    </h2>



                </li>

                <li class="ac-home-sign-item">
                    <input type="text" class="ac-home-sign-item-input" name="nom" placeholder="Nom" value="<?php echo $team_info[2]; ?>" >
                </li>
                choix des coach :
                <?php
                $i = 1;
                foreach ($coach_list as $coach){
                    echo'
            <table>
                <tr>
                    <td>
                        '.$coach["nom"].' '.$coach["prenom"].'
                    </td>
                    <td>';
                    if($coach['id_entraineurs'] == $team_info[1]){
                        echo'<input type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'" checked>';
                    }else{
                        echo'<input type="radio" id="'.$i.'" name="coach" value="'.$coach['id_entraineurs'].'">';
                    }

                    echo'</td>
                </tr>
            </table>
            ';
                    $i++;
                }

                ?>


                choix des joueurs :
                <?php
                $i = 1;
                foreach ($player_list as $player){
                    echo'
            <table>
                <tr>
                    <td>
                        '.$player["nom"].' '.$player["prenom"].'
                    </td>
                    <td>
                    ';
                    if(in_array($player['id_joueurs'], $team_player_list)){
                        echo'<input type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'" checked>';
                    }else{
                        echo'<input type="checkbox" id="'.$i.'" name="player_list[]" value="'.$player['id_joueurs'].'">';
                    }

                    echo'
                        
                    </td>
                </tr>
            </table>
            ';
                    $i++;
                }
                ?>

                <div class="ac-home-sign-allBoutton">
                    <ul>

                        <li class="ac-home-sign-item-boutton-left">
                            <button type="submit" class="ac-home-sign-item-boutton-log" name="update_team" value="<?php echo $team_info[0]; ?>">
                                Valider
                            </button>
                        </li>



                    </ul>

                </div>

            </ul>

        </form>

    </div>

</div>
