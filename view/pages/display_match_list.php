<div class="amsb-container-right">

    <div class="amsb-container-right-item">

        <?php
        foreach ((array) $match_data as $data){

            echo '<ul>';

            echo '<li class="amsb-display-item">';

            //afficher l'id du match :
            echo $data['match']['id'];

            echo '</li>';
            echo '<li class="amsb-display-item">';

            //afficher la date :
            echo date('d/m/Y',$data['match']['date']);

            echo '</li>';
            echo '<li class="amsb-display-item">';

            //afficher le lieux
            echo $data['match']['lieux'];

            echo '</li>';


            //afficher le nom de l'équipe 1 :
            if (isset($data['team'][0])){
                echo '<li class="amsb-display-item">';
                echo $data['team'][0]['nom'];
                echo '</li>';
            }





            //afficher le nom de l'équipe 2 :
            if (isset($data['team'][1])){
                echo '<li class="amsb-display-item">';
                echo $data['team'][1]['nom'];
                echo '</li>';
            }



        }
        ?>

    </div>

</div>
