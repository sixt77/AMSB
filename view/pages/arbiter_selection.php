<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">
            Selectionnez des otms a affecter a ce match
        </h2>

        <form action="index.php" method="post">

            <ul>

                <?php
                $i = 0;
                foreach ((array) $arbiter_list as $arbiter){
                    echo'
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$arbiter["nom"].' '.$arbiter["prenom"].'
                        </span>

                        <span class="amsb-display-item-radio">
                        ';
                        if(in_array($arbiter['id'], $arbiter_sub_list)){
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="arbiter_list[]" value="'.$arbiter['id'].'" checked>';
                        }else{
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="'.$i.'" name="arbiter_list[]" value="'.$arbiter['id'].'">';
                        }

                        echo'</span>
                    </li>
                ';
                        $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="<?php echo$get;?>" value="<?php echo$match_id;?>">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>