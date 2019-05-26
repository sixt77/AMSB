function create_element($tag, $id, $class, $onclick, $html){
    var item = document.createElement($tag);
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($html != "" && $html != undefined)item.innerHTML =$html;
    return item;
}

function create_input($type, $id, $class, $name, $required){
    var item = document.createElement("input");
    item.type = $type;
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($name != "" && $name != undefined)item.setAttribute("name", $name);
    if($required != "" && $required != undefined)item.setAttribute("required", 'required');
    return item;
}

function create_button($id, $class, $value, $onclick){
    var item = document.createElement("input");
    item.type = "button";
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($value != "" && $value != undefined)item.value = $value;
    return item;
}


function sort_element(str, array) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].toLowerCase().includes(str.toLowerCase())||array[i][2].toLowerCase().includes(str.toLowerCase())||array[i][3].toLowerCase().includes(str.toLowerCase())||array[i][4].toLowerCase().includes(str.toLowerCase())||array[i][5].toLowerCase().includes(str.toLowerCase())||array[i][6].toLowerCase().includes(str.toLowerCase())){
            array2[j] = array[i];
            j++;
        }
    }
    return array2;
}

function sort_team(str, array, classe) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].toLowerCase().includes(str.toLowerCase())){
            array2[j] = array[i];
            j++;
        }
    }
    hide_class(classe);
    for(var i in array2){
        console.log('team_id_'+array2[i][0]);
        show_id('team_id_'+array2[i][0]);
    }
}


function sort_element_by_categorie(cat, surclassage, str, array, id) {
    var j = 0;
    var categorie = ["U9", "U11", "U13", "U15",  "U17",   "U18",  "U20",  "Senior"];
    var array2 = new Array();
    console.log(array);
    if(cat ==="all"){
        array2 = array;
    }else{
        if(surclassage && categorie.indexOf(cat) !== 0){
            for(var i in array){
                if(array[i][7].toLowerCase().includes(cat.toLowerCase())||(array[i][7].toLowerCase().includes(categorie[categorie.indexOf(cat)-1].toLowerCase()) && array[i][8] === "on")){
                    array2[j] = array[i];
                    j++;
                }
            }
        }else{
            for(var i in array){
                if(array[i][7].toLowerCase().includes(cat.toLowerCase())){
                    array2[j] = array[i];
                    j++;
                }
            }
        }
    }

    array2 = sort_element(str, array2);
    console.log(array2);
    hide_class(id);
    for(var i in array2){
        console.log('user_'+array2[i][0]);
        show_id('user_'+array2[i][0]);
    }

}

function sort_match(str, array, classe) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].toLowerCase().includes(str.toLowerCase())||array[i][2].toLowerCase().includes(str.toLowerCase())||array[i][3].toLowerCase().includes(str.toLowerCase())){
            array2[j] = array[i];
            j++;
        }
    }
    add_class_by_class(classe, "hide_by_text");
    for(var i in array2){
        remove_class_by_id('match_'+array2[i][0], "hide_by_text");

    }
}

function select_cat(date, id) {
    console.log(date);
    console.log(id);
    //date du jours
    date = new Date(date);
    var currentDate = new Date();
    //creation des date intervales
    var U9 = new Date((currentDate.getFullYear()-9), 5, 31);
    var U11 = new Date(currentDate.getFullYear()-11, 5, 31);
    var U13 = new Date(currentDate.getFullYear()-13, 5, 31);
    var U15 = new Date(currentDate.getFullYear()-15, 5, 31);
    var U17 = new Date(currentDate.getFullYear()-17, 5, 31);
    var U18 = new Date(currentDate.getFullYear()-18, 5, 31);
    var U20 = new Date(currentDate.getFullYear()-20, 5, 31);

    //verification des intervales
    if(date <= currentDate && date >= U9){
        document.getElementById(id).value = "U9";
    } else if(date < U9 && date >= U11){
        document.getElementById(id).value = "U11";
    } else if(date < U11 && date >= U13){
        document.getElementById(id).value = "U13";
    } else if(date < U13 && date >= U15){
        document.getElementById(id).value = "U15";
    } else if(date < U15 && date >= U17){
        document.getElementById(id).value = "U17";
    }else if(date < U17 && date >= U18){
        document.getElementById(id).value = "U18";
    }else if(date < U18 && date >= U20){
        document.getElementById(id).value = "U20";
    }else if(date < U20){
        document.getElementById(id).value = "Senior";
    }
}

