<div id="create_match_form" class="amsb-container-right">
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
                    <input id="team1" class="amsb-item-input" list="team_list" name="team1" placeholder="Equipe 1" required>
                    <input id="team2" class="amsb-item-input" list="team_list" name="team2" placeholder="Equipe 2" required>
                </li>

                <li class="amsb-form">
                    <label for="categorie_select">
                        <select id="categorie_select" name="categorie" required>
                            <option value="Catégorie" selected disabled>Catégorie</option>
                            <option value="all">Aucune</option>
                            <option value="U9">U9</option>
                            <option value="U11">U11</option>
                            <option value="U13">U13</option>
                            <option value="U15">U15</option>
                            <option value="U17">U17</option>
                            <option value="U18">U18</option>
                            <option value="U20">U20</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name="lieu" placeholder="Lieu" required>
                </li>

            </ul>

            <button type="submit" class="amsb-button" name="create_match" value="">Créer</button>

        </form>

    </div>

</div>
