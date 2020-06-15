
<div class="row">
    <div class="col-lg-6">
        <img class="card position-relative" src="../asset/img/image4.jpg">
    </div>
    <div class="col-lg-6">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Ajouter un administrateur !</h1>
        </div>
        <span id="val" class="error-form"></span>
        <form action="" class="user" id="formulaire" method="post">
            <div class="form-group">
                <input type="text" name="name" id="prenom-nom" class="form-control form-control-user" placeholder="Prénom & Nom" autocomplete="off">
            </div>
            
            <div class="form-group">
                <input type="text" name="login" id="pseudo" class="form-control form-control-user" placeholder="Pseudo" autocomplete="off">
            </div>
            
            <div class="form-group">
                <input type="password" name="pwd" id="password" class="form-control form-control-user" placeholder="Mot de pass">
            </div>
            <div class="form-group">
                <input type="password" name="confirmer" id="confirmer" class="form-control form-control-user" placeholder="Confirmer...">
            </div>
            <button type="submit" name="envoyer" class="btn btn-primary btn-user btn-block"> Ajouter</button>
            <hr>
            <hr>
        </form>
    </div>
</div>
<script src="script.js"></script>