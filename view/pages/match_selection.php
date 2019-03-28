<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <h2 class="amsb-form-item-title">
            Selectionnez un match
        </h2>

        <form action="index.php" method="post">

            <ul>

                <?php

                $i = 1;
                foreach ((array) $match_list as $match){
                    if(isset($match["nb_otm"])){
                        echo'<li class="amsb-display-item">
                                    <label for="'.$i.'">
                                        <span class="amsb-display-item-text">
                                            <span>'.date('m/d/Y', $match["date"]).'</span>
                                            <span>'.$match["lieux"].'</span>
                                            <span>'.$match["nb_otm"].'</span>
                                        </span>
                                        <input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" required>
                                    </label>
                               </li>';
                    }

                    if(isset($match["nb_arbitres"])){
                        echo'<li class="amsb-display-item">
                                    <label for="'.$i.'">
                                        <span class="amsb-display-item-text">
                                            <span>'.date('m/d/Y', $match["date"]).'</span>
                                            <span>'.$match["lieux"].'</span>
                                            <span>'.$match["nb_arbitres"].'</span>
                                        </span>
                                        <input type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" required>
                                    </label>
                               </li>';
                    }
                    $i++;
                }

                ?>

            </ul>

            <button type="submit" class="amsb-button" name="<?php echo$get;?>">Valider</button>
        </form>

    </div>

</div>