function sort_match_by_date(date1, date2, classe, array){
    var j = 0;
    var array2 = new Array();
    if(date1 == null && date2 == null){
        for(var i in array){
            remove_class_by_id('match_'+array[i][0], "hide_by_date");
        }
    }else{
        for(var i in array){
            if(date1<array[i][4] && date2>array[i][4]){
                array2[j] = array[i];
                j++;
            }
        }
        add_class_by_class(classe, "hide_by_date");
        for(var i in array2){
            remove_class_by_id('match_'+array2[i][0], "hide_by_date");

        }
    }
}

function display_breadcrumb(page){
    //ici tu met juste en rouge la bonne ligne en fonction de la variable page et tu efface ce commenentaire après
    console.log(page);
}

function  add_class_by_class(class1, class2) {
    $( "."+class1+"" ).addClass(class2);
}

function remove_class_by_id(id, class1) {
    $( "#"+id+"" ).removeClass(class1);
}

function hide_class($class) {
    $( "."+$class+"" ).hide();
}

function show_id($id) {
    $( "#"+$id+"" ).show();
}

function remove_class($class) {
    $( "."+$class+"" ).remove();
}

function remove_id($id) {
    $( "#"+$id+"" ).remove();
}


function count_class($class){
    return $( "."+$class+"" ).length;
}


function isMajor(date) {
    if(Math.floor(Date.now() / 1000)-567993600 > date/1000){
        return true;
    }else{
        return false;
    }
}

function add_parent_form(id, incr) {
    //ajout nom
    document.getElementById(id).appendChild(create_element("LI", "form_last_name"+incr, "parent_form amsb-form", "", "Parent n°"+incr+" :"));
    document.getElementById("form_last_name"+incr).appendChild(create_element("span", "", "", "", "Nom :"));
    document.getElementById("form_last_name"+incr).appendChild(create_element("label", "form_label_"+incr, "", "", ""));
    document.getElementById("form_last_name"+incr).appendChild(create_input("text", "", "amsb-item-input","parent"+incr+"_last_name", "required"));

    //ajout prénom
    document.getElementById(id).appendChild(create_element("LI", "form_first_name"+incr, "amsb-form", "", ""));
    document.getElementById("form_first_name"+incr).appendChild(create_element("span", "", "", "", "Prénom :"));
    document.getElementById("form_first_name"+incr).appendChild(create_element("label", "form_label_"+incr, "", "", ""));
    document.getElementById("form_first_name"+incr).appendChild(create_input("text", "", "amsb-item-input","parent"+incr+"_first_name", "required"));

    //ajout email
    document.getElementById(id).appendChild(create_element("LI", "form_mail"+incr, "amsb-form", "", ""));
    document.getElementById("form_mail"+incr).appendChild(create_element("span", "", "", "", "Email :"));
    document.getElementById("form_mail"+incr).appendChild(create_element("label", "form_label_"+incr, "", "", ""));
    document.getElementById("form_mail"+incr).appendChild(create_input("text", "", "amsb-item-input","parent"+incr+"_mail", "required"))

    //ajout mdp
    document.getElementById(id).appendChild(create_element("LI", "form_password"+incr, "amsb-form", "", ""));
    document.getElementById("form_password"+incr).appendChild(create_element("span", "", "", "", "Mot de passe :"));
    document.getElementById("form_password"+incr).appendChild(create_element("label", "form_label_"+incr, "", "", ""));
    document.getElementById("form_password"+incr).appendChild(create_input("text", "", "amsb-item-input","parent"+incr+"_password", "required"));

    //ajout telephone
    document.getElementById(id).appendChild(create_element("LI", "form_phone"+incr, "amsb-form", "", ""));
    document.getElementById("form_phone"+incr).appendChild(create_element("span", "", "", "", "Téléphone :"));
    document.getElementById("form_phone"+incr).appendChild(create_element("label", "form_label_"+incr, "", "", ""));
    document.getElementById("form_phone"+incr).appendChild(create_input("text", "", "amsb-item-input","parent"+incr+"_phone", "required"));

    //suppression formulaire
    if(count_class("parent_form")===1){
        document.getElementById("parent_form_delete_button").appendChild(create_element("LI", "form_delete_button", "amsb-form", "", ""));
        document.getElementById("form_delete_button").appendChild(create_button("button", "amsb-item-input", "X","delete_parent_form(document.getElementById('input_birth_day').valueAsNumber);"));

    }


}

function delete_parent_form(date){
    if(isMajor(date)===true || count_class("parent_form")>1){
        nbclass = count_class("parent_form");
        remove_id("form_last_name"+nbclass);
        remove_id("form_first_name"+nbclass);
        remove_id("form_mail"+nbclass);
        remove_id("form_password"+nbclass);
        remove_id("form_phone"+nbclass);
        if(count_class("parent_form")===0){
            remove_id("form_delete_button");
        }
    }else{
        alert('Il faut au moins un parent pour un licencier mineur.')
    }
}

