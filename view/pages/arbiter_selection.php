<div id="arbiter_selection" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">Arbitre à affecter à ce match</h2>

        <h3 class="amsb-form-item-title-h3">Liste des licenciés - > Arbitre :</h3>

        <div class="amsb-display">

            <form action="index.php" method="post">

                <ul>

                    <?php
                    $i = 0;
                    foreach ((array) $arbiter_list as $arbiter){
                        echo'<li class="amsb-display-item">
                            <label for="arbiter_list_id_'.$i.'">';
                        if(in_array($arbiter['id'], $arbiter_sub_list)){
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="arbiter_list_id_'.$i.'" name="arbiter_list[]" value="'.$arbiter['id'].'" checked>';
                        }else{
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="arbiter_list_id_'.$i.'" name="arbiter_list[]" value="'.$arbiter['id'].'">';
                        }
                        echo '<span class="amsb-display-item-text">
                            '.$arbiter["nom"].' '.$arbiter["prenom"].'
                        </span>
                        </label>
                    </li>';
                        $i++;
                    }

                    ?>

                </ul>

                <button type="submit" class="amsb-button" name="<?php echo$get;?>" value="<?php echo$match_id;?>">Valider</button>

            </form>

        </div>

    </div>

</div>

<script>
    <?php
    //affichage du fil d'ariane
    echo"display_breadcrumb('arbiter_selection');";
    ?>
</script>