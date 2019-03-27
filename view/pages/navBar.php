<div id="navBar" class="amsb-navBar">
    <div class="amsb-navBar-header">
        <div class="amsb-navBar-header-logoTitle">
            <img class="amsb-navBar-img" src="asset/img/logo_amsb.png" alt="">
            <h2>AMSB</h2>
        </div>
        <a href="index.php?logout" type="submit">
            <i class="fas fa-power-off"></i>
        </a>
    </div>
    <div class="amsb-navBar-main">
        <form action="index.php" method="post">
            <div id="navBar_licencier">
                <h3>Licencier</h3>
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
                    <li>
                        <button>Importer</button>
                    </li>
                </ul>
            </div>
            <div id="navBar_equipe">
                <h3>Equipe</h3>
                <ul>
                    <li>
                        <button>Voir la liste</button>
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
        </form>
    </div>
</div>