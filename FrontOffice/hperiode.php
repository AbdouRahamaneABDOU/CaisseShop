<?php
session_start();
// Verifier si la session existe

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once(__DIR__ . '/bdd.php');

//Jointure  
$sqlQuery = 
'SELECT ve.Id,
ca.Prenom,
ve.Date,
ve.Total
FROM ventes ve
JOIN caissier ca on ca.Id = ve.Id_Caissier ORDER BY Date DESC;';
$SelectVentes=$mysqlClient->prepare($sqlQuery);
$SelectVentes->execute();
$Ventes=$SelectVentes->fetchAll();

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
      <a href="hjour.php" class="tab">Par jour</a>
      <a href="hsemaine.php" class="tab ">Par semaine</a>
      <a href="hperiode.php" class="tab">Période personnalisée</a>
    </div>
 
    
    <form action="hperiode.php" method="GET">
        <input type="date" name="date_debut">
        <input type="date" name="date_fin">
        <button type="submit" class="btn-voir">Rechercher</button>
    </form>

   <br>
 
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>Utilsateurr</th>
            <th>Date</th>
            <th>Total</th>
            <th>Aperçu</th>
          </tr>
        </thead>
        <tbody>
          <?php
            for ($i=0;$i<count($Ventes);$i++) {

            ?>
            <tr>
              <td>
                <div class="user-cell">
                  <?php echo $Ventes[$i]['Prenom'] ?>
                </div>
              </td>
              <td><span class="time-badge"><?php echo $Ventes[$i]['Date'] ?></span></td>
              <td><span class="total"><?php echo $Ventes[$i]['Total'] . " €"?></span></td>
              <td>
                <form action="apercu.php" method="post">
                  <button type="submit" class="btn-voir">Voir</button>
                <form>
              </td>
            </tr>
            <?php 
            }?>
        </tbody>
      </table>
    </div>
 
  </div>
 
</body>
</html>