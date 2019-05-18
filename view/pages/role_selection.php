<div id="role_selction" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Séléctionnez les rôles</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <div class="amsb-display-item-roleDirigeant">

                    <li class="amsb-display-item">
                        <label for="leaderCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant">
                            <span class="amsb-display-item-text">Dirigeant</span>
                        </label>
                    </li>

                    <?php

                    $i = 0;
                    foreach ((array) $role_list as $role) {
                        echo '<li class="amsb-display-item ">
                                <label for="'.$i.'">
                                    <input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="leader_role_list[]" value="'.$role['id_role'].'">
                                    <span class="amsb-display-item-roleDirigeant-text">- '.$role['nom'].'</span>
                                </label>
                            </li>';
                        $i++;
                    }
                    ?>

                </div>

                <li class="amsb-display-item ">
                    <label for="OTMCheckbox">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
                        <span class="amsb-display-item-text">OTM</span>

                    </label>
                </li>

                <li class="amsb-display-item ">
                    <label for="arbiterCheckbox">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre">
                        <span class="amsb-display-item-text">Arbitre</span>

                    </label>
                </li>

                <li class="amsb-display-item ">
                    <label for="volunteerCheckbox">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer">
                        <span class="amsb-display-item-text">Bénévole</span>
                    </label>
                </li>

                <li class="amsb-display-item ">
                    <label for="playerCheckbox">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="playerCheckbox" name="Player" value="player" checked>
                        <span class="amsb-display-item-text">Joueur</span>
                    </label>
                </li>

                <li class="amsb-display-item ">
                    <label for="coachCheckbox">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="coachCheckbox" name="Coach" value="coach">
                        <span class="amsb-display-item-text">Entraineur</span>
                    </label>
                </li>
            </ul>

            <button type="submit" class="amsb-button" name="role_selection" value="<?php echo$id; ?>">Valider</button>
        </form>

    </div>

</div>