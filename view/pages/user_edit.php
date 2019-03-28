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
<div id="user_edit" class="amsb-container-right">
    <div class="amsb-container-right-item">
        <h2 class="amsb-form-item-title">Selectionnez un licencier à modifier</h2>

        <div  class="amsb-display">
            <input type="text" id="search_bar" class="amsb-display-searchBar" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, this.value, items, 'user_div')" placeholder="Recherche..">
            <select id="categorie_select" name="categorie" onchange="sort_element_by_categorie(this.value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
                <option value="all">toutes</option>
                <option value="U9">U9</option>
                <option value="U11">U11</option>
                <option value="U13">U13</option>
                <option value="U15">U15</option>
                <option value="U17">U17</option>
                <option value="U18">U18</option>
                <option value="U20">U20</option>
                <option value="Senior">Senior</option>
            </select>
            <input type="checkbox" id="surclassage" onchange="sort_element_by_categorie(document.getElementById('categorie_select').value, document.getElementById('surclassage').checked, document.getElementById('search_bar').value, items, 'user_div')">
            <ul id="reference_display" class="user_div_reference">
                <li>Nom</li>
                <li>Prénom</li>
                <li>Email</li>
                <li>Téléphone</li>
                <li>N° de licence</li>
                <li>Sexe</li>
                <li>Catégorie</li>
            </ul>

            <form action="index.php" method="post">
                <div class="amsb-display-scroll">
                    <?php
                    $i==1;
                    foreach ((array) $user_list as $user){
                        echo'<ul id="user_'.$user['id'].'" class="user_div">';
                        echo'<li>'.$user['nom'].'</li>';
                        echo'<li>'.$user['prenom'].'</li>';
                        echo'<li>'.$user['mail'].'</li>';
                        echo'<li>'.$user['telephone'].'</li>';
                        echo'<li>'.$user['licence'].'</li>';
                        echo'<li>'.$user['sex'].'</li>';
                        echo'<li>'.$user['categorie'].'</li>';
                        if ($i == 1) {
                            echo '<input type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'" checked>';
                        } else {
                            echo '<input type="radio" id="user_id_'.$i.'" name="user_id" value="'.$user['id'].'">';
                        }
                        echo'</ul>';
                        $i++;
                    }
                    ?>

                </div>
                <button type="submit" class="amsb-button" name="user_edit_form">Valider</button>
            </form>
        </div>
    </div>
</div>