function verif_date(date, id) {
    if(!isMajor(date) && count_class("parent_form")===0){
        add_parent_form(id, count_class("parent_form")+1);
    }
}


function navBarMove() {
    var navBarStyle         = document.getElementById('navBar').style;
    var imgLogoStyle        = document.getElementById('logo_move').style;
    var titleImgStyle       = document.getElementById('titleImg').style;
    var containerRightStyle = document.getElementsByClassName('amsb-container-right')[0].style;
    var navButtonStyle      = document.getElementsByClassName('amsb-navBar-main')[0].style;
    var iconHomeStyle       = document.getElementsByClassName('icon-home')[0].style;
    if (navBarStyle.width !== "80px") {
        iconHomeStyle.left          = "80px";
        iconHomeStyle.borderLeft    = "none";
        iconHomeStyle.borderRight   = "1px solid #000";
        navBarStyle.width           = "80px";
        titleImgStyle.display       = "none";
        containerRightStyle.width   = "calc(100% - 80px)";
        imgLogoStyle.width          = "60px";
        imgLogoStyle.height         = "60px";
        navButtonStyle.display      = "none";
    } else {
        iconHomeStyle.left          = "149px";
        iconHomeStyle.borderLeft    = "1px solid #000";
        iconHomeStyle.borderRight   = "none";
        navBarStyle.width           = "200px";
        titleImgStyle.display       = "block";
        containerRightStyle.width   = "calc(100% - 200px)";
        imgLogoStyle.width          = "80px";
        imgLogoStyle.height         = "80px";
        navButtonStyle.display      = "block";
    }
}

function followRoad() {
    var indexPageID       = document.getElementsByClassName('amsb-container-right')[0].id;

    switch (indexPageID) {
        // Home
        case 'main':
            document.getElementsByClassName('icon-home')[0].style.color = "#F12024";
            break;
        // Affiche liste
        case 'display_users_list':
            document.getElementsByName('users_list')[0].style.color = "#F12024";
            break;
        // Ajout licencier
        case 'user_sub_form':
        case 'role_selection':
            document.getElementsByName('subform')[0].style.color = "#F12024";
            break;
        // Modifie licencier
        case 'user_edit':
        case 'user_edit_form':
        case 'role_update':
            document.getElementsByName('edit_user')[0].style.color = "#F12024";
            break;
        case 'renewal_licence':
        case 'renewal_licence_form':
            document.getElementsByName('renewal_licence')[0].style.color = "#F12024";
            break;

        case 'display_team_list':
            document.getElementsByName('team_list')[0].style.color = "#F12024";
            break;
        case 'create_team_form':
            document.getElementsByName('create_team_form')[0].style.color = "#F12024";
            break;
        case 'select_team':
        case 'edit_team_form':
            document.getElementsByName('select_team')[0].style.color = "#F12024";
            break;

        case 'display_match_list':
            document.getElementsByName('get_matchs_list')[0].style.color = "#F12024";
            break;
        case 'create_match_form':
            document.getElementsByName('create_match_form')[0].style.color = "#F12024";
            break;
        case 'select_match':
        case 'edit_match_form':
            document.getElementsByName('select_match')[0].style.color = "#F12024";
            break;

        case 'match_selection':

            if (document.getElementsByClassName('user_div')[0].id === "otm_1") {
                document.getElementsByName('designation_OTM_form')[0].style.color = "#F12024";
            } else {
                document.getElementsByName('designation_arbiter_form')[0].style.color = "#F12024";
            }

            break;
        case 'otm_selection':
            document.getElementsByName('designation_OTM_form')[0].style.color = "#F12024";
            break;

        case 'arbiter_selection':
            document.getElementsByName('designation_arbiter_form')[0].style.color = "#F12024";
            break;
        }
    }

function afficheButtunRole($role) {

}

function afficheDivSousRole() {

    var checkboxDirig       = document.getElementById("leaderCheckbox");
    var divSousRole         = document.getElementById("sous_role");
    var gestionUtilisateur  = document.getElementById("0");
    var gestionEquipe       = document.getElementById("1");
    var gestionMatch        = document.getElementById("2");
    var gestionNotification = document.getElementById("3");

    if (checkboxDirig.checked === true) {
        divSousRole.style.display = "block";
    } else {
        divSousRole.style.display = "none";
        gestionUtilisateur.checked = false;
        gestionEquipe.checked = false;
        gestionMatch.checked = false;
        gestionNotification.checked = false;
    }
}