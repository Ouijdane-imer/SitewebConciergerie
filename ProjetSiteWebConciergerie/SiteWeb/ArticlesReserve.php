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
        <title>Articles commandés</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" />
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
  <div class="TitreCompte">les articles réservées</div>
    
        
      
  <div class="container" style="margin-left: 100px;
    margin-top: 45px;">
            
            <table id="mytable" class="w3-table-all">
                <thead>
                    <tr>
                       <th>id</th>

                       <th>Date emprunt</th>

                        <th>Date retour</th>
                        <th> Nom du jeu</th>
                    
                   
                      <th> Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
          $db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
                 if(isset($_GET['id_client']) AND !empty($_GET['id_client']))
{
   
       
    $id_client=$_SESSION['id_client'];
          $requeteTableau=$db->prepare("select * from booking,jeux where id_client= '$id_client';");
          $requeteTableau->execute();
            while($row=$requeteTableau->fetch()){
                ?>
                     <tr>
                         <td><?php echo $row['id_jeu']?></td>
&nbsp
                         <td><?php echo $row['dateEmprunt']?></td>
                         &nbsp &nbsp

                        <td> <?php echo $row['dateRetour']?></td>
                        &nbsp &nbsp
                        <td> <?php echo $row['NomJeu']?></td> 
                        &nbsp&nbsp
                      
                        &nbsp&nbsp
              
                       <td> <?php 
                       echo ('<img style="width:80px;height:80px;" src= "'.$row['images'].'" />')
                           ?></td>
                            </td>
               

                           
                    </tr>
                    <?php
            }
}
                    ?>
                
                </tbody>
                    
            </table>
        </div>