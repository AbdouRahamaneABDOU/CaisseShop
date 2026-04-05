<?php
session_start();
// Verifier si la session existe

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CaisseShop</title>
  <link rel="stylesheet" href="./styles/index.css">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap" rel="stylesheet"/>

</head>
<body>
 
  <!-- TOPBAR -->
  <div class="topbar">
    <a href="logout.php" class="logout-link">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
      Se déconnecter
    </a>
  </div>
 
  <!-- CENTRE -->
  <div class="center">
 
    <img src="./img/logo.png" alt="CaisseShop">
 
    <div class="menu">
 
      <a href="caisse.php" class="menu-item">
        <div class="circle circle-blue">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <span class="menu-label">Caisse</span>
      </a>
 
      <a href="stock.php" class="menu-item">
        <div class="circle circle-orange">
          <i class="fa-solid fa-warehouse"></i>
        </div>
        <span class="menu-label">Stock</span>
      </a>
 
      <a href="hjour.php" class="menu-item">
        <div class="circle circle-green">
          <i class="fa-solid fa-clock-rotate-left"></i>
        </div>
        <span class="menu-label">Historique</span>
      </a>
 
    </div>
  </div>
 
</body>
</html>