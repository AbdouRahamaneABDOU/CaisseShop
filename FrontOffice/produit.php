<?php
session_start();
require_once(__DIR__ . '/bdd.php');

?>

<!DOCTYPE html>
<html lang="fr">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ajout d'un produit - CaisseShop</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
 
<body>
 
    <div class="header">
        <!-- Logo CaisseShop — remplacez par une balise <img> si vous avez le fichier -->
        <img src="./img/logo.png" alt="CaisseShop">
    </div>
 
    <div class="page-center">
        <div class="card">
 
            <h1>Ajout d'un produit</h1>
 
            <form action="produit.php" method="POST">
 
                <div class="form-group">
                    <label for="mail">Nom</label>
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