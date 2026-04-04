<?php
session_start();
require_once(__DIR__ . '/bdd.php');

//Modification d'une offre
if(isset($_POST['E_id']) && 
isset($_POST['E_nom']) &&
isset($_POST['E_description']) &&
isset($_POST['E_reference']) && 
isset($_POST['E_prix']) &&
isset($_POST['E_stock'])){
  $Mod_Id=$_POST['E_id'];
  $Modnom=$_POST['E_nom'];
  $Moddescrip=$_POST['E_description'];
  $Modref=$_POST['E_reference'];
  $Modprix=$_POST['E_prix'];
  $Modstk=$_POST['E_stock'];

  $sqlQuery = "UPDATE `produit` SET `Nom`=:nom,`Description`=:des,`Prix`=:prx,`Reference`=:ref,`Stock`=:stk WHERE Id=:id";
  $editOffre = $mysqlClient->prepare($sqlQuery);
  $editOffre->execute([
    'id'=> $Mod_Id,
    'nom'=> $Modnom,
    'des'=>$Moddescrip,
    'prx'=> $Modprix,
    'ref'=> $Modref,
    'stk'=> $Modstk,
  ]);
}


//supression d'un produit
if (isset($_POST['supp_produit'])){
  $supp_produit=$_POST['supp_produit'];
  
  $sqlQuery = "DELETE FROM `produit` WHERE Id=:id";
  $suppressionproduit = $mysqlClient->prepare($sqlQuery);
  $suppressionproduit->execute([
    'id'=> $supp_produit
  ]);
}

$sqlQuery='SELECT * FROM  produit';
$selectproduit=$mysqlClient->prepare($sqlQuery);
$selectproduit->execute();
$Produits=$selectproduit->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CaisseShop – Stock</title>
  <link rel="stylesheet" href="./styles/stock.css">

</head>
<body>
 
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      <img src="./img/logo.png" alt="CaisseShop">
    </div>
 
    <ul class="nav-links">
      <li><a href="caisse.php">Caisse</a></li>
      <li><a href="stock.php" class="active">Stock</a></li>
      <li><a href="hjour.php">Historique</a></li>
    </ul>

    <form action="logout.php">
      <button class="btn-power" title="Déconnexion">
        <svg viewBox="0 0 24 24">
          <path d="M12 3v9M4.22 6.22a9 9 0 1 0 15.56 0"/>
        </svg>
      </button>
    </form>
  </nav>
 
  <!-- TOOLBAR -->
  <div class="toolbar">
    <a href="produit.php" class="btn-add">Ajouter un produit</a>
 
    <div class="search-wrapper">
      <input class="search-input" type="text" placeholder="rechercher un produit">
      <button class="search-btn" title="Rechercher">
        <!-- paper-plane icon -->
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/>
        </svg>
      </button>
    </div>
  </div>
 
  <!-- PRODUCT GRID -->
  <div class="grid">
 
    <?php
    for ($i=0;$i<count($Produits);$i++) {
    ?>
      <div class="card">
        <div class="card-info">
          <p><strong>Nom :</strong> <?php echo $Produits[$i]["Nom"] ?></p>
          <p><strong>Prix :</strong> <?php echo $Produits[$i]["Prix"] ?></p>
          <p><strong>Stock :</strong> <?php echo $Produits[$i]["Stock"] ?></p>
          <p><strong>Référence :</strong> <?php echo $Produits[$i]["Reference"] ?></p>
        </div>
        <div class="card-footer">
          <form action="editproduit.php" method="post" >
              <input type="hidden" name="id_pr_edit" value="<?php echo $Produits[$i]['Id']?>">
              <input type="hidden" name="N_pr_edit" value="<?php echo $Produits[$i]['Nom']?>">
              <input type="hidden" name="D_pr_edit" value="<?php echo $Produits[$i]['Description']?>">
              <input type="hidden" name="P_pr_edit" value="<?php echo $Produits[$i]['Prix']?>">
              <input type="hidden" name="S_pr_edit" value="<?php echo $Produits[$i]['Stock']?>">
              <input type="hidden" name="R_pr_edit" value="<?php echo $Produits[$i]['Reference']?>">
              <button type="submit" class="btn-detail">Éditer</button>
          </form>
          <form action="detail.php" method="post">
              <button class="btn-detail">Détail</button>
          </form>
          <form action="stock.php" method="post">
              <input type="hidden" name="supp_produit" value="<?php echo $Produits[$i]['Id']?>">
              <button class="btn-detail">Supprimer</button>
          </form> 
        </div>
        
      </div>
      <?php
        }?>
  </div>
 
</body>
</html>