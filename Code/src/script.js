// Validation de la page de connexion

/*############################## PAGE INSCRIPTION K2q94FnkYfrn67Y ###############################*/
$(document).ready(function(){
    $("#form").submit(function(){
        e.preventDefault();
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
            notification.show();
        });
    })
});
/* ############################# AJAX #############################################################*/
// addadmin
$(document).ready(function(){
    $("#formulaire").submit(function(){
        var name = $("#prenom-nom").val();
        var login = $("#pseudo").val();
        var pwd = $("#password").val();
        var confirmer = $("#confirmer").val();
        $.post('../modele/send_admin.php',{name:name,login:login,pwd:pwd,confirmer:confirmer},function(data){
            $(".error-form").html(data);
            $("#prenom-nom").val('');
            $("#pseudo").val('');
            $("#password").val('');
            $("#confirmer").val('');
        });
    return false;
    });
});
/* ############################### PAGE CONNEXION ###################################*/
$(document).ready(function(){
    $("#envoyer").click(function(e){
        e.preventDefault();
        var pseudo = $("#pseudo").val();
        var password = $("#password").val();
        $.ajax({
            url : 'src/connect.php', // Le nom du script a changé, c'est send_mail.php maintenant !
            type : 'POST', // Le type de la requête HTTP, ici devenu POST
            data: {pseudo:pseudo,password:password},
            dataType: 'json',
            success: function(data){
                if (data.response == 1) {
                    window.location.replace(data.redirecturl);   
                }else if(data.response == 0){
                    $("#pseudo").val('');
                    $("#password").val('');
                    var content = $("#error");
                    content.addClass('text-center alert alert-danger col');
                    content.html(data.error);
                    content.fadeIn(400).delay(2000);
                }
            }
        });
    });
});










