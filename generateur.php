<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Générateur de codes de hachage</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body style="background: #eee url('img/computer-security-lock.jpg') 0 0 no-repeat; background-size: cover; display: flex; flex-direction: column; width: 100%; min-height: 100vh;">
	<?php include 'header.inc'; ?>
	<section id="Gen" class="container-fluid p-5" style="background: rgba(255, 255, 255, 0.5); flex-grow: 1;">
		<h1 class="text-center pb-4">
			Générateur de codes de hachage
		</h1>

		<form id="hachForm" action="" method="GET" class="container p-3 border rounded border-dark" style="background-color: #ccc;">
			<div class="form-group">
				<label for="idTexte">Entrez le texte à hacher: <span id="ErrorTexte" class="text-danger"></span></label><br>
				<input type="text" id="idTexte" name="texte" value="<?php if (isset($_GET['texte'])) {echo $_GET['texte'];} ?>"><br><br>
			</div>
			<fieldset id="checkboxField">
				<p>Sélectionnez les algorithmes à appliquer: <span id="ErrorCheckbox" class="text-danger"></span></p>
				
			    <input type="checkbox" id="idMD5" name="algorithmes[]" value="MD5" <?php if (isset($_GET['algorithmes']) && in_array("MD5", $_GET['algorithmes'])) {echo "Checked";} ?>>
				<label for="idMD5">MD5</label><br>
				<input type="checkbox" id="idSHA1" name="algorithmes[]" value="SHA1" <?php if (isset($_GET['algorithmes']) && in_array("SHA1", $_GET['algorithmes'])) {echo "Checked";} ?>>
				<label for="idSHA1">SHA1</label><br>
				<input type="checkbox" id="idRIPEMD160" name="algorithmes[]" value="RIPEMD-160" <?php if (isset($_GET['algorithmes']) && in_array("RIPEMD-160", $_GET['algorithmes'])) {echo "Checked";} ?>>
				<label for="idRIPEMD160">RIPEMD-160</label><br>
				<input type="checkbox" id="idSHA256" name="algorithmes[]" value="SHA-256" <?php if (isset($_GET['algorithmes']) && in_array("SHA-256", $_GET['algorithmes'])) {echo "Checked";} ?>>
				<label for="idSHA256">SHA-256</label><br>
				<input type="checkbox" id="idSHA512" name="algorithmes[]" value="SHA-512" <?php if (isset($_GET['algorithmes']) && in_array("SHA-512", $_GET['algorithmes'])) {echo "Checked";} ?>>
				<label for="idSHA512">SHA-512</label><br>
			</fieldset><br>
			<div class="text-right">
				<input type="submit" class="btn btn-success" name="submit" value="Calculer">
				<input type="reset" class="btn btn-secondary" onclick="window.location.replace(location.protocol + '//' + location.host + location.pathname);">
			</div>
		</form>
	</section>
    <?php 
        //Test si le formulaire a été envoyer
        if(isset($_GET['submit'])){
            //test si le texte ET un algorithme sont fournis, affiche la réponse du serveur
            if (!empty($_GET['algorithmes']) && !empty($_GET['texte'])) {
                //Affiche une section pour la réponse de hachage
                echo '<section id="Hachage" class="container-fluid mt-5 p-5" style="background: rgba(255, 255, 255, 0.5);flex-grow: 1;">';
                echo '<h1>';
                //Affiche le titre avec le texte récupéré dans l'url
                echo 'Résultats pour le hashing du texte : <span class="text-primary">' . $_GET['texte'] . '</span>';
                echo '</h1>';
                //Pour chaque elements algorithmes passer dans l'url, effectue le traitement correspondant
                foreach ($_GET['algorithmes'] as $checked) {
                    switch ($checked) {
                        case 'MD5':
                            echo '<div id="ImpMD5" class="mt-2">';
                            echo '<h2>MD5: </h2>';
                            echo '<p class="text-monospace border border-dark p-1" style="Display: inline; background-color: #999;">';
                            echo hash('md5', $_GET['texte']);
                            echo '</p>';
                            echo '</div>';
                            break;
                        case 'SHA1':
                            echo '<div id="ImpSHA1" class="mt-2">';
                            echo '<h2>SHA1: </h2>';
                            echo '<p class="text-monospace border border-dark p-1" style="Display: inline; background-color: #999;">';
                            echo hash('sha1', $_GET['texte']);
                            echo '</p>';
                            echo '</div>';
                            break;
                        case 'RIPEMD-160':
                            echo '<div id="ImpRIPEMD160" class="mt-2">';
                            echo '<h2>RIPEMD-160: </h2>';
                            echo '<p class="text-monospace border border-dark p-1" style="Display: inline; background-color: #999;">';
                            echo hash('ripemd160', $_GET['texte']);
                            echo '</p>';
                            echo '</div>';
                            break;
                        case 'SHA-256':
                            echo '<div id="ImpSHA256" class="mt-2">';
                            echo '<h2>SHA-256: </h2>';
                            echo '<p class="text-monospace border border-dark p-1" style="Display: inline; background-color: #999;">';
                            echo hash('sha256', $_GET['texte']);
                            echo '</p>';
                            echo '</div>';
                            break;
                        case 'SHA-512':
                            echo '<div id="ImpSHA512" class="mt-2">';
                            echo '<h2>SHA-512: </h2>';
                            echo '<p class="text-monospace border border-dark p-1" style="Display: inline; background-color: #999;">';
                            echo hash('sha512', $_GET['texte']);
                            echo '</p>';
                            echo '</div>';
                            break;                  
                        default:
                            echo '<div id="ImpDefault" class="mt-2">';
                            echo '<h2 class="text-danger">Une Erreur est survenue, l\'algorithme n\'a pas été détecté.</h2>';
                            echo '</div>';
                            break;
                    }
                }
                echo '</section>';
            }
            else{
                //Test si aucun texte est fourni, affiche une erreur à l'utilisateur.
                if (empty($_GET['texte'])) {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("ErrorTexte").innerHTML = "Le champs texte est requis";';
                    echo '</script>';
                }
                //Test si aucun algorithme est coché, affiche une erreur à l'utilisateur.
                if (empty($_GET['algorithmes'])) {
                    echo '<script type="text/javascript">';
                    echo 'document.getElementById("ErrorCheckbox").innerHTML = "Au moins un algorithme est requis.";';
                    echo '</script>';
                }
            }
        }
    ?>

    <?php include 'footer.inc'; ?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>