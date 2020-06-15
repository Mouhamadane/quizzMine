
<?php
    require_once "../database/connexion.php";
    require_once "function.php";
    require_once("../modele/adminquery.php");
    global $connect;
    $players = Players();

?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Players</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des joueurs</h6>
        <div id="alert_message"></div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="user_data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Profil</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Status</th>
                        <th colspan="3" style="text-align: center">Action</td>
                    </tr>
                </thead>
                <tbody id="tbody">
                <?php
                foreach ($players as $player) {?>
                <tr id="row_<?= $player['userID'] ?>">
                    <td>Photo</td>
                    <td><?= $player['Name'] ?></td>
                    <td><?= $player['score'] ?></td>
                    <td><?= $player['statut'] ?></td>
                    <?php
                    if($player['statut']=="disable") {?>
                            <td style="text-align: center"><button title="débloqué" id="<?= $player['userID'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i></button></td>
                    <?php } ?> 
                    <?php
                    if($player['statut']=="actif") {?>
                            <td style="text-align: center"><button id="<?= $player['userID'] ?>" title="bloqué" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-lock"></i></button></td>
                    <?php } ?> 
                    <td style="text-align: center"><button class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></button></td>
                    <td style="text-align: center"><button onclick="supprimer(this)" id="<?= $player['userID'] ?>" title="supprimé" name="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button></td>
                </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">5 sur 12</div>
            </div>
            <div class="col-sm-12 col-md-5">
                <button type="submit" id="precedent" class="btn btn-secondary btn-lg">precedent</button>
               <button type="submit" id="suivant" class="btn btn-lg btn-primary">suivant</button >
            </div>
        </div> 
    </div>
</div>
<script>
$(document).ready(function(){
    // Bloquer
    $(".btn-warning").click(function(){
        var block = $(this).attr("id");
        if(confirm("Voulez-vous bloquer ce joueur ?"))
        {
            $.ajax({
                url:"block.php",
                method:"POST",
                data:{block:block},
                success:function(data){
                    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                    $(block).addClass('btn btn-success btn-circle btn-sm');
                    const test = $('#content11');
                    test.load("players.php");
                }
            });
            setInterval(function(){
            $('#alert_message').html('');
            }, 5000);
        }
    });
    // Deblock
    $(".btn-success").click(function(){
        var deblock = $(this).attr("id");
        if(confirm("Voulez-vous débloquer ce joueur ?"))
        {
            $.ajax({
                url:"deblock.php",
                method:"POST",
                data:{deblock:deblock},
                success:function(data){
                    $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                    $(deblock).addClass('btn btn-warning btn-circle btn-sm');
                    const test = $('#content11');
                    test.load("players.php");
                }
            });
            setInterval(function(){
            $('#alert_message').html('');
            }, 5000);
        }
    });
    // button suivant
    $("#suivant").click(function(){
        const tbody = $('#tbody');
        let offset = 5;
        $.ajax({
            type: "POST",
            url: "../modele/getPlayers.php",
            data: {limit:5,offset:offset},
            dataType: "JSON",
            success: function (data) {
                if (data = []) {
                    $("#suivant").attr("disabled", true);
                }else{
                    tbody.html('')
                    printData(data,tbody);
                    offset +=5
                }
            }
        });
    });
    // button precedent
    $("#precedent").click(function(){
        const tbody = $('#tbody');
        let offset = 0;
        $.ajax({
            type: "POST",
            url: "../modele/getPlayers.php",
            data: {limit:5,offset:offset},
            dataType: "JSON",
            success: function (data) {
                if (data = []) {
                    $("#precedent").attr("disabled", true);
                }else{
                    tbody.html('')
                    printData(data,tbody);
                    offset -=5
                }
            }
        });
    });
    function printData(data,tbody){
        $.each(data, function(indice,player){
            var icon = "lock";
            var clss = "warning";
            var titre = "bloqué";
            if (player.statut == "actif") {
                icon = "check";
                clss = "success";
                titre = "debloqué";
            }
                tbody.append(`
                <tr id="row_${player.userID}">
                    <td>Profil</td>
                    <td>${player.Name}</td>
                    <td>${player.score}</td>
                    <td>${player.statut}</td>
                    <td><button id="${player.userID}" title="${titre}" class="btn btn-${clss} btn-circle btn-sm"><i class="fas fa-${icon}"></i></button></td>
                    <td><button class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></button></td>
                    <td><button onclick="supprimer(this)" id="${player.userID}" title="supprimé" name="delete" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button></td>
                </tr>
            `);
            
            
        });
    }

});

function supprimer(btn){
        var id = btn.id;
        if(confirm("Voulez-vous vraiment supprimer ce joueur ?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{id:id},
                dataType: "JSON",
                success:function(data){
                    if(data){
                        $('#alert_message').html('<div class="alert alert-success">Le joueuer a été supprimé avec succés</div>');
                        $("#row_"+id).fadeOut();
                    }else {
                        $('#alert_message').html('<div class="alert alert-success">Une erreur est survenue lors de la suppression</div>');
                        $("#row_"+id).fadeOut();
                    }
                }
            });
            setInterval(function(){
            $('#alert_message').html('');
            }, 5000);
        }
}
</script>