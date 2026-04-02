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
  <link rel="stylesheet" href="historique.css">
</head>
<body>
 
  <div class="topbar">
    <a href="index.php" class="back-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
      Retour
    </a>
  </div>
 
  <div class="container">
    <h1>Historique des ventes</h1>
 
    <div class="tabs">
      <a href="hjour.php" class="tab">Par jour</a>
      <a href="hsemaine.php" class="tab ">Par semaine</a>
      <a href="hperiode.php" class="tab">Période personnalisée</a>
    </div>
 
    <div class="period-label">23 mars 2026 – 27 mars 2026</div>
 
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>User</th>
            <th>Heure</th>
            <th>Date</th>
            <th>Nombre de produit</th>
            <th>Total</th>
            <th>Aperçu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u2">U2</div>
                User2
              </div>
            </td>
            <td><span class="time-badge">13:11</span></td>
            <td><span class="date-cell">26/03/2026</span></td>
            <td><span class="qty">5</span></td>
            <td><span class="total">42,95 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u1">U1</div>
                User1
              </div>
            </td>
            <td><span class="time-badge">14:25</span></td>
            <td><span class="date-cell">26/03/2026</span></td>
            <td><span class="qty">9</span></td>
            <td><span class="total">75,30 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u2">U2</div>
                User2
              </div>
            </td>
            <td><span class="time-badge">19:02</span></td>
            <td><span class="date-cell">26/03/2026</span></td>
            <td><span class="qty">4</span></td>
            <td><span class="total">23,25 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u4">U4</div>
                User4
              </div>
            </td>
            <td><span class="time-badge">08:56</span></td>
            <td><span class="date-cell">25/03/2026</span></td>
            <td><span class="qty">11</span></td>
            <td><span class="total">64,10 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u3">U3</div>
                User3
              </div>
            </td>
            <td><span class="time-badge">10:25</span></td>
            <td><span class="date-cell">25/03/2026</span></td>
            <td><span class="qty">3</span></td>
            <td><span class="total">15,99 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u1">U1</div>
                User1
              </div>
            </td>
            <td><span class="time-badge">18:34</span></td>
            <td><span class="date-cell">25/03/2026</span></td>
            <td><span class="qty">2</span></td>
            <td><span class="total">66,00 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u3">U3</div>
                User3
              </div>
            </td>
            <td><span class="time-badge">14:06</span></td>
            <td><span class="date-cell">24/03/2026</span></td>
            <td><span class="qty">5</span></td>
            <td><span class="total">117,00 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u2">U2</div>
                User2
              </div>
            </td>
            <td><span class="time-badge">08:12</span></td>
            <td><span class="date-cell">24/03/2026</span></td>
            <td><span class="qty">23</span></td>
            <td><span class="total">164,00 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
          <tr>
            <td>
              <div class="user-cell">
                <div class="avatar avatar-u4">U4</div>
                User4
              </div>
            </td>
            <td><span class="time-badge">08:12</span></td>
            <td><span class="date-cell">24/03/2026</span></td>
            <td><span class="qty">7</span></td>
            <td><span class="total">92,00 €</span></td>
            <td><a href="#" class="btn-voir">Voir</a></td>
          </tr>
        </tbody>
      </table>
    </div>
 
  </div>
 
</body>
</html>