<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/sb-admin-2.min.css">
    <script src="../asset/jquery/jquery.js"></script>
    <title>Document</title>
</head>
<body>
<div id="wrapper">
        <div class="logo"></div>
        <div class="d-flex flex-column">
            <div class="inscrire-text">S'inscrire comme joueur</div>
            <span id="error"></span>
            <div class="portrait"></div>
            <div class="form-form">
                <form action="" method="post" id="form">
                    <input class="input-ins put-1" id="prenom-nom" type="text" placeholder="Prenom & nom" name="name" autocomplete="off">
                    <span class="error-form"></span>
                    <input class="input-ins  put-2" id="pseudo" type="text" placeholder="Login" name="login">
                    <input class="input-ins  put-3" id="password" type="password" placeholder="Mot de pass" name="pwd">
                    <input class="input-ins  put-4" id="confirmer" type="password" placeholder="Confirmer" name="confirmer">
                    <div class="div-btn">
                        <button class="btn-ins" id="send-inscrire" name="inscrire" type="submit">s'inscrire</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#form").submit(function(){
                var name = $("#prenom-nom").val();
                var login = $("#pseudo").val();
                var pwd = $("#password").val();
                var confirmer = $("#confirmer").val();
                $.post('../modele/send_player.php',{name:name,login:login,pwd:pwd,confirmer:confirmer},function(data){
                    $(".error-form").html(data);
                    $("#prenom-nom").val('');
                    $("#pseudo").val('');
                    $("#password").val('');
                    $("#confirmer").val('');
                    var content = $("#error");
                    content.html('');
                    var notification = $('<a> href="../index.php"</a>');
                    notification.addClass('notification');
                    notification.html(data.error);
                });
                return false;
            })
        });
    </script>
</body>
</html>