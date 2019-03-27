<div id="user_edit" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Selectionnez un licencier à modifier</h2>

        <form class="amsb-form-user_edit" action="index.php" method="post">
            <ul>
                <?php
                $i = 1;
                foreach ((array) $user_list as $user){
                    echo'
                        <li class="amsb-display-item">
                            <label for="user_id_'.$i.'">
                                    <span>'.$user["nom"].'</span>
                                    <span>'.$user["prenom"].'</span>';
                                    if ($i == 1) {
                                        echo '<input type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'" checked>';
                                    } else {
                                        echo '<input type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'">';
                                    }
                    echo '</label>
                        </li>';
                    $i++;
                }

                ?>

            </ul>

            <button type="submit" class="amsb-button" name="user_edit_form">Valider</button>
        </form>
    </div>
</div>