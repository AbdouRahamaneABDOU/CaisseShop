<?php
session_start();
// Verifier si la session existe

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaisseShop</title>

</head>
<body>
    <nav>
        <form action="logout.php">
            <input type="submit" value="Se déconnecter" style="background-color: red;color: white;">
        </form>
    </nav>
    <h1><img src="./logo.png" ></h1>
</body>
</html>