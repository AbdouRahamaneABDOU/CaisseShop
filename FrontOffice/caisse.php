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
      <div class="grid" id="productGrid">    
 
      </div>
    </div>
  </div>

  <div class="ticket-panel">
    <div class="ticket-title">Ticket</div>
 
    <div class="ticket-items">
      <div class="ticket-item" id="ticketList">
        <p class="ticket-item-name">Aucun article</p>
      </div>
    </div>
 
    <div class="ticket-total">
      <span>Total</span>
      <span class="ticket-total-amount" id="ticketTotal">0.00 €</span>
    </div>
 
    <button class="btn-facture">Facture</button>
  </div>

</div>
 
</body>

<script>
    const produits = <?php echo json_encode($Produits); ?>;

    let caisse = [];

    function afficherCaisse() {
        const ticketList = document.getElementById("ticketList");
        ticketList.innerHTML = '';
        let total = 0;
        for (let index = 0; index < caisse.length; index++) {

            total += (caisse[index].Prix * caisse[index].Quantite);

            ticketList.innerHTML += `
            <div class="ticket-item">
            
              <strong class="ticket-item-name">${caisse[index].Nom}</strong><br>
              <small class="ticket-item-price">${caisse[index].Prix} € / unité</small>

            
              <button type="button" onclick="diminuerQuantite(${caisse[index].id})">-</button>
              <span>${caisse[index].Quantite}</span>
              <button type="button" onclick="augmenterQuantite(${caisse[index].id})">+</button>
              <button type="button" class="btn-remove" onclick="supprimerProduit(${caisse[index].id})">
                <i class="fa-solid fa-trash"></i>
              </button>


            <input type="hidden" name="produits[${index}][id]" value="${caisse[index].id}">
            <input type="hidden" name="produits[${index}][quantite]" value="${caisse[index].Quantite}">
            
          </div>
        `;
        }

        const totalCaisse = document.getElementById("ticketTotal");
        totalCaisse.innerHTML = Math.trunc(total * 100) / 100 + " €";

    }

    function ajouterProduitDansCaisse(id) {
        let newProduct = produits.find(p => p.id == id);
        let productExist = caisse.find(p => p.id == id);

        if (productExist == null)
            caisse.push({
                id: newProduct.id,
                Nom: newProduct.Nom,
                Prix: newProduct.Prix,
                Quantite: 1
            })
        else {
            productExist.Quantite++;
        }
        afficherCaisse();
    }

    function augmenterQuantite(id) {
        let produitDansCaisse = caisse.find(p => p.id == id);

        produitDansCaisse.Quantite = produitDansCaisse.Quantite + 1;


        afficherCaisse();

    }


    function supprimerProduit(id) {
        caisse = caisse.filter(p => p.id != id);
        afficherCaisse();

    }


    function diminuerQuantite(id) {
        let produitDansCaisse = caisse.find(p => p.id == id);

        produitDansCaisse.Quantite = produitDansCaisse.Quantite - 1;
        if (produitDansCaisse.Quantite <= 0) {
            caisse = caisse.filter(p => p.id != id);
        }

        afficherCaisse();
    }

    function afficherProduits() {
        let productList = document.getElementById("productGrid");
        productList.innerHTML = "";

        for (let index = 0; index < produits.length; index++) {
            productList.innerHTML = productList.innerHTML + `
             <div class="card" >
                <div class="card-info" >
                    <p><strong>Nom :</strong> ${produits[index].Nom}</p>
                    <p><strong>Prix :</strong>${Number(produits[index].Prix)} €</p>
                    <p><strong>Stock :</strong>${Number(produits[index].Stock)}</p>
                </div>
                <div class="card-footer">
                    <button class="btn-detail" type="button" onclick="ajouterProduitDansCaisse(${produits[index].id})" >
                        <i class="fa-solid fa-cart-shopping"></i> Ajouter au panier
                    </button>
                </div>
            </div>
        `;
        }
    }


    afficherProduits();
</script>
</html>