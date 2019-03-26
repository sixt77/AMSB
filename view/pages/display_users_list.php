<div class="amsb-container-right">

    <div class="amsb-container-right-item">
        <script>
            function create_element($tag, $id, $class, $onclick, $html){
                var item = document.createElement($tag);
                if($id != "" && $id != undefined)item.setAttribute("id", $id);
                if($class != "" && $class != undefined)item.setAttribute("class", $class);
                if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
                if($html != "" && $html != undefined)item.innerHTML =$html;
                return item;
            }
        </script>
        <script>
            <?php
            $i = 0;
            echo"var items = [";
            foreach ((array) $users_list as $user){
                if($i == 0){
                    echo"['".$user["nom"]."','".$user["prenom"]."']";
                }else{
                    echo",['".$user["nom"]."','".$user["prenom"]."']";
                }
                $i++;
            }
            echo"];";
            echo"console.log(items);";

            ?>
        </script>
        <script>
            for (var i in items) {
                console.log(items[i]);
            }
        </script>
        <div id="user_field" class="user_list"></div>
    </div>

</div>
