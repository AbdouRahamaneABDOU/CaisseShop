<?php
session_start();
require_once(__DIR__ . '/bdd.php');


// Validation du formulaire
if (isset($_POST['mail']) && isset($_POST['password'])) {
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Il faut un mail valide pour soumettre le formulaire.';
    } else {
        // On recupère de l'utilisateur à partir de l'email 
        // SELECT `Email`, `MDP` FROM `user` WHERE 1

        $sqlQuery='SELECT Nom,Prenom,Email,Mdp FROM user WHERE Email = :mail';
        $selectusers=$mysqlClient->prepare($sqlQuery);
        $selectusers->execute([
        'mail' => $_POST['mail']
        ]);

        $utilisateur=$selectusers->fetch();

        if (!$utilisateur) {
            //die('Votre email ou mot de passe est incorrecte. 1');
            die('Aucun utilisateur n existe avec cet email');
        }


        if (password_verify($_POST["password"], $utilisateur["Mdp"])) {

                $_SESSION['user'] = [
                'email' => $utilisateur["Email"],
                'nom' => $utilisateur["Nom"],
                'prenom' => $utilisateur["Prenom"],
            ];

            
            header('Location: index.php');
            exit;

        } else {
            die('Votre mot de passe est incorrecte.');
        }



    }
}
?>

<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <title>Connexion - CaisseShop</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
 
    <div class="header">
        <!-- Logo CaisseShop — remplacez par une balise <img> si vous avez le fichier -->
        <img src="./img/logo.png" alt="CaisseShop" class="logo">
    </div>
 
    <div class="page-center">
        <div class="card">
 
            <h1>Connexion</h1>
 
            <form action="login.php" method="POST">
 
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="">
                </div>
 
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="">
                </div>
 
                <button type="submit" class="btn-submit">Se connecter</button>
 
            </form>
 
        </div>
    </div>
 
</body>
 
</html>