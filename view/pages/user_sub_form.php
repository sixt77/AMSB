<div id="user_sub_form" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Ajouter un licencier !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post" enctype="multipart/form-data">
            <ul>
                <li class="amsb-form">
                    <span>Nom :</span>
                    <input class="amsb-item-input" type="text" name="nom" required>
                </li>

                <li class="amsb-form">
                    <span>Prénom :</span>
                    <input class="amsb-item-input" type="text" name='prenom' required/>
                </li>

                <li class="amsb-form">
                    <span>Sexe :</span>
                    <label for="select_sexe">
                        <select id="select_sexe" name="sexe">
                            <option value="" disabled selected>Sexe :</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <span>Date de naissance :</span>
                    <input class="amsb-item-input" type="date" name='dateDeNaissance' required/>
                </li>

                <li class="amsb-form">
                    <span>Adresse E-mail :</span>
                    <input class="amsb-item-input" type="text" name='email' required/>
                </li>

                <li class="amsb-form">
                    <span>Mot de passe :</span>
                    <input class="amsb-item-input" type="password" name="motDePasse" required>
                </li>

                <li class="amsb-form">
                    <span>Téléphone :</span>
                    <input class="amsb-item-input" type="text" name='telephone' required/>
                </li>

                <li class="amsb-form">
                    <span>N° de licence :</span>
                    <input class="amsb-item-input" type="text" name='licence' required/>
                </li>

                <li class="amsb-form">
                    <span>Photo de la licence</span>
                    <label class="fileContainer">
                        Cliquez ici pour télécharger la photo !
                        <input type="file"/>
                    </label>
                </li>

                <li class="amsb-form">
                    <span>Catégorie :</span>
                    <label for="categorie_select">
                        <select id="categorie_select" name="categorie">
                            <option value="masculin">U9</option>
                            <option value="feminin">U11</option>
                            <option value="masculin">U13</option>
                            <option value="feminin">U15</option>
                            <option value="masculin">U17</option>
                            <option value="feminin">U18</option>
                            <option value="masculin">U20</option>
                            <option value="feminin">Snior</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <span>Surclassé ?</span>
                    <input class="amsb-item-input" type="checkbox" name='surclassage'/>
                </li>
            </ul>

            <button type="submit" class="amsb-button" name="signup" value="">Valider</button>
        </form>
    </div>
</div>