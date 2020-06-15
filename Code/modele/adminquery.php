<?php
require_once("../src/function.php");
require_once('../database/connexion.php');

function topPlayers() {
    require_once('../database/connexion.php');
    global $connect;
    $req = $connect->prepare(' SELECT Name,score FROM users WHERE role="player" ORDER BY score DESC LIMIT 5');
    $req -> execute();
    $topPlayers = $req->fetchAll();
    // Ici, on doit surtout sécuriser l'affichage
    foreach($topPlayers as $cle => $player){

        $topPlayers[$cle]['Name']=htmlspecialchars($player['Name']);
        $topPlayers[$cle]['score']=htmlspecialchars($player['score']); 
    }
    return $topPlayers;
}
function Players() {
    require_once('../database/connexion.php');
    global $connect;
    $req = $connect->prepare(' SELECT userID,Name,login,score,statut FROM users WHERE role="player" ORDER BY score DESC LIMIT 5 ');
    $req -> execute();
    $players = $req->fetchAll();
    // Ici, on doit surtout sécuriser l'affichage
    foreach($players as $cle => $player){

        $players[$cle]['Name']=htmlspecialchars($player['Name']);
        $players[$cle]['userID']=htmlspecialchars($player['userID']);
        $players[$cle]['login']=htmlspecialchars($player['login']);
        $players[$cle]['score']=htmlspecialchars($player['score']); 
        $players[$cle]['statut']=htmlspecialchars($player['statut']);

    }
    return $players;
}
function countAdmin() {
    require_once('../database/connexion.php');
    global $connect;
    $req = $connect->prepare(' SELECT count(userID) as nbr FROM users WHERE role="admin" ');
    $req -> execute();
    $nombreAdmin = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombreAdmin['nbr']=(int)htmlspecialchars($nombreAdmin['nbr']);
        
    return $nombreAdmin;
}
function countQuestion() {
    require_once('../database/connexion.php');
    global $connect;
    $req = $connect->prepare(' SELECT count(questionID) as nbr FROM question ');
    $req -> execute();
    $nombreQuestion = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombreQuestion['nbr']=(int)htmlspecialchars($nombreQuestion['nbr']);
        
    return $nombreQuestion;
}
function countPlayer() {
    require_once('../database/connexion.php');
    global $connect;
    $req = $connect->prepare(' SELECT count(userID) as nbr FROM users WHERE role="player" ');
    $req -> execute();
    $nombrePlayer = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombrePlayer['nbr']=(int)htmlspecialchars($nombrePlayer['nbr']);
        
    return $nombrePlayer;
}
?>