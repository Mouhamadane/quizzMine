<?php
   session_start();
   require_once('../database/connexion.php');
   global $connect;
   
   $ret = array();
   if(isset($_POST['pseudo'],$_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password']) ){
      $pseudo   =  (trim($_POST['pseudo']));
      $password   =    (trim($_POST['password']));
      $query = $connect->prepare("SELECT * FROM users WHERE login = ? and password = ?");
      $query->execute(array($pseudo, $password));
      $result = $query->rowCount();
      if ($result == 1) {
         $ret['response'] = 1;
         $user = $query-> fetch();
         $_SESSION['name']= $user['Name'];
         $_SESSION['login']= $user['login'];
         $_SESSION['password']= $user['password'];
         $_SESSION['statut']="connect";
         if ($user['role']== "admin") {
            $ret['redirecturl'] = 'src/accueil.php';
         }
         else {
            $ret['redirecturl'] = 'src/player.php';
         }
      }else {
            $ret['response'] = 0;
            $ret['error'] = 'Pseudo ou mot de pass incorrect !';
      }
   }else {
         $ret['response'] = 0;
         $ret['error'] = 'Veuillez remplir tous les champs !';
   }

   echo json_encode($ret);

?>