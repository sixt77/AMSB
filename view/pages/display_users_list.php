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

        <input type="text" onchange="sort_element(this.value, items)">
        <?php
        foreach ((array) $users_list as $user){
            echo'<div id="user_'.$user['id'].'" class="user_div">';
            echo'<p>'.$user['nom'].'</p>';
            echo'<p>'.$user['prenom'].'</p>';
            echo'<p>'.$user['mail'].'</p>';
            echo'<p>'.$user['telephone'].'</p>';
            echo'<p>'.$user['licence'].'</p>';
            echo'<p>'.$user['sex'].'</p>';
            echo'<p>'.$user['categorie'].'</p>';
            echo'</div>';

            $i++;
        }
        ?>
        <div id="user_field" class="user_list"></div>
    </div>

</div>
