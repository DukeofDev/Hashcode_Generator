<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="display: flex; flex-direction: column; width: 100%; min-height: 100vh;">
	<?php include 'header.inc'; ?>
	<div class="container text-center p-4" style="flex-grow: 1;">
		<h1 class="pb-3">
			Interface PHP pour implémenter les fonctions de hachage
		</h1>
		<p>
			Le projet consiste à développer une interface usager web en utilisant du code PHP. L’interface permet à l’usager d’entrer un contenu texte et de produire la valeur de hachage pour le texte dans différents algorithmes, tels que sélectionnés par l’usager.
		</p>
		<div id="exigences" class="text-left mt-4 p-4">
			<h2>
				Exigences du travail :
			</h2>
			<ul>
				<li>Le langage de programmation utilisé est PHP</li>
				<li>Il y a un seul script PHP dans l’application</li>
				<li>La zone du résultat ne s’affiche que si les paramètres sont remplis : le texte et au moins un algorithme</li>
				<li>Le texte persiste : il est réécrit dans la zone de texte après soumission</li>
				<li>La valeur de hachage est affichée pour le texte fourni et pour chacun des algorithmes sélectionnés</li>
				<li>Réécrivez dans la zone du résultat le texte qui est haché dans les fonctions</li>
			</ul>
		</div>
		<a class="btn btn-lg btn-dark" href="generateur.php">Voir le Projet</a>
	</div>

	<?php include 'footer.inc'; ?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>