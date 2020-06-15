<?php
session_start ();
require_once("./function.php");
require_once("../modele/adminquery.php");
is_connect();
$name = $_SESSION['name'];
$topPlayers = topPlayers();
$admin = countAdmin();
$question = countQuestion();
$player = countPlayer();
$nbreAdmin = $admin['nbr'];
$nbreQuestion = $question['nbr'];
$nbrePayer = $player['nbr'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../asset/css/sb-admin-2.min.css">
    <script src="../asset/jquery/jquery.js"></script>
    <script src="script.js"></script>
    <title>Accueil</title>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include_once "menu.php" ?>
        <!-- Content Wrapper-->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Interface Admin -->
            <div id="content">
                <!-- top bar -->
                <?php include_once "header.php" ?>
            <!-- Dashbord start -->
            <div class="container-fluid" id="content11">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" id="menu">
                        <h1 class="h3 mb-0 text-gray-800">Menu Contextuel</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Question par Jeu -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Questions par jeu</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Nombre total de questions -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Questions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nbreQuestion ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Nombre Administrateur -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Administrateur</div>
                                            <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $nbreAdmin ?></div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nombre Palyers -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Joueurs</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nbrePayer?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- div bou row -->
                    </div>
                    <!-- End dashbord -->
                    <!-- Evolution du temps de jeu -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Evolution du temps de jeu </h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    
                                </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Evolution -->
                        <!-- Top score -->
                        <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Meilleur Score</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                            </div>
                            <!-- Top score Body -->
                            <div class="card-body">
                            <?php 
                                for ($i=0; $i <count($topPlayers) ; $i++) {?>
                                <div class="row">
                                    <div style="float: left; width: 70%;">
                                        <div><?= $topPlayers[$i]['Name'] ?></div>
                                    </div>
                                    <div  style="float: right; width: 30%;">
                                        <div> <?= $topPlayers[$i]['score'] ?>pts</div>
                                    </div>
                                </div>
                                <?php } ?> 
                                <div class="mt-4 text-center small">Top 5 des joueurs</div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
            <!-- End Top score -->
    
        <!-- End of Content Wrapper -->
        <!-- Footer -->
        <?php include_once "footer.php" ?>
        <!-- End Footer -->
    </div>

    <!-- End of Page Wrapper -->
     <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Voulez-vous déconnecter?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Choisir "Déconnexion" si vous voulez vous déconnecter.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="./logout.php">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <em class="fas fa-angle-up"></em>
    </a>
    <!-- script -->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../asset/js/sb-admin-2.min.js"></script>
    <!-- <script src="../asset/vendor/chart.js/Chart.min.js"></script>
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script> -->
</body>
</html>