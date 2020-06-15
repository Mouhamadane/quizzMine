<?php
require_once "../database/connexion.php";
    global $connect;

    $limit = $_POST['limit'];
    $offset = $_POST['offset'];

    $sql ="
            SELECT * 
            FROM users
            WHERE role='player'
            ORDER BY score DESC
            LIMIT {$limit} 
            OFFSET {$offset}
        ";
    $req = $connect->query($sql);
    $result = $req->fetchAll();

    echo json_encode($result);

?>