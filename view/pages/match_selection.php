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
                        echo'
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$match["date"].' '.$match["lieux"].'
                        </span>
                        <span>
                            '.$match["nb_otm"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" required>
                        </span>
                    </li>
                ';
                    }

                    if(isset($match["nb_arbitres"])){
                        echo'
                    <li class="amsb-display-item">
                        <span class="amsb-display-item-text">
                            '.$match["date"].' '.$match["lieux"].'
                        </span>
                        <span>
                            '.$match["nb_arbitres"].'
                        </span>
                        <span class="amsb-display-item-radio">
                            <input class="amsb-display-item-radio-item" type="radio" id="'.$i.'" name="match_id" value="'.$match['id'].'" required>
                        </span>
                    </li>
                ';
                    }
                    $i++;
                }

                ?>

                <li class="amsb-form">
                    <button type="submit" class="amsb-button-confirm" name="<?php echo$get;?>">
                        Valider
                    </button>
                </li>

            </ul>

        </form>

    </div>

</div>