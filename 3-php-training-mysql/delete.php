<?php
include 'inc/DBConnection.php';
include 'inc/Boardgame.php';
$db_conn = DBConnection::getInstance();
$sql = 'SELECT * FROM boardgames WHERE id = ?';
$msg = '';

if (isset($_GET['id'])) {
    $stmt = $db_conn->getConnection()->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $donnees = $stmt->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $db_conn->getConnection()->prepare('DELETE FROM boardgames WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Vous avez bien supprimé le jeu!';
        } else {
            header('Location: read.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modififier un jeu de société</title>
</head>
    <body>
    <?php foreach ($donnees as $donnee): ?>
    <h2>Supprimer le jeu #<?=$donnee->getId()?></h2>
    <?php if ($msg) {
        echo "<p><?=$msg?></p>";
    } else {
        echo '<p>Vous êtes sûr de vouloir supprimer le jeu #'.$donnee->getId().'?</p>';?>
        <a href="delete.php?id=<?=$donnee->getId()?>&confirm=yes">Oui</a>
        <a href="delete.php?id=<?=$donnee->getId()?>&confirm=no">Non</a>
    <?php }?>
    <?php endforeach; ?>
    </body>
</html>
