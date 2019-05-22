<div id="role_update" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Séléctionnez les rôles</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <div class="amsb-display-item-roleDirigeant">

                    <li class="amsb-display-item ">
                        <label for="leaderCheckbox">
                            <input onchange="afficheDivSousRole()" class="amsb-display-item-radio-item" type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant" <?php if($user_role_list[1] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">Dirigeant</span>
                        </label>
                    </li>

                    <div id="sous_role">
                        <?php

                        $i = 0;
                        foreach ((array) $role_list as $role) {
                            echo '<li class="amsb-display-item ">
                                <label for="'.$i.'">';
                            if(isset($leader_role_list[$i+1])) {
                                echo '<input class="amsb-display-item-radio-item" type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" checked>';
                            }else{
                                echo '<input class="amsb-display-item-radio-item" type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" >';
                            }
                            echo '    <span class="amsb-display-item-roleDirigeant-text">'.$role['nom'].'</span>
                                </label>
                            </li>';
                            $i++;
                        }
                        ?>
                    </div>

                </div>

                <div class="amsb-display-otherRole">
                    <li class="amsb-display-item ">
                        <label for="OTMCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="OTMCheckbox" name="OTM" value="otm" <?php if($user_role_list[2] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">OTM</span>
                        </label>
                    </li>

                    <li class="amsb-display-item ">
                        <label for="arbiterCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre" <?php if($user_role_list[3] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">Arbitre</span>
                        </label>
                    </li>

                    <li class="amsb-display-item ">
                        <label for="volunteerCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer" <?php if($user_role_list[4] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">Bénévole</span>
                        </label>
                    </li>

                    <li class="amsb-display-item ">
                        <label for="playerCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="playerCheckbox" name="Player" value="player" <?php if($user_role_list[5] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">Joueur</span>
                        </label>
                    </li>

                    <li class="amsb-display-item ">
                        <label for="coachCheckbox">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="coachCheckbox" name="Coach" value="coach" <?php if($user_role_list[6] != null)echo 'checked';?>>
                            <span class="amsb-display-item-text">Entraineur</span>
                        </label>
                    </li>
                </div>

            </ul>

            <button type="submit" class="amsb-button" name="update_user_right" value="<?php echo $id; ?>">Valider</button>
        </form>

    </div>

</div>

<script>
    checkboxDirig = document.getElementById("leaderCheckbox");
    divSousRole = document.getElementById("sous_role");
    if (checkboxDirig.checked === true) {
        divSousRole.style.display = "block";
    } else {
        divSousRole.style.display = "none";
    }
</script>