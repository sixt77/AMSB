<?php
//script de connection pour les utilisateurs
//renvoie les parametre dans la session
//return true si elle réussi et false sinon
function user_signin($identifiant, $password, $c) {
//récupération des compte streamer
    //cryptage du password
    $sql = ("SELECT U.id, U.mail, D.id_dirigeants, U.motDePasse 
FROM utilisateurs U  
INNER JOIN dirigeants D ON U.id = D.id_utilisateurs 
WHERE U.mail='$identifiant'");
    $result = mysqli_query($c,$sql);
    //test des résultat
    if($row = mysqli_fetch_row($result)){
        if(verify($password, $row[3])) {
            if (isset($row[0]) && isset($row[2])) {
                //attribution d'une session
                $_SESSION['stat'] = "connect";
                $_SESSION['id'] = $row[0];
                $_SESSION['mail'] = $row[1];
                $_SESSION['id_leader'] = $row[2];
                return true;
            } else {
                //attribution d'une session vide
                unset ($_SESSION['stat']);

                return false;
            }
        }
        else {
            //attribution d'une session vide
            unset ($_SESSION['stat']);

            return false;
        }
    }
    $result->close();
}

//script de connection pour les utilisateurs depuis l'application
//renvoie les parametre dans la session
//return true si elle réussi et false sinon
function user_signin_by_application($identifiant, $password, $c) {
//récupération des compte streamer
    //cryptage du password
    $sql = ("SELECT U.id, U.mail, U.motDePasse 
FROM utilisateurs U  
WHERE U.mail='$identifiant'");
    $result = mysqli_query($c,$sql);
    //test des résultat
    if($row = mysqli_fetch_row($result)){
        if(verify($password, $row[2])) {
            if (isset($row[0])) {
                //renvoie de l'id utilisateur
                return $row[0];
            } else {
                //renvoie null si l'utilisateur n'existe pas
                return false;
            }
        }
        else {
            return false;
        }
    }
}

//script d'inscription pour les user 
//ajoute dans la bdd les valeurs
//renvoi true si la connection a fonctionné sinon false
function user_signup($nom, $prenom, $mail,$motDePasse, $telephone, $licence, $sex, $categorie, $surclassage, $c) {
    //cryptage du password
    $motDePasse = encrypt($motDePasse);
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO utilisateurs(nom, prenom, mail, motDePasse, telephone, licence, sex, categorie, surclassage) VALUES('$nom', '$prenom', '$mail', '$motDePasse', '$telephone', '$licence', '$sex', '$categorie', '$surclassage')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}
//met a jour les information d'un joueur
//renvoi true si la connection a fonctionné sinon false
function user_update($user_id, $nom, $prenom, $mail, $telephone, $licence, $sex, $categorie, $surclassage, $date_licence, $c) {
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE utilisateurs
SET nom = '$nom', prenom = '$prenom', mail = '$mail', telephone = '$telephone', licence = '$licence', sex = '$sex', categorie = '$categorie', surclassage = '$surclassage', date_licence = $date_licence
WHERE id = '$user_id'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


function get_info_user_by_id($id, $c){
    $sql = ("SELECT id, nom, prenom, mail, telephone, licence, sex, categorie, surclassage, date_licence FROM utilisateurs WHERE id ='$id'");
    $result = mysqli_query($c,$sql);
    $user_info= array ();
    if($row = mysqli_fetch_row($result)){
        $user_info= $row;
    }

    return $user_info;
}

function get_all_info_user_by_id($id, $c){
    $sql = ("SELECT * FROM utilisateurs WHERE id ='$id'");
    $result = mysqli_query($c,$sql);
    $user_info= array ();
    if($row = mysqli_fetch_row($result)){
        $user_info= $row;
    }

    return $user_info;
}

function get_role_user_by_id($id, $c){
    $sql = ("SELECT U.id, D.id_dirigeants, O.id_otm, A.id_arbitre,B.id_benevole, J.id_joueurs, E.id_entraineurs
FROM utilisateurs U
LEFT JOIN dirigeants D ON U.id = D.id_utilisateurs
LEFT JOIN otm O ON U.id = O.id_utilisateurs
LEFT JOIN arbitres A ON U.id = A.id_utilisateurs
LEFT JOIN benevoles B ON U.id = B.id_utilisateurs
LEFT JOIN joueurs J ON U.id = J.id_utilisateurs
LEFT JOIN entraineurs E ON U.id = E.id_utilisateurs
WHERE U.id ='$id'");
    $result = mysqli_query($c,$sql);
    $user_info= array ();

    if($row = mysqli_fetch_row($result)){
        $user_info = $row;
    }
    return $user_info;
}

function get_users_list($c){
    $sql = ("SELECT * FROM utilisateurs");
    $result = mysqli_query($c,$sql);
    $users_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_list[$loop]= $donnees;
        $loop++;
    }
    return $users_list;
}

function update_user_licence($id, $date_licence, $licence, $categorie, $surclassage, $c){
    //insertion des valeurs dans la bdd
    $sql = ("UPDATE utilisateurs
SET date_licence = '$date_licence', licence = '$licence', categorie = '$categorie', surclassage = '$surclassage'
WHERE id = '$id'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


function user_logout() {
    $_SESSION = array();
    unset ($_SESSION['etat']);
}