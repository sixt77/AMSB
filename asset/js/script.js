function create_element($tag, $id, $class, $onclick, $html){
    var item = document.createElement($tag);
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($html != "" && $html != undefined)item.innerHTML =$html;
    return item;
}
function create_input($type, $id, $class, $placeholder){
    var item = document.createElement("input");
    item.type = $type;
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($value != "" && $value != undefined)item.setAttribute("placeholder", $placeholder);
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
    hide_class(id);
    for(var i in array2){
        show_id('user_'+array2[i][0]);
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
    document.getElementById(id).appendChild(create_element(DIV, "form_"+incr, "parent_form", "", ""));
    document.getElementById("form_"+incr).appendChild(create_element(DIV, "", "parent_form", "", ""));
    document.getElementById("form_"+incr).appendChild(create_input("tex", "", "nom",))

}

function verif_date(date, id) {
    if(!isMajor(date) && count_class("parent_form")===0){
        console.log('creer form');
    }
}