<div id="user_sub_form" class="amsb-container-right">

    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Ajouter un licencié !</h2>

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
                    <input class="amsb-item-input" id="input_birth_day" type="date" name='dateDeNaissance' onchange="verif_date(this.valueAsNumber, 'parent_form'), select_cat(this.valueAsDate, 'categorie_select')" required/>
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
                    <input class="input-none-displayList" id="addImg" type="file" name="image" placeholder="Cliquez ici pour télécharger la photo !">
                    <label id="img" for="addImg" class="fileContainer">Cliquez ici pour télécharger la photo !</label>
                    <img id="imgView" src="" alt="" style="max-width: 500px;margin-top: 10px;">
                </li>

                <li class="amsb-form">
                    <span>Catégorie :</span>
                    <label for="categorie_select">
                        <select id="categorie_select" name="categorie">
                            <option value="all">Aucune</option>
                            <option value="U9">U9</option>
                            <option value="U11">U11</option>
                            <option value="U13">U13</option>
                            <option value="U15">U15</option>
                            <option value="U17">U17</option>
                            <option value="U18">U18</option>
                            <option value="U20">U20</option>
                            <option value="Senior">Senior</option>
                        </select>
                    </label>
                </li>

                <label class="amsb-display-label" for="surclassage" style="position: initial;float: none;margin: 30px auto 0;">
                    <input class="amsb-display-surclasse" type="checkbox" id="surclassage" name="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                    <span class="amsb-display-surclasseText">Surclasser</span>
                </label>

                <li class="amsb-form">
                    <label class="amsb-display-label amsb-addParent" for="addParent">
                        <input id="addParent" class="amsb-display-surclasse" type="button" onclick="add_parent_form('parent_form', count_class('parent_form')+1)" placeholder="Ajout parent :">
                        <span class="amsb-display-surclasseText amsb-addParentText">Ajouter un parent</span>
                    </label>
                </li>

                <li class="amsb-form">
                    <div id="parent_form"></div>
                </li>

                <li class="amsb-form">
                    <div id="parent_form_delete_button"></div>
                </li>
            </ul>

            <button type="submit" class="amsb-button" name="signup" value="">Créer</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('input[type="file"]').addEventListener('change', function(evt) {
        document.getElementById('img').innerHTML = evt.target.files[0].name;
        document.getElementById('imgView').src = URL.createObjectURL(evt.target.files[0]);
    });
</script>