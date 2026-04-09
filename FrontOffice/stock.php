<?php
session_start();
// Verifier si la session existe

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
 
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php"><img src="./img/logo.png" alt="CaisseShop"></a>
    </div>
 
    <ul class="nav-links">
      <li><a href="caisse.php">CAISSE</a></li>
      <li><a href="stock.php" class="active">STOCK</a></li>
      <li><a href="hjour.php">HISTORIQUE</a></li>
    </ul>

    <form action="logout.php" method="post">
      <button class="btn-power" title="Déconnexion">
        <i class="fa-solid fa-power-off"></i>
      </button>
    </form>
  </nav>
 
  <!-- TOOLBAR -->
  <div class="toolbar">
    <a href="produit.php" class="btn-add">Ajouter un produit</a>
 
    <div class="search-wrapper">
      <input class="search-input" type="text" placeholder="rechercher un produit">
      <button class="search-btn" title="Rechercher">
        <i class="fa-solid fa-paper-plane"></i>
      </button>
    </div>
  </div>
 
  <div class="grid">
 
    <?php
    for ($i=0;$i<count($Produits);$i++) {
    ?>
      <div class="card">
        <div class="card-info">
          <p><strong>Nom :</strong> <?php echo $Produits[$i]["Nom"] ?></p>
          <p><strong>Prix :</strong> <?php echo $Produits[$i]["Prix"] ?> €</p>
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
              <button type="submit" class="btn-detail">
                <i class="fa-solid fa-pen"></i>
              </button>
          </form>
          <form action="detail.php" method="post">
              <input type="hidden" name="id_pr" value="<?php echo $Produits[$i]['Id']?>">
              <input type="hidden" name="N_pr" value="<?php echo $Produits[$i]['Nom']?>">
              <input type="hidden" name="D_pr" value="<?php echo $Produits[$i]['Description']?>">
              <input type="hidden" name="P_pr" value="<?php echo $Produits[$i]['Prix']?>">
              <input type="hidden" name="S_pr" value="<?php echo $Produits[$i]['Stock']?>">
              <input type="hidden" name="R_pr" value="<?php echo $Produits[$i]['Reference']?>">
              <button class="btn-detail">Détail</button>
          </form>
          <form action="stock.php" method="post">
              <input type="hidden" name="supp_produit" value="<?php echo $Produits[$i]['Id']?>">
              <button class="btn-detail">
                <i class="fa-solid fa-trash"></i> 
              </button>
          </form> 
        </div>
        
      </div>
    <?php
    }?>
  </div>
 
</body>
</html>