<div id="user_edit_form" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Modifier un licencié !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <li class="amsb-form">
                    <span>Nom :</span>
                    <input class="amsb-item-input" type="text" name="nom" value="<?php echo $user_info[1]; ?>" required>
                </li>

                <li class="amsb-form">
                    <span>Prénom :</span>
                    <input class="amsb-item-input" type="text" name='prenom' value="<?php echo $user_info[2]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <span>Adresse E-mail :</span>
                    <input class="amsb-item-input" type="text" name='email' value="<?php echo $user_info[3]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <span>Téléphone :</span>
                    <input class="amsb-item-input" type="text" name='telephone' value="<?php echo $user_info[4]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <span>N° de licence :</span>
                    <input class="amsb-item-input" type="text" name='licence' value="<?php echo $user_info[5]; ?>" required/>
                </li>

            </ul>

            <button type="submit" class="amsb-button" name="update_user" value="<?php echo $user_info[0]; ?>">Valider</button>
        </form>
    </div>
</div>