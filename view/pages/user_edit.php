<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">
            Selectionnez un utilisateur à modifier
        </h2>

        <form action="index.php" method="post">

            <ul>

                <?php
                $i = 1;
                foreach ((array) $user_list as $user){
                echo'
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$user["nom"].' '.$user["prenom"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="user_id" value="'.$user['id'].'">
                        </span>
                    </li>
                ';
                $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="user_edit_form">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>