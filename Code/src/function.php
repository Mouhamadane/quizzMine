<?php
require_once('../database/connexion.php');

 // Verifier connexion
 function is_connect(){
    global $connect;
    if (!isset($_SESSION['statut'])) {
        header("Location:../index.php");
    }
}
// Deconnecter
function deconnexion(){
    unset($_SESSION['name']);
    unset($_SESSION['statut']);
    session_destroy();
   
}
// Validation inscription
function is_name($chaine){
    $chaine = trim($chaine);
    if(preg_match('#(^[A-Z]([a-z]|[" "]([A-Z]{1})){1,})+$#',$chaine)){
        return true;
    }
    return false;
}
function confirmer($string1,$string2){
    if ($string1 != $string2) {
        return false;
    }
    return true;
}
 // Fonction qui permet de savoir si un caractere est une lettre ou pas
 function is_car_alpha ($car){
    if (($car < "a" ||  $car > "z") && ($car < "A" ||  $car > "Z")|| long_chaine($car)>1){
        return false;
    }
    return true;
}
// Fonction qui permet de savoir si une chaine est un mot ou pas
function is_chaine_alpha($chaine){
    for($i=0; $i<long_chaine($chaine); $i++){
        if(!is_car_alpha($chaine[$i])){
            return false;
        }
    }
    return true;
}
// Verifier ci le login existe déjà
function is_login($login){
    global $connect;
    $role = "player";
    $query = $connect->prepare("SELECT * FROM users WHERE login = ? and role = ?");
    $query->execute(array($login, $role));
    $result = $query->rowCount();
    if ($result == 1) {
        return true;
    }        
    return false;      
}
function is_admin($login){
    global $connect;
    $role = "admin";
    $query = $connect->prepare("SELECT * FROM users WHERE login = ? and role = ?");
    $query->execute(array($login, $role));
    $result = $query->rowCount();
    if ($result == 1) {
        return true;
    }        
    return false;      
}


?>