

<?php
// On prolonge la session
session_start();

// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['id_client'])) {

    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
    exit();
}
?>



<html>
    <head>
        <title>Boutique</title>
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
  <div class="TitreCompte">les jeux</div>
    
        
      
  <div class="container" style="margin-left: 100px;
    margin-top: 45px;">
            
            <table id="mytable" class="w3-table-all">
                <thead>
                    <tr>
                       <th>Numero</th>

                       <th>Nom du jeu</th>

                        <th>Age</th>
                        <th> Genre</th>
                      <th> Type</th>                       
                      <th> nbJoueurs</th>
                   
                      <th> IMAGE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                
          $db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
          $requeteTableau=$db->prepare("select * from jeux");
          $requeteTableau->execute();
            while($row=$requeteTableau->fetch()){
                ?>
                     <tr>
                         <td><?php echo $row['id_jeu']?></td>
&nbsp
                         <td><?php echo $row['NomJeu']?></td>
                         &nbsp &nbsp

                        <td> <?php echo $row['age']?></td>
                        &nbsp &nbsp
                        <td> <?php echo $row['Genre']?></td> 
                        &nbsp&nbsp
                        <td> <?php echo $row['Type']?></td>
                        &nbsp &nbsp
                        <td><?php echo $row['nbjoueurs']?></td>
                        &nbsp&nbsp
              
                       <td> <?php 
                       echo ('<img style="width:80px;height:80px;" src= "'.$row['images'].'" />')
                           ?></td>
                            </td>
               
                       <td> <button name="inforrmation" onclick="window.location.href='InformationsProduit.php?id_jeu=<?=$row['id_jeu'];?>'"> Informations </button> </td>
                       
                       <td> <button onclick="window.location.href='Reservation.php?id_jeu=<?=$row['id_jeu'];?>?id_client=<?=$_SESSION['id_client'];?>'"> Réservation</button> </td>

                           
                    </tr>
                    <?php
            }
                    ?>
                
                </tbody>
                    
            </table>
        </div>
  <script src="jquery.min.js"></script>
                  <script src="ddtf.js"></script>
                  <script>
                      $('mytable').ddTableFilter();
                      </script>

    </body>
</html>
