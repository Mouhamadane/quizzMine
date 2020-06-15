
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/sb-admin-2.min.css">
    <script src="../asset/jquery/jquery.js"></script>
    <title>inscription</title>
</head>
<body>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <img class="col-lg-6 d-none d-lg-block" src="../asset/img/image4.JPG">
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">S'inscrire pour jouer !</h1>
              </div>
              <p id="error"></p>
              <form class="user" id="form">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="prenom-nom" aria-describedby="emailHelp" placeholder="Prenom et Nom..." autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="pseudo" placeholder="Nom d'utilisateur" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Mot de pass" id="password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Confirmer" id="confirmer">
                </div>
                <button href="index.html" class="btn btn-primary btn-user btn-block">S'inscrire</button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="../index.php">Retour</a>
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
        $(document).ready(function(){
            $("#form").submit(function(){
                var name = $("#prenom-nom").val();
                var login = $("#pseudo").val();
                var pwd = $("#password").val();
                var confirmer = $("#confirmer").val();
                $.post('../modele/send_player.php',{name:name,login:login,pwd:pwd,confirmer:confirmer},function(data){
                    $("#prenom-nom").val('');
                    $("#pseudo").val('');
                    $("#password").val('');
                    $("#confirmer").val('');
                    var content = $("#error");
                    content.addClass('text-center alert alert-danger col');
                    content.html(data);
                    content.fadeIn(400).delay(2000);
                });
                return false;
            })
        });
    </script>
</body>
</html>