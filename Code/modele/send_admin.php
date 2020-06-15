<?php
    require_once("../src/function.php");
    require_once('../database/connexion.php');
    global $connect;
    $error = array();
    if (isset($_POST['name'],$_POST['login'],$_POST['pwd'],$_POST['confirmer']) 
        && !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['pwd']) && !empty($_POST['confirmer'])) 
    {
        $name = htmlspecialchars(trim($_POST['name']));
        $login = htmlspecialchars(trim($_POST['login']));
        $password = htmlspecialchars(trim($_POST['pwd']));
        $confirmer = htmlspecialchars(trim($_POST['confirmer']));
        // Validation des valeurs
        if (!is_name($name)) {
            echo "<span class='error-form'>Veuillez saisair un prénom et nom correct !</span>";
            $error = true;
        }
        if (is_login($login)) {
            echo "<span class='error-form'>Ce login existe déjà !</span>"; 
            $error = true; 
        }
        if ($password != $confirmer ) {
            echo "<span class='error-form'>Les mots de pass saisis ne sont pas identiques !</span>";
            $error = true;  
        }
        if (!$error) {
            $role = "admin";
            $addPlayer =$connect->prepare("INSERT INTO `users` (`userID`, `Name`, `login`, `password`, `role`) VALUES (NULL, ?, ?,?,?)");
            $row=$addPlayer->execute(array($name,$login,$password,$role)) or die(mysql_error());
            echo "<span class='succes-form'>Administrateur Ajouté avec succès !</span>";
        }
    }else {
        echo "<span class='error-form'>Veuillez remplir tous les champs</span>";
    }

?>