function create_element($tag, $id, $class, $onclick, $html){
    var item = document.createElement($tag);
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($html != "" && $html != undefined)item.innerHTML =$html;
    return item;
}

function sort_element(str, array, index, id) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].includes(str)||array[i][2].includes(str)||array[i][3].includes(str)||array[i][4].includes(str)){
            array2[j] = array[i];
            j++;
        }
    }
    display_js_array(array2, id);

}

function display_js_array(array, id) {
    var classe ="user_value";
    remove_class(classe);
    for (var i in array) {
        document.getElementById(id).appendChild(create_element("DIV","user_"+i, classe, "", array[i][1]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", "nom : "));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][1]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][2]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][3]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][4]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][5]));
        document.getElementById('user_'+i).appendChild(create_element("P","", classe, "", array[i][6]));

    }

}

function remove_class($class) {
    $( "."+$class+"" ).remove();
}