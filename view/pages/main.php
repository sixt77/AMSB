

<form id="moove-event" action="index.php"  method="post">
    <input type='hidden' name='action' value='move-event'>
    <input type='hidden' name='id' id="id_event" value=''>
    <input type='hidden' name='start' id="start_event" value=''>
    <input type='hidden' name='end' id="end_event" value=''>
</form>

<div class="ac-main">

    <div class="ac-main-calendrier" id="cal">

        <div id="calendar">

        </div>

        <button id="bouttonCreeEvent" type="submit" class="ac-main-calendrier-createEvent"  name="action" value="create-event">
            +
        </button>

    </div>

    <div class="ac-createEvent" style="display:none;" id="createEvent">

        <form action="index.php" method="post">

            <div class="ac-createEvent-header">

                <div class="ac-createEvent-header-close" id="closeEvent">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="saveEvent"  name="action" value="create-event">
                    enregistrer
                </button>

                <input class="ac-createEvent-header-title" type="text" placeholder="Titre de l'événement :"  name="nom" required>

            </div>

            <div class="ac-createEvent-body">

                <div class="ac-createEvent-body-creneaux">

                    <h1 class="ac-createEvent-body-creneaux-title">
                        Date et horaires
                    </h1>


                    <div class="ac-createEvent-body-creneaux-first">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date" required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type"
                               name="start_time" required>

                    </div>

                    <div class="ac-createEvent-body-creneaux-second">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date" required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time" required>

                    </div>

                </div>

                <div class="ac-createEvent-body-description">
                    <input class="ac-createEvent-body-description-input" type="text" placeholder="Description :"
                           name="description" required>
                </div>

                <div class="ac-createEvent-body-invitation">

                    <h1 class="ac-createEvent-body-invitation-title">
                        Invités
                    </h1>

                    <?php
                    echo '<h2 class="ac-createEvent-body-invitation-users">Utilisateurs</h2>';
                    foreach ($users_list as $user) {
                        echo '<label class="ac-createEvent-body-item">';
                        echo '<span class="ac-createEvent-body-item-name">' . $user['Fname'] . '</span>';
                        echo '<span class="ac-createEvent-body-item-lname">' . $user['Lname'] . '</span>';
                        echo '<input type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                        echo"<select name='user_right[]'>
                             <option value='3'>utilisateur</option>
                             <option value='2'>admin</option>
                        </select>";
                        echo '<span class="ac-createEvent-body-item-checkmark"></span>';
                        echo "</label>";
                    }
                    echo '<h2 class="ac-createEvent-body-invitation-groups">Groupes</h2>';
                    foreach ($groups_list as $group) {
                        echo '<label class="ac-createEvent-body-item">';
                        echo '<span class="ac-createEvent-body-item-name">' . $group['nom'] . '</span>';
                        echo '<span class="ac-createEvent-body-item-lname">' . $group['description'] . '</span>';
                        echo '<input type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                        echo '<span class="ac-createEvent-body-item-checkmark"></span>';
                        echo '</label>';
                    }
                    ?>
                </div>

            </div>

        </form>

    </div>

    <div class="ac-createEvent-popUp" style="display: none" id="createEvent-Deskstop">

        <form action="index.php" method="post">

            <div class="ac-createEvent-popUp-content">

                <div class="ac-createEvent-popUp-header">

                    <div class="ac-createEvent-popUp-header-close" id="closeEventPopUp">
                        &#xf00d;
                    </div>

                    <button type="submit" class="ac-createEvent-popUp-header-save" id="savePopup"  name="action" value="create-event">
                        Enregistrer
                    </button>

                    <input class="ac-createEvent-popUp-header-title" type="text" placeholder="Titre de l'événement... " name="nom" required>

                </div>

                <div class="ac-createEvent-popUp-body">

                    <div class="ac-createEvent-popUp-body-creneaux">

                        <h1 class="ac-createEvent-popUp-body-creneaux-title">
                            Date et horaires
                        </h1>

                        <div class="ac-createEvent-popUp-body-creneaux-first">

                            <i class="ac-createEvent-popUp-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-popUp-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="start_date" required>

                            <input class="ac-createEvent-popUp-body-creneaux-hoursEv" type="time" placeholder="type"
                                   name="start_time" required>

                        </div>

                        <div class="ac-createEvent-popUp-body-creneaux-second">

                            <i class="ac-createEvent-popUp-body-creneaux-crenTxt">
                                &#xf017;
                            </i>

                            <input class="ac-createEvent-popUp-body-creneaux-dateEv" type="Date" placeholder="type"
                                   name="end_date" required>

                            <input class="ac-createEvent-popUp-body-creneaux-hoursEv" type="time" placeholder=type
                                   name="end_time" required>

                        </div>



                    </div>

                    <div class="ac-createEvent-popUp-body-invitation">

                        <h1 class="ac-createEvent-popUp-body-invitation-title">
                            Invités
                        </h1>

                        <?php
                        echo '<h2 class="ac-createEvent-popUp-body-invitation-users">Utilisateurs</h2>';
                        foreach ($users_list as $user) {
                            echo '<label class="ac-createEvent-popUp-checkbox-container">';
                            echo '<span class="name">' . $user['Fname'] . '</span>';
                            echo '<span class="lname">' . $user['Lname'] . '</span>';
                            echo '<input class="" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                            echo"<select name='user_right[]'>
                             <option value='3'>utilisateur</option>
                             <option value='2'>admin</option>
                        </select>";
                            echo '<span class="ac-createEvent-popUp-checkbox-container-checkmark"></span>';
                            echo "</label>";
                        }
                        echo '<h2 class="ac-createEvent-popUp-body-invitation-groups">Groupes</h2>';
                        foreach ($groups_list as $group) {
                            echo '<label class="ac-createEvent-popUp-checkbox-container">';
                            echo '<span class="name">' . $group['nom'] . '</span>';
                            echo '<span class="lname">' . $group['description'] . '</span>';
                            echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
                            echo '<span class="ac-createEvent-popUp-checkbox-container-checkmark"></span>';
                            echo '</label>';
                        }
                        ?>
                    </div>

                </div>

                <div class="ac-createEvent-popUp-body-description">
                    <input class="ac-createEvent-popUp-body-description-input" type="text" placeholder="Description ..."
                           name="description" required>
                </div>

            </div>

        </form>

    </div>

    <div class="ac-popUpEvent" id="popup_event" style="display: none;">

        <input type="hidden" value="hide" id="popup_stat">

        <div class="ac-popUpEvent-content">

            <?php
            foreach ($event_list as $events) {
                echo '<div class="ac-popUpEvent-header event_popup" id="event_'.$events['id'].'" style="display: none">';
                echo '<ul>';
                if (!empty($events['nom'])) {
                    echo '<li class="ac-popUpEvent-header-item ac-popUpEvent-header-item-nom">' . $events['nom'] . '</li>';
                }
                if (!empty($events['type'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['type'] . '</li>';
                }
                if (!empty($events['start'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['start'] . ' ' . $events['start_hour'] . '</li>';
                }
                if (!empty($events['end'])) {
                    echo '<li class="ac-popUpEvent-header-item">' . $events['end'] . ' ' . $events['end_hour'] . '</li>';
                }
                if (!empty($events['description'])) {
                    echo '<li class="ac-popUpEvent-header-item ac-popUpEvent-header-item-description">' . $events['description'] . '</li>';
                }
                echo '</ul>';
                echo '<input type="button" class="ac-popUpEvent-header-close" id="closeFail" onclick="hide_envent_popup(' . $events['id'] . ')" value="Retour">';
                echo '</div>';

            }
            ?>

        </div>

    </div>

    <div class="ac-fontGris" id="fondGris"></div>

</div>