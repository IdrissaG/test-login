<?php
// page.php

// Démarre la session
session_start();

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
    echo "L'utilisateur connecté est : " . $login;
} else {
    echo "L'utilisateur n'est pas connecté.";
}
?>
