<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Modification d'équipe !</h2>

        <h3 class="amsb-form-item-title-h3">Liste des équipes :</h3>

        <form action="index.php" method="post">

            <ul>
                <?php
                $i = 1;
                foreach ((array) $team_list as $team){
                    echo'
                    <li class="amsb-display-item">
                        <label for="'.$i.'">
                            <span class="amsb-display-item-text">'.$team["nom"].'</span>';
                            if ($i == 1) {
                                echo '<input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="team" value="'.$team['id_equipes'].'" checked>';
                            } else {
                                echo '<input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="team" value="'.$team['id_equipes'].'">';
                            }
                            echo '</label>
                    </li>';
                    $i++;
                }

                ?>


            </ul>

            <button type="submit" class="amsb-button" name="update_team_form" value="">Valider</button>

        </form>

    </div>

</div>