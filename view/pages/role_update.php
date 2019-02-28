<form id="moove-event" action="index.php" method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>

<div class="ac-main">

    <form action="index.php" method="post">

        <ul>

            <li class="ac-home-sign-item-inscrip">

                <h2 class="ac-home-sign-item-h2">
                    selectionnez les rôles
                </h2>


            </li>

            dirigeant ?
            <input type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant" <?php if($user_role_list[1] != null)echo 'checked';?>>

            <?php
            $i = 0;
            foreach ((array) $role_list as $role) {
                if(isset($leader_role_list[$i+1])) {
                    echo '<div>
              <input type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" checked>';
                }else{
                    echo '<div>
              <input type="checkbox" id="' . $i . '" name="leader_role_list[]" value="' . $role['id_role'] . '" >';
                }
                echo'
              <label for="scales">'.$role['nom'].'</label>
              </div>';
                $i++;
            }

            ?>

            OTM ?
            <input type="checkbox" id="OTMCheckbox" name="OTM" value="otm" <?php if($user_role_list[2] != null)echo 'checked';?>>
            arbitre ?
            <input type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre" <?php if($user_role_list[3] != null)echo 'checked';?>>
            benevole ?
            <input type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer" <?php if($user_role_list[4] != null)echo 'checked';?>>
            joueur ?
            <input type="checkbox" id="playerCheckbox" name="Player" value="player" <?php if($user_role_list[5] != null)echo 'checked';?>>
            entraineurs ?
            <input type="checkbox" id="coachCheckbox" name="Coach" value="coach" <?php if($user_role_list[6] != null)echo 'checked';?>>
            <div class="ac-home-sign-allBoutton">
                <ul>

                    <li class="ac-home-sign-item-boutton-left">
                        <button type="submit" class="ac-home-sign-item-boutton-log" name="update_user_right"
                                value="<?php echo $id; ?>">
                            Valider
                        </button>
                    </li>


                </ul>

            </div>

        </ul>

    </form>


    <div class="ac-fontGris" id="fondGris"></div>

</div>