<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION['id_client'])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>

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
        
        
    <h1>Bienvenue <?php echo $_SESSION['nom']; ?>!</h1>
     <p>C'est votre tableau de bord.</p>
        <div class="blockCompte">
            <button class="ButtonCompte button1" onclick="window.location.href='DonneePersonnelClient.php"  name="valide">Données personnelles</button>
        <button class="ButtonCompte button2" onclick="window.location.href='GererReservation.php'"> Gérer la réservation </button>
        <button class="ButtonCompte button2"  onclick="window.location.href='ArticlesReserve.php'"> Les articles réservés</button> 
        </div>
     <div>
             <a href="logout.php">Déconnexion</a>
     </div>
        
        
        
<!--footer--->

        
<!--footer--->

      
    </body>
</html>