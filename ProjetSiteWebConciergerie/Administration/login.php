<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
     <nav>
            <div> 
                  <h1 class="header"> O&I Ludotheque
                 </h1>  
                
           
              </div>
                <ul>
                    <li><a class="active" href="PageOperationAdmin.html">Accueil</a></li>
                    <li><a href="NouveauxJeux.php">Saisie nouveaux jeux</a></li>
                    <li><a href="CatalogueJeux.php">Catalogue des jeux</a></li>

               
            
            </ul>  
         </nav>
<?php
require('config.php');
session_start();

if (isset($_POST['nom'])){
  $username = stripslashes($_REQUEST['nom']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['mdp']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `admin` WHERE nom='$username' and mdp='$password'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['nom'] = $username;
      header("Location: index.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form  action="" method="post" name="login">
<h1 >Connexion</h1>
<input type="text"  name="nom" placeholder="Nom d'utilisateur">
<input type="password" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" >
<p >Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p ><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>