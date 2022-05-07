<!DOCTYPE html>

<html>
	<head>
		<Title>Sussyte</Title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	</head>
	<body>
 
<?php
/*
Page: se connecter.php
*/
//à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
session_start();
//si le bouton "Connexion" est cliqué
if(isset($_POST['connexion'])){
    // on vérifie que le champ "email" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['email'])){
        echo "Le champ email est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['password'])){
            echo "Le champ Mot de passe est vide.";
        } else {
          //Pareil avec le champ  "pseudo"
            if(empty($_POST['pseudo'])){
              echo "Le champ Pseudo est vide.";
          } else {

            // les champs email & mdp sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
            //le htmlentities() passera les guillemets en entités HTML, ce qui empêchera en partie, les injections SQL
            $Email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8"); 
            $MotDePasse = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
            $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "UTF-8");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("localhost", "root", "root", "sussyte");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                //si vous avez enregistré le mot de passe en md5() il vous faudra faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                $Requete = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '".$Email."' AND password = '".$MotDePasse."' AND pseudo = '".$Pseudo."'");
                //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le email ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    //on ouvre la SESSION avec $_SESSION:
                    //la SESSION peut être appelée différemment et son contenu aussi peut être autre chose que le email
                    $_SESSION['email'] = $_POST ['email'];
                    $_SESSION['pseudo'] = $_POST ['pseudo'];
                    $_SESSION['password'] = $_POST ['password'];
                    $_SESSION['connecté'] = 1;

                    echo "Vous êtes à présent connecté !";
                }
            }}
        }
    }
}
?>
<form action="se connecter.php" method="post">
    Pseudo: <input type="text" name="pseudo" />
    <br/>
    Email: <input type="text" name="email" placeholder="you@example.com"/>
    <br />
    Mot de passe: <input type="password" name="password" />
    <br />

    <input type="submit" name="connexion" value="Connexion" />
</form>
<a href="site de commentaires.php">Lien vers le site</a>
</body>
</html>