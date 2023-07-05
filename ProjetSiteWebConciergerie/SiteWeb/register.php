<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
     <nav>
            <div> 
                  <h1 class="header"> GooProduct
                 </h1>  
           
              </div>
          
            <ul>
                <li><a class="active" href="home.html">Accueil</a></li>
                <li><a href="">Mon compte</a></li> 
                <a href="LoginEspacePerso.php"><img class="img" src="images/icons8-utilisateur-sexe-neutre-128.png" alt="monCompte.html"/></a>
                <input class="input" type="text" placeholder="Rechercher">
            </ul>  
        </nav>
        
<?php
require('config.php');
if (isset($_REQUEST['nom'], $_REQUEST['adresseMail'], $_REQUEST['mdp'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['nom']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['adresseMail']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['mdp']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `clients` (nom, adresseMail,mdp)
              VALUES ('$username', '$email', ' $password')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
       
<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="adresseMail" placeholder="Email" required />
    <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
     <div class="footer">

            <p class="footerText"> GooProduct France</p>
        </div>
</body>
</html>