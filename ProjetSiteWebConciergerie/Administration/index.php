<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION['nom'])){
    header("Location: login.php");
    exit(); 
  }
?>

</html>

<html>
    <head>
        <title>Mon compte</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
       
                <nav>
            <div> 
                  <h1 class="header"> O&I Ludotheque
                 </h1>  
           
              </div>
          
             <ul>
                 <li><a class="active" href="index.php">Accueil</a></li>
                    <li><a href="NouveauxJeux.php">Saisie nouveaux jeux</a></li>
                    <li><a href="CatalogueJeux.php">Catalogue des jeux</a></li>

               
            
            </ul>  
             
        </nav>
        
        
    <h1>Bienvenue admin <?php echo $_SESSION['nom']; ?>!</h1>
     <p>C'est votre tableau de bord.</p>
         <div class="blockCompte">
            <button class="ButtonCompte button1" onclick="window.location.href='NouveauxJeux.php'">Saisir de nouveaux jeux</button>
             <button  onclick="window.location.href='AjouterAdherents.php'" class="ButtonCompte button2" > Inscrire des clients </button>
        <button class="ButtonCompte button2" onclick="window.location.href='CatalogueJeux.php'"> Modifier des jeux</button> 
        <button class="ButtonCompte button2" onclick="window.location.href='CatalogueJeux.php'"> Supprimer des jeux</button> 
        </div>
     <div>
             <a href="logout.php">Déconnexion</a>
     </div>
        
        
        
<!--footer--->

        
<!--footer--->

      
    </body>
</html>