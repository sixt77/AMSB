<div class="ac-home-container ac-home-signup">

    <div class="ac-home">

        <form action="index.php" method="post">
            <datalist id="team_list">
                <?php
                foreach ((array) $team_list as $team){
                    echo'<option value="'.$team['nom'].'">';
                }

                ?>
            </datalist>

            <ul>

                <li class="ac-home-sign-item-inscrip">

                    <h2 class="ac-home-sign-item-h2">
                        creation de match !
                    </h2>




                <input type="date" name="date" required>
                <input type="time" name="time" required>

                </li>
                <div class="select_team">
                    <input list="team_list" name="team1" required>

                </div>
                <div class="select_team">
                    <input list="team_list" name="team2" required>

                </div>


                <div class="ac-home-sign-allBoutton">
                    <ul>

                        <li class="ac-home-sign-item-boutton-left">
                            <button type="submit" class="ac-home-sign-item-boutton-log" name="create_match" value="">
                                Valider
                            </button>
                        </li>



                    </ul>

                </div>

            </ul>

        </form>

    </div>

</div>
