<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=caisse_shop;charset=utf8', 'root', '');


    if ((isset($_GET["nom"]) && empty($_GET["nom"]) === false)
        && (isset($_GET["prenom"]) && empty($_GET["prenom"]) === false)
        && (isset($_GET["email"]) && empty($_GET["email"]) === false)
        && (isset($_GET["mdp"]) && empty($_GET["mdp"]) === false)
    ) {

        $sql_requete = 'INSERT INTO caissier (Nom, Prenom, Email, MDP)
        VALUES (:nom, :prenom, :email, :mdp)';
        $sql = $mysqlClient->prepare($sql_requete);
        $sql->execute([
            'nom' => $_GET["nom"],
            'prenom' => $_GET["prenom"],
            'email' => $_GET["email"],
            'mdp' => password_hash($_GET["mdp"], PASSWORD_DEFAULT),
        ]);
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Inscription</title>

    <link rel="stylesheet" href="./styles/style.css">

</head>

<body>

    <div class="page-center">
        <div class="card">

            <h1>Inscription</h1>

            <form action="inscription.php" method="GET">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="prenom">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" name="mdp">
                </div>

                <button type="submit" class="btn-submit">S'inscrire</button>

            </form>
        </div>

    </div>

</body>

</html>