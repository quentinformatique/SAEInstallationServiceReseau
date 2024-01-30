<?php
    session_start();
    $mail = $_POST['emailInput'];
    $mdp = $_POST['passwordInput'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=sae_reseau;', 'root', '');

    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());

    }

    $verify_connection_query = $bdd->prepare('SELECT mdp FROM users WHERE adresse_mail = ?');
    $verify_connection_query->execute(array($mail));   
    $verify_connection = $verify_connection_query->fetch()['mdp'];

    if ($verify_connection == $mdp) {
        $_SESSION['mailConnection'] = $mail;
        $_SESSION['mdpConnection'] = $mdp;
        header('Location: ../../pages/connecte.php');
        exit;

    } else {
        // echo "Votre adresse_mail ou votre mot de passe est incorecte.";
        // sleep(5);
        header('Location: ../../pages/connexion.html');
        exit;
    }
?>