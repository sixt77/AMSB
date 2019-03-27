<div id="user_sub_form" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Ajouter un licencier !</h2>

        <form action="index.php" method="post"  enctype="multipart/form-data">

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
                    <input class="amsb-item-input" type="text" name='telephone' placeholder='Téléphone' required/>
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

                <li class="amsb-form">
                    <input class="amsb-item-input" type="file" name='image' required/>
                </li>


                <li class="amsb-form">
                    <select name="categorie">
                        <option value="masculin">U9</option>
                        <option value="feminin">U11</option>
                        <option value="masculin">U13</option>
                        <option value="feminin">U15</option>
                        <option value="masculin">U17</option>
                        <option value="feminin">U18</option>
                        <option value="masculin">U20</option>
                        <option value="feminin">Snior</option>
                    </select>
                </li>

                <li class="amsb-form">
                    surclassé ?
                    <input class="amsb-item-input" type="checkbox" name='surclassage'/>
                </li>
            </ul>

            <button type="submit" class="amsb-button-log" name="signup" value="">Valider</button>

        </form>

    </div>

</div>