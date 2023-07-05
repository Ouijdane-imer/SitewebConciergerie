 <html>
    <head>
        <title>Operations</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="style.css">
    </head>
    <body>

<nav>
            <div> 
                  <h1 class="header"> GooProduct
                 </h1>  
           
              </div>
          
            <ul>
                <li><a class="active" href="PageOperationAdmin.html">Accueil</a></li>
                <a href="Login.php"><img class="img" src="images/icons8-utilisateur-sexe-neutre-128.png" alt="monCompte.html"/></a>
                <input class="input" type="text" placeholder="Rechercher">
            </ul>  
        </nav>
        
  <div class="TitreCompte">Supprimer ou modifier des clients</div>
        
      
     <div class="container">
            
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

                         <td><?php echo $row['NomJeu']?></td>

                        <td> <?php echo $row['age']?></td>
                        <td> <?php echo $row['Genre']?></td> 
                        <td> <?php echo $row['Type']?></td>
                        <td><?php echo $row['nbjoueurs']?></td>
              
                       <td> <?php 
                       echo ('<img style="width:80px;height:80px;" src= "'.$row['images'].'" />')
                           ?></td>
                            </td>
               
                       <td> <button name="inforrmation" onclick="window.location.href='supprimerJeux.php?id_jeu=<?=$row['id_jeu'];?>'"> Supprimer jeu </button> </td>
                       <td> <button onclick="window.location.href='ModifierJeux.php?id_jeu=<?=$row['id_jeu'];?>'"> modifier jeu</button> </td>

                           
                    </tr>
                    <?php
            }
                    ?>
                
                </tbody>
                    
            </table>
        </div>
    </body>
</html>
