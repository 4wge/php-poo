<?php
include 'inc/DBConnection.php';
$db_conn = DBConnection::getInstance();
$msg = '';
$sql = 'INSERT INTO boardgames (name, players_min, players_max, age_min, age_max, picture) VALUES (?,?,?,?,?,?)';

if (!empty($_POST)) {
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$min_age = isset($_POST['min_age']) ? $_POST['min_age'] : '';
	$max_age = isset($_POST['max_age']) ? $_POST['max_age'] : '';
	$min_players = isset($_POST['min_players']) ? $_POST['min_players'] : '';
	$max_players = isset($_POST['max_players']) ? $_POST['max_players'] : '';
	$picture = isset($_POST['picture']) ? $_POST['picture'] : '';
	$stmt = $db_conn->getConnection()->prepare($sql)->execute([$name, $min_players, $max_players, $min_age, $max_age, $picture]);
	$msg = 'Le jeu de société a été ajouté avec succès.';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un jeu de société</title>
</head>
<body>
	<?php
		if('POST' == $_SERVER['REQUEST_METHOD']) {

		}
	?>
	<a href="./read.php">Liste des jeux</a>
	<h1>Ajouter un jeu de société</h1>
	<form action="#" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>
		<div>
			<label for="min_age">Min Age</label>
			<input type="number" name="min_age" value="">
		</div>
		<div>
			<label for="max_age">Max Age</label>
			<input type="number" name="max_age" value="">
		</div>
		<div>
			<label for="min_players">Min Players</label>
			<input type="number" name="min_players" value="">
		</div>
		<div>
            <label for="max_players">Max Players</label>
            <input type="number" name="max_players" value="">
        </div>
		<div>
			<label for="picture">URL of a picture</label>
			<input type="text" name="picture" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if ($msg) { echo "<p>$msg</p>";}?>
</body>
</html>
