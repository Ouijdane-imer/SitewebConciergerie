
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscrire des clients</title>
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
  <div class="TitreCompte">Inscrire des clients</div>
        
        <form action="" method="POST" class="formulaire" style="
    margin-left: 500px;
 
    margin-top: 137px;">
            <label> Nom </label><br>
            <input type="text" name="Nom" placeholder=""/><br>
            <label> Prenom </label><br>
            <input type="text" name="Prenom" placeholder=""/><br>
          
            <label> Adresse </label><br>
            <input type="text" name="address" placeholder=""/><br>
            <label> Email </label><br>
            <input type="text" name="Email" placeholder=""/>  <br>
            <label> Telephone </label><br>
            <input type="text" name="NumTelephone" placeholder=""/>  <br>
              
                         
            <input type="submit" name="valide" />  
     
                    
               
            
        </form>
        <?php
           $bdd= mysqli_connect("localhost","root","","bdd_conciergerie");
           if(isset($_POST['valide']))
           {
               $nom=$_POST['Nom'];
               $prenom=$_POST['Prenom'];
               $adresse=$_POST['address'];
               $email=$_POST['Email'];
               $telephone=$_POST['NumTelephone'];
             
               
               $query="INSERT INTO `client`(`Nom`,`Prenom`,`Address`,`Email`,'NumTelephone')VALUES ('$nom','$prenom','$adresse','$email','$telephone');";
               $query_run= mysqli_query($bdd, $query);
               
               if($query_run)
               {
                   
                   echo '<script type="text/javascript">alert("Data Saved")</script> ';
               }
               else{
             echo '<script type="text/javascript">alert("Data not Saved")</script> ';

               }

           }
           
        ?>
    </body>
</html>
