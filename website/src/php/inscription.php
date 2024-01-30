<?php
    session_start();

    $mail = $_POST['emailInput'];
    $mot_de_passe = $_POST['passwordInput'];
    $nom = $_POST['nameInput'];
    $prenom = $_POST['firstnameInput'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=sae_reseau;', 'root', '');

    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mail'] = $mail;

    $insert_user = $bdd->prepare('INSERT INTO users(nom, prenom, adresse_mail, mdp) VALUES(?, ?, ?, ?)');
    $insert_user->execute(array($nom, $prenom, $mail, $mot_de_passe));

    header("Location: ../../pages/inscrit.php");
    exit;
?>