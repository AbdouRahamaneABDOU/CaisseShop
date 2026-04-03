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
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
 
  <div class="topbar">
    <a href="logout.php" class="logout-link">
      Se déconnecter
    </a>
  </div>
 
  <div class="center">
 
    
    <div >
      <img src="./img/logo.png" alt="CaisseShop">  
    </div>
 
    
    <div class="menu">
 
      
      <a href="caisse.php" class="menu-item">
        <div class="circle circle-blue">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <span class="menu-label">Caisse</span>
      </a>
 
      
      <a href="stock.php" class="menu-item">
        <div class="circle circle-orange">
          <i class="fa-solid fa-truck"></i>
        </div>
        <span class="menu-label">Stock</span>
      </a>
 
      
      <a href="hjour.php" class="menu-item">
        <div class="circle circle-green">
          <b class="fa-solid fa-file-linesclass"></b>
        </div>
        <span class="menu-label">Historique</span>
      </a>
 
    </div>
  </div>
 
</body>
</html>