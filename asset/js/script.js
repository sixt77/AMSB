function create_element($tag, $id, $class, $onclick, $html){
    var item = document.createElement($tag);
    if($id != "" && $id != undefined)item.setAttribute("id", $id);
    if($class != "" && $class != undefined)item.setAttribute("class", $class);
    if($onclick != "" && $onclick != undefined)item.setAttribute( "onclick", $onclick);
    if($html != "" && $html != undefined)item.innerHTML =$html;
    return item;
}

function sort_element(str, array, id) {
    var j = 0;
    var array2 = new Array();
    for(var i in array){
        if(array[i][1].toLowerCase().includes(str.toLowerCase())||array[i][2].toLowerCase().includes(str.toLowerCase())||array[i][3].toLowerCase().includes(str.toLowerCase())||array[i][4].toLowerCase().includes(str.toLowerCase())||array[i][5].toLowerCase().includes(str.toLowerCase())||array[i][6].toLowerCase().includes(str.toLowerCase())||array[i][7].toLowerCase().includes(str.toLowerCase())){
            array2[j] = array[i];
            j++;
        }
    }
    console.log(array2);
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

function isMajor(date) {
    console.log(date);
    if((Date.now()-567993600)> date){
        console.log('majeur');
    }else{
        console.log('mineur');
    }


}