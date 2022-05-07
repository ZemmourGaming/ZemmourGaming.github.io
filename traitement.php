
<!DOCTYPE html>
<html>
	<head>
		<Title>Sussyte</Title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	</head>
	<body>
		<?php
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "root";
$BDD['db'] = "sussyte";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
    if(isset($_POST['avis'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    	if(empty($_POST['avis'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        	echo "Le champ Avis est vide.";
        }elseif(strlen($_POST['avis'])>500){
        echo "Le commentaire est trop long, il dépasse 500 caractères.";
        }elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM commentaires WHERE commentaire='".$_POST['avis']."'"))==1){
        	echo"Bien tenté, mais ce commentaire a déjà été posté";
        }else{

        	if(!mysqli_query($mysqli,"INSERT INTO commentaires SET commentaire='".$_POST['avis']."', email='".$_SESSION['email']."', pseudo='".$_SESSION['pseudo'])."'"){//on crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        } else {
            echo "Votre commentaire a été ajouté avec succès!";
        }
    }
}
}


		?>
<!-- <?php

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM commentaires';
$commentairesStatement = $mysqli->prepare($sqlQuery);
$commentairesStatement->execute();
$commentaires = $commentairesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($commentaires as $commentaire) {
?>
   <p><?php echo"écrit par " .$commentaire['pseudo']. " :", $commentaire['commentaire']; ?></p>
<?php
}
?> -->
</body>
</html>