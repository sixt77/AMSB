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
                    selectionnez un utilisateur a modifié
                </h2>
            </li>
            <?php
            $i = 1;
            foreach ($user_list as $user){
            echo'
            <table>
                <tr>
                    <td>
                        '.$user["nom"].' '.$user["prenom"].'
                    </td>
                    <td>
                        <input type="checkbox" id="'.$i.'" name="children_list[]" value="'.$user['id'].'">
                    </td>
                </tr>
            </table>
            ';
            $i++;
            }
            
            ?>

            <input type="hidden" name="id_user" value="">
            <div class="ac-home-sign-allBoutton">
                <ul>

                    <li class="ac-home-sign-item-boutton-left">
                        <button type="submit" class="ac-home-sign-item-boutton-log" name="children_selection"
                                value="<?php echo $id_leader; ?>">
                            Valider
                        </button>
                    </li>


                </ul>

            </div>

        </ul>

    </form>


    <div class="ac-fontGris" id="fondGris"></div>

</div>