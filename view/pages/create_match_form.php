<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <form action="index.php" method="post">

            <datalist id="team_list">
                <?php
                foreach ($team_list as $team){
                    echo'<option value="'.$team['nom'].'">';
                }

                ?>
            </datalist>

            <ul>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Création de match !
                    </h2>
                </li>

                <li class="amsb-form">
                    <input type="date" name="date" required>
                </li>

                <li class="amsb-form">
                    <input type="time" name="time" required>
                </li>

                <li class="amsb-form">
                    <input list="team_list" name="team1" required>
                </li>

                <li class="amsb-form">
                    <input list="team_list" name="team2" required>
                </li>

                <li class="amsb-form amsb-button-300px">
                    <button type="submit" class="amsb-button-confirm" name="create_match" value="">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>
