<?php
session_start();
// Verifier si la session existe

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once(__DIR__ . '/bdd.php');

if(isset($_POST['produits']) && !empty($_POST['produits'])&&
isset($_POST['total']) && !empty($_POST['total'])){
  $produit=$_POST['produits'];
  $total=$_POST['total'];


  $sqlQuery = "INSERT INTO `ventes`(`Id_Caissier`, `Total` ) 
  VALUES (:Caissier,:Total)";
  $insertproduit = $mysqlClient->prepare($sqlQuery);
  $insertproduit->execute([
    'Caissier'=>$_SESSION['user']['id'],
    'Total'=>$total,
  ]);

  //Jointure  
  $sqlQuery = 
  'SELECT ve.Id,
  ve.Date,
  ve.Total,
  ca.Prenom
  FROM ventes ve
  JOIN caissier ca on ca.Id = ve.Id_Caissier ORDER BY ve.Id DESC;';
  $SelectVentes=$mysqlClient->prepare($sqlQuery);
  $SelectVentes->execute();
  $Ventes=$SelectVentes->fetchAll();

  $drvente=$Ventes[0]['Id'];
  for ($i=0;$i<count($produit);$i++) {

  $sqlQuery = "INSERT INTO `produit_vendu`(`Id_Produit`, `Quantite`, `Id_Vente` ) 
    VALUES (:Id_Produit,:Quantite, :Id_Vente)";
    $insertproduit = $mysqlClient->prepare($sqlQuery);
    $insertproduit->execute([
      'Id_Produit' =>$produit[$i]['Id'],
      'Quantite'=>$produit[$i]['quantite'],
      'Id_Vente'=>$drvente,
    ]);
  } 
}





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
        <button type="submit" class="search-btn" title="Rechercher">
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

    <form action="" method="post">
      <div class="ticket-items" id="ticketList">
        <p class="ticket-item-name">Aucun article</p>
      </div>
  
      <div class="ticket-total">
        <span>Total</span>
        <span class="ticket-total-amount" id="ticketTotal" name="total">0.00 €</span>
      </div>
  
      <button type="submit" class="btn-facture">Confirmer</button>
    </form>
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

            
              <button type="button" onclick="diminuerQuantite(${caisse[index].Id})">-</button>
              <span>${caisse[index].Quantite}</span>
              <button type="button" onclick="augmenterQuantite(${caisse[index].Id})">+</button>
              <button type="button" class="btn-remove" onclick="supprimerProduit(${caisse[index].Id})">
                <i class="fa-solid fa-trash"></i>
              </button>


            <input type="hidden" name="produits[${index}][Id]" value="${caisse[index].Id}">
            <input type="hidden" name="produits[${index}][quantite]" value="${caisse[index].Quantite}">
            <input type="hidden" name="total" value="${total}">
            
          </div>
        `;
        }

        const totalCaisse = document.getElementById("ticketTotal");
        totalCaisse.innerHTML = Math.trunc(total * 100) / 100 + " €";

    }

    function ajouterProduitDansCaisse(Id) {
        let newProduct = produits.find(p => p.Id == Id);
        let productExist = caisse.find(p => p.Id == Id);

        if (productExist == null)
            caisse.push({
                Id: newProduct.Id,
                Nom: newProduct.Nom,
                Prix: newProduct.Prix,
                Quantite: 1
            })
        else {
            productExist.Quantite++;
        }
        afficherCaisse();
    }

    function augmenterQuantite(Id) {
        let produitDansCaisse = caisse.find(p => p.Id == Id);

        produitDansCaisse.Quantite = produitDansCaisse.Quantite + 1;


        afficherCaisse();

    }


    function supprimerProduit(Id) {
        caisse = caisse.filter(p => p.Id != Id);
        afficherCaisse();

    }


    function diminuerQuantite(Id) {
        let produitDansCaisse = caisse.find(p => p.Id == Id);

        produitDansCaisse.Quantite = produitDansCaisse.Quantite - 1;
        if (produitDansCaisse.Quantite <= 0) {
            caisse = caisse.filter(p => p.Id != Id);
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
                    <p><strong>Nom : </strong>${produits[index].Nom}</p>
                    <p><strong>Prix : </strong>${Number(produits[index].Prix)} €</p>
                    <p><strong>Réference : </strong>${(produits[index].Reference)}</p>
                    <p><strong>Stock : </strong>${Number(produits[index].Stock)}</p>
                </div>
                <div class="card-footer">
                    <button class="btn-detail" type="button" onclick="ajouterProduitDansCaisse(${produits[index].Id})" >
                        <i class="fa-solid fa-cart-shopping"></i> Ajouter au panier
                    </button>
                </div>
            </div>
        `;
        }
    }


    afficherProduits();

    rProduit="";
    document.addEventListener('keydown', (e) => {
      if(e.key != "Enter"){
        rProduit+=e.key;
      }

      if(e.key == "Enter"){
        for (let index = 0; index < produits.length; index++){
          if (convertirScan(rProduit) == produits[index].Reference) {
            ajouterProduitDansCaisse(produits[index].Id);
            rProduit="";
          }else{
            alert("Le code-barre n'existe pas !");
            break;
          }
        }
      }

      
    })

    

    function convertirScan(code){
        return code.replaceAll("Shift", "") 
        .replaceAll("à", "0")
        .replaceAll("&", "1")
        .replaceAll("é", "2")
        .replaceAll("\"", "3")
        .replaceAll("'", "4")
        .replaceAll("(", "5")
        .replaceAll("-", "6")
        .replaceAll("è", "7")
        .replaceAll("_", "8")
        .replaceAll("ç", "9");
    }
</script>
</html>