<?php
session_start();
require_once(__DIR__ . '/bdd.php');


$sqlQuery='SELECT * FROM  produit';
$selectproduit=$mysqlClient->prepare($sqlQuery);
$selectproduit->execute();
$Produits=$selectproduit->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CaisseShop — Caisse</title>
  <link rel="stylesheet" href="./styles/stock.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
</head>
<body>
 
<nav class="navbar">
  <div class="logo">
    <a href="index.php"><img src="./img/logo.png" alt="CaisseShop"></a>
  </div>
  <ul class="nav-links">
    <li><a href="" class="active">CAISSE</a></li>
    <li><a href="stock.php">STOCK</a></li>
    <li><a href="hjour.php">HISTORIQUE</a></li>
  </ul>
    <form action="logout.php" method="post">
        <button class="btn-power" title="Déconnexion">
        <i class="fa-solid fa-power-off"></i>
        </button>
    </form>
</nav>
 
<div class="main">

  <div class="left-panel">

    <div class="toolbar">
      <div class="search-wrapper">
        <input class="search-input" type="text" placeholder="rechercher un produit">
        <button class="search-btn" title="Rechercher">
            <i class="fa-solid fa-paper-plane"></i>
        </button>
      </div>
    </div>
 
    <div class="scroll-zone">
      <div class="grid">
 
        <?php
        for ($i=0;$i<count($Produits);$i++) {
        ?>
            <div class="card">
            <div class="card-info">
                <p><strong>Nom :</strong> <?php echo $Produits[$i]["Nom"] ?></p>
                <p><strong>Prix :</strong> <?php echo $Produits[$i]["Prix"] ?> €</p>
                <p><strong>Référence :</strong> <?php echo $Produits[$i]["Reference"] ?></p>
            </div>
            <div class="card-footer">
                <button class="btn-detail">
                    <i class="fa-solid fa-cart-shopping"></i> Ajouter au panier
                </button>
            </div>
            </div>
        <?php 
        } ?>
 
      </div>
    </div>
  </div>

  <div class="ticket-panel">
    <div class="ticket-title">Ticket</div>
 
    <div class="ticket-items">
      <div class="ticket-item">
        <span class="ticket-item-name">Sac de riz 20kg</span>
        <span class="ticket-item-price">33€</span>
        <button class="ticket-item-delete">X</button>
      </div>
      <div class="ticket-item">
        <span class="ticket-item-name">Céréales Trésor</span>
        <span class="ticket-item-price">3.45 €</span>
        <button class="ticket-item-delete">X</button>
      </div>
      <div class="ticket-item">
        <span class="ticket-item-name">Sucre 1kg</span>
        <span class="ticket-item-price">1.50€</span>
        <button class="ticket-item-delete">X</button>
      </div>
      <div class="ticket-item">
        <span class="ticket-item-name">Farine 1kg</span>
        <span class="ticket-item-price">2€</span>
        <button class="ticket-item-delete">X</button>
      </div>
      <div class="ticket-item">
        <span class="ticket-item-name">Canette de Coca Cola 33cl</span>
        <span class="ticket-item-price">3€</span>
        <button class="ticket-item-delete">X</button>
      </div>
    </div>
 
    <div class="ticket-total">
      <span>Total</span>
      <span class="ticket-total-amount">42.95€</span>
    </div>
 
    <button class="btn-facture">Facture</button>
  </div>

</div>
 
</body>
</html>