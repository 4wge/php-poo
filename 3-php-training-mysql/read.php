<?php
include 'inc/DBConnection.php';

$db_conn = DBConnection::getInstance();

$stmt = $db_conn->getConnection()->query('SELECT * FROM boardgames');
$donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jeux de société</title>
  </head>
  <body>
    <h1>Liste des jeux de société</h1>
    <!-- Afficher la liste des jeux -->
    <table>
      <thread>
        <tr>
          <td>#</td>
          <td>Nom</td>
          <td>Joueur min</td>
          <td>Joueur max</td>
          <td>Age min</td>
          <td>Age max</td>
          <td>image</td>
        </tr>
      </thread>
      <tbody>
        <?php foreach ($donnees as $donnee): ?>
        <tr>
          <td><?=$donnee['id']?></td>
          <td><?=$donnee['name']?></td>
          <td><?=$donnee['player_min']?></td>
          <td><?=$donnee['player_max']?></td>
          <td><?=$donnee['age_min']?></td>
          <td><?=$donnee['age_max']?></td>
          <td><img src="<?=$donnee['picture']?>"></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
