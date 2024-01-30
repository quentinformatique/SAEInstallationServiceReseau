<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=sae_reseau;', 'root', '');

    $name_firstname_query = $bdd->prepare('SELECT nom, prenom FROM users WHERE adresse_mail = ? AND mdp = ?');
    $name_firstname_query->execute(array($_SESSION['mailConnection'], $_SESSION['mdpConnection']));
    $name_firstname = $name_firstname_query->fetch();
    $nom = $name_firstname['nom'];
    $prenom = $name_firstname['prenom'];

    $user_number_query = $bdd->prepare('SELECT COUNT(*) FROM users');
    $user_number_query->execute();
    $user_number = $user_number_query->fetch()['COUNT(*)'];

    echo "Bon retour parmis nous " . $nom . " " . $prenom . " !<br/>"
            . " Nous somme désormais "
            . $user_number . " inscrits sur le site !";

    echo "<p>Voici la liste des membres :</p>";
    $name_user_query = $bdd->query('SELECT nom, prenom, adresse_mail FROM users');
    foreach ($name_user_query as list($nom, $prenom, $adresse_mail)) {
        echo "$nom $prenom $adresse_mail</br>";
    }
?>