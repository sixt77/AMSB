<script>
    function navBarMove () {
        var navBarStyle         = document.getElementById('navBar').style;
        var imgLogoStyle        = document.getElementById('logo_move').style;
        var titleImgStyle       = document.getElementById('titleImg').style;
        var containerRightStyle = document.getElementsByClassName('amsb-container-right')[0].style;
        var navButtonStyle      = document.getElementsByClassName('amsb-navBar-main')[0].style;
        var iconHomeStyle       = document.getElementsByClassName('icon-home')[0].style;
        if (navBarStyle.width !== "80px") {
            iconHomeStyle.left          = "80px";
            navBarStyle.width           = "80px";
            titleImgStyle.display       = "none";
            containerRightStyle.width   = "calc(100% - 80px)";
            imgLogoStyle.width          = "60px";
            imgLogoStyle.height         = "60px";
            navButtonStyle.display      = "none";
        } else {
            iconHomeStyle.left          = "200px";
            navBarStyle.width           = "200px";
            titleImgStyle.display       = "block";
            containerRightStyle.width   = "calc(100% - 200px)";
            imgLogoStyle.width          = "80px";
            imgLogoStyle.height         = "80px";
            navButtonStyle.display      = "block";
        }
    }
</script>
<?php
var_dump($leader_role_array);
?>
<div id="navBar" class="amsb-navBar" style="">
    <a href="index.php">
        <i class="fas fa-home icon-home"></i>
    </a>

    <div class="amsb-navBar-header">
        <div class="amsb-navBar-header-logoTitle">
            <img onclick="navBarMove()" id="logo_move" class="amsb-navBar-img" src="asset/img/logo_amsb.png" alt="">
            <h2 id="titleImg">AMSB</h2>
        </div>

        <a class="amsb-navBar-header-a" href="index.php?logout" type="submit">
            <i class="fas fa-power-off"></i>
        </a>
    </div>

    <div class="amsb-navBar-main-litle"></div>

    <div class="amsb-navBar-main">
        <form action="index.php" method="post">
            <div id="navBar_licencier">
                <h3>Licencié</h3>
                <ul>
                    <li>
                        <button type="submit" name="users_list" value="">Voir la liste</button>
                    </li>
                    <li>
                        <button type="submit" name="subform" value="">Ajouter</button>
                    </li>
                    <li>
                        <button type="submit" name="edit_user" value="">Modifier</button>
                    </li>
                </ul>
            </div>
            <div id="navBar_equipe">
                <h3>Equipe</h3>
                <ul>
                    <li>
                        <button type="submit" name="team_list" value="">Voir la liste</button>
                    </li>
                    <li>
                        <button type="submit" name="create_team_form" value="">Ajouter</button>
                    </li>
                    <li>
                        <button type="submit" name="select_team" value="">Modifier</button>
                    </li>
                </ul>
            </div>
            <div id="navBar_match">
                <h3>Match</h3>
                <ul>
                    <li>
                        <button type="submit" name="get_matchs_list" value="">Voir la liste</button>
                    </li>
                    <li>
                        <button type="submit" name="create_match_form" value="">Ajouter</button>
                    </li>
                    <li>
                        <button>Modifier</button>
                    </li>
                    <li>
                        <button type="submit" name="designation_OTM_form" value="">Désignation des OTM</button>
                    </li>
                    <li>
                        <button type="submit" name="designation_arbiter_form" value="">Désignation des arbitres</button>
                    </li>
                </ul>
            </div>
            <div id="navBar_match">
                <h3>Notifications</h3>
                <ul>
                    <li>
                        <a href="https://console.firebase.google.com/u/0/project/test-notif-604ae/notification">
                            Gestion des notifications
                        </a>
                    </li>

                </ul>
            </div>
        </form>
    </div>

</div>