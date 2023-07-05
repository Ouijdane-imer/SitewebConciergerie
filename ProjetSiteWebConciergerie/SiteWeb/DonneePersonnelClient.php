
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
        
        
        <div class="TitreCompte">Donnee personnelle</div>


<div class="container" style="margin-left: 100px;
    margin-top: 45px;">
            
    <table id="mytable" class="w3-table-all" ">
                <thead >
                    <tr>
                       <th>Nom</th>

                       <th>Prenom</th>

                        <th>adresse</th>
                        <th> Telephone</th>
                      <th> adresseMail</th>                       
                     
                    </tr>
                </thead>
                <tbody>
                    <?php
                
          $db = new PDO("mysql:host=localhost;dbname=ludotheque","root","");
          if(isset($_GET['id_client']) AND !empty($_GET['id_client']))
{
   
        
    $id_client=$_SESSION['id_client'];
          $requeteTableau=$db->prepare("select nom,prenom,adresse,telephone, adresseMail from clients where id_client='$id_client';");
          $requeteTableau->execute();
            while($row=$requeteTableau->fetch()){
                ?>
                     <tr>
                         <td><?php echo $row['nom']?></td>
&nbsp
                         <td><?php echo $row['prenom']?></td>
                         &nbsp &nbsp

                        <td> <?php echo $row['adresse']?></td>
                        &nbsp &nbsp
                        <td> <?php echo $row['telephone']?></td> 
                        &nbsp&nbsp
                        <td> <?php echo $row['adresseMail']?></td>
                     
                      
               
                    
                           
                    </tr>
                    
                    <?php
            }
}
                    ?>
                
                </tbody>
                    
            </table>
        </div>
    </body>
</html>
                
              