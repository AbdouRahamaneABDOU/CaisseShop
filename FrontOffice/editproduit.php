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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CaisseShop – Modification d'un produit</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="./styles/produit.css">

</head>
<body>
 
<header>
  <div class="logo">
    <a href="index.php"><img src="./img/logo.png" alt="CaisseShop"></a>
  </div>
</header>
 
<main>
  <!-- ── Formulaire ── -->
  <div class="card form-card">
    
    <h1>Modification d'un produit</h1>
    <form action="stock.php" method="post">
      <input type="hidden" name="E_id" value="<?php echo $_POST['id_pr_edit'] ?>"/>
      <div class="field">
        <label for="nom">Nom :</label>
        <input type="text" name="E_nom" value="<?php echo $_POST['N_pr_edit'] ?>"/>
      </div>
  
      <div class="field">
        <label for="description">Description :</label>
        <textarea name="E_description" placeholder="Description du produit…"><?php echo $_POST['D_pr_edit'] ?></textarea>
      </div>
  
      <div class="field">
        <label for="reference">Référence :</label>
        <div class="ref-wrapper">
          <input type="text" name="E_reference" value="<?php echo $_POST['R_pr_edit'] ?>"/>
          <span class="ref-icon">⌗</span>
        </div>
      </div>
  
      <div class="field">
        <label for="prix">Prix :</label>
        <input type="number" name="E_prix" value="<?php echo $_POST['P_pr_edit'] ?>" />
      </div>
  
      <div class="field">
        <label for="stock">Stock :</label>
        <input type="number" name="E_stock" value="<?php echo $_POST['S_pr_edit'] ?>"/>
      </div>
  
      <div class="btn-row">
        <button type="submit" class="btn btn-add" >Ajouter</button>
        <a href="stock.php" class="btn btn-cancel">Annuler</a>
      </div>
    </form>
  </div>
  
 
  <!-- ── Code-barres ── -->
  <div class="card bc-card">
    <h2>📦 Code-barres</h2>
 
    <!-- Placeholder (aucune référence) -->
    <div class="bc-placeholder" id="bc-placeholder">
      <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="4"  y="12" width="4"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="11" y="12" width="2"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="16" y="12" width="6"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="25" y="12" width="3"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="31" y="12" width="5"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="39" y="12" width="2"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="44" y="12" width="7"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="54" y="12" width="3"  height="40" rx="1" fill="#94a3b8"/>
        <rect x="4"  y="56" width="53" height="2"  rx="1" fill="#cbd5e1"/>
      </svg>
      <p>Saisissez une <strong>référence</strong><br/>pour générer le code-barres.</p>
    </div>
 
    <!-- Code-barres généré -->
    <div id="bc-wrapper">
      <svg id="barcode"></svg>
      <span class="bc-ref-label" id="bc-ref-label"></span>
    </div>
 
    <!-- Message d'erreur -->
    <div class="bc-error" id="bc-error">
      Référence invalide pour générer un code-barres.<br/>
      Utilisez des caractères alphanumériques.
    </div>
  </div>
</main>

</body>
</html>