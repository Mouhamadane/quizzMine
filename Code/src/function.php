<?php
function connexion (){
    $serverName = "localhost";
    $userName = "root";
    $password = "daneB613..123";
    try{
		$connect = new PDO("mysql:host=$serverName;dbname=quizzproject", $userName, $password);
    }
    catch(PDOException $e){
		echo 'Echec'.$e->getMessage();
    }
    return $connect;
}













































?>