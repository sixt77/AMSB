<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <form action="index.php" method="post">

            <ul>

                <li class="amsb-form">
                    <h2 class="amsb-form-item-title">
                        Modifier un licencié !
                    </h2>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" name="nom" placeholder="Nom" value="<?php echo $user_info[1]; ?>" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text"  name='prenom' placeholder='Prenom'  value="<?php echo $user_info[2]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" name='email' placeholder='Adresse e-mail' value="<?php echo $user_info[3]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="password" name="motDePasse" placeholder="Mot de passe" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" placeholder='Téléphone' name='Telephone' value="<?php echo $user_info[4]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-form-item" type="text" placeholder='licence' name='Licence' value="<?php echo $user_info[5]; ?>" required/>
                </li>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="signup" value="<?php echo $user_info[0]; ?>">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>