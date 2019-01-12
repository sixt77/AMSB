

<form id="moove-event" action="index.php"  method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>
<?php
var_dump($id);
?>
<div class="ac-main">

    <form action="index.php?ac=role_selection" method="post">

        <ul>

            <li class="ac-home-sign-item-inscrip">

                <h2 class="ac-home-sign-item-h2">
                    selectionnez les rôles
                </h2>



            </li>
            dirigeant ?
            <input type="checkbox" id="leaderCheckbox" name="Dirigeant" value="dirigeant">
            <input type="checkbox" id="OTMCheckbox" name="OTM" value="otm">
            <input type="hidden" name="id_user" value="<?php echo $id;?>">
            <div class="ac-home-sign-allBoutton">
                <ul>

                    <li class="ac-home-sign-item-boutton-left">
                        <button type="submit" class="ac-home-sign-item-boutton-log" name="action" value="role_selection">
                            Valider
                        </button>
                    </li>



                </ul>

            </div>

        </ul>

    </form>




    <div class="ac-fontGris" id="fondGris"></div>

</div>