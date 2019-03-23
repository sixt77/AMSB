<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <form action="index.php" method="post">

            <ul>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Séléctionnez les rôles
                    </h2>
                </li>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        Dirigeant
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant">
                    </span>
                </li>

                <?php
                $i = 0;

                foreach ((array) $role_list as $role) {
                    echo '
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$role['nom'].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="leader_role_list[]" value="'.$role['id_role'].'">
                        </span>
                    </li>';
                    $i++;
                }
                ?>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        OTM
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
                    </span>
                </li>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        Arbitre
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre">
                    </span>
                </li>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        Benevole
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer">
                    </span>
                </li>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        Joueur
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="playerCheckbox" name="Player" value="player">
                    </span>
                </li>

                <li class="amsb-display-item">
                    <span class="amsb-display-item-text">
                        Entraineur
                    </span>
                    <span class="amsb-display-item-radio">
                        <input class="amsb-display-item-radio-item" type="checkbox" id="volunteerCheckbox" name="Coach" value="coach">
                    </span>
                </li>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="role_selection" value="<?php echo$id; ?>">
                        Valider
                    </button>

                </li>

            </ul>

        </form>

    </div>

</div>