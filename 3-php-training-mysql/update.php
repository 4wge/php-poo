<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modififier un jeu de société</title>
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<h1>Modifier un jeu de société</h1>
	<form action="#" method="post">
		<div>
			<label for="id">Name</label>
			<input type="number" name="id" value="">
		</div>
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
</body>
</html>
