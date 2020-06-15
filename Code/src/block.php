<?php
    require_once "../database/connexion.php";
    global $connect;
    if(isset($_POST["block"])){
        $query = "UPDATE users SET statut= 'disable' WHERE userID = '".$_POST["block"]."'";
        $r1 = $connect->query($query);
        if($r1)
        {
        echo 'Le joueur a été débloqué avec succès !';
        }
    }
?>