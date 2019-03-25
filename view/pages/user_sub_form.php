<div id="user_sub_form" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Ajouter un licencier !</h2>

        <form action="index.php" method="post">

            <ul>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name="nom" placeholder="Nom" required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='prenom' placeholder='Prenom' required/>
                </li>

                <li class="amsb-form">
                    <label for="select_sex">
                        <select id="select_sex" name="sex">
                            <option value="">Sex :</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="date" name='dateDeNaissance' required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='icence' placeholder='Licence' required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='email' placeholder='Adresse e-mail' required/>
                </li>

                <li class="amsb-form">
                    Le dirigeant ne peux pas mettre le mot de passe du Licencier Techniquement /!\
                    <input class="amsb-item-input" type="password" name="motDePasse" placeholder="Mot de passe"
                           required>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='Telephone' placeholder='Téléphone' required/>
                </li>

                <li class="amsb-form">
                    <input class="amsb-item-input" type="text" name='licence' placeholder='Licence' required/>
                </li>

                <li class="amsb-form">
                    Pouvoir importer la photo
                </li>

                <li class="amsb-form">
                    Catégorie
                </li>

            </ul>

            <button type="submit" class="amsb-button-log" name="signup" value="">Valider</button>

        </form>

    </div>

</div>