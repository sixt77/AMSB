<form id="moove-event" action="index.php" method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>
<?php
var_dump($id);
?>
<div class="ac-main">

    <form action="index.php" method="post">

        <ul>

            <li class="ac-home-sign-item-inscrip">

                <h2 class="ac-home-sign-item-h2">
                    selectionnez les rôles
                </h2>


            </li>

            dirigeant ?
            <input type="checkbox" id="leaderCheckbox" name="Leader" value="dirigeant">

            <?php
            $i = 0;
            foreach ($role_list as $role) {
                echo '<div>
              <input type="checkbox" id="'.$i.'" name="leader_role_list[]" value="'.$role['id_role'].'">
              <label for="scales">'.$role['nom'].'</label>
              </div>';
                $i++;
            }

            ?>

            OTM ?
            <input type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
            arbitre ?
            <input type="checkbox" id="arbiterCheckbox" name="Arbiter" value="arbitre">
            benevole ?
            <input type="checkbox" id="volunteerCheckbox" name="Volunteer" value="volunteer">
            joueur ?
            <input type="checkbox" id="playerCheckbox" name="Player" value="player">
            <div class="ac-home-sign-allBoutton">
                <ul>

                    <li class="ac-home-sign-item-boutton-left">
                        <button type="submit" class="ac-home-sign-item-boutton-log" name="role_selection"
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