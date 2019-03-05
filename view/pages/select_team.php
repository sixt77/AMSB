<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">
            Modification d'équipe !
        </h2>

        <form action="index.php" method="post">

            <ul>
                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Liste des équipes :
                    </h2>
                </li>


                <?php
                $i = 1;
                foreach ((array) $team_list as $team){
                    echo'
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$team["nom"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="team" value="'.$team['id_equipes'].'">
                        </span>
                    </li>
                ';
                    $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="update_team_form" value="">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>