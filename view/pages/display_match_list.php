<div id="display_match_list" class="amsb-container-right">
    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Liste des matchs</h2>

        <div class="amsb-display">
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

            <ul id="reference_display" class="user_div_reference">
                <li>Equipe 1</li>
                <li>Equipe 2</li>
                <li>Lieu</li>
                <li>Date</li>
            </ul>

            <div class="amsb-display-scroll">
                <?php

                foreach ((array) $match_data as $data){

                    echo '<ul class="user_div">';
                    //afficher le nom de l'équipe 1 :
                    if (isset($data['team'][0])){
                        echo '<li>';
                        echo $data['team'][0]['nom'];
                        echo '</li>';
                    }
                    //afficher le nom de l'équipe 2 :
                    if (isset($data['team'][1])){
                        echo '<li>';
                        echo $data['team'][1]['nom'];
                        echo '</li>';
                    }

                    //afficher le lieux
                    echo '<li>';
                    echo $data['match']['lieux'];
                    echo '</li>';

                    //afficher la date :
                    echo '<li>';
                    echo date('d/m/Y',$data['match']['date']);
                    echo '</li>';

                    echo '</ul>';

                }
                ?>

            </div>

        </div>

    </div>

</div>
