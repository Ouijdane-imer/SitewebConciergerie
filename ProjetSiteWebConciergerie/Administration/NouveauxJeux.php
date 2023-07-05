

<html>
    <head>
        <meta charset="UTF-8">
        <title>Saisir des nouveux Jeux</title>
         <link rel="stylesheet" href="style.css">

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
        
  <div class="TitreCompte">Saisie des nouveaux jeux</div>
        
  <form action="" method="POST" class="formulaire" style="
    margin-left: 500px;
 
    margin-top: 137px;">
            <label> Nom de jeux </label><br>
            <input type="text" name="NomJeu" placeholder=""/><br>
            <label> Genre </label><br>
            <input type="text" name="Genre" placeholder=""/><br>
            <label> Age </label><br>
            <input type="text" name="age" placeholder=""/><br>
            <label> Type </label><br>
            <input type="text" name="Type" placeholder=""/>  <br>
               <label> Nombre des joueurs </label><br>
               <input type="text" name="nbjoueurs" placeholder=""/>  <br>
               <label> Description </label><br>
            <input type="text" name="Description" placeholder=""/>  <br>
               <label> Images </label><br>
               <input type="text" name="images" placeholder=""/>  <br>
              
                         
            <input type="submit" name="valide" />  
     
                    
               
            
        </form>
        <?php
           $bdd= mysqli_connect("localhost","root","","ludotheque");
           if(isset($_POST['valide']))
           {
               $nomJeu=$_POST['NomJeu'];
               $Genre=$_POST['Genre'];
               $age=$_POST['age'];
               $type=$_POST['Type'];
                $NbJoueurs=$_POST['nbjoueurs'];
               $description=$_POST['Description'];
                $images=$_POST['images'];
              
               
             $query="INSERT INTO jeux ( `NomJeu`,`age`,`Genre`,`nbjoueurs`,`Type`,`Description`,`images`) VALUES ('$nomJeu','$age','$Genre','$NbJoueurs','$type','$description','$images')";
              $sql = mysqli_query($bdd,$query) or die(mysqli_error($bdd));
               
               //$query_run= mysqli_query($bdd,$query);

               if($sql)
               {
                   
                   echo '<script type="text/javascript">alert("Data Saved")</script> ';
               }
               else{
             echo '<script type="text/javascript">alert("Data not Saved")</script> ';
             mysqli_errno($query);
               }

           }
           
        ?>
    </body>
</html>
