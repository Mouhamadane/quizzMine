<?php
require_once('./src/function.php');
$connect = connexion();
if (isset($_POST['btn'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $query = $connect->prepare("SELECT * FROM users WHERE login = ? and password = ?");
    $query->execute(array($pseudo, $password));
    $result = $query->rowCount();
    if ($result == 1) {
        $user = $query-> fetch();
        if ($user['role']== "admin") {
            header("Location:./src/admin.php ");
        }
        else {
            header("Location:./src/player.php ");
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Identification</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <div class="text-form">BIENVENUE SUR QSA</div>
            <form method="post">
                <input class="input-form" type="text" placeholder="Pseudo" name="pseudo">
                <input class="input-form1" type="password" placeholder="Mot de pass" name="password">
                <button type="submit" class="button-connect" name="btn">Se connecter</button>
            </form>
            <a href="./src/inscrire.ph" class="inscrire-link">Créer un compte</a></p>
        </div>
    </div>
    
</body>
</html>