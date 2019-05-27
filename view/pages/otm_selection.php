<div id="otm_selection" class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">OTM à affecter à ce match</h2>

        <h3 class="amsb-form-item-title-h3">Liste des licenciés -> OTM :</h3>

        <div class="amsb-display">

            <form action="index.php" method="post">

                <ul>

                    <?php
                    $i = 0;
                    foreach ((array) $otm_list as $otm){
                        echo'<li class="amsb-display-item">
                            <label for="otm_list_id_'.$i.'">';
                        if(in_array($otm['id'], $otm_sub_list)){
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="otm_list_id_'.$i.'" name="otm_list[]" value="'.$otm['id'].'" checked>';
                        }else{
                            echo'<input class="amsb-display-item-radio-item" type="checkbox" id="otm_list_id_'.$i.'" name="otm_list[]" value="'.$otm['id'].'">';
                        }
                        echo '<span class="amsb-display-item-text">
                            '.$otm["nom"].' '.$otm["prenom"].'
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
    echo"display_breadcrumb('otm_selection');"
    ?>
</script>