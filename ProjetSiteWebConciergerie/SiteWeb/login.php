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
                <li><a class="active" href="home.html">Accueil</a></li>
                <li><a href="BOUTIQUE.php">Jeux</a></li>
                <li><a href="contact.html">Contact</a></li>

               
                <a href="LoginEspacePerso.php""><img class="img" src="images/icons8-utilisateur-sexe-neutre-128.png" alt="monCompte.html"/></a>
                <input  class="input" type="text" placeholder="Rechercher">
            </ul>  
        </nav>
        
<?php
require('config.php');
session_start();

if (isset($_POST['submit'])){
  $username = stripslashes($_REQUEST['nom']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['mdp']);
  $password = mysqli_real_escape_string($conn, $password);
  $id_client=stripslashes($_REQUEST['id_client']);
  $id_client=  mysqli_real_escape_string($conn, $id_client);

    $query = "SELECT * FROM `clients` WHERE nom='$username' and mdp=' $password' and id_client='$id_client'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['id_client'] = $id_client;
      header("Location: BoutiqueReservation.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form  action="" method="post" name="login">
<h1 >Connexion</h1>
<input type="text" name="id_client" placeholder="NumeroD'identifiant">

<input type="text" name="nom" placeholder="Nom d'utilisateur">
<input type="password" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" >
<p >Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p ><?php echo $message; ?></p>
<?php } ?>
</form>
    
     <div class="footer">

            <p class="footerText"> Ludothéque france</p>
        </div>
</body>
</html>