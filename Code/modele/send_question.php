<?php
    require_once("../src/function.php");
    require_once("../database/connexion.php");
    global $connect;
    $resultat = array();
    if (isset($_POST['libelle'],$_POST['score'],$_POST['type'])) 
    {
        $libelle = htmlspecialchars(trim($_POST['libelle']));
        $score = htmlspecialchars(trim($_POST['score']));
        $type = htmlspecialchars(trim($_POST['type']));
        if ($type == "text") {
            $bonneReponse = $_POST['reponseText'];
            $badReponse = "";
        }elseif ($type == "radio") {
            $badReponse = array();
            $bonneReponse = array();
            if (isset($_POST['radio'])&& isset($_POST['radioText'])) {
                foreach ($_POST['radio'] as $bonne => $value) {
                    foreach ($_POST['radioText'] as $key => $check) {
                        if ($bonne == $check) {
                            array_push($bonneReponse,$value);
                        }else {
                            array_push($badReponse,$value);
                        }
                    }
                }
            }
        }elseif ($type == "multiple") {
            $badReponse = array();
            $bonneReponse = array();
            if (isset($_POST['multiple'])&& isset($_POST['multi'])) {
                foreach ($_POST['multiple'] as $bonne => $value) {
                    foreach ($_POST['multi'] as $key => $check) {
                        if ($bonne == $check) {
                            array_push($bonneReponse,$value);
                        }else {
                            array_push($badReponse,$value);
                        }
                    }
                }
                
            }
        }else{
            $resultat['error'] = 'Veuillez remplir le type !';
            $row = false;
        }
        // Validation des valeurs
        if (empty($resultat['error'])) {
            $addPlayer =$connect->prepare("INSERT INTO `question` (`questionID`, `libelle`, `score`, `type`, `bonneReponse`, `badReponse`) VALUES (NULL, ?, ?,?,?,?)");
            $row=$addPlayer->execute(array($libelle,$score,$type,$bonneReponse,$badReponse)) or die(mysql_error());
        }
    }else {
        $resultat['error'] = 'Veuillez remplir tous les champs !';
        $row = false;
    }
    echo json_encode($row);
?>