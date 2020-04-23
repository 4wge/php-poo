<?php
include 'inc/DBConnection.php';
include 'inc/Boardgame.php';

$db_conn = DBConnection::getInstance();

$stmt = $db_conn->getConnection()->query('SELECT * FROM boardgames');
$donnees = $stmt->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
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
          <td><?=$donnee->getId()?></td>
          <td><?=$donnee->getName()?></td>
          <td><?=$donnee->getPlayersMin()?></td>
          <td><?=$donnee->getPlayersMax()?></td>
          <td><?=$donnee->getAgeMin()?></td>
          <td><?=$donnee->getAgeMax()?></td>
          <td><img src="<?=$donnee->getPicture()?>"></td>
          <td><a href="update.php?id=<?=$donnee->getId()?>">Modifier</a></td>
          <td><a href="delete.php?id=<?=$donnee->getId()?>">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
