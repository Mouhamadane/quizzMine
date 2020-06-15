<?php
    require_once "../database/connexion.php";
    global $connect;
    if(isset($_POST["deblock"])){
        $query = "UPDATE users SET statut= 'actif' WHERE userID = '".$_POST["deblock"]."'";
        $r1 = $connect->query($query);
        if($r1)
        {
        echo 'Le joueur a été débloqué avec succès !';
        }
    }
?>