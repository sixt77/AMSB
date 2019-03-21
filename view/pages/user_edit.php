<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">
            Selectionnez un licencié à modifier
        </h2>

        <form action="index.php" method="post">

            <ul>

                <?php
                $i = 1;
                foreach ((array) $user_list as $user){
                echo'
                    <li class="amsb-display-item">
                        <label for="user_id_'.$i.'">
                            <span class="amsb-display-item-text">
                                '.$user["nom"].' '.$user["prenom"].'
                            </span>
                            <span class="amsb-display-item-radio">
                                <input class="amsb-display-item-radio-item" type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'">
                            </span>
                        </label>
                    </li>
                ';
                $i++;
                }

                ?>

            </ul>

            <div class="amsb-form">
                <button type="submit" class="amsb-button-confirm" name="user_edit_form">
                    Valider
                </button>
            </div>

        </form>

    </div>

</div>