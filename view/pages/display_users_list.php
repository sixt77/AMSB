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
                    echo"['".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
                }else{
                    echo",['".$user["nom"]."','".$user["prenom"]."','".$user["mail"]."','".$user["telephone"]."','".$user["licence"]."','".$user["sex"]."','".$user["categorie"]."','".$user["surclassage"]."']";
                }
                $i++;
            }
            echo"];";


            ?>
            $( document ).ready(function() {
                display_js_array(items, 'user_field');
            });
        </script>

        <input type="text" onchange="sort_element(this.value, items, '1', 'user_field')">

        <div id="user_field" class="user_list"></div>
    </div>

</div>
