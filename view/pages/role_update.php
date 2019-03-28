<div id="role_update" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Séléctionnez les rôles</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <li class="amsb-display-item margin-auto">
                    <label for="leaderCheckbox">
                        <span class="amsb-display-item-text">Dirigeant</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant" <?php if($user_role_list[1] != null)echo 'checked';?>>
                    </label>
                </li>

                <div class="amsb-display-item-roleDirigeant">

                <?php

                $i = 0;
                foreach ((array) $role_list as $role) {
                    echo '<li class="amsb-display-item margin-auto">
                            <label for="'.$i.'">
                            <span class="amsb-display-item-roleDirigeant-text">- '.$role['nom'].'</span>';
                    if(isset($leader_role_list[$i+1])) {
                        echo '<input class="amsb-display-item-radio-item" type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" checked>';
                    }else{
                        echo '<input class="amsb-display-item-radio-item" type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" >';
                    }

                    echo '</label>
                        </li>';
                    $i++;
                }

                ?>

                </div>

                <li class="amsb-display-item margin-auto">
                    <label for="OTMCheckbox">
                        <span class="amsb-display-item-text">OTM</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="OTMCheckbox" name="OTM" value="otm" <?php if($user_role_list[2] != null)echo 'checked';?>>
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="arbiterCheckbox">
                        <span class="amsb-display-item-text">Arbitre</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre" <?php if($user_role_list[3] != null)echo 'checked';?>>
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="volunteerCheckbox">
                        <span class="amsb-display-item-text">Bénévole</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer" <?php if($user_role_list[4] != null)echo 'checked';?>>
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="playerCheckbox">
                        <span class="amsb-display-item-text">Joueur</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="playerCheckbox" name="Player" value="player" <?php if($user_role_list[5] != null)echo 'checked';?>>
                    </label>
                </li>

                <li class="amsb-display-item margin-auto">
                    <label for="coachCheckbox">
                        <span class="amsb-display-item-text">Entraineur</span>

                        <input class="amsb-display-item-radio-item" type="checkbox" id="coachCheckbox" name="Coach" value="coach" <?php if($user_role_list[6] != null)echo 'checked';?>>
                    </label>
                </li>

            </ul>

            <button type="submit" class="amsb-button" name="update_user_right" value="<?php echo $id; ?>">Valider</button>
        </form>

    </div>

</div>