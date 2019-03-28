<div id="role_selction" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Séléctionnez les rôles</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <li class="amsb-display-item margin-auto">
                    <label for="leaderCheckbox">
                        <span class="amsb-display-item-text">Dirigeant</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant">
                    </label>
                </li>

                <div class="amsb-display-item-roleDirigeant">

                <?php

                $i = 0;
                foreach ((array) $role_list as $role) {
                    echo '<li class="amsb-display-item margin-auto">
                            <label for="'.$i.'">
                            <span class="amsb-display-item-roleDirigeant-text">- '.$role['nom'].'</span>
                                <input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="leader_role_list[]" value="'.$role['id_role'].'">
                            </span>
                            </label>
                        </li>';
                    $i++;
                }
                ?>

                </div>

                <li class="amsb-display-item margin-auto">
                    <label for="OTMCheckbox">
                        <span class="amsb-display-item-text">OTM</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="arbiterCheckbox">
                        <span class="amsb-display-item-text">Arbitre</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre">
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="volunteerCheckbox">
                        <span class="amsb-display-item-text">Bénévole</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer">
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="playerCheckbox">
                        <span class="amsb-display-item-text">Joueur</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="playerCheckbox" name="Player" value="player" checked>
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="coachCheckbox">
                        <span class="amsb-display-item-text">Entraineur</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="coachCheckbox" name="Coach" value="coach">
                    </label>
                </li>
            </ul>

            <button type="submit" class="amsb-button" name="role_selection" value="<?php echo$id; ?>">Valider</button>
        </form>

    </div>

</div>