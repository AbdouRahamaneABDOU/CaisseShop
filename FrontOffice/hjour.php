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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Historique des ventes</title>
  <link rel="stylesheet" href="./styles/historique.css">
</head>
<body>
 
  <div class="topbar">
    <a href="index.php" class="back-link">
      <-- Retour
    </a>
  </div>
 
  <div class="container">
    <h1>Historique des ventes</h1>
 
    <div class="tabs">
      <a href="hjour.php" class="tab ">Par jour</a>
      <a href="hsemaine.php" class="tab ">Par semaine</a>
      <a href="hperiode.php" class="tab">Période personnalisée</a>
    </div>
 
    <div class="day-group">
      <div class="day-label">26 mars 2026</div>
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th>Utilisateur</th>
              <th>Heure</th>
              <th>Nombre de produit</th>
              <th>Total</th>
              <th>Aperçu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="user-cell">
                  User2
                </div>
              </td>
              <td><span class="time-badge">13:11</span></td>
              <td><span class="qty">5</span></td>
              <td><span class="total">42,95 €</span></td>
              <td>
                <form action="apercu.php" method="post">
                  <button type="submit" class="btn-voir">Voir</button>
                <form>
              </td>
            </tr>
            <tr>
              <td>
                <div class="user-cell">
                  User1
                </div>
              </td>
              <td><span class="time-badge">14:25</span></td>
              <td><span class="qty">9</span></td>
              <td><span class="total">79,90 €</span></td>
              <td>
                <form action="apercu.php" method="post">
                  <button type="submit" class="btn-voir">Voir</button>
                <form>
              </td>
            </tr>
            <tr>
              <td>
                <div class="user-cell">
                  User2
                </div>
              </td>
              <td><span class="time-badge">19:02</span></td>
              <td><span class="qty">4</span></td>
              <td><span class="total">23,25 €</span></td>
              <td>
                <form action="apercu.php" method="post">
                  <button type="submit" class="btn-voir">Voir</button>
                <form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
 
    <!-- 25 mars 2026 -->
    <div class="day-group">
      <div class="day-label">25 mars 2026</div>
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th>Utilisateur</th>
              <th>Heure</th>
              <th>Nombre de produit</th>
              <th>Total</th>
              <th>Aperçu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="user-cell">
                  User4
                </div>
              </td>
              <td><span class="time-badge">08:56</span></td>
              <td><span class="qty">11</span></td>
              <td><span class="total">64,10 €</span></td>
              <td><button class="btn-voir">Voir</button></td>
            </tr>
            <tr>
              <td>
                <div class="user-cell">
                  User3
                </div>
              </td>
              <td><span class="time-badge">10:25</span></td>
              <td><span class="qty">3</span></td>
              <td><span class="total">15,99 €</span></td>
              <td><button class="btn-voir">Voir</button></td>
            </tr>
            <tr>
              <td>
                <div class="user-cell">
                  User1
                </div>
              </td>
              <td><span class="time-badge">18:34</span></td>
              <td><span class="qty">2</span></td>
              <td><span class="total">65,00 €</span></td>
              <td><button class="btn-voir">Voir</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
 
  </div>
</body>
</html>
