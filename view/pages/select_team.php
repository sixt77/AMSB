

<div class="ac-home-container ac-home-signup">

    <div class="ac-home">

        <form action="index.php" method="post">

            <ul>

                <li class="ac-home-sign-item-inscrip">

                    <h2 class="ac-home-sign-item-h2">
                        modification d'équipe !
                    </h2>



                </li>

                liste des equipes :
                <?php
                $i = 1;
                foreach ((array) $team_list as $team){
                    echo'
            <table>
                <tr>
                    <td>
                        '.$team["nom"].'
                    </td>
                    <td>
                        <input type="radio" id="'.$i.'" name="team" value="'.$team['id_equipes'].'">
                    </td>
                </tr>
            </table>
            ';
                    $i++;
                }

                ?>


                <div class="ac-home-sign-allBoutton">
                    <ul>

                        <li class="ac-home-sign-item-boutton-left">
                            <button type="submit" class="ac-home-sign-item-boutton-log" name="update_team_form" value="">
                                Valider
                            </button>
                        </li>



                    </ul>

                </div>

            </ul>

        </form>

    </div>

</div>
