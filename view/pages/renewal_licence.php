<script>
    <?php

    $i = 0;
    echo"var items = [";
    foreach ((array) $user_list as $user){
        if($i == 0){
            echo"['".$user["id"]."','".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
        }else{
            echo",['".$user["id"]."','".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
        }
        $i++;
    }
    echo"];";


    ?>
    console.log(items);
</script>

<div id="renewal_licence" class="amsb-container-right">
    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Séléctionnez un licencié à renouveler</h2>

        <div  class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">

            <select class="amsb-display-categorieSelect" id="categorie_select" name="categorie" onchange="sort_element_by_categorie(this.value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                <option value="all">Toutes</option>
                <option value="U9">U9</option>
                <option value="U11">U11</option>
                <option value="U13">U13</option>
                <option value="U15">U15</option>
                <option value="U17">U17</option>
                <option value="U18">U18</option>
                <option value="U20">U20</option>
                <option value="Senior">Senior</option>
            </select>

            <label class="amsb-display-label" for="surclassage">
                <input class="amsb-display-surclasse" type="checkbox" id="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                <span class="amsb-display-surclasseText">Surclassé</span>
            </label>

            <ul id="reference_display" class="user_div_reference">
                <li>Nom</li>
                <li>Prénom</li>
                <li>Email</li>
                <li>Téléphone</li>
                <li>Licence</li>
                <li>Sexe</li>
                <li>Catégorie</li>
            </ul>

            <form action="index.php" method="post">

                <div class="amsb-display-scroll">

                    <?php
                    //génération de la date de controle
                    $season = new DateTime();
                    $season->setTime(0,0,0);
                    //ajustement de l'année pour la fin de saison
                    if($season->format('m')<7){
                        $season->setDate($season->format('Y')-1, 7, 1);
                    }else{
                        $season->setDate($season->format('Y'), 7, 1);
                    }
                    $i = 1;

                    foreach ((array) $user_list as $user){
                        if($user['date_licence'] < $season->getTimestamp()){
                            echo'<label id="user_'.$user['id'].'" class="user_div" for="user_id_'.$i.'">';
                            if ($i == 1) {
                                echo '<input class="input-none-displayList" type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'" checked>';
                            } else {
                                echo '<input class="input-none-displayList" type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'">';
                            }
                            echo '<ul>';
                            echo'<li>'.$user['nom'].'</li>';
                            echo'<li>'.$user['prenom'].'</li>';
                            echo'<li>'.$user['mail'].'</li>';
                            echo'<li>'.$user['telephone'].'</li>';
                            echo'<li>'.$user['licence'].'</li>';
                            echo'<li>'.$user['sex'].'</li>';
                            echo'<li>'.$user['categorie'].'</li>';
                            echo'</ul>
                            </label>';
                            $i++;
                        }

                    }
                    ?>

                </div>

                <button type="submit" class="amsb-button" name="user_renewal_form">Renouveler</button>
            </form>
        </div>
    </div>
</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('renewal_licence');"
    ?>
</script>