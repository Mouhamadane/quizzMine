<?php

session_start();
unset($_SESSION['statut']);
unset($_SESSION['name']);

session_destroy();

header('Location:../index.php');

?>