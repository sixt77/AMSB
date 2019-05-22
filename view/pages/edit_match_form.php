<div id="create_match_form" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Modifier un match !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <li class="amsb-form">
                    <input class="amsb-item-input" type="date" name="date" value='<?php echo date('Y-m-d', $match_info['match']['date']); ?>' required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="time" name="time" value='<?php echo date('H:i', $match_info['match']['date']); ?>' required>
                </li>

                <li class="amsb-form">
                    <input id="team1" class="amsb-item-input" list="team_list" name="team1" placeholder="Equipe 1" value =" <?php echo $match_info['team']['0']['nom']; ?>" required>
                    <input id="team2" class="amsb-item-input" list="team_list" name="team2" placeholder="Equipe 2" value =" <?php echo $match_info['team']['1']['nom']; ?>" required>
                </li>

                <li class="amsb-form">
                    <label for="categorie_select">
                        <select id="categorie_select" name="categorie">
                            <option value="Catégorie" selected disabled>Catégorie</option>
                            <option value="all"
                                <?php if ($match_info['match']['categorie'] == "all") {
                                echo "selected = \"selected\"";
                            } ?>
                            >Aucune</option>
                            <option value="U9"
                                <?php if ($match_info['match']['categorie'] == "U9") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U9</option>
                            <option value="U11"
                                <?php if ($match_info['match']['categorie'] == "U11") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U11</option>
                            <option value="U13"
                                <?php if ($match_info['match']['categorie'] == "U11") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U13</option>
                            <option value="U15"
                                <?php if ($match_info['match']['categorie'] == "U15") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U15</option>
                            <option value="U17"
                                <?php if ($match_info['match']['categorie'] == "U17") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U17</option>
                            <option value="U18"
                                <?php if ($match_info['match']['categorie'] == "U18") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U18</option>
                            <option value="U20"
                                <?php if ($match_info['match']['categorie'] == "U20") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >U20</option>
                            <option value="Senior"
                                <?php if ($match_info['match']['categorie'] == "Senior") {
                                    echo "selected = \"selected\"";
                                } ?>
                            >Senior</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name="lieu" placeholder="Lieu" value=" <?php echo $match_info['match']['lieux'] ?>" required>
                </li>

            </ul>

            <button type="submit" class="amsb-button" name="update_match" value="<?php echo $match_info['match']['id']; ?>">Valider</button>
        </form>
    </div>
</div>