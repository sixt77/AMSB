<div id="user_edit_form" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Modifier un licencié !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post">
            <ul>
                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name="nom" placeholder="Nom" value="<?php echo $user_info[1]; ?>" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text"  name='prenom' placeholder='Prenom'  value="<?php echo $user_info[2]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='email' placeholder='Adresse e-mail' value="<?php echo $user_info[3]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" placeholder='téléphone' name='telephone' value="<?php echo $user_info[4]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" placeholder='licence' name='licence' value="<?php echo $user_info[5]; ?>" required/>
                </li>

                <li class="amsb-form">
                </li>
            </ul>

            <button type="submit" class="amsb-button" name="update_user" value="<?php echo $user_info[0]; ?>">Valider</button>
        </form>
    </div>
</div>