<?php
require_once('database/connexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="asset/jquery/jquery.js"></script>
    <link rel="stylesheet" href="asset/css/sb-admin-2.min.css">
    <script src="src/script.js"></script>
    <title>Identification</title>
</head>
<body class="bg-gradient-primary">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div>
            <div>
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">BIENVENUE SUR QIZZSA!</h1>
                    </div>
                    <div id="error"></div>
                    <form class="user">
                        <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="pseudo" aria-describedby="emailHelp" placeholder="Entrer votre Pseudo..." autocomplete="off">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Mot de pass">
                        </div>
                        <button type="submit" id="envoyer" class="btn btn-primary btn-user btn-block"> Connexion</button>
                        <hr>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="src/inscrire.php">Créer un compte</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>

</div>
    <script>

    </script>
</body>
</html>