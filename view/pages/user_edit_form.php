
<div class="ac-home-container ac-home-signup">

    <div class="ac-home">

        <form action="index.php" method="post">

            <ul>

                <li class="ac-home-sign-item-inscrip">

                    <h2 class="ac-home-sign-item-h2">
                        modifier un licencié !
                    </h2>



                </li>

                <li class="ac-home-sign-item">
                    <input type="text" class="ac-home-sign-item-input" name="nom" placeholder="Nom" value="<?php echo $user_info[1]; ?>" required>
                </li>

                <li class="ac-home-sign-item">
                    <input class="ac-home-sign-item-input" type="text"  name='prenom' placeholder='Prenom'  value="<?php echo $user_info[2]; ?>" required/>
                </li>

                <li class="ac-home-sign-item">
                    <input class="ac-home-sign-item-input" type="text" name='email' placeholder='Adresse e-mail' value="<?php echo $user_info[3]; ?>" required/>
                </li>


                <li class="ac-home-sign-item">
                    <input class="ac-home-sign-item-input" type="text" name='Telephone' placeholder='Téléphone' value="<?php echo $user_info[4]; ?>" required/>
                </li>

                <li class="ac-home-sign-item">
                    <input class="ac-home-sign-item-input" type="text" name='Licence' placeholder='licence' value="<?php echo $user_info[5]; ?>" required/>
                </li>

                <div class="ac-home-sign-allBoutton">
                    <ul>

                        <li class="ac-home-sign-item-boutton-left">
                            <button type="submit" class="ac-home-sign-item-boutton-log" name="update_user" value="<?php echo $user_info[0]; ?>">
                                Valider
                            </button>
                        </li>



                    </ul>


                </div>

            </ul>

        </form>

    </div>

</div>
