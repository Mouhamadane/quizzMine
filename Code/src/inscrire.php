<?php
require_once("./function.php");
$connect = connexion();
$error=["login"=>"",'pwd'=>""];

if (isset($_POST['inscrire'])) {
    $role = "player";
    $name = $_POST['name'];
    $pseudo = $_POST['pseudo'];
    if (is_login($pseudo)) {
        $error['login'] = "Ce login existe déjà !";
    }
    $password = $_POST['password'];
    $confirmer = $_POST['confirmer'];
    if ($password != $confirmer) {
        $error['pwd'] = "Les mots de pass ne sont pas identiques !";
    }
    if (empty($error['login']) && empty($error['pwd'])) {
        $addPlayer =$connect->prepare("INSERT INTO `users` (`userID`, `Name`, `login`, `password`, `role`) VALUES (NULL, ?, ?,?,?)");
        $row=$addPlayer->execute(array($name,$pseudo,$password,$role)) or die(mysql_error());
        echo "<script>alert('Le joueur a été ajouté avec succès !')</script>";

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <script src="../asset/jquery/jquery.js"></script>
    <script src="../asset/js/script.js"></script>
    <title>inscription</title>
</head>
<body>
    <div class="ins-container">
        <div class="logo"></div>
        <div class="inscrire-text">S'inscrire comme joueur</div>
        <div class="portrait"></div>
        <div class="form-form">
            <form action="" method="post">
                <input class="input-ins put-1" id="prenom-nom" type="text" placeholder="Prenom & nom" name="name" autocomplete="off">
                <span class="error-form"></span>
                <input class="input-ins  put-2" type="text" placeholder="Login" name="pseudo">
                <span class="error-form"></span>
                <span ><?= $error['login']?></span>
                <input class="input-ins  put-3" type="password" placeholder="Mot de pass" name="password">
                <input class="input-ins  put-4" type="password" placeholder="Confirmer" name="confirmer">
                <span class="error-form"><?= $error['pwd']?></span>
                <span><?= $error['pwd']?></span>
                <div class="div-btn">
                    <button class="btn-ins" id="send-inscrire" name="inscrire" type="submit">s'inscrire</button>
                </div>
                
            </form>
        </div>

    </div>
</body>
</html>