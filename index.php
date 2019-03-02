<?php

session_start();
include("dblog/dblog.php");
include("modele/crypt.php");
include("modele/user.php");
include("modele/leader.php");
include("modele/OTM.php");
include("modele/arbiter.php");
include("modele/player.php");
include("modele/volunteer.php");
include("modele/role.php");
include("modele/leader_role.php");
include("modele/parent.php");
include("modele/coach.php");
include("modele/team.php");
include("modele/api.php");
include("modele/match.php");
include("controller/controller.php");
include("controller/api_controller.php");
include("view/display.php");
if($page != "json") {
    include("view/header.php");
    include("view/view.php");
    include("view/footer.php");
}else{
    include("view/view.php");
}