








$(function(){
    $("#envoyer").click(function(){
        valid = true;
        if ($("#pseudo").val() == "") {
            $("#pseudo").next('.error-pseudo').fadeIn().text("Veuillez entrer votre pseudo !");
            valid = false;
        }else{
            $("#pseudo").next('.error-pseudo').fadeOut();
        }
        if ($("#password").val() == "") {
            $("#password").next('.error-password').fadeIn().text("Veuillez entrer votre mot de pass !");
            valid = false;
        }else{
            $("#password").next('.error-password').fadeOut();
        }
        return valid;
    });

});
$(function() {
    $("#pseudo").keyup(function() {
        $("#pseudo").next('.error-pseudo').fadeIn().text("");
        $("#error").fadeIn().text("");
    }); 
});

$(function() {
    $("#password").keyup(function() {
        $("#password").next('.error-password').fadeIn().text("");
        $("#error").fadeIn().text("");
    }); 
});
// ###########################################################################
$(function(){
    $("#prenom-nom").keyup(function(){
        if (!$("#prenom-nom").val().match(/(^[A-Z]([a-z]|[" "]([A-Z]{1})){1,})+$/i)) {
            $("#prenom-nom").next('.error-form').show().text("Veuillez entrer un prenom et nom correct !");
            $("#send-inscrire").attr("disabled", true);
        }else {
            $("#prenom-nom").next('.error-form').hide().text("");
            $("#send-inscrire").attr("disabled", false);

        }
    });

});
$(function() {
    $("#password").keyup(function() {
        $("#password").next('.error-form').fadeIn().text("");
        $("#error").fadeIn().text("");
    }); 
});
$(function() {
    $("#pseudo").keyup(function() {
        $("#pseudo").next('.error-form').fadeIn().text("");
    }); 
});
$(function() {
    $("#confirmer").keyup(function() {
        $("#confirmer").next('.error-form').fadeIn().text("");
    }); 
});
$(function() {
    $("#send-inscrire").click(function() {
        valid = true;
        if ($("#password").val()== "") {
            $("#password").next('.error-form').fadeIn().text("Veuillez saisir un mot de pass !");
            valid = false;
        }else {
            $("#password").next('.error-form').fadeOut();

        }
        if ($("#prenom-nom").val()== "") {
            $("#prenom-nom").next('.error-form').fadeIn().text("Veuillez saisir un prenom & nom !");
            valid = false;
        }else {
            $("#prenom-nom").next('.error-form').fadeOut();

        }
        return valid;
    }); 
});