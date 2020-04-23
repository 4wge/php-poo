<?php
include 'inc/DBConnection.php';
include 'inc/Boardgame.php';
$db_conn = DBConnection::getInstance();
$sql = 'UPDATE boardgames SET name = ?, players_min = ?, players_max = ?, age_min = ?, age_max = ?, picture = ? WHERE id = ?';
$msg = '';
$donnees = [];

if (isset($_GET['id'])) {
	if (!empty($_POST)) {
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$min_age = isset($_POST['min_age']) ? $_POST['min_age'] : '';
		$max_age = isset($_POST['max_age']) ? $_POST['max_age'] : '';
		$min_players = isset($_POST['min_players']) ? $_POST['min_players'] : '';
		$max_players = isset($_POST['max_players']) ? $_POST['max_players'] : '';
		$picture = isset($_POST['picture']) ? $_POST['picture'] : '';
		$stmt = $db_conn->getConnection()->prepare($sql)->execute([$name, $min_players, $max_players, $min_age, $max_age, $picture, $_GET['id']]);
		$msg = 'Mise à jour effectué';
	}
	$stmt= $db_conn->getConnection()->prepare('SELECT * FROM boardgames WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$donnees = $stmt->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
} else {
	header('Location: read.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modififier un jeu de société</title>
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<h1>Modifier un jeu de société</h1>
	<?php foreach ($donnees as $donnee): ?>
	<form action="update.php?id=<?=$donnee->getId()?>" method="post">
		<div>
			<label for="id">ID</label>
			<input type="number" name="id" value="<?=$donnee->getId()?>">
		</div>
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?=$donnee->getName()?>">
		</div>
		<div>
			<label for="min_age">Min Age</label>
			<input type="number" name="min_age" value="<?=$donnee->getAgeMin()?>">
		</div>
		<div>
			<label for="max_age">Max Age</label>
			<input type="number" name="max_age" value="<?=$donnee->getAgeMax()?>">
		</div>
		<div>
			<label for="min_players">Min Players</label>
			<input type="number" name="min_players" value="<?=$donnee->getPlayersMin()?>">
		</div>
		<div>
            <label for="max_players">Max Players</label>
            <input type="number" name="max_players" value="<?=$donnee->getPlayersMax()?>">
        </div>
		<div>
			<label for="picture">URL of a picture</label>
			<input type="text" name="picture" value="<?=$donnee->getPicture()?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php endforeach; ?>
	<?php if ($msg) { echo "<p>$msg</p>";}?>
</body>
</html>
