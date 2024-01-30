<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrit !</title>
</head>
<body>
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

        $insert_user = $bdd->prepare('INSERT INTO users(nom, prenom, adresse_mail, mdp) VALUES(?, ?, ?, ?)');
        $insert_user->execute(array($nom, $prenom, $mail, $mot_de_passe));

        $_SESSION['bdd'] = $bdd;
        echo $bdd[0] . $bdd[1];
        // $_SESSION['nom'] = $nom;
        // $_SESSION['prenom'] = $prenom;
        // $_SESSION['mail'] = $mail;
 
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
</body>
</html>
