<?php 
session_start();
require_once(__DIR__ . '/bdd.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CaisseShop – Détail produit</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="./styles/produit.css">
</head>
<body>
  <header>
    <div class="logo">
      <a href="index.php"><img src="./img/logo.png" alt="CaisseShop"></a>
    </div>
  </header>
 
  <a href="stock.php" class="btn-retour">
    <i class="fa-solid fa-arrow-left"></i> Retour
  </a>

  <main>
    <div class="card detail-card">
 
      <div class="detail-image">
        <img src="./img/farineble.png" alt="farine">
      </div>
 
      <div class="detail-info">
 
        <div class="detail-field">
          <strong>NOM :</strong>
          <span><?php echo $_POST['N_pr'] ?></span>
        </div>
 
        <div class="detail-field">
          <strong>Description :</strong>
          <span><?php echo $_POST['D_pr'] ?></span>
        </div>
 
        <div class="detail-field">
          <strong>Prix :</strong>
          <span><?php echo $_POST['P_pr'] ?> €</span>
        </div>
 
        <div class="detail-field">
          <strong>Quantité en stock :</strong>
          <span><?php echo $_POST['S_pr'] ?></span>
        </div>
 
        <div class="detail-field barcode-wrapper">
          <strong>Code-Barres :</strong>
          <div class="barcode-img">
            <img src="./img/logo.png" alt="CODE">
            <span class="bc-ref-label"><?php echo $_POST['R_pr'] ?></span>
          </div>
        </div>
 
      </div>
    </div>
  </main>
 
</body>
</html>