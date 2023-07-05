<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['id_client'])) {

    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: loginEspacePerso.php');
    exit();
}
?>


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
        
        <div class="TitreCompte">Mon Compte</div>
        <div class="blockCompte">
            <button class="ButtonCompte button1" onclick="window.location.href='DonneePersonnelClient.php?id_client=<?=$_SESSION['id_client'];?>'">Données personnelles</button>
        <button class="ButtonCompte button2"onclick="window.location.href='GererReservation.php'"> Gérer la réservation </button>
        <button class="ButtonCompte button2"onclick="window.location.href='ArticlesReserve.php?id_client=<?=$_SESSION['id_client'];?>'"> Les articles réservés</button> 
        </div>
       
        
        
        
<!--footer--->

         <div class="footer">

            <p class="footerText"> Gooproduct France</p>
        </div>
<!--footer--->

      
    </body>
</html>
