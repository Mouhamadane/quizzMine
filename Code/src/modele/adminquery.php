<?php
require_once("../src/function.php");

function topPlayers() {
    $connect = connexion();
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
function countAdmin() {
    $connect = connexion();
    $req = $connect->prepare(' SELECT count(userID) as nbr FROM users WHERE role="admin" ');
    $req -> execute();
    $nombreAdmin = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombreAdmin['nbr']=(int)htmlspecialchars($nombreAdmin['nbr']);
        
    return $nombreAdmin;
}
function countQuestion() {
    $connect = connexion();
    $req = $connect->prepare(' SELECT count(questionID) as nbr FROM question ');
    $req -> execute();
    $nombreQuestion = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombreQuestion['nbr']=(int)htmlspecialchars($nombreQuestion['nbr']);
        
    return $nombreQuestion;
}
function countPlayer() {
    $connect = connexion();
    $req = $connect->prepare(' SELECT count(userID) as nbr FROM users WHERE role="player" ');
    $req -> execute();
    $nombrePlayer = $req->fetch();
    // Ici, on doit surtout sécuriser l'affichage
    $nombrePlayer['nbr']=(int)htmlspecialchars($nombrePlayer['nbr']);
        
    return $nombrePlayer;
}
?>