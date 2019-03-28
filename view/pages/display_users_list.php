<div class="amsb-container-right">
    <?php
    //var_dump($users_list);
    ?>
    <div class="amsb-container-right-item">
        <script>
            <?php

            $i = 0;
            echo"var items = [";
            foreach ((array) $users_list as $user){
                if($i == 0){
                    echo"['".$user["id"]."','".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
                }else{
                    echo",['".$user["id"]."','".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
                }
                $i++;
            }
            echo"];";


            ?>
        </script>


        <div  class="amsb-display">
            <input type="text" class="amsb-display-searchBar" onchange="sort_element(this.value, items)" placeholder="Recherche..">

            <ul id="reference_display" class="user_div_reference">
                <li>Nom</li>
                <li>Prénom</li>
                <li>Email</li>
                <li>Téléphone</li>
                <li>N° de licence</li>
                <li>Sexe</li>
                <li>Catégorie</li>
            </ul>
        <?php
        foreach ((array) $users_list as $user){
            echo'<ul id="user_'.$user['id'].'" class="user_div">';
            echo'<li>'.$user['nom'].'</li>';
            echo'<li>'.$user['prenom'].'</li>';
            echo'<li>'.$user['mail'].'</li>';
            echo'<li>'.$user['telephone'].'</li>';
            echo'<li>'.$user['licence'].'</li>';
            echo'<li>'.$user['sex'].'</li>';
            echo'<li>'.$user['categorie'].'</li>';
            echo'</ul>';

            $i++;
        }
        ?>

        </div>
    </div>
</div>
