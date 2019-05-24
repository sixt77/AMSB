<div id="renewal_licence_form" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Renouveller un licencié !</h2>

        <form class="amsb-form-user_sub_form" action="index.php" method="post" enctype="multipart/form-data">
            <ul>



                <li class="amsb-form">
                    <span>Date de licence :</span>
                    <input class="amsb-item-input" id="input_birth_day" type="date" name='dateDeLicence' value="<?php echo $user_info[6]?>" required/>
                </li>

                <li class="amsb-form">
                    <span>N° de licence :</span>
                    <input class="amsb-item-input" type="text" name='licence' value="" required/>
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

                <label class="amsb-display-label" for="surclassage" style="position: initial;float: none;margin: 30px auto 0;">
                    <input class="amsb-display-surclasse" type="checkbox" id="surclassage" name="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')"
                        <?php if ($user_info[8] == "on"){
                            echo "checked = \"\"";
                        }?>
                    >

                    <span class="amsb-display-surclasseText">Surclasser</span>
                </label>

            </ul>

            <button type="submit" class="amsb-button" name="user_renewal" value="<?php echo $user_info[0]; ?>">Modifier</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    document.querySelector('input[type="file"]').addEventListener('change', function(evt) {
        document.getElementById('img').innerHTML = evt.target.files[0].name;
        document.getElementById('imgView').src = URL.createObjectURL(evt.target.files[0]);
    });
    select_cat(<?php echo $user_info[5]; ?>, 'categorie_select');

</script>
