<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Création de match !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">

            <datalist id="team_list">
                <?php
                foreach ((array) $team_list as $team){
                    echo'<option value="'.$team['nom'].'">';
                }

                ?>
            </datalist>

            <ul>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="date" name="date" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="time" name="time" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" list="team_list" name="team1" placeholder="equipe 1" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" list="team_list" name="team2" placeholder="equipe 2" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name="lieux" placeholder="lieux" required>
                </li>

            </ul>

            <button type="submit" class="amsb-button" name="create_match" value="">Valider</button>

        </form>

    </div>

</div>
