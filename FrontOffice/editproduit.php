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
  <div>
    <img src="./img/logo.png" class="logo" alt="CaisseShop">
  </div>
</header>
 
<main>
  <!-- ── Formulaire ── -->
  <div class="card form-card">
    <h1>Modification d'un produit</h1>
 
    <div class="field">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" placeholder="Nom du produit" autocomplete="off"/>
    </div>
 
    <div class="field">
      <label for="description">Description :</label>
      <textarea id="description" placeholder="Description du produit…"></textarea>
    </div>
 
    <div class="field">
      <label for="reference">Référence :</label>
      <div class="ref-wrapper">
        <input type="text" id="reference" placeholder="Ex : REF-123456" autocomplete="off"/>
        <span class="ref-icon">⌗</span>
      </div>
    </div>
 
    <div class="field">
      <label for="prix">Prix :</label>
      <input type="number" id="prix" placeholder="0.00" min="0" step="0.01"/>
    </div>
 
    <div class="field">
      <label for="stock">Stock :</label>
      <input type="number" id="stock" placeholder="0" min="0" step="1"/>
    </div>
 
    <div class="btn-row">
      <button class="btn btn-add" >Ajouter</button>
      <button class="btn btn-cancel">Annuler</button>
    </div>
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