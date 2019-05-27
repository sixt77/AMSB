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
                    <span>Sexe :</span>
                    <label for="select_sexe">
                        <select id="select_sexe" name="sexe">
                            <option value="Homme"<?php
                            if ($user_info[6] == "Homme")
                            {
                                echo "selected = \"selected\"";
                            }
                            ?>>Homme</option>
                            <option value="Femme"
                                <?php
                                if ($user_info[6] == "Femme")
                                {
                                    echo "selected = \"selected\"";
                                }
                                ?>
                            >Femme</option>
                        </select>
                    </label>
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
                            <option value="all"
                                <?php if ($user_info[7] == "all"){
                                    echo "selected = \"selected\"";
                                }?>
                            >Aucune</option>
                            <option value="U9"
                                <?php if ($user_info[7] == "U9"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U9</option>
                            <option value="U11"
                                <?php if ($user_info[7] == "U11"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U11</option>
                            <option value="U13"
                                <?php if ($user_info[7] == "U13"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U13</option>
                            <option value="U15"
                                <?php if ($user_info[7] == "U15"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U15</option>
                            <option value="U17"
                                <?php if ($user_info[7] == "U17"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U17</option>
                            <option value="U18"
                                <?php if ($user_info[7] == "U18"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U18</option>
                            <option value="U20"
                                <?php if ($user_info[7] == "U20"){
                                    echo "selected = \"selected\"";
                                }?>
                            >U20</option>
                            <option value="Senior"
                                <?php if ($user_info[7] == "Senior"){
                                    echo "selected = \"selected\"";
                                }?>
                            >Senior</option>
                        </select>
                    </label>
                </li>

                <li class="amsb-form">
                    <span>Date d'inscription :</span>
                    <input class="amsb-item-input" type="date" name="date_licence" value="<?php if($user_info[9] != "") {
                        echo date('Y-m-d', $user_info[9]);
                    }
                    ?>" required>
                </li>

                <label class="amsb-display-label" for="surclassage" style="position: initial;float: none;margin: 30px auto 0;">
                    <input class="amsb-display-surclasse" type="checkbox" id="surclassage" name="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')"
                        <?php if ($user_info[8] == "on"){
                            echo "checked = \"\"";
                        }?>
                    >

                    <span class="amsb-display-surclasseText">Surclasser</span>
                </label>

            </ul>

            <button type="submit" class="amsb-button" name="update_user" value="<?php echo $user_info[0]; ?>">Modifier</button>
        </form>
    </div>
</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('user_edit_form');"
    ?>
</script>