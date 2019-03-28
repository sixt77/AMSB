<?php
function upload_image($name)
{

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $return = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check == false) {
            $return = "le fichier n'est pas une image";
            $uploadOk = 0;
        }
    }


// Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        $return = "le fichier est trop volumineux.";
        $uploadOk = 0;

    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $return = "seuls les formats : jpeg, png, jpeg, gif sont acceptés";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
// if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$name.".".$imageFileType)) {
            return true;
        } else {
            return "erreur de transfert";
        }

    }else{
        return $return;
    }
}

//permet de recupéré une image via un id_user, renvoie false si aucune existe
function get_image_by_id_user($id_user){
    if($_SERVER['HTTP_HOST']=="os-vps418.infomaniak.ch"){
        $url ="http://os-vps418.infomaniak.ch/etu_info/amsb1/DEV/";
    }else{
        $url ="http://localhost/AMSB/";
    }

    $find = false;
    if(file_exists("uploads/".$id_user.".png")){
        $url .= "uploads/".$id_user.".png";
        $find = true;
    }
    if(file_exists("uploads/".$id_user.".jpg")){
        $url .= "uploads/".$id_user.".jpg";
        $find = true;
    }
    if(file_exists("uploads/".$id_user.".jpeg")){
        $url .= "uploads/".$id_user.".jpeg";
        $find = true;
    }
    if(file_exists("uploads/".$id_user.".gif")){
        $url .= "uploads/".$id_user.".gif";
        $find = true;
    }

    if($find){
        return $url;
    }else{
        return false;
    }
}
?>
