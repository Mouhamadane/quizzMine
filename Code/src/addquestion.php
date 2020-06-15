
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Partie PHOTO -->
        <div class="row">
            <div class="col-lg-6">
                <img class="card position-relative" src="../asset/img/image4.JPG">
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ajouter une question !</h1>
                </div>
                <div id="result"></div>
                <form id="addQuestion" class="user" method="post">
                    <label for="" >Libellé de la question</label>
                    <div class="form-group">
                        <textarea name="libelle" id="libelle" cols="30" rows="1" class="form-control from-control-user"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" >Score</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" name="score" id="score" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" >Type de réponse</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="type" id="type" class="form-control">
                                    <option value="nothing" checked>Donnez le type de réponse</option>
                                    <option value="text">Texte</option>
                                    <option value="radio">Choix simple</option>
                                    <option value="multiple">Choix multiple</option>
                                </select>
                                <div id="error" class="error-form"></div>
                            </div>
                            <div class="col-lg-6">
                                <button id="add" type="button" class="btn btn-primary" onclick="onaddInput()">+</button>
                            </div>
                        </div> 
                        <div id="inputs"></div>
                    </div>
                    <button type="submit" id="send-inscrire" name="envoyer" class="btn btn-primary btn-user btn-block"> Ajouter</button>
                    <hr>
                    <hr>
                </form>

            </div>
        </div>
    </div>
    <script>
    var rep = 0;
    var nbRow = 0;
    function onaddInput() {
        rep++;
        nbRow++;
        var divInputs = document.getElementById('inputs');
        var newInput = document.createElement('div');
        newInput.setAttribute('class','formControl');
        newInput.setAttribute('id','formControl_'+nbRow);
        if (document.getElementById('type').value=="nothing") {
            var divError = document.getElementById('error');
            divError.innerText = "Veuillez choisir un type !";
            rep--;
            nbRow--;
        }
        if (document.getElementById('type').value=="text") {
                var divError = document.getElementById('error');
                divError.innerText = "";
                newInput.innerHTML = `<label for="" class="label-form">Réponse `+rep+`</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="reponseText" error="error-" id="text" required>
                    </div>
                    <div class="btn btn-danger btn-circle btn-sm" onclick="onDeleteInput(${nbRow})"><i class="fas fa-trash"></i></div>
                </div>`;
                divInputs.appendChild(newInput);
                $("#add").attr("disabled", true);
        }
        if (document.getElementById('type').value=="radio") {
                var divError = document.getElementById('error');
                divError.innerText = "";
                newInput.innerHTML = `<label for="" class="label-form">Réponse `+rep+`</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="radiotext[]" error="error-4" id="text" required>
                    </div>
                    <div class="error-form" id="error-4"></div>
                    <input style="margin-left:2%" type="radio" name="radio[]" value="${nbRow-1}" class="choix-unique" required>
                    <input type="hidden" name="reference[]" value="${nbRow-1}">
                    <div style="margin-left:5%" class="btn btn-danger btn-circle btn-sm" onclick="onDeleteInput(${nbRow})"><i class="fas fa-trash"></i></div>
                </div>`;
                divInputs.appendChild(newInput);
        }
        if (document.getElementById('type').value=="multiple") {
                var divError = document.getElementById('error');
                divError.innerText = "";
                newInput.innerHTML = `<label for="" class="label-form">Réponse `+rep+`</label>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="multiple[]" error="error-4" id="text"required>
                    </div>
                    <input style="margin-left:5%" type="checkbox" name="multi[]" value="${nbRow-1}" class="choix-multiple" >
                    <input type="hidden" name="refM[]" value="${nbRow-1}">
                    <div style="margin-left:8%" class="btn btn-danger btn-circle btn-sm" onclick="onDeleteInput(${nbRow})"><i class="fas fa-trash"></i></div>
                </div>`;
                divInputs.appendChild(newInput);
        }
        
    }
    function fadeOut(idTarget) {
        var target = document.getElementById('idTarget');
        var effect = setInterval(function () {
            if (!target.style.opacity) {
                target.style.opacity = 1;
            }
            if (target.style.opacity>0) {
                target.style.opacity-=0.1;
            }else{
                clearInterval(effect);
            }
        }, 200); 
    }
    function onDeleteInput(n) {
        var target = document.getElementById('formControl_'+n);
        setTimeout(function(){
            target.remove();
        }, 500);
        fadeOut('formControl_'+n);
        $("#add").attr("disabled", false);

    }
    $("#addQuestion").submit(function(e){
    e.preventDefault();
    var myForm = document.getElementById('addQuestion');
    var formData = new FormData(myForm);
    $.ajax({
        url : '../modele/send_question.php',
        type : 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            if(data == "true") {
                $("#libelle").val('');
                $("#score").val('');
                $("#type").val('');
                var content = $("#result");
                content.addClass('text-center alert alert-danger col');
                content.text('Question ajouté avec succés !');
                content.fadeIn(400).delay(2000);
               
            }else{
                var content = $("#result");
                content.addClass('text-center alert alert-danger col');
                content.text('Error  !');
                content.fadeIn(400).delay(2000);
            }
        }
    });
    })
</script>