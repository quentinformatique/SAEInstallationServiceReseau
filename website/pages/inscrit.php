<?php
    session_start();

    $nom = $_SESSION['nom']; 
    // $bdd = $_SESSION['bdd']; 
    $prenom = $_SESSION['prenom'];
    
    $bdd = new PDO('mysql:host=localhost;dbname=sae_reseau;', 'root', '');

    $user_number_query = $bdd->prepare('SELECT COUNT(*) FROM users');
    $user_number_query->execute();
    $user_number = $user_number_query->fetch()['COUNT(*)'];
    echo "Merci " . $nom . " " . $prenom
            . " pour votre inscription, nous somme désormais "
            . $user_number . " inscrits sur le site !";

    echo "<p>Voici la liste des membres :</p>";
    $name_user_query = $bdd->query('SELECT nom, prenom, adresse_mail FROM users');
    foreach ($name_user_query as list($nom, $prenom, $adresse_mail)) {
        echo "$nom $prenom $adresse_mail</br>";
    }
?>