function create_element($tag, $id, $class, $onclick, $html){
    var item = document.createElement($tag);
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($html != "" && $html != undefined)item.innerHTML =$html;
    return item;
}

function sort_element(str, array) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].includes(str)||array[i][2].includes(str)||array[i][3].includes(str)||array[i][4].includes(str)){
            array2[j] = array[i];
            j++;
        }
    }
    console.log(array2);
    hide_class("user_div");
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