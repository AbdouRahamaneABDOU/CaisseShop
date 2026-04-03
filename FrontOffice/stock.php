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
 
    <button class="btn-power" title="Déconnexion">
      <svg viewBox="0 0 24 24">
        <path d="M12 3v9M4.22 6.22a9 9 0 1 0 15.56 0"/>
      </svg>
    </button>
  </nav>
 
  <!-- TOOLBAR -->
  <div class="toolbar">
    <button class="btn-add">Ajouter un produit</button>
 
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
 
    <!-- Card 1 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Farine</span></p>
        <p><strong>Prix :</strong> <span>2€</span></p>
        <p><strong>Stock :</strong> <span>600</span></p>
        <p><strong>Référence :</strong> <span>AZ-897</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
    <!-- Card 2 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Sardine</span></p>
        <p><strong>Prix :</strong> <span>1€</span></p>
        <p><strong>Stock :</strong> <span>2000</span></p>
        <p><strong>Référence :</strong> <span>90PL6D</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
    <!-- Card 3 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Sac de riz 20kg</span></p>
        <p><strong>Prix :</strong> <span>33€</span></p>
        <p><strong>Stock :</strong> <span>200</span></p>
        <p><strong>Référence :</strong> <span>GLP86E</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
    <!-- Card 4 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Coca Cola 33cl</span></p>
        <p><strong>Prix :</strong> <span>1€</span></p>
        <p><strong>Stock :</strong> <span>800</span></p>
        <p><strong>Référence :</strong> <span>COL-AL03</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
    <!-- Card 5 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Trésor</span></p>
        <p><strong>Prix :</strong> <span>3.45€</span></p>
        <p><strong>Stock :</strong> <span>90</span></p>
        <p><strong>Référence :</strong> <span>TR123OP</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
    <!-- Card 6 -->
    <div class="card">
      <div class="card-info">
        <p><strong>Nom :</strong> <span>Sucre</span></p>
        <p><strong>Prix :</strong> <span>1.50€</span></p>
        <p><strong>Stock :</strong> <span>1540</span></p>
        <p><strong>Référence :</strong> <span>75fr85C</span></p>
      </div>
      <div class="card-footer">
        <form action="">
            <button type="submit" class="btn-detail">Éditer</button>
        </form>
        <form action="">
            <button class="btn-detail">Détail</button>
        </form>
        <form action="">
            <button class="btn-detail">Supprimer</button>
        </form> 
      </div>
    </div>
 
  </div>
 
</body>
</html>