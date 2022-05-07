
<?php
//on définit notre variable pour pouvoir inclure les fichier
define("C2SCRIPT","peut être n'importe quoi ici");
include("fonctions/fonctions.php");

//on se connecte à la base de données (à adapter/remplacer avec votre système de connexion)
$BDD = array();
$BDD['serveur'] = "localhost";
$BDD['login'] = "root";
$BDD['pass'] = "root";
$BDD['bdd'] = "sussyte";
$mysqli = mysqli_connect($BDD['serveur'],$BDD['login'],$BDD['pass'],$BDD['bdd']);
if(!$mysqli) exit('Connexion MySQL non accomplie!');

if (empty($_SESSION['adejacommente'])){
	$_SESSION['adejacommente'] = 1;
}

if (empty($_SESSION['connecté'])){
	$_SESSION['connecté'] = 0;
}
?>

<!DOCTYPE html>

<html>
	<head>
		<Title>Sussyte</Title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<head>
	<body>
<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=sussyte;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$connecté = $_SESSION['connecté'];
$adejacommente = $_SESSION['adejacommente'];
echo $connecté;
echo $adejacommente;
?>
	
			<h1><strong>Le Site de Nadal</strong></h1>
			<p> Bonjour, et bien venu sur ce site, 
			
			<?php 
			session_start();
			$email = $_SESSION['email'];
			$pseudo = $_SESSION['pseudo'];
			echo $pseudo;
			?>
			. Sachant que je n'ai aucune inspi, je n'écrirai rien de particulier. <em>Sussy Baka</em>. </p>
			<br/>
			<p> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_BLANK">lien un peu sus</a> </p>
			<a href="IMG/jerma.jpg" width="10000"><img src="IMG/therock.jpg" width="500" alt="cliques sur l'image"></a>

			<br/><br/><br/><br/><br/>
			<a href="se connecter.php">Se connecter</a>
			<br/>
			<a href="s'inscrire.php">S'inscrire</a>
			<br/><br/><br/><br/>
			<p class = autresite> Voici les suites du site. Il y en a 2</p>
			<p> la suite du site : <a href= "site suite.html" alt= "la suite classique du site">Suite normale</a>  <br/>
			<a href= "https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_BLANK" alt="la suite secrete">La vraie suite 😳</a> 
		</p>

			<p>
				<span class = sus>nimp</span>
			</p>


			<p> <a href="../Mon sitelmdc - Copie/html/Index.html" alt = "viagus">Site de Vianney</a>
			<br/>	<a href="../sitedalban/Index.html" alt = "albogus">Site d'Alban</a>
			<br/> <a href="../@robase/index.html" alt= "le site d'Achille">Site d'Achille</a>
			<br/> <a href="../Site de lucas/site de lucas.html"  alt="lugus">Site de Lucas</a> <br> 
			<a href="../Site de Baptiste/Index.html">Site de Baptiste</a>
			</p>


	<?php
	//on affiche le formulaire pour poster un commentaire
	afficherFormulaireCommentaire("site de commentaires.php");// indiquer la page actuelle avec ou sans query du type ?id=123&... et l'id de la'rticle pour affiche les commentaire de cette article seulement, si vous utilisez ce système de commentaire pour un livre d'or par exemple, vous pouvez l'enlever et mettre seulement la page actuelle: afficherFormulaireCommentaire("page.php");
	?>
    
	<h2>Commentaires postés</h2>
	<?php
	afficherCommentaires(123);
	?>
	   
   <!-- </p> -->
<!-- </form> -->
			<body>
</html>