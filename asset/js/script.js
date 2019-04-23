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
    if(cat ==="all"){
        array2 = array;
    }else{
        if(surclassage && categorie.indexOf(cat) !== 0){
            console.log(categorie[categorie.indexOf(cat)-1]);
            for(var i in array){
                if(array[i][7].toLowerCase().includes(cat.toLowerCase())||array[i][7].toLowerCase().includes(categorie[categorie.indexOf(cat)-1].toLowerCase())){
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
    console.log(array);
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].toLowerCase().includes(str.toLowerCase())||array[i][2].toLowerCase().includes(str.toLowerCase())||array[i][3].toLowerCase().includes(str.toLowerCase())){
            array2[j] = array[i];
            j++;
        }
    }
    hide_class(classe);
    for(var i in array2){
        show_id('match_'+array2[i][0]);
    }
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