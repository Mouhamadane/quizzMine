<?php
    session_start();
    require_once('./src/function.php');
    $connect = connexion();
    $error = "";
    if (isset($_POST['btn'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];
        $query = $connect->prepare("SELECT * FROM users WHERE login = ? and password = ?");
        $query->execute(array($pseudo, $password));
        $result = $query->rowCount();
        if ($result == 1) {
            $user = $query-> fetch();
            $_SESSION['name']= $user['Name'];
            $_SESSION['login']= $user['login'];
            $_SESSION['password']= $user['password'];
            $_SESSION['statut']="connect";
            if ($user['role']== "admin") {
                header("Location:./src/accueil.php ");
            }
            else {
                header("Location:./src/player.php ");
            }
        }else {
            $error = "Login ou mot de pass incorrect !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="./asset/jquery/jquery.js"></script>
    <script src="./asset/js/script.js"></script>

    <title>Identification</title>
</head>
<body>
    <div class="container">
        <span id="test"></span>
        <div class="login-form">
            <div class="text-form">BIENVENUE SUR QSA</div>
            <strong class="error" id="error"><?= $error?></strong>
            <form method="post">
                <input class="input-form" type="text" id="pseudo" placeholder="Pseudo" name="pseudo" autocomplete="off">
                <span class="error-pseudo"></span>
                <input class="input-form1" id="password" type="password" placeholder="Mot de pass" name="password">
                <span class="error-password"></span>
                <button type="submit" id="envoyer" class="button-connect" name="btn">Se connecter</button>
            </form>
            <a href="./src/inscrire.php" class="inscrire-link">Créer un compte</a></p>
        </div>
    </div>
    <script>

    </script>
</body>
</html>