<form id="moove-event" action="index.php"  method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>

<div class="amsb-container">

    <div class="amsb-container-left">

        <div class="amsb-container-item">

            <a href="index.php?subform" class="amsb-sign-item-link amsb-sign-item-button">
                Inscription d'un licencié
            </a>

            <a href="index.php?subform" class="amsb-sign-item-link amsb-sign-item-button">
                Inscription d'un licencié
            </a>

            <a href="index.php?subform" class="amsb-sign-item-link amsb-sign-item-button">
                Inscription d'un licencié
            </a>

            <a href="index.php?subform" class="amsb-sign-item-link amsb-sign-item-button">
                Inscription d'un licencié
            </a>

            <a href="index.php?subform" class="amsb-sign-item-link amsb-sign-item-button">
                Inscription d'un licencié
            </a>


        </div>

    </div>

    <div class="amsb-container-middle"></div>

    <div class="amsb-container-right ">

        <div class="amsb-container-item amsb-container-item-logOut">

            <form action="index.php?ac=role_selection" method="post">

                <ul>

                    <li class="amsb-home-sign-item-inscrip">

                        <h2 class="amsb-home-sign-item-h2">
                            selectionnez les rôles
                        </h2>



                    </li>
                    dirigeant ?
                    <input type="checkbox" id="leaderCheckbox" name="Dirigeant" value="dirigeant">
                    <input type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
                    <input type="hidden" name="id_user" value="<?php echo $id;?>">
                    <div class="amsb-home-sign-allBoutton">
                        <ul>

                            <li class="amsb-home-sign-item-boutton-left">
                                <button type="submit" class="amsb-home-sign-item-boutton-log" name="action" value="role_selection">
                                    Valider
                                </button>
                            </li>



                        </ul>

                    </div>

                </ul>

            </form>

        </div>

    </div>

</div>
