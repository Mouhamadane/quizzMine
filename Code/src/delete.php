<?php
require_once "../database/connexion.php";
global $connect;
if(isset($_POST["id"]))
{
 $query = "DELETE FROM users WHERE userID = '".$_POST["id"]."'";
 $r1 = $connect->exec($query);
 
 echo json_encode($r1);
 
}
?